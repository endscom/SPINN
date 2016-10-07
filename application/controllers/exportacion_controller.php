<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exportacion_controller extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('MPDF/mpdf');
    }

    public function ExpoClients(){
        $data['Clientes'] = $this->hana_model->LoadClients();// Cargar Clientes
        $this->load->view('Exportar/Excel_Cliente',$data);
    }

    public function ExpoPdf(){
        $query['Clientes'] = $this->hana_model->LoadClients();// Cargar Clientes
        $PdfCliente = new mPDF('utf-8','A4');
        $PdfCliente->SetFooter("Página {PAGENO} de {nb}");//PARA PONER EL NUMERO DE PAGINA EKISDE
        $PdfCliente -> writeHTML($this->load->view('Exportar/Pdf_Cliente',$query,true));
        $PdfCliente->Output();
    }
    public function ExpoFrp(){

        $this->load->view('Exportar/Pdf_FRP');

    }
}