<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vista_controller extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');

        if($this->session->userdata('logged')==0){ //No aceptar a usuarios sin loguearse
            redirect(base_url().'index.php/login','refresh');
        }
    }

    public function main(){
        $data['catalogo'] = $this->catalogo_model->traerCatalogoImg();
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/main',$data);
        $this->load->view('footer/footer');
    }

    public function Facturas(){
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $data['Facturas'] = $this->hana_model->Factuas();
        $this->load->view('pages/Facturas',$data);
        $this->load->view('footer/footer');
    }
    public function getDetalleFactura($Factura){
        $this->hana_model->DFacturas($Factura);
    }

    public  function BajaClientes(){
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/BajaClientes');
        $this->load->view('footer/footer');
    }

    public  function  PuntosClientes(){
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/PuntosClientes');
        $this->load->view('footer/footer');
    }

    public function DetalleFact(){
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/DetalleFact');
        $this->load->view('footer/footer');
    }

    public function CanjeFrp(){
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $data['Clientes'] = $this->hana_model->LoadClients();
        $data['Catalogo'] = $this->catalogo_model->traerCatalogoImgActual();
        $this->load->view('pages/CanjeFRP',$data);
        $this->load->view('footer/footer');
    }

    public function CanjeFre(){
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/CanjeEfec');
        $this->load->view('footer/footer');
    }
    public function getPuntosArticulosCatalogo()
    {
        $data['PtsItem'] = $this->catalogo_model->getPtsItem($this->input->post('codigo'));
    }

    public function Catalogo(){
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/Catalogo');
        $this->load->view('footer/footer');
    }

    public function Reportes(){
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $data['Clientes'] = $this->hana_model->LoadClients();// Cargar Clientes
        $this->load->view('pages/Reportes',$data);
        $this->load->view('footer/footer');
    }


}