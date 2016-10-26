<?php
class Hana_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public $BD = 'INNOVA201608';

    public  function OPen_database_odbcSAp(){//CONEXION A HANA INNOVA      
         $conn = @odbc_connect("HANA","SYSTEM","B1Adminhana", SQL_CUR_USE_ODBC);
         if(!$conn){
            echo '<div class="row errorConexion white-text center">
                    ¡ERROR DE CONEXION CON EL SERVIDOR!
                </div>';
         } else {
           return $conn;
         }        
    }

    public  function vendedores(){
        $conn = $this->OPen_database_odbcSAp();
        $query = 'SELECT * from '.$this->BD.'.SPINN_VENDEDORES';
        $resultado =  @odbc_exec($conn,$query);
        $json = array();  
        $i=0;      

        while ($fila = @odbc_fetch_array($resultado)){
            $json[$i]['CODIGO'] = $fila['CODIGO'];
            $json[$i]['NOMBRE'] = utf8_encode($fila['NOMBRE']);
            $json[$i]['RUTA'] = utf8_encode($fila['RUTA']);
            $i++;
        }
        return $json;
    }

    public function Factuas(){
        $conn = $this->OPen_database_odbcSAp();
        $query = 'SELECT * from '.$this->BD.'.SPINN_TTFACTURAS_PUNTOS';
        $resultado =  @odbc_exec($conn,$query);
        $json = array();
        $i=0;

        while ($fila = @odbc_fetch_array($resultado)){
            $json[$i]['FECHA'] = $this->formatFechaPHP($fila['FECHA']);
            $json[$i]['FACTURA'] = $fila['FACTURA'];
            $json[$i]['COD_CLIENTE'] = $fila['COD_CLIENTE'];
            $json[$i]['CLIENTE'] = utf8_encode($fila['CLIENTE']);
            $json[$i]['COD_VENDEDOR'] = $fila['COD_VENDEDOR'];
            $json[$i]['VENDEDOR'] = utf8_encode($fila['VENDEDOR']);
            $json[$i]['DISPONIBLE'] = $fila['DISPONIBLE'];
            $json[$i]['ACUMULADO'] = $fila['ACUMULADO'];
            $i++;
        }
        return $json;
    }

    public function ajaxFacturasXcliente($IdCliente){
        $q_rows     = $this->db->query("call pc_Clientes_Facturas ('".$IdCliente."')");
        if ($q_rows->num_rows()<1) {
            $consulta = '.SPINN_TTFACTURAS_PUNTOS WHERE "COD_CLIENTE" = '."'".$IdCliente."'".'';
        } else {
            $rows_factura = $q_rows->result_array()[0]['Facturas'];
            $consulta = '.SPINN_TTFACTURAS_PUNTOS WHERE "COD_CLIENTE" = '."'".$IdCliente."'".' AND FACTURA NOT IN('.$rows_factura.')';
        }

        $conn = $this->OPen_database_odbcSAp();
        $query = 'SELECT * from '.$this->BD.$consulta;
        $resultado =  @odbc_exec($conn,$query);
        $json = array();
        $i=0;

            $json['data'][$i]["COD_CLIENTE"] = "";
            $json['data'][$i]["FECHA"] = "";
            $json['data'][$i]["FACTURA"] = "NO HAY DATOS";
            $json['data'][$i]["VENDEDOR"] = "";
            $json['data'][$i]["ACUMULADO"] = "";
            $json['data'][$i]["DISPONIBLE"] = "";

            while ($fila = @odbc_fetch_array($resultado)){
                $json['data'][$i]["COD_CLIENTE"] = $fila['COD_CLIENTE'];
                $json['data'][$i]["FECHA"] = $this->formatFechaPHP($fila['FECHA']);
                $json['data'][$i]["FACTURA"] = $fila['FACTURA'];
                $json['data'][$i]["VENDEDOR"] = utf8_encode($fila['VENDEDOR']);
                $json['data'][$i]["ACUMULADO"] = number_format($fila['ACUMULADO'],2);
                $json['data'][$i]["DISPONIBLE"] = number_format($fila['DISPONIBLE'],2);
                $i++;
            
        }
        echo json_encode($json);
    }

    public function PdfFacturasXcliente(){
        $conn = $this->OPen_database_odbcSAp();
        $query = 'SELECT * from '.$this->BD.'.SPINN_TTFACTURAS_PUNTOS';
        $resultado =  @odbc_exec($conn,$query);
        $json = array();
        $i=0;

        if (count($resultado)==0) {
            $json[$i]["COD_CLIENTE"] = "";
            $json[$i]["FECHA"] = "";
            $json[$i]["FACTURA"] = "";
            $json[$i]["VENDEDOR"] = "";
            $json[$i]["ACUMULADO"] = "";
            $json[$i]["DISPONIBLE"] = "";
        } else {
            while ($fila = @odbc_fetch_array($resultado)){        
                $fecha = strtotime($fila['FECHA']);
                $newFecha = date('d-m-Y',$fecha)."<br>";
                $json[$i]["COD_CLIENTE"] = $fila['COD_CLIENTE'];
                $json[$i]["FECHA"] = $newFecha;
                $json[$i]["FACTURA"] = $fila['FACTURA'];
                $json[$i]["VENDEDOR"] = utf8_encode($fila['VENDEDOR']);
                $json[$i]["ACUMULADO"] = number_format($fila['ACUMULADO'],2);
                $json[$i]["DISPONIBLE"] = number_format($fila['DISPONIBLE'],2);
                $i++;
            }
        }
        return $json;
    }

    public function formatFechaPHP($fecha){//funcion para formatear la fecha en d-m-Y para mostrarlo en vistas
        $fecha = strtotime($fecha);
        $newFecha = date('d-m-Y',$fecha);
        return $newFecha;
    }

    public function formatFechaHana($fecha)//funcion para formatear la fecha en Ymd para que hana lo acepte
    {
        $date = date_create($fecha);
        $date = date_format($date, 'Y-m-d');
        $date = str_replace("-","",$date);
        return $date;
    }

    public function ajaxEstadoFacturas($IdCliente,$f1,$f2,$pdf=null)
    {
        $query = 'SELECT * FROM '.$this->BD.'."SPINN_TTFACTURAS_PUNTOS" WHERE '."'".'0'."'"."='"."0'";
        if ($IdCliente != '0') {
            $query.=' AND "COD_CLIENTE" = '."'".$IdCliente."'".'';
        }

        if ($f1!=0) {
            $f1 = $this->formatFechaHana($f1);//mando a formatear la fecha en Ymd
            $f2 = $this->formatFechaHana($f2);
            $query.=' AND "FECHA" BETWEEN '."'".$f1."'".' AND '."'".$f2."'".'';
        }
        $conn = $this->OPen_database_odbcSAp();

        $resultado =  @odbc_exec($conn,$query);
        $json = array();

        $i=0;
        $json['data'][$i]["NUMERO"] = "";
        $json['data'][$i]["FECHA"] = "";
        $json['data'][$i]["FACTURA"] = "";
        $json['data'][$i]["COD_CLIENTE"] = "";
        $json['data'][$i]["CLIENTE"] = "";
        $json['data'][$i]["ESTADO"] = "";

        while ($fila = @odbc_fetch_array($resultado)){
            $json['data'][$i]["NUMERO"] = $i;
            $json['data'][$i]["FECHA"] = $this->formatFechaPHP($fila['FECHA']);
            $json['data'][$i]["FACTURA"] = $fila['FACTURA'];
            $json['data'][$i]["COD_CLIENTE"] = $fila['COD_CLIENTE'];
            $json['data'][$i]["CLIENTE"] = utf8_encode($fila['CLIENTE']);
            $json['data'][$i]["ESTADO"] = $fila['TP_PUNTOS'];
            $i++;
        }

        if ($pdf!=null) {
            return $json;
        }
        echo json_encode($json);
    }

    public function ajaxDisponibilidadPuntos($IdCliente,$f1,$f2,$pdf=null)
    {
        $query = 'SELECT * FROM '.$this->BD.'."SPINN_TTFACTURAS_PUNTOS" WHERE '."'".'0'."'"."='"."0'";
        if ($IdCliente != '0') {
            $query.=' AND "COD_CLIENTE" = '."'".$IdCliente."'".'';
        }

        if ($f1!=0) {
            $f1 = $this->formatFechaHana($f1);//mando a formatear la fecha en Ymd
            $f2 = $this->formatFechaHana($f2);
            $query.=' AND "FECHA" BETWEEN '."'".$f1."'".' AND '."'".$f2."'".'';
        }

        $conn = $this->OPen_database_odbcSAp();
        $resultado =  @odbc_exec($conn,$query);
        $json = array();
        $i=0;

        $json['data'][$i]["NUMERO"] = "";
        $json['data'][$i]["FECHA"] = "";
        $json['data'][$i]["FACTURA"] = "";
        $json['data'][$i]["COD_CLIENTE"] = "";
        $json['data'][$i]["CLIENTE"] = "";
        $json['data'][$i]["P_ACUMULADOS"] = "";
        $json['data'][$i]["P_DISPONIBLES"] = "";
        $json['data'][$i]["ESTADO"] = "";

        while ($fila = @odbc_fetch_array($resultado)){
            $json['data'][$i]["NUMERO"] = $i;
            $json['data'][$i]["FECHA"] = $this->formatFechaPHP($fila['FECHA']);
            $json['data'][$i]["FACTURA"] = $fila['FACTURA'];
            $json['data'][$i]["COD_CLIENTE"] = $fila['COD_CLIENTE'];
            $json['data'][$i]["CLIENTE"] = utf8_encode($fila['CLIENTE']);
            $json['data'][$i]["P_ACUMULADOS"] = $fila['ACUMULADO'];
            $json['data'][$i]["P_DISPONIBLES"] = $fila['DISPONIBLE'];
            $json['data'][$i]["ESTADO"] = $fila['TP_PUNTOS'];
            $i++;

        }
        
        if ($pdf!=null) {
            return $json;
        } else {
            echo json_encode($json);
        }
    }

    public function ClientesPuntos(){
        $conn = $this->OPen_database_odbcSAp();
        if ($this->session->userdata('IdRol')==4) {
            $query = 'SELECT * from '.$this->BD.'.SPINN_CLIENTES_PUNTOS WHERE "COD_VENDEDOR" = '."'".$this->session->userdata('IdVendedor')."'".'';
        } else {
            $query = 'SELECT * from '.$this->BD.'.SPINN_CLIENTES_PUNTOS';
        }

        $resultado =  @odbc_exec($conn,$query);
        $json = array();
        $i=0;
        if (count($resultado)==0) {
            $json[$i]['CODIGO'] = "";
            $json[$i]['CLIENTE'] = "";
            $json[$i]['VENDEDOR'] = "";
            $json[$i]['ACUMULADO'] = "";
            $json[$i]['DISPONIBLE'] = "";
        } else {
            while ($fila = @odbc_fetch_array($resultado)){
                $json[$i]['CODIGO'] = $fila['COD_CLIENTE'];
                $json[$i]['CLIENTE'] = utf8_encode($fila['CLIENTE']);
                $json[$i]['VENDEDOR'] = utf8_encode($fila['VENDEDOR']);
                $json[$i]['ACUMULADO'] = number_format($fila['ACUMULADO'],2);
                $json[$i]['DISPONIBLE'] = number_format($fila['DISPONIBLE'],2);
                $i++;
            }
        }
        return $json;
    }

    public function LoadClients(){
        $conn = $this->OPen_database_odbcSAp();
        if ($this->session->userdata('IdRol')==4) {
            $query = 'SELECT * FROM '.$this->BD.'.SPINN_CLIENTES WHERE COD_VENDEDOR = '.$this->session->userdata('IdVendedor').'';
        } else {
            $query = 'SELECT * FROM '.$this->BD.'.SPINN_CLIENTES ';
        }

        $resultado =  @odbc_exec($conn,$query);
        $json = array();
        $i=0;

        $json[$i]['CODIGO'] = "";
        $json[$i]['VENDEDOR'] = "";
        $json[$i]['NOMBRE'] = "";
        $json[$i]['RUC'] = "";
        $json[$i]['DIRECCION'] = "";
        
        while ($fila = @odbc_fetch_array($resultado)){
                //echo utf8_encode($fila['NOMBRE'])."<br>";
                $json[$i]['CODIGO'] = $fila['CODIGO'];
                $json[$i]['VENDEDOR'] = utf8_encode($fila['VENDEDOR']);
                $json[$i]['NOMBRE'] = utf8_encode($fila['NOMBRE']);
                $json[$i]['RUC'] = utf8_encode($fila['RUC']);
                $json[$i]['DIRECCION'] = utf8_encode($fila['DIRECCION']);
                $i++;
        }
        //echo $i;
        return $json;
    }

    public function DFacturas($ID){
        $conn = $this->OPen_database_odbcSAp();
        $query = "SELECT * from ".$this->BD.".SPINN_FACTURA_PUNTOS WHERE FACTURA='".$ID."'";

        $resultado =  @odbc_exec($conn,$query);
        $json = array();
        $i=0;

        while ($fila = @odbc_fetch_array($resultado)){
            $json['data'][$i]['COD_ARTICULO'] = $fila['COD_ARTICULO'];
            $json['data'][$i]['ARTICULO'] = $fila['ARTICULO'];
            $json['data'][$i]['CANTIDAD'] = $fila['CANTIDAD'];
            $json['data'][$i]['TT_PUNTOS'] = $fila['TT_PUNTOS'];
            $i++;
        }
        echo json_encode($json);
    }

    public function getSaldoParcial($id,$pts){
        /* $q_rows_pts = $this->db->query("SELECT Puntos FROM view_frp_factura WHERE SALDO <> 0 AND anulado = 'N' AND Factura = '".$id."'");
            //$q_rows_pts->store_result();
            //$this->db->reconnect();
            $q_rows_pts->next_result();
            $q_rows_pts->free_result();
            $rows_factura = $q_rows_pts->result_array()[0]['Puntos'];
          
            if($rows_factura == "" ){
                $rows_factura_ajx = $fila['DISPONIBLE'];
            } else {
                $rows_factura_ajx = rows_factura;
            }
            return $rows_factura_ajx;*/

            $link = @mysql_connect('localhost', 'root', 'a7m1425.')or die('No se pudo conectar: ' . mysql_error());            
            mysql_select_db('spinn') or die('No se pudo seleccionar la base de datos');
            //$query = "SELECT Puntos FROM view_frp_factura WHERE SALDO <> 0 AND anulado = 'N' AND Factura = '".$id."'";
            $query = "SELECT Puntos FROM rfactura WHERE Puntos <> 0 AND Factura = '".$id."'";

            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
            $line = mysql_fetch_array($result, MYSQL_ASSOC);
            $rows_factura = $line['Puntos'];
            
            if($rows_factura == "" ){
                $rows_factura_ajx = $pts;
            } else {
                $rows_factura_ajx = $rows_factura;
            }
            return $rows_factura_ajx;
    }

    public function FacturasFRP($ID){
        $q_rows = $this->db->query("call pc_Clientes_Facturas ('".$ID."')");
        if ($q_rows->num_rows() > 0) {
            $query = "SELECT * from ".$this->BD.".SPINN_TTFACTURAS_PUNTOS WHERE COD_CLIENTE='".$ID."' AND ".'"'."DISPONIBLE".'"'." > 0 AND FACTURA NOT IN(".$q_rows->result_array()[0]['Facturas'].")";
        } else {
            $query = "SELECT * from ".$this->BD.".SPINN_TTFACTURAS_PUNTOS WHERE COD_CLIENTE='".$ID."' AND ".'"'."DISPONIBLE".'"'." > 0 ";
        }

        $conn = $this->OPen_database_odbcSAp();
        $resultado =  @odbc_exec($conn,$query);
        $json = array();
        $i=0;

        $json['data'][$i]['FECHA']      = "SIN DATOS";
        $json['data'][$i]['FACTURA']    = "";
        $json['data'][$i]['DISPONIBLE'] = "";
        $json['data'][$i]['CAM1']       = "";
        $json['data'][$i]['CAM2']       = "";
        $json['data'][$i]['CAM3']       = "";
        $json['data'][$i]['CAM4']       = "";
        
        while ($fila = @odbc_fetch_array($resultado)){
            $ID_ROW = "CHK" . $fila['FACTURA'];
            $ID_LBL = "LBL" . $fila['FACTURA'];
            $ID_APl = "AP1" . $fila['FACTURA'];
            $ID_DIS = "DIS" . $fila['FACTURA'];
            $ID_EST = "EST" . $fila['FACTURA'];

            $json['data'][$i]['FECHA']      = date_format(date_create($fila['FECHA']), 'Y-m-d');

            $json['data'][$i]['FACTURA']    = $fila['FACTURA'];
            $json['data'][$i]['DISPONIBLE'] = $this->getSaldoParcial($fila['FACTURA'],$fila['DISPONIBLE']);
            $json['data'][$i]['CAM1']       = "<span id='".$ID_APl."'></span>";
            $json['data'][$i]['CAM2']       = "<span id='".$ID_DIS."'></span>";
            $json['data'][$i]['CAM3']       = "<p><input type='checkbox' onclick='isVerificar(".$i.",".$fila['FACTURA'].")' id='".$ID_ROW."' /><label id='".$ID_LBL."' for='".$ID_ROW."'></label></p>";
            $json['data'][$i]['CAM4']       = "<span id='".$ID_EST."'></span>";
            $i++;
        }
        echo json_encode($json);
        return $json;
    }

    public function PuntosCliente($IdCliente,$bandera=null){
        $json = array();
        $i=0;
        $conn = $this->OPen_database_odbcSAp();
        $query = 'SELECT count(*) AS "CONTADOR" FROM '.$this->BD.'.SPINN_CLIENTES_PUNTOS WHERE COD_CLIENTE = '."'".$IdCliente."'".'';
        $resultado =  @odbc_exec($conn,$query);
        
        if (count($resultado)==0){
            echo " ERROR AL CARGAR LOS PUNTOS ";
        } else {

            while ($fila = @odbc_fetch_array($resultado)){
                if($fila['CONTADOR']==0){
                    $json[$i]['DISPONIBLE'] = 0;
                    $json[$i]['ACUMULADO'] = 0;
                    $json[$i]['CANJEADO'] = 0;
                    $json[$i]['COD_CLIENTE'] = "";
                    $json[$i]['CLIENTE'] = "";
                } else {
                    $query = 'SELECT "COD_CLIENTE","CLIENTE","DISPONIBLE", "ACUMULADO" FROM '.$this->BD.'.SPINN_CLIENTES_PUNTOS WHERE COD_CLIENTE = '."'".$IdCliente."'".'';
                    $resultado =  @odbc_exec($conn,$query);
                    $query = $this->db->query('CALL pc_clientes_pa ("'.$IdCliente.'")');
                    if($query->num_rows() > 0){
                        $canjeado = $query->result_array()[0]['Puntos'];
                    }else{
                        $canjeado = 0;
                    }

                            while ($fila = @odbc_fetch_array($resultado)){
                                    $json[$i]['DISPONIBLE'] = 0;
                                    $json[$i]['ACUMULADO'] = 0;
                                    $json[$i]['CANJEADO'] = 0;
                                    $json[$i]['COD_CLIENTE'] = 0;
                                    $json[$i]['CLIENTE'] = 0;

                                    $json[$i]['DISPONIBLE'] = number_format($fila['DISPONIBLE']);
                                    $json[$i]['ACUMULADO'] = number_format($fila['ACUMULADO']);
                                    $json[$i]['CANJEADO'] = number_format($canjeado);
                                    $json[$i]['COD_CLIENTE'] = $fila['COD_CLIENTE'];
                                    $json[$i]['CLIENTE'] = utf8_encode($fila['CLIENTE']);
                            }
                }
                
                if ($bandera!=null) {
                    return $json;
                }                
            echo json_encode($json);
            }
        }
    }

    public function ajaxDireccionTelefono($IdCliente,$pdf=null)
    {
        $conn = $this->OPen_database_odbcSAp();
        $query = 'SELECT "DIRECCION","TELEFONO" FROM '.$this->BD.'.SPINN_CLIENTES WHERE CODIGO = '."'".$IdCliente."'".'';
        $resultado =  @odbc_exec($conn,$query);
        $json = array();
        $i=0;
        $json[0]['DIRECCION'] = 'NO DEFINIDO';
        $json[0]['TELEFONO'] = 'NO DEFINIDO';

        while ($fila = @odbc_fetch_array($resultado)){
            $json[0]['DIRECCION'] = $fila['DIRECCION'];
            $json[0]['TELEFONO'] = $fila['TELEFONO'];
        }

        if ($pdf!=null) {
            return $json;
        } else {
            echo json_encode($json);
        }
    }
}
?>