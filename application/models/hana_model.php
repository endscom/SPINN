<?php 
class Hana_model extends CI_Model
{

    public function __construct(){
        parent::__construct();
        $this->load->database();

    }
    public $BD = 'INNOVA201608';

    public  function OPen_database_odbcSAp(){/*conexion a hana innova*/
        return odbc_connect("HANA","SYSTEM","B1Adminhana", SQL_CUR_USE_ODBC);
    }

    public  function vendedores(){
        $conn = $this->OPen_database_odbcSAp();  
        $query = 'SELECT * from '.$this->BD.'.SPINN_VENDEDORES';
        $resultado =  odbc_exec($conn,$query);
        $json = array();  
        $i=0;      
        while ($fila = odbc_fetch_array($resultado)){
            $json[$i]['CODIGO'] = $fila['CODIGO'];  
            $json[$i]['NOMBRE'] = utf8_encode($fila['NOMBRE']);  
            $json[$i]['RUTA'] = utf8_encode($fila['RUTA']);              
            $i++;
        }
        return $json;      
    }
    public function LoadClients()
    {
        $conn = $this->OPen_database_odbcSAp(); $query = '';
        if ($this->session->userdata('IdRol')==3) {
            $query = 'SELECT * from '.$this->BD.'.SPINN_CLIENTES WHERE COD_VENDEDOR = '.$this->session->userdata('IdVendedor').'';
        }
        else{$query = 'SELECT * from '.$this->BD.'.SPINN_CLIENTES';}
        $resultado =  @odbc_exec($conn,$query);
        //echo $query;
        $json = array();  
        $i=0;
        if (count($resultado)==0) {
            $json[$i]['CODIGO'] = "";  
            $json[$i]['VENDEDOR'] = "";
            $json[$i]['NOMBRE'] = "";
            $json[$i]['RUC'] = "";
            $json[$i]['DIRECCION'] = "";
        }
        else{
            while ($fila = @odbc_fetch_array($resultado)){
                $json[$i]['CODIGO'] = $fila['CODIGO'];  
                $json[$i]['VENDEDOR'] = utf8_encode($fila['VENDEDOR']);  
                $json[$i]['NOMBRE'] = utf8_encode($fila['NOMBRE']);
                $json[$i]['RUC'] = utf8_encode($fila['RUC']);
                $json[$i]['DIRECCION'] = utf8_encode($fila['DIRECCION']);
                $i++;
            }
        }
        return $json;
    }
}
?>