<header class="demo-header mdl-layout__header ">
    <div class="centrado  ColorHeader">
        <span class=" title">catálogo</span>
    </div>
</header>
<!--  CONTENIDO PRINCIPAL -->
<main class="mdl-layout__content mdl-color--grey-100">
    <div class="contenedor">        
        <!-- fin de agregar nuevo articulo -->
        <div class=" row TextColor center">
            <div class="col s5 m8 l12 offset-m1">
               catálogo de premios
            </div>
        </div>
        <div class="row right">
          <a onclick=" $('#nuevoArticulo').openModal()" class="redondo waves-effect waves-light btn"><i class="material-icons right">add</i>AGREGAR</a>
        </div>
        <div class="row center">
          <table id="tblCatalogo2">
            <thead>
              <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
              </tr>
            </thead>
            <tbody>
             <?php 
              if (!($catalogo)) {}
                else{
                  foreach ($catalogo as $key) {
                    if ($key['v_Puntos1']!="0" and $key['v_Nombre1']!="") {
                      echo "<tr>";
                      echo "<td>
                              <div class='images_ca'>
                                <div class='row right'>
                                  <a href='#' onclick='darBaja(".'"'.$key['v_CodImg1'].'","'.$key['v_IdCT1'].'"'.")'><i class='material-icons'>highlight_off</i></a>
                                </div>
                                   <img src=".base_url()."assets/img/catalogo/".$key['v_Imagen1']." alt=''>
                                <div class='descripImg'>
                                    <p class='codP'>COD-".$key['v_CodImg1']."</p>
                                    <p class='descript'>".$key['v_Nombre1']."</p>
                                    <p class='ptsdes'>".$key['v_Puntos1']." puntos</p>
                                </div>
                                <a href='#' id='modificar' class='btn'>modificar</a>
                            </div>
                            </td>";
                    }else{echo "<td></td>";}
                    if ($key['v_Puntos2']!="0" and $key['v_Nombre2']!="") {
                      echo "<td>
                            <div class='images_ca'>
                              <div class='row right'>
                                  <a href='#' onclick='darBaja(".'"'.$key['v_CodImg2'].'","'.$key['v_IdCT2'].'"'.")'><i class='material-icons'>highlight_off</i></a>
                              </div>
                                 <img src=".base_url()."assets/img/catalogo/".$key['v_Imagen2']." alt=''>
                              <div class='descripImg'>
                                  <p class='codP'>COD-".$key['v_CodImg2']."</p>
                                  <p class='descript'>".$key['v_Nombre2']."</p>
                                  <p class='ptsdes'>".$key['v_Puntos2']." puntos</p>
                              </div>
                              <a href='#' id='modificar' class='btn'>modificar</a>
                          </div>
                          </td>";
                    }else{echo "<td></td>";}
                    if ($key['v_Puntos3']!="0" and $key['v_Nombre3']!="") {
                      echo"<td>
                            <div class='images_ca'>
                              <div class='row right'>
                                  <a href='#' onclick='darBaja(".'"'.$key['v_CodImg3'].'","'.$key['v_IdCT3'].'"'.")'><i class='material-icons'>highlight_off</i></a>
                              </div>
                                 <img src=".base_url()."assets/img/catalogo/".$key['v_Imagen3']." alt=''>
                              <div class='descripImg'>
                                  <p class='codP'>COD-".$key['v_CodImg3']."</p>
                                  <p class='descript'>".$key['v_Nombre3']."</p>
                                  <p class='ptsdes'>".$key['v_Puntos3']." puntos</p>
                              </div>
                              <a href='#' id='modificar' class='btn'>modificar</a>
                          </div>
                          </td>";
                    }else{echo "<td></td>";}
                    if ($key['v_Puntos4']!="0" and $key['v_Nombre4']!="") {
                      echo"<td>
                            <div class='images_ca'>
                              <div class='row right'>
                                  <a href='#' onclick='darBaja(".'"'.$key['v_CodImg4'].'","'.$key['v_IdCT4'].'"'.")'><i class='material-icons'>highlight_off</i></a>
                              </div>
                                 <img src=".base_url()."assets/img/catalogo/".$key['v_Imagen4']." alt=''>
                              <div class='descripImg'>
                                  <p class='codP'>COD-".$key['v_CodImg4']."</p>
                                  <p class='descript'>".$key['v_Nombre4']."</p>
                                  <p class='ptsdes'>".$key['v_Puntos4']." puntos</p>
                              </div>
                              <a href='#' id='modificar' class='btn'>modificar</a>
                          </div>
                          </td>";
                    }else{echo "<td></td>";}
                  echo"</tr>";
                  }
                }
              ?>
            </tbody>
          </table>
        </div>
    </div>
    </div>
