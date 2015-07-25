<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facturas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('facturas_model');
	}

	public function index()
	{
		if ( ! $this->ion_auth->logged_in() )
		{
			redirect('auth/login');
		}

		$this->load->helper('form');
		$this->load->library('form_validation');


		$user = $this->ion_auth->user()->row();
		$data['user_name'] = $user->username;
		$data['title'] = 'Factura Nueva';

		$form_validation_rules = array(
			array(
				'field' => 'numero',
				'label' => 'numero',
				'rules' => 'required|max_length[8]|trim',
				'errors' => array(
					'required' => 'Se te orvido el %s costilla',
					'max_length' => 'El numero de factura tiene que ser más corto',
				),
			),
			array(
				'field' => 'fecha',
				'label' => 'fecha',
				'rules' => 'required|max_length[15]|trim',
				'errors' => array(
					'required' => 'Se te orvido la %s menol',
					'max_length' => 'Tiene que ser una fecha valida lacra',
				),
			),
			array(
				'field' => 'establecimiento',
				'label' => 'establecimiento',
				'rules' => 'required|max_length[120]|trim',
				'errors' => array(
					'required' => 'Se te orvido el %s bichit@',
					'max_length' => 'El nombre no puede ser tan largo conbibe',
				),
			),
		);
		$this->form_validation->set_rules($form_validation_rules);

		if ( $this->form_validation->run() === FALSE )
		{
			$this->load->view('templates/header', $data);
			$this->load->view('factura_nueva');
			$this->load->view('templates/footer');
		}
		else
		{
			$numero_factura = $this->facturas_model->registrar_factura();
			redirect(site_url('facturas/agregar_producto/'.$numero_factura));
		}
	}

	public function agregar_producto($numero_factura = NULL)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');

		$user = $this->ion_auth->user()->row();
		$data['user_name'] = $user->username;

		if ( $numero_factura === NULL )
		{
			// if ( $this->session->flashdata('numero_factura') !== NULL )
			// {
				$data['numero_factura'] = $this->session->flashdata('numero_factura');
			// }
			// else {
			// 	redirect('/');
			// }
		}
		else
		{
			$data['numero_factura'] = $numero_factura;
		}

		$form_validation_rules = array(
			array(
				'field' => 'nombre',
				'label' => 'nombre',
				'rules' => 'required|max_length[70]|trim',
				'errors' => array(
					'required' => 'Se te orvido el %s menol',
					'max_length' => 'El nombre tiene que ser mas corto',
				),
			),
			array(
				'field' => 'precio',
				'label' => 'precio',
				'rules' => 'required|max_length[14]|trim',
				'errors' => array(
					'required' => 'Se te orvido el %s bichit@',
					'max_length' => 'Imposible que cueste tanto conbibe',
				),
			),
			array(
				'field' => 'cantidad',
				'label' => 'cantidad',
				'rules' => 'required|max_length[5]|trim',
				'errors' => array(
					'required' => 'Falta la %s compai',
					'max_length' => 'No me mientas que no compraste tantos',
				),
			),
		);
		$this->form_validation->set_rules($form_validation_rules);

		$data['title'] = 'Agregar Producto';
		if ( $this->form_validation->run() === FALSE )
		{
			$this->load->view('templates/header', $data);
			$this->load->view('agregar_producto', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$data['numero_factura'] = $this->facturas_model->registrar_producto($numero_factura);
			if ( ! $data['numero_factura'] == 0 )
			{
				$this->session->set_flashdata('numero_factura', $data['numero_factura']);
				redirect(current_url());
			}
			else
			{
				redirect('/');
			}
		}
	}

	public function elegir_factura()
	{
		$data['title'] = 'Elige la factura';
		$user = $this->ion_auth->user()->row();
		$data['user_name'] = $user->username;

		$data['facturas'] = $this->facturas_model->obtener_facturas();

		$this->load->view('templates/header', $data);
		$this->load->view('elegir_factura', $data);
		$this->load->view('templates/footer');
	}
}
