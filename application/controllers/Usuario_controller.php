<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_controller extends CI_Controller
{

    public function __construct(){
        parent::__construct();
    }

    public function Usuarios() {// CARGAR USUARIOS
        $query['Luser'] = $this->usuario_model->LoadUser();
        $query['Lrol'] = $this->usuario_model->LoadRol();
        $query['Lven'] = $this->hana_model->vendedores();
        //print_r($query['Lven']);
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/Users',$query);
        $this->load->view('footer/footer');
    }
    // AGREGAR USUARIO
    public function addUser($user, $clave, $rol, $vendedor)
    {
        echo $rol;
        $fecha = date('Y-m-d H:i:s');
        if ($rol == 'Vendedor') {
            echo "entro a vendedor";
            $this->usuario_model->BuscarVdor($user, $clave, $rol, $fecha, $vendedor);
        } else if ($rol == 'Cliente') {
            echo "entro a cliente";
            $this->usuario_model->BuscarCl($user, $clave, $rol, $fecha, $vendedor);
        } else {
            echo "entro al ultimo";
            $this->usuario_model->addUser($user, $clave, $rol, $fecha, $vendedor);
        }
    }
    public function ActUser($IdUser, $Estado)
    {/*CAMBIAR ESTADO DE USUARIO*/
        $this->usuario_model->ActUser($IdUser, $Estado);
    }

    public function LoadClient()
    {//Cargar los clientes
        $this->usuario_model->LoadClient();
    }

    public function LoadVendedor()
    {//cargar los vendedores
        $this->usuario_model->LoadVendedores();
    }
}