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

            <tr>
                <td> 14/07/2015</td>
                <td>00351</td>
                <td>01003</td>
                <td id="NomCliente">xxxxxx xxxxxxxx xxxxxx xxxxx x</td>
                <td>
                    <a href="#Dell" class="Icono modal-trigger">
                        <i class="material-icons">highlight_off</i>
                    </a>
                </td>
            </tr>

            <tr>
                <td> 14/07/2015</td>
                <td>00351</td>
                <td>01003</td>
                <td id="NomCliente">xxxxxx xxxxxxxx xxxxxx xxxxx x</td>
                <td>
                    <a href="#Dell" class="Icono modal-trigger">
                        <i class="material-icons">highlight_off</i>
                    </a>
                </td>
            </tr>

            </tbody>

        </table>

    </div>
</main>
<!--//////////////////////////////////////////////////////////////////////////////////////////////
                                      MODALES
///////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- Modal #1
                Modal Structure -->
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

        <h6 id="Format" class="center Mcolor">CLIENTE</h6>

        <div class=" row">
            <div class="DatoFrp input-field line col s3 m3 l2">
                 N° FRP:<input id="frp" type="text" class="validate">
            </div>


            <div class=" line col s3 m3 l3 offset-l5 offset-s4 offset-m4">
                <p id="fecha" class="DatoFrp">FECHA: </p>  <input type="text" id="date1" class="datepicker1"><br>
            </div>

        </div>

        <div class="center row text">
            <div class="col s5 m5 l5">
                <p class="Datos">PUNTOS CANJE: <span class="datos1">0 Pts.</span></p>
            </div>
            <div class="col s7 m7 l7">
                <p class="Datos">PUNTOS APLICADOS: <span class="datos1">363,522 Pts.</span></p>
            </div>
        </div>

        <div class="row ">
            <div class=" DatoFrp line input-field col s3 m3 l3">
               COD. CLIENTE:<input id="frp" type="text" class="validate">
            </div>

            <div class="input-field col s4 m4 l4"  >
                <select name="cliente" id="ListCliente">
                    <option value="" disabled selected>CLIENTE</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
            </div>

            <div class="input-field col s3 m3 l3">
                <input  id="frp" type="text" class="validate">
            </div>
        </div>

        <div class="right row">
            <div class="col s2 m2 l2">
                <a href="#Dfrp" class="Procesar waves-effect modal-action modal-close btn modal-trigger">procesar</a>
            </div>
        </div>

                <table id="tblEliminar" class=" TblDatos">
                    <thead>
                    <tr>
                        <th>FECHA</th>
                        <th>BOUCHER</th>
                        <th>Pts.</th>
                        <th>Pts. APLI.</th>
                        <th>Pts. DISP.</th>
                        <th> <i class="material-icons">done</i> </th>
                        <th>ESTADO</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>24/01/2016</td>
                        <td id="black">067799</td>
                        <td id="black">30,000 Pts.</td>
                        <td>30,000</td>
                        <td>0</td>
                        <td>
                            <p >
                                <input type="checkbox" id="test1" />
                                <label for="test1"></label>
                            </p>
                        </td>
                        <td>APLICADO</td>
                    </tr>
                    <tr>
                        <td>24/01/2016</td>
                        <td id="black">067799</td>
                        <td id="black">30,000 Pts.</td>
                        <td>30,000</td>
                        <td>0</td>
                        <td>
                            <p >
                                <input type="checkbox" id="test2" />
                                <label for="test2"></label>
                            </p>
                        </td>
                        <td id="parcial">PARCIAL</td>
                    </tr>

                    </tbody>
                </table>

        <h6 class="center Mcolor">PREMIO A CANJEAR</h6>

        <!-- datos de los premios a canjear  -->
        <div class="row">
            <div class=" DatoFrp line input-field col s2 m2 l2">
                COD. CLIENTE:<input id="frp" type="text" class="validate">
            </div>
                    <div class="DatoFrp line input-field col s2 m2 l2">
                        COD. PREMIO:<input   id="frp" type="text" class="validate">
                    </div>
                            <div class="input-field col s2 m2 l4">
                                <select name="PREMIO" id="ListCliente">
                                    <option value="" disabled selected>PREMIO</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                            </div>
                                <div class="input-field col s2 m2 l2">
                                    <input  id="frp"  type="text" class="validate">
                                </div>
                                    <div id="Btnadd"class="col s2 m2 l2">
                                        <a href="#" class="BtnBlue waves-effect  btn ">agregar</a>
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
            <tr>
                <td>20</td>
                <td id="black">146790</td>
                <td id="black">CENTRO ENTRE FAMESA MUNICH</td>
                <td>17,998</td>
                <td>359,960</td>
                <td>
                    <a href="#!" class=" BtnClose">
                        <i class="material-icons">highlight_off</i>
                    </a>
                </td>

            </tr>
            <tr>
                <td>20</td>
                <td id="black">146790</td>
                <td id="black">CENTRO ENTRE FAMESA MUNICH</td>
                <td>17,998</td>
                <td>359,960</td>
                <td>
                    <a href="#!" class=" BtnClose">
                        <i class="material-icons">highlight_off</i>
                    </a>
                </td>

            </tr>

            </tbody>
        </table>

        <div id="Total" class="right row text">
            <div class="col s12 m12 l12">
                <p class="Dato">TOTAL: <span class="dato">363,522 Pts.</span></p>
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

<!-- Modal #4
                Modal Structure -->
<div id="Dfrp" class="modal">
    <div class="modal-content">

        <div class="right row">
            <div class="col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>
        <h6 id="titulM" class="center Mcolor"> DETALLE FRP</h6>

       <div class="container">
           <p class="center datos1 frpT"> N° FRP 38389</p>
           <p class="center datos1 lineas"> 24/12/2016</p>
       </div>
        <h6 id="Nfarmacia" class="center Mcolor">00449 FARMACIA CASTELLÓN</h6>
        <p class="center Datos linea ruc"> RUC 4412000183001H</p>




            <table id="tblModal1" class="TheadColor">
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



        <table id="tblModal1" class="TheadColor">
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

        <div class="row">
            <div class="col s2 m2 l2 offset-l5 offset-s4 offset-m4">
                <a  target="_blank"   href="DetalleFRP"  class=" BtnClose ">
                    <i class="medium material-icons">print</i>
                </a>
            </div>
            <div class="col s2 m2 l1">
                <a href="#"><img src="<?PHP echo base_url();?>assets/img/icono-pdf.png " width="35px" ></a>
            </div>
        </div>
    </div>



</div>
<!-- Fin de Modal#4-->
