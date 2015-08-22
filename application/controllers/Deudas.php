<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deudas extends CI_Controller {

  public function index()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $user = $this->ion_auth->user()->row();
    $data['user_name'] = $user->username;
    $data['title'] = 'Deudas';

    if ( $this->form_validation->run() === FALSE )
    {
      $this->load->view('templates/header', $data);
      $this->load->view('deudas/principal', $data);
      $this->load->view('templates/footer');
    }
    else
    {
      $id = $this->deudas_model->registrar_deuda();
      redirect(site_url('deudas'.$id));
    }
  }

}
