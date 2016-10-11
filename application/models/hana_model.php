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
        $conn = $this->OPen_database_odbcSAp();
        if ($this->session->userdata('IdRol')==3) {
            $query = 'SELECT * from '.$this->BD.'.SPINN_CLIENTES WHERE COD_VENDEDOR = '.$this->session->userdata('IdVendedor').'';
        }
        else{$query = 'SELECT * from '.$this->BD.'.SPINN_CLIENTES ';}
        $resultado =  @odbc_exec($conn,$query);
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
    public function Factuas()
    {
        $conn = $this->OPen_database_odbcSAp();
        $query = 'SELECT * from '.$this->BD.'.SPINN_TTFACTURAS_PUNTOS';
        $resultado =  @odbc_exec($conn,$query);
        $json = array();
        $i=0;
        while ($fila = odbc_fetch_array($resultado)){
            $json[$i]['FECHA'] = $fila['FECHA'];
            $json[$i]['FACTURA'] = $fila['FACTURA'];
            $json[$i]['COD_CLIENTE'] = $fila['COD_CLIENTE'];
            $json[$i]['CLIENTE'] = $fila['CLIENTE'];
            $json[$i]['COD_VENDEDOR'] = $fila['COD_VENDEDOR'];
            $json[$i]['VENDEDOR'] = $fila['VENDEDOR'];
            $json[$i]['DISPONIBLE'] = $fila['DISPONIBLE'];
            $json[$i]['ACUMULADO'] = $fila['ACUMULADO'];
            $i++;
        }
        return $json;
    }
    public function ajaxFacturasXcliente($IdCliente)
    {
        $conn = $this->OPen_database_odbcSAp();
        $query = 'SELECT * from '.$this->BD.'.SPINN_TTFACTURAS_PUNTOS WHERE "COD_CLIENTE" = '."'".$IdCliente."'".'';
        $resultado =  @odbc_exec($conn,$query);
        $json = array();
        $i=0;
        if (count($resultado)==0) {
            $json['data'][$i]["COD_CLIENTE"] = "";
            $json['data'][$i]["FECHA"] = "";
            $json['data'][$i]["FACTURA"] = "";
            $json['data'][$i]["VENDEDOR"] = "";
            $json['data'][$i]["ACUMULADO"] = "";
            $json['data'][$i]["DISPONIBLE"] = "";
        }else{
            while ($fila = odbc_fetch_array($resultado)){
                $json['data'][$i]["COD_CLIENTE"] = $fila['COD_CLIENTE'];
                $json['data'][$i]["FECHA"] = $this->formatFechaPHP($fila['FECHA']);
                $json['data'][$i]["FACTURA"] = $fila['FACTURA'];
                $json['data'][$i]["VENDEDOR"] = $fila['VENDEDOR'];
                $json['data'][$i]["ACUMULADO"] = number_format($fila['ACUMULADO'],2);
                $json['data'][$i]["DISPONIBLE"] = number_format($fila['DISPONIBLE'],2);
                $i++;
            }
        }
        echo json_encode($json);
    }
    public function PdfFacturasXcliente()
    {
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
        }else{
            while ($fila = odbc_fetch_array($resultado)){
                $fecha = strtotime($fila['FECHA']);
                $newFecha = date('d-m-Y',$fecha)."<br>";
                $json[$i]["COD_CLIENTE"] = $fila['COD_CLIENTE'];
                $json[$i]["FECHA"] = $newFecha;
                $json[$i]["FACTURA"] = $fila['FACTURA'];
                $json[$i]["VENDEDOR"] = $fila['VENDEDOR'];
                $json[$i]["ACUMULADO"] = number_format($fila['ACUMULADO'],2);
                $json[$i]["DISPONIBLE"] = number_format($fila['DISPONIBLE'],2);
                $i++;
            }
        }
        return $json;
    }
    public function formatFechaPHP($fecha)//funcion para formatear la fecha en d-m-Y para mostrarlo en vistas
    {
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
    public function ajaxEstadoFacturas($IdCliente,$f1,$f2)
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
        while ($fila = odbc_fetch_array($resultado)){
            $json['data'][$i]["NUMERO"] = $i;
            $json['data'][$i]["FECHA"] = $this->formatFechaPHP($fila['FECHA']);
            $json['data'][$i]["FACTURA"] = $fila['FACTURA'];
            $json['data'][$i]["COD_CLIENTE"] = utf8_encode($fila['COD_CLIENTE']);
            $json['data'][$i]["CLIENTE"] = $fila['CLIENTE'];
            $json['data'][$i]["ESTADO"] = $fila['TP_PUNTOS'];
            $i++;
        }

        echo json_encode($json);
    }
    public function ajaxDisponibilidadPuntos($IdCliente,$f1,$f2)
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
        while ($fila = odbc_fetch_array($resultado)){
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
        echo json_encode($json);
    }
    public function ClientesPuntos()
    {
        $conn = $this->OPen_database_odbcSAp(); $query = '';
        $query = 'SELECT * from '.$this->BD.'.SPINN_CLIENTES_PUNTOS';
        $resultado =  @odbc_exec($conn,$query);
        $json = array();
        $i=0;
        if (count($resultado)==0) {
            $json[$i]['CODIGO'] = "";
            $json[$i]['CLIENTE'] = "";
            $json[$i]['VENDEDOR'] = "";
            $json[$i]['ACUMULADO'] = "";
            $json[$i]['DISPONIBLE'] = "";
        }
        else{
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
    public function DFacturas($ID)
    {
        $conn = $this->OPen_database_odbcSAp();
        $query = "SELECT * from ".$this->BD.".SPINN_FACTURA_PUNTOS WHERE FACTURA='".$ID."'";

        $resultado =  @odbc_exec($conn,$query);
        $json = array();
        $i=0;

        while ($fila = odbc_fetch_array($resultado)){
            $json['data'][$i]['COD_ARTICULO'] = $fila['COD_ARTICULO'];
            $json['data'][$i]['ARTICULO'] = $fila['ARTICULO'];
            $json['data'][$i]['CANTIDAD'] = $fila['CANTIDAD'];
            $json['data'][$i]['TT_PUNTOS'] = $fila['TT_PUNTOS'];
            $i++;
        }
        echo json_encode($json);
    }
    public function FacturasFRP($ID)
    {
        $conn = $this->OPen_database_odbcSAp();

        $query = "SELECT * from ".$this->BD.".SPINN_TTFACTURAS_PUNTOS WHERE COD_CLIENTE='".$ID."' AND ".'"'."DISPONIBLE".'"'." > 0";
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

        while ($fila = odbc_fetch_array($resultado)){
            $json['data'][$i]['FECHA']      = substr($fila['FECHA'],0,10);
            $json['data'][$i]['FACTURA']    = $fila['FACTURA'];
            $json['data'][$i]['DISPONIBLE'] = $fila['DISPONIBLE'];
            $json['data'][$i]['CAM1']       = "";
            $json['data'][$i]['CAM2']       = "";
            $json['data'][$i]['CAM3']       = "<p><input type='checkbox' id='test1' /><label for='test1'></label></p>";
            $json['data'][$i]['CAM4']       = "";
            $i++;
        }

        echo json_encode($json);

        return $json;

    }

    public function PuntosCliente($IdCliente)
    {
        $json = array();
        $i=0;
        $conn = $this->OPen_database_odbcSAp();
        $query = 'SELECT count(*) AS "CONTADOR" FROM '.$this->BD.'.SPINN_CLIENTES_PUNTOS WHERE COD_CLIENTE = '."'".$IdCliente."'".'';
        $resultado =  @odbc_exec($conn,$query);
        if (count($resultado)==0) {echo " ERROR AL CARGAR LOS PUNTOS ";
        }else{
            while ($fila = @odbc_fetch_array($resultado)){
                if($fila['CONTADOR']==0){
                    $json[$i]['DISPONIBLE'] = 0;
                    $json[$i]['ACUMULADO'] = 0;
                }
                else{
                    $query = 'SELECT "DISPONIBLE", "ACUMULADO" FROM '.$this->BD.'.SPINN_CLIENTES_PUNTOS WHERE COD_CLIENTE = '."'".$IdCliente."'".'';
                    $resultado =  @odbc_exec($conn,$query);
                    if (count($resultado)==0) {
                    }
                    else{
                        while ($fila = @odbc_fetch_array($resultado)){
                            if ($fila['DISPONIBLE']=='') {
                                $json[$i]['DISPONIBLE'] = 0;
                                $json[$i]['ACUMULADO'] = 0;
                            }else{
                                $json[$i]['DISPONIBLE'] = number_format($fila['DISPONIBLE']);
                                $json[$i]['ACUMULADO'] = number_format($fila['ACUMULADO']);
                            }
                        }
                    }
                }
            }
            echo json_encode($json);
        }
    }
}
?>