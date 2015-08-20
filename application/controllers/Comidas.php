<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comidas extends CI_Controller {

  public function index()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $user = $this->ion_auth->user()->row();
    $data['user_name'] = $user->username;
    $data['title'] = 'Comidas';

    if ( $this->form_validation->run() === FALSE )
    {
      $this->load->view('templates/header', $data);
      $this->load->view('comidas/principal', $data);
      $this->load->view('templates/footer');
    }
    else
    {
      $numero_factura = $this->facturas_model->registrar_factura();
      redirect(site_url('facturas/detalles/'.$numero_factura));
    }
  }

}
