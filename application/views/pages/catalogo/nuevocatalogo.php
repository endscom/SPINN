<header class="demo-header mdl-layout__header ">
    <div class="centrado  ColorHeader">
        <span class=" title">catálogo</span>
    </div>
</header>
<!--  CONTENIDO PRINCIPAL -->
<main class="mdl-layout__content mdl-color--grey-100">
    <div class="contenedor">        
        <div class=" row TextColor center">
            <div class="col s5 m8 l12 offset-m1">
               creación de catalogos                
            </div>
        </div>
  	<div class="row noMargen valign-wrapper ">
          <div class="bold noMargen left col s5 m8 l8">
              <h6>ARTÍCULOS EN CATÁLOGO DE <?php
              $Fecha = date_format(date_create($catActual[0]['Fecha']),'m');
              switch ($Fecha) {
                case '01':echo "ENERO";break;case '02':echo "FEBRERO";break;case '03':echo "MARZO";break;
                case '04':echo "ABRIL";break;case '05':echo "MAYO";break;case '06':echo "JUNIO";break;
                case '07':echo "JULIO";break;case '08':echo "AGOSTO";break;case '09':echo "SEPTIEMBRE";break;
                case '10':echo "OCTUBRE";break;case '11':echo "NOVIEMBRE";break;case '12':echo "DICIEMBRE";break;
                default:}
               ?>
              </h6>
          </div>
          <?php if($bandera!=0) { 
          echo '<div class="bold col s5 m8 l2">
                  <a href="#modalNuevoCatalogo" id="aa" class="waves-effect waves-light btn BtnBlue modal-trigger">
                  <i class="material-icons right">insert_invitation</i>CREAR</a>
                </div>';
          } ?>
          <div class="bold col s5 m8 l2">
              <a href="#listaArticulosCatalogoActual" id="btngenerar" class="waves-effect waves-light btn BtnBlue modal-trigger">
              <i class="material-icons right">card_giftcard</i>AGREGAR</a>
          </div>
    </div>
    <div class="progress" style="display:none">
          <div class="indeterminate violet"></div>
    </div>
  <div class="row center">
		<table id="tblCatalogoActual" class="table TblDatos">
            <thead>
            <tr>
                <th>CÓDIGO</th>
                <th>ARTÍCULO</th>
                <th>MINIATURA</th>
                <th>PUNTOS</th>
                <th>SELECCIONAR</th>
            </tr>
            </thead>
            <tbody>
                <?PHP
                if(!($catalogo)){}
                else{
                    foreach($catalogo AS $row)
                    {
                        echo "<tr>
                                   <td>".$row['CodigoImg']."</td>
                                   <td class='negra'>".$row['Nombre']."</td>
                                   <td class='center'><img class='btn-floating materialboxed' data-caption='".$row['Nombre']." ".number_format($row['Puntos'])." PTOS'
                                   width='250' src='".base_url()."assets/img/catalogo/".$row['Imagen']."'></td>
                                   <td><input id='".$row['CodigoImg']."' type='number' min='0'  step='any' value=".$row['Puntos']."></td>
                                   <td><a href='#' onclick='ActualizarPuntos(".'"'.$row['CodigoImg'].'","'.$row['IdCT'].'"'.")'><i class='material-icons'>save</i></a></td>
                              </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
	   </div>
    </div>
      <?PHP
                if(!($catalogo)){}
                else{
                    foreach($catalogo AS $row)
                    {
                        echo "<input id='IdCatalogoActual' type='hidden' value=".$row['IdCT'][0].">";break;
                    }
                }
                ?>
</main>

 <!--Modal Structure lista de articulos DE CATALOGO ACTUAL-->
  <div id="listaArticulosCatalogoActual" class="modal">
    <div class="btnCerrar right">
      <i  style='color:red;' class="material-icons modal-action modal-close">highlight_off</i>
    </div>
    <div class="modal-content">
      <div class="row noMargen TextColor center">
            <div class="col s5 m8 l12 offset-m1">
               AGREGAR ARTÍCULOS A CATALOGO ACTUAL
            </div>
            <div class="row noMargen">
              <div class="input-field col s12 l3">
              <select id="cmbCatalogos" class="negra">
                <option value="" disabled selected>AGREGAR ARTÍCULOS DE:</option>
                <?php 
                      if (!($catalogos)) {}
                        else{
                            foreach ($catalogos as $key) {
                                echo "<option value='".$key['IdCT']."'>".$key['Descripcion']."</option>";
                            }
                        }
                      ?>
              </select>
            </div>
            <div class="input-field offset-l6 col s12 l3">
              <a id="btnborrarSeleccionados" class="waves-effect waves-light btn BtnBlue">
              <i class="material-icons right">delete_forever</i>BORRAR</a>
            </div>
        </div>
        </div>
        <div class="progress progress2" style="display:none">
          <div class="indeterminate violet"></div>
    </div>
      <div class="row noMargen TextColor center">
           <table id="tblCatalogoActualModal" class="table TblDatos">
            <thead>
            <tr>
                <th>CÓDIGO</th>
                <th>ARTÍCULO</th>
                <th>MINIATURA</th>
                <th>PUNTOS</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>      
      </div><br>
      <div class="row center">
            <a id="guardarCatalogo" class="redondo waves-effect waves-light btn">GUARDAR</a>
      </div>         
    </div>
</div>

       <!--Modal Structure lista de articulos-->
  <div id="listaArticulos" class="modal">
    <div class="btnCerrar right">
      <i  style='color:red;' class="material-icons modal-action modal-close">highlight_off</i>
    </div>
    <div class="modal-content">
      <div class="row TextColor center">
            <div class="col s5 m8 l12 offset-m1">
               reutilización de catálogo
            </div>
      </div>
      <div class="row TextColor center">
            <table id="tblCatalogoPasado" class="table TblDatos">
            <thead>
            <tr>
                <th>CÓDIGO</th>
                <th>ARTÍCULO</th>
                <th>MINIATURA</th>
                <th>PUNTOS</th>
                <th>SELECCIONAR</th>
            </tr>
            </thead>
          <tbody>              
          </tbody>
        </table>
      </div>
      <div class="row center">
            <a id="addCatalogoAntiguo" class="redondo waves-effect waves-light btn">AGREGAR</a>
      </div>         
    </div>
</div>

  <!-- Modal Structure DAR DE BAJA-->
  <div id="darBaja" class="modal">
    <div class="btnCerrar right">
      <i  style='color:red;' class="material-icons modal-action modal-close">highlight_off</i>
    </div>
    <div class="modal-content">
      <div class="row TextColor center">
            <div class="col s5 m8 l12">
               ¿está seguro que desea dar de baja a este artículo?
            </div>
      </div>
      <div class="row center">
            <a id="darBajaOK" class="redondo waves-effect waves-light btn">ACEPTAR</a>
      </div>         
    </div>
  </div>

  <!--Modal Structure nuevo catalogo-->
<div id="modalNuevoCatalogo" class="modal">
    <div class="btnCerrar right">
      <i  style='color:red;' class="material-icons modal-action modal-close">highlight_off</i>
    </div>
    <div class="modal-content">
      <div class="row TextColor center">
            <div class="col s5 m8 l12 offset-m1">
               creación de nuevo catalogo
            </div>
      </div>
    <form id="formNuevoCatalogo" action="<?PHP echo base_url('index.php/crearCatalogo');?>" method="post" name="formNuevoArto">
      <div class="row TextColor center">
            <div class="input-field offset-l1 col s12 m5 l5 ">
              <input name="descripcion" id="descripcionCat" type="text" class="validate">
              <label for="descripcionCat">DESCRIPCIÓN:</label><label id="labelDescripcion" class="labelValidacion">DIGITE LA DESCRIPCIÓN</label>
            </div>
            <div class="input-field col s2 m6 l5">
                <input id="fechaCat" name="fecha" type="date" class="datepicker">
              <label for="fechaCat">FECHA:</label><label id="labelFecha" class="labelValidacion">SELECCIONE UNA FECHA</label>
            </div> 
      </div>
    </form>
      <div class="row center">
            <a id="CrearCatalogo" class="redondo waves-effect waves-light btn">GUARDAR</a>
      </div>
    </div>
</div>