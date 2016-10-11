<header class="demo-header mdl-layout__header ">
    <div class="centrado  ColorHeader">
        <span class=" title">frp</span>
    </div>
</header>
<!--//////////////////////////////////////////////////////////
                CONTENIDO
///////////////////////////////////////////////////////////-->

<main class="mdl-layout__content mdl-color--grey-100">
    <div class="contenedor">
        <div id="search" class=" right Buscar row column">
            <div class="col s1 m1 l2">
                <i class="material-icons ColorS">search</i>
            </div>

            <div class="input-field col s6 m6 l10">
                <input  id="search" type="text" placeholder="Buscar" class="validate">
                <label for="search"></label>
            </div>
        </div>

        <div class=" row TextColor">
            <div class="col s5 m5 l12">
               canje puntos
            </div>
        </div>

        <div class="right row">
            <div class="col s2">
                <a href="#MFrp" class="BtnBlue waves-effect  btn modal-trigger">canje</a>
            </div>
        </div>

        <table id="FRP" class=" TblDatos">
            <thead>
                <tr>
                    <th>FECHA</th>
                    <th>#FRP</th>
                    <th>COD. CLIENTE</th>
                    <th>NOMBRE</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for ($i = 1; $i <= 100; $i++) {
                        echo '<tr>
                                <td> 14/07/2015</td>
                                <td>00351</td>
                                <td>01003</td>
                                <td id="NomCliente">xxxxxx xxxxxxxx xxxxxx xxxxx x</td>
                                <td>
                                    <a href="#Dell" class="Icono modal-trigger">
                                        <i class="material-icons">highlight_off</i>
                                    </a>
                                </td>
                            </tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</main>
<!--//////////////////////////////////////////////////////////////////////////////////////////////
                                      MODALES
///////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- Modal #1 Modal Structure -->
<div id="MFrp" class="modal">
    <div class="modal-content">
        <div class="right row">
            <div class="col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>

        <h6 id="Format" class="center Mcolor">FORMATO DE REMISIÓN DE PUNTOS</h6>
        <div class="row">
            <div class=" DatoFrp col s2">
                N° FRP: <input id="frp" type="text" class="validate">
            </div>

            <div class="col s5 offset-s1" >
                <h6 id="Format" class="center Mcolor">CLIENTE</h6>
            </div>

            <div class="DatoFrp col s2 offset-s2">
                FECHA:<input  type="text" id="date1" class="datepicker1">
            </div>
        </div>

        <div class="row" >
            <div class=" DatoFrp input-field line col s2 offset-s1">
               COD. CLIENTE:<input id="ClienteFRP" type="text" class="validate">
            </div>

            <div class="input-field col s4 m4 l4"  >
                <select name="cliente" id="ListCliente">
                    <option value="0" selected>CLIENTES...</option>
                    <?PHP
                        if(!$Clientes){
                        } else {
                            foreach($Clientes as $cliente){
                                echo '<option value="'.$cliente['CODIGO'].'">'.$cliente['NOMBRE'].'</option>';
                            }
                        }
                    ?>
                </select>
            </div>

            <div class="input-field col s2 m3 l3">
                <input  id="PtsClientefrp" type="text" class="validate">
            </div>
        </div>

        <div class="right row">
            <div class="col s2 m2 l2">
                <a href="#Dfrp" class="Procesar waves-effect modal-action modal-close btn modal-trigger">procesar</a>
            </div>
        </div>
        <table id="tblFacturaFRP" class=" TblDatos">
            <thead>
                <tr>
                    <th>FECHA</th>
                    <th>FACTURA</th>
                    <th>Pts.</th>
                    <th>Pts. APLI.</th>
                    <th>Pts. DISP.</th>
                    <th> <i class="material-icons">done</i> </th>
                    <th>ESTADO</th>
                </tr>
            </thead>
                
            <tbody>
                <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            </tbody>
        </table>

        <div class="row">
            <div class="offset-l4 s12 col l4">
                <h6 class="center Mcolor">PREMIO A CANJEAR</h6>
            </div>
            <div id="Total" class="right row">
                <div class="col s12">
                    <p class="Dato">TOTAL: <span class="dato" id="idttPtsCLsFRP"></span> Pts.</p>
                </div>
            </div>
        </div>

        <!-- datos de los premios a canjear  -->
        <div class="row">
            <div class=" DatoFrp line input-field col s2 m2 l2">
                COD. CLIENTE:<input id="ClienteFRPPremio" type="text" class="validate">
            </div>
            
            <div class="DatoFrp line input-field col s2 m2 l2">
                COD. PREMIO:<input   id="CodPremioFRP" type="text" class="validate">
            </div>
            
            <div class="input-field col s3">
                <select name="PREMIO" id="ListCatalogo">
                    <option value="0" selected>...</option>
                    
                    <?PHP
                        if(!$Catalogo){
                        } else {
                            foreach($Catalogo as $premios){
                                echo '<option value="'.$premios['IdIMG'].'">'.$premios['Nombre'].'</option>';
                            }
                        }
                    ?>    
                </select>
            </div>
            
            <div class="DatoFrp line input-field col s2  m2 l2 ">
                <input  id="ValorPtsPremioFRP"  type="text" class="validate">
            </div>
            
            <div class="DatoFrp line input-field col s2 m2 l2 ">
                CANTIDAD DE ARTICULOS:<input  id="CantPremioFRP"  type="text" class="validate">
            </div>
        </div>

        <div class="right row">
            <div class="col s2 m2 l2">
                <a href="#" id="AddPremioTbl" class="BtnBlue waves-effect  btn ">agregar</a>
            </div>
        </div>

        <table id="tblpRODUCTOS" class=" TblDatos">
            <thead>
                <tr>
                    <th>CANT.</th>
                    <th>COD. PREMIO</th>
                    <th>DESCRIPCIÓN</th>
                    <th>Pts. </th>
                    <th>TOTAL Pts.</th>
                    <th>CANCELAR</th>
                </tr>
            </thead>

            <tbody>

            </tbody>
        </table>

        <div id="Total" class="right row text">
            <div class="col s12 m12 l12">
                <p class="Dato">TOTAL: <span class="dato" id="idttPtsFRP"></span> Pts.</p>
            </div>
        </div>
    </div>
</div>
<!-- Fin de Modal#1-->


<!--///////////////////////////////////////////////////////////////////////////////////////////////
                                     MODALES ELIMINACION DE FRP
////////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- Modal #2 -->
<!-- Modal Structure -->
<div id="Dell" class="modal">
    <div class="modal-content">
        <div class="right row">
            <div class="col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>

        <h6 class="center Mcolor1">DESEA ELIMINAR EL FRP <span class="redT1">#00351</span></h6>
        <div class="row">
            <div class="col s2 m2 l2 offset-l4 offset-s3 offset-m4">
                <a href="#DellRes" class="Procesar modal-action modal-close btn modal-trigger">Procesar</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal #3 -->
<!-- Modal Structure -->

<div id="DellRes" class="modal">
    <div class="modal-content">
        <div class="right row">
            <div class="col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>
        <h6 class="center Mcolor1">ELIMINADO CORRECTAMENTE FRP <span class="redT1">#00351</span></h6>
    </div>
</div>

<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                        MODAL DETALLE FRP
//////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<!-- Modal #4 Modal Structure -->
<div id="Dfrp" class="modal">
    <div class="modal-content">
            <div class="container center">
                <div class="col s1" style="height: 10px;">
                    <div class="row">
                        <div class="col s11" >
                            <span id="titulM" class="Mcolor"> DETALLE FRP</span>
                        </div>
                        
                        <div class="col s1 m1 l1"  >
                            <a href="#!" class=" BtnClose modal-action modal-close ">
                                <i class="material-icons">highlight_off</i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col s5">
                    <span class="center datos1 frpT"> N° FRP 38389</span><br>
                    <span class="center datos1 lineas"> 24/12/2016</span>
                </div>
                
                <div class="col s1">
                    <span id="Nfarmacia" class="center Mcolor">COD# 00449 NOMBRE: FARMACIA CASTELLÓN</span>
                    <br>
                    <span class="center Datos linea ruc"> Nº RUC 4412000183001H </span>
                </div>
            </div>

            <table id="tblModal1" class="TableBlank">
                <thead>
                    <tr>
                        <th>FECHA</th>
                        <th>BOUCHER</th>
                        <th>Pts.</th>
                        <th>Pts. APLI.</th>
                        <th>Pts. DISP.</th>
                        <th>ESTADO</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>24/01/2016</td>
                        <td id="black">067792</td>
                        <td id="black">300,000 Pts.</td>
                        <td>300,000 Pts.</td>
                        <td>0 Pts.</td>
                        <td>APLICADO</td>
                    </tr>

                    <tr>
                        <td>24/01/2016</td>
                        <td id="black">067792</td>
                        <td id="black">300,000 Pts.</td>
                        <td>300,000 Pts.</td>
                        <td>0 Pts.</td>
                        <td id="parcial">PARCIAL</td>
                    </tr>
                </tbody>
            </table>
        <h6 class="center Mcolor dat">PUNTOS APLICADOS: <span class="dato">363,522 Pts.</span> </h6>
        <h6 class="center Mcolor">PREMIO A CANJEAR</h6>

        <table id="tblModal1" class="TableBlank">
            <thead>
                <tr>
                    <th>CANT.</th>
                    <th>COD. PREMIO</th>
                    <th>DESCRIPCIÓN</th>
                    <th>Pts. </th>
                    <th>TOTAL Pts.</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>20</td>
                    <td id="black">146790</td>
                    <td id="black">CENTRO ENTRET FAMESA MUNICH</td>
                    <td>17,998 Pts.</td>
                    <td>359,960 Pts.</td>
                </tr>
                
                <tr>
                    <td>20</td>
                    <td id="black">146790</td>
                    <td id="black">CENTRO ENTRET FAMESA MUNICH</td>
                    <td>17,998 Pts.</td>
                    <td>359,960 Pts.</td>
                </tr>
            </tbody>
        </table>

        <h6 class="center Mcolor dat">TOTAL <span class="dato">363,522 Pts.</span> </h6>
        <div class="row center">
                <a href="<?PHP echo base_url('index.php/ExpFRP');?>"  target="_blank"><img src="<?PHP echo base_url();?>assets/img/ico_imprimir.png " width="45px" ></a>
        </div>
    </div>
</div>
<!-- Fin de Modal#4-->