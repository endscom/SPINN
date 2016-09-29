<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exportacion_controller extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('MPDF/mpdf');
    }

    public function ExpoClients(){
        $query = $this->cliente_model->LoadClients();// Cargar Clientes
        $this->load->view('Exportar/Excel_Cliente',$query);
    }

    public function ExpoPdf(){
        $query = $this->cliente_model->LoadClients();// Cargar Clientes
        $PdfCliente = new mPDF('utf-8','A4');
        $PdfCliente -> writeHTML($this->load->view('Exportar/Pdf_Cliente',$query,true));
        $PdfCliente->Output();
    }
}