<?php
class Facturas_model extends CI_Model {

    public function __construct()
    {
      $this->load->database();
    }

    public function conteo_facturas() {
        return $this->db->count_all("facturas");
    }

    public function registrar_factura( $user_id = NULL )
    {
      if ( $user_id === NULL )
      {
        if ( ! $this->ion_auth->logged_in() )
        {
          redirect('auth/login');
        }
        return false;
      }

      $fecha = DateTime::createFromFormat('d/m/Y', $this->input->post('fecha'));
      if ( $fecha === false )
      {
        return 'Fecha inválida';
      }
      $fecha = $fecha->format('Y-m-d');

      $establecimiento = $this->input->post('establecimiento');
      $establecimiento = trim($establecimiento);
      $establecimiento = strtolower($establecimiento);
      $establecimiento = ucwords($establecimiento);

      $data = array(
        'numero' => $this->input->post('numero_factura'),
        'fecha' => $fecha,
        'registrador' => $user_id,
        'establecimiento' => $establecimiento,
        'foto' => $this->input->post('foto')
      );

      $this->db->insert('facturas', $data);
      return $this->input->post('numero_factura');
    }

    public function registrar_producto()
    {
      $marca = $this->input->post('marca');
      $marca = trim($marca);
      $marca = strtolower($marca);
      $marca = ucwords($marca);

      $nombre = $this->input->post('nombre');
      $nombre = trim($nombre);
      $nombre = strtolower($nombre);
      $nombre = ucwords($nombre);

      $tiene_iva = $this->input->post('tiene_iva');
      if ( !isset($tiene_iva) == 1 )
        $tiene_iva = 1;
      else
        $tiene_iva = 0;

      $data = array(
        'numero_factura' => $this->input->post('numero_factura'),
        'marca' => $marca,
        'nombre' => $nombre,
        'precio' => $this->input->post('precio'),
        'tiene_iva'=> $tiene_iva,
        'cantidad' => $this->input->post('cantidad')
      );

      $this->db->insert('productos', $data);
      return $this->input->post('numero_factura');
    }

    public function obtener_facturas( $numero_factura = NULL, $limit = 10, $start = 0 )
    {
      if ($numero_factura === NULL)
      {
        $this->db->limit($limit, $start);
        $this->db->order_by('fecha_de_registro_en_sistema', 'desc');
        $this->db->select('numero, fecha, establecimiento');
        $query = $this->db->get('facturas');

        return $query->result_array();
      }

      //obtiene productos de factura
      $this->db->order_by('fecha_de_registro_en_sistema', 'desc');
      $this->db->select('id, nombre, precio, cantidad, tiene_iva');
      $query = $this->db->get_where('productos', array('numero_factura' => $numero_factura));
      return $query->result_array();
    }

    public function eliminar_producto( $id )
    {
      $query = $this->db->delete('productos', array('id' => $id));
    }

    public function obtener_total_factura( $numero_factura = NULL, $limit = 10, $start = 0 )
    {
      $iva = 0.12;

      if ( $numero_factura === NULL )
      {
        $this->db->limit($limit, $start);
        $this->db->order_by('fecha_de_registro_en_sistema', 'desc');
        $this->db->select('numero');
        $query = $this->db->get('facturas');
        $facturas = $query->result_array();

        foreach ( $facturas as $numero_factura )
        {
          $this->db->select('precio, tiene_iva, cantidad');
          $query = $this->db->get_where('productos', array('numero_factura' => $numero_factura['numero']));
          $precios = $query->result_array();

          $totales[$numero_factura['numero']] = 'No hay productos registrados';
          if( sizeof($precios) > 0 )
          {
            foreach( $precios as $precio )
            {
              if ( $precio['tiene_iva'] )
              {
                $cantidad = $precio['cantidad'];
                $precio = $precio['precio'];
                $precio = ( $precio + ($iva * $precio) ) * $cantidad; //Agregar iva como constante de base de datos
                $totales[$numero_factura['numero']] += number_format((float)$precio, 2, '.', '');
              }
              else
              {
                $precio = $precio['precio'] * $precio['cantidad'];
                $totales[$numero_factura['numero']] += number_format((float)$precio, 2, '.', '');
              }

              $totales[$numero_factura['numero']] = number_format((float)$totales[$numero_factura['numero']], 2, ',', '');
            }
          }

        }

        return $totales;
      }

      $this->db->select('precio, tiene_iva, cantidad');
      $query = $this->db->get_where('productos', array('numero_factura' => $numero_factura));
      $precios = $query->result_array();

      $total = 0;
      if( sizeof($precios) > 0 )
      {
        foreach( $precios as $precio )
        {
          if ( $precio['tiene_iva'] )
          {
            $cantidad = $precio['cantidad'];
            $precio = $precio['precio'];
            $precio = ( $precio + ($iva * $precio) ) * $cantidad; //Agregar iva como constante de base de datos
            $total += $precio;
          }
          else
          {
            $total += $precio['precio'] * $precio['cantidad'];
          }
        }
      }
      else
      {
        return $total;
      }

      return $total;
    }
}
