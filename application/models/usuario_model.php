<?php
class Usuario_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    /* VISTA USUARIO*/
    public function LoadUser(){ /*CARGAR USUARIOS*/
        $this->db->select('*');
        $this->db->from('TblUsuario');
        $this->db->order_by('IdUsuario','desc');
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return 0;
        }
    }
    public  function  LoadRol() {/*CARGAR ROLES*/
        $this->db->select('*');
        $this->db->from('CatRol');
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return 0;
        }
    }
    public function LoadVendedor() {/*CARGAR VENDEDOR*/
        $query= $this->OPen_database_odbcSAp();
    }
    public function LoadClient(){ /* CARGAR CLIENTES */

        $this->load->model('cliente_model');

        $query = $this->sqlsrv -> fetchArray("SELECT CLIENTE, NOMBRE, VENDEDOR FROM vtVS2_Clientes WHERE CLIENTE NOT IN(".$this->cliente_model->LoadAllClients().") AND(ACTIVO = 'S') AND (RUBRO1_CLI = 'S')",SQLSRV_FETCH_ASSOC);

        $json = array();
        $i=0;
        echo '<option value="" disabled selected> BUSCAR... </option>';
         foreach ($query as $key)
         {
             //$json['query'][$i]['NOMBRE']=$key['NOMBRE'];
            echo '<option value="'.$key['NOMBRE'].'">'.$key['NOMBRE'].'</option>';
             $i++;
         }
       //return $json;
        $this->sqlsrv->close();
    }

    public function LoadVendedores(){ /* CARGAR CLIENTES */
        $query = $this->sqlsrv -> fetchArray("SELECT VENDEDOR, NOMBRE FROM Softland.umk.VENDEDOR WHERE  (VENDEDOR LIKE 'F%')",SQLSRV_FETCH_ASSOC);
        $json= array();
        $i=0;
        echo '<option value="" disabled selected> BUSCAR... </option>';
        foreach ($query as $key)
        {
            //$json['query'][$i]['NOMBRE']=$key['NOMBRE'];
            echo '<option value="'.$key['NOMBRE'].'">'.$key['NOMBRE'].'</option>';
            $i++;
        }
        //return $json;
        $this->sqlsrv->close();
    }

    public function BuscarCl($user,$clave,$rol,$fecha,$cond){
        $consulta = str_replace('%20', ' ', $cond);
        $buscar = $this->sqlsrv->fetchArray("SELECT * from vtVS2_Clientes where NOMBRE ='".$consulta."'",SQLSRV_FETCH_ASSOC);

        $id=$buscar[0]['CLIENTE'];
        $cliente=$buscar[0]['NOMBRE'];
        $zona=$buscar[0]['VENDEDOR'];

        $this->sqlsrv->close();

        $user = array(
            'Usuario'=> $user,
            'Clave' => $clave,
            'Rol' => $rol,
            'Estado'=>0,
            'FechaCreacion' => $fecha,
            'IdCL' =>$id,
            'Cliente' => $cliente,
            'Zona' => $zona,
            'Nombre' => $consulta
        );
        $query = $this->db->insert('usuario', $user);
        if ($query) {
            return 1;
        } else {
            return 0;
        }
    }

    public function BuscarVdor($user,$clave,$rol,$fecha,$cond){
        $consulta = str_replace('%20', ' ', $cond);
        $buscar = $this->sqlsrv->fetchArray("SELECT * from vtVS2_Vendedor where NOMBRE ='".$consulta."'",SQLSRV_FETCH_ASSOC);

        $ids= $buscar [0]['VENDEDOR'];
        $vendedores=$buscar [0]['NOMBRE'];

        $this->sqlsrv->close();

        $user = array(
            'Usuario'=> $user,
            'Clave' => $clave,
            'Rol' => $rol,
            'FechaCreacion' => $fecha,
            'Estado'=>0,
            'Zona' => $ids,
            'Nombre' => $consulta
        );

        $query = $this->db->insert('usuario', $user);

        if ($query) {
            return 1;
        } else {
            return 0;
        }
    }

    public function addUser($user, $clave, $rol, $fecha, $vendedor) {/*CREACIÓN DE USUARIOS*/
        $consulta = str_replace('%20', ' ', $vendedor);
        $Usuario = array(
            'Usuario' => $user,
            'Clave' => $clave,
            'Rol' => $rol,
            'Estado' =>0,
            'FechaCreacion' => $fecha,
            'Nombre' => $user);

        $query = $this->db->insert('usuario', $Usuario);

        if ($query) {
            return 1;
        } else {
            return 0;
        }
    }

    public function ActUser($cod,$estado){ /* CAMBIAR ESTADO DEL USUARIO*/

        $data = array(
            'Estado' => !$estado,
            'FechaBaja' =>date('Y-m-d H:i:s')
        );

        $this->db->where('IdUsuario', $cod);
        $this->db->update('TblUsuario',$data);
    }
}