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
}
?>