<?php
class Facturas_model extends CI_Model {

    public function __construct()
    {
      $this->load->database();
    }

    public function registrar_factura()
    {
      $this->load->helper('url');

      $slug = url_title($this->input->post('numero'), 'dash', TRUE);

      $data = array(
        'facturas_numero' => $this->input->post('numero'),
        'facturas_fecha' => $this->input->post('fecha'),
        'facturas_establecimiento' => $this->input->post('establecimiento'),
        'facturas_slug' => $slug,
        'facturas_foto' => $this->input->post('foto')
      );

      $this->db->insert('facturas', $data);
      return $this->input->post('numero');
    }

    public function registrar_producto()
    {
      $data = array(
        'productos_numero_factura' => $this->input->post('numero_factura'),
        'productos_marca' => $this->input->post('marca'),
        'productos_nombre' => $this->input->post('nombre'),
        'productos_precio' => $this->input->post('precio'),
        'productos_cantidad' => $this->input->post('cantidad')
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
}
