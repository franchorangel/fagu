<?php
class Facturas_model extends CI_Model {

    public function __construct()
    {
      $this->load->database();
    }

    public function registrar_factura()
    {
      $slug = url_title($this->input->post('numero'), 'dash', TRUE);

      $data = array(
        'numero' => $this->input->post('numero'),
        'fecha' => $this->input->post('fecha'),
        'establecimiento' => $this->input->post('establecimiento'),
        'slug' => $slug,
        'foto' => $this->input->post('foto')
      );

      $this->db->insert('facturas', $data);
      return $this->input->post('numero');
    }

    public function registrar_producto()
    {
      $data = array(
        'numero_factura' => $this->input->post('numero_factura'),
        'marca' => $this->input->post('marca'),
        'nombre' => $this->input->post('nombre'),
        'precio' => $this->input->post('precio'),
        'cantidad' => $this->input->post('cantidad')
      );

      $this->db->insert('productos', $data);
      $checked = $this->input->post('otro');
      if ( (int)$checked == 1 )
      {
        return $this->input->post('numero_factura');
      }
      else
      {
        return 0;
      }
    }

    public function obtener_facturas($numero = NULL)
    {
      if ($numero === NULL)
      {

        $this->db->order_by('fecha', 'desc');
        $this->db->limit(10);
        $query = $this->db->get('facturas');

        return $query->result_array();
      }

      $query = $this->db->get_where('facturas', array('numero' => $numero));
      return $query->row_array();
    }
}