</main>
<!-- FIN CONTENIDO PRINCIPAL -->
  <!-- Modal Structure -->
  <div id="modalIMG" class="modal">
    <div class="btnCerrar right">
      <i  style='color:red;' class="material-icons modal-action modal-close">highlight_off</i>
    </div>
    <div class="modal-content center">
      <h5 class="medium" id="mensajeIMG"></h5>
      <a id="aceptarIMG" class="btnaceptar redondo green regular waves-effect waves-light btn">ACEPTAR</a>
    </div>
  </div>
   <!-- Modal Structure -->
  <div id="nuevoArticulo" class="modal">
    <div class="btnCerrar right">
      <i  style='color:red;' class="material-icons modal-action modal-close">highlight_off</i>
    </div>
    <div class="modal-content">
      <div class="row TextColor center">
            <div class="col s5 m8 l12">
               ingreso de artículo
            </div>
      </div>
               <div>
                   <form id="formimagen" enctype="multipart/form-data" class="col s6 m6 l6" action="<?PHP echo base_url('index.php/subirImg');?>" method="post" name="formNuevoArto">
                      <div class="articulos">
                          <div id="articulo" class="row">
                              <div class="input-field col s2 m5 l5 ">
                                  <input onmousedown="return false" onkeydown="return false" name="codigo" id="codigoArto" type="text" class="validate">
                                  <label for="codigoArto">CODIGO:</label><label id="labelCodigo" class="labelValidacion">DIGITE EL CODIGO</label>
                              </div>
                              <div class="input-field col s2 m6 l6">
                                  <input name="nombre" id="NombArto" type="text" class="validate">
                                  <label for="NombArto">DESCRIPCIÓN</label><label id="labelDescripcion" class="labelValidacion">DIGITE LA DESCRIPCIÓN</label>
                              </div>
                          </div>
                          <div class="row">
                              <div class="input-field col s2 m5 l5">
                                  <input name="puntos" min=0 step="any" id="PtArto" type="number" class="validate">
                                  <label for="PtArto">PUNTOS</label><label id="labelPuntos" class="labelValidacion">DIGITE LOS PUNTOS</label>
                              </div>
                              <div id="BtnAddArto" class="col s3 m2 l6 center">
                                  <a id="agregar" class="waves-effect btn-file waves-light btn" onclick="subirimagen()">AGREGAR</a>
                                   <div id="loadIMG" style="display:none" class="preloader-wrapper big active">
                                    <div class="spinner-layer spinner-blue-only">
                                      <div class="circle-clipper left">
                                        <div class="circle"></div>
                                      </div><div class="gap-patch">
                                        <div class="circle"></div>
                                      </div><div class="circle-clipper right">
                                        <div class="circle"></div>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                       <div class="cosa">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                               <div id="ImgContenedor" class="fileinput-new thumbnail" style="width: 250px; height: 150px; padding: 5px 0 10px !important;">
                               </div>
                               <div id="ImgContenedor" class="fileinput-preview fileinput-exists thumbnail" style="max-width:250px; max-height:150px;"></div>
                               <div class="center">
                                  <label id="labelImagen" class="labelValidacion">SELECCIONE UNA IMAGEN</label>
                               </div>
                               <div class="center">
                                   <span id="cargar" class="btn btn-default btn-file"><span class="fileinput-new">cargar imagen</span>
                                       <span id="cancel" class="fileinput-exists">cambiar</span>
                                       <input id="txtimagen" type="file" name="txtimagen"></span>
                                   <a id="cargar" href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">cancelar</a>
                               </div>
                           </div>
                       </div>
                   </form>
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