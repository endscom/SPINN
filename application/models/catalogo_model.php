<?php
class Catalogo_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function CatalogoPasado($idCatalogo)
    {
        $this->db->where('IdCT',$idCatalogo);
        $query = $this->db->get('detallect');
        $json = array();
        $i=0;
        if($query->num_rows() <> 0){
            foreach ($query->result_array() as $row){                   
                    $json['data'][$i]['CodigoImg'] = $row['IdIMG'];
                    $json['data'][$i]['Nombre'] = $row['Nombre'];
                    $json['data'][$i]['Imagen'] = '<img class="btn-floating materialboxed" data-caption='.$row['Nombre']." ".number_format($row['Puntos'])." PTOS'
                                                    width='250' src=".base_url().'assets/img/catalogo/'.$row['IMG'].'>';
                    $json['data'][$i]['Puntos'] = $row['Puntos'];
                    $json['data'][$i]['check'] = '<input type="checkbox" id="chk-'.$row['IdIMG'].'" />
                                                    <label for="chk-'.$row['IdIMG'].'"></label>';
                    $json['data'][$i]['idCT'] = $row['IdCT'];
                    $i++;
                }
             
        } else {   
                $json['data'][$i]['CodigoImg'] = "";
                $json['data'][$i]['Nombre'] = "";
                $json['data'][$i]['Imagen'] = "";
                $json['data'][$i]['Puntos'] = "";
                $json['data'][$i]['check'] = "";
                $json['data'][$i]['idCT'] = "";

        }      
        echo json_encode($json);         
    }
    public function guardarIMG($codigo,$nombre,$imagen,$puntos)
    {
        $this->db->where('Estado',0);$R;
        $query = $this->db->get('catalogo');
        $codImg = explode(".", $imagen);
        //echo $codImg[0]; 
        if ($query->num_rows()>0) {
            $R = $query->row();
            $data = array('IdCT'    =>  $R->IdCT,
                    'IdIMG'   =>  $codImg[0],
                    'Nombre'   =>  strtoupper($this->nombreUTF8($nombre)),
                    'IMG'   =>  $imagen,
                    'Puntos'   =>  $puntos,
                    'Estado'   =>  0);
                    $this->db->insert('detallect',$data);
        }
    }
    public function ActualizarEstadoArticulo($idarticulo,$idcatalogo)
    {
        echo $idarticulo." ".$idcatalogo;
        $data = array('Estado' => 1);
        $this->db->where('IdCT',$idcatalogo);
        $this->db->where('IdIMG',$idarticulo);
        $this->db->update('detallect',$data);
    }
    public function nombreUTF8($nombre)
    {
        
        $nombre = str_replace(array("á", "é", "í","ó","ú","ñ"), array("/A%", "/E%","/I%","/O%","/U%","/-%"), $nombre);
        return $nombre;
    }
    public function traerCatalogoImg()
    {
        $this->db->where('Estado',0);
        $query = $this->db->get('catalogo');
        if ($query->num_rows() >0) {
            $R = $query->row();
            //echo strtoupper(utf8_decode('ñaña'));
            $this->db->query("SET NAMES 'utf8'");
            $this->db->query('call pc_Catalogo ('.$R->IdCT.')');
        }
    	$query = $this->db->get('tmp_catalogo');
    	if ($query->num_rows() >0) {
    		return $query->result_array();
    	}
    	return 0;
    }
    public function traerCatalogoImgActual()
    {
        $query = $this->db->get('view_catalogo_activo');
        if ($query->num_rows() >0) {
            return $query->result_array();
        }
        return 0;
    }
    public function traerCatalogo()
    {
        $query = $this->db->get('catalogo');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return 0;
    }
    public function bandera()
    {
        $this->db->where('Estado',0);
        $query = $this->db->get('catalogo');
        if ($query->num_rows()>0) {
            $R = $query->row();
        }
        else{
            return 1;
        }
        $fecha = date_format(date_create(date('Y-m-d')),'Y');
        $fecha2 = date_format(date_create($R->Fecha),'Y');
        if (date_format(date_create(date('Y-m-d')),'Y')>date_format(date_create($R->Fecha),'Y')) {
            return 1;
        }
        elseif (date_format(date_create(date('Y-m-d')),'m')>date_format(date_create($R->Fecha),'m')) {
            return 1;
        }
        else{
            return 0;
        }
    }
    public function traerCatalogosActual()
    {
        $this->db->where('Estado',0);
        $query = $this->db->get('catalogo');
        if ($query->num_rows()>0) {
            return $query->result_array();
        }
        return 0;
    }
    public function traerCatalogosHistorial()
    {
        $this->db->where('Estado',1);
        $query = $this->db->get('catalogo');
        if ($query->num_rows()>0) {
            return $query->result_array();
        }
        return 0;
    }
    public function actualizarPuntos($codImagen,$codCatalogo,$puntos)
    {
        $data = array(
               'Puntos' => $puntos
            );
        $this->db->where('IdCT',$codCatalogo);
        $this->db->where('CodigoImg',$codImagen);
        $this->db->update('detallect',$data);
    }
    public function crearCatalogo($descripcion,$fecha)
    {
        $data = array( 'Estado' => 1);
        $this->db->update('catalogo',$data);
        $data = array( 'Descripcion' => $descripcion,
                       'Fecha' => date_format(date_create($fecha),'Y-m-d'),
                       'Estado' => 0
                    );
        $this->db->insert('catalogo',$data);

    }
    public function actualizarCatalogo($codigo,$articulo,$puntos,$idCatalogo,$idCatalogoArticulo)
    {
        $this->db->where('IdCT',$idCatalogoArticulo);
        $this->db->where('IdIMG',$codigo);
        $query = $this->db->get('detallect');        
        if($query->num_rows() > 0){
             $R = $query->row();
             $data = array(
               'IdCT' => $idCatalogo,
               'IdIMG' => $codigo,
               'Nombre' => $articulo,
               'IMG' => $R->Imagen,
               'Puntos' => $puntos,
               'Estado' => 0
            );
            $this->db->insert('detallect', $data);
        }
    }
}
?>