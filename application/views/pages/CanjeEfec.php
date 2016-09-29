<header class="demo-header mdl-layout__header ">
    <div class="centrado  ColorHeader">

        <span class=" title">fre</span>

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
               canje por efectivo
            </div>
        </div>

        <div class="right row">
            <div class="col s2">
                <a href="#Efec" class="BtnBlue waves-effect  btn modal-trigger">efectivo</a>
            </div>
        </div>

        <table id="FRP" class=" TblDatos">

            <thead>
            <tr>
                <th>FECHA</th>
                <th># FRP</th>
                <th>COD. CLIENTE</th>
                <th>NOMBRE</th>
                <th>Pts.</th>
                <th>EFECTIVO</th>
                <th>ELIMINAR</th>
            </tr>
            </thead>

            <tbody>

            <tr>
                <td> 14/07/2015</td>
                <td id="black">fc002332</td>
                <td>00022</td>
                <td  id="Codigo">xxxxxx xxxxxxxx xxxxxx xxxxx x</td>
                <td  id="Codigo">2,742 Pts.</td>
                <td  id="Codigo">C$ 1,371</td>
                <td>
                    <a href="#Dell" class="Icono modal-trigger">
                        <i class="material-icons">highlight_off</i>
                    </a>
                </td>
            </tr>

            <tr>
                <td> 14/07/2015</td>
                <td id="black">fc002332</td>
                <td>00022</td>
                <td  id="Codigo">xxxxxx xxxxxxxx xxxxxx xxxxx x</td>
                <td  id="Codigo">2,742 Pts.</td>
                <td  id="Codigo">C$ 1,371</td>
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

<!--///////////////////////////////////////////////////////////////////////////////////////////////
                                     MODALES ELIMINACION DE FRE
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
        <h6 class="center Mcolor1">DESEA ELIMINAR EL FRE <span class="redT1">#fc02258</span></h6>
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
        <h6 class="center Mcolor1">ELIMINADO CORRECTAMENTE FRE <span class="redT1">#fc02258</span></h6>
    </div>
    </div>
</div>
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////
                                    MODAL PRINCIPAL
/////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- Modal #1
                Modal Structure -->
<div id="Efec" class="modal">
    <div class="modal-content">
        <div class="right row">
            <div class="col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>

        <h6 class="center Mcolor">FORMATO DE REMISIÓN DE EFECTIVO</h6>

        <div class="row">
            <div class="Datos input-field line col s3 m3 l3">
               COD.FRE:<input id="fre" type="text" class="validate">
            </div>
            <div class="Datos line col s3 m3 l3 offset-l5 offset-s4 offset-m4">
                <p id="fecha" class="Datos">FECHA:</p>  <input type="text" id="date1" class="datepicker1">
            </div>
        </div>


        <div class="row ">
            <div class=" DatoFrp line input-field col s3 m3 l3">
                COD. CLIENTE:<input id="frp" type="text" class="validate">
            </div>

            <div class="input-field col s2 m3 l6"  >
                <select name="cliente" id="ListCliente">
                    <option value="" disabled selected>CLIENTE</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
            </div>

            <div class="input-field col s2 m2 l2">
                <input  id="frp" type="text" class="validate">
            </div>
        </div>

        <div class="right row">
            <div class="col s2 m2 l2">
                <a href="#Dfre" class="Procesar waves-effect modal-action modal-close btn modal-trigger">procesar</a>
            </div>
        </div>

        <table id="tblEliminar" class=" TblDatos">
            <thead>
            <tr>
                <th>FECHA</th>
                <th>#FATURA</th>
                <th>Pts.</th>
                <th>Pts. a EFECT.</th>
                <th><i class="material-icons">done</i> </th>
                <th>ESTADO</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>24/01/2016</td>
                <td id="black">067799</td>
                <td id="black">30,000 Pts.</td>
                <td id="black">C$ 30,000</td>
                <td>
                    <p >
                        <input type="checkbox" id="test1" />
                        <label for="test1"></label>
                    </p>
                </td>
                <td id="dispo">DISPONIBLE</td>
            </tr>
            <tr>
                <td>24/01/2016</td>
                <td id="black">067799</td>
                <td id="black">30,000 Pts.</td>
                <td id="black">C$ 30,000</td>
                <td>
                    <p >
                        <input type="checkbox" id="test2" />
                        <label for="test2"></label>
                    </p>
                </td>
                <td id="dispo">DISPONIBLE</td>
            </tr>

            </tbody>
        </table>

        <div id="Total" class="right row text">
            <div class="col s8 m8 l12">
                <p class="Dato">TOTAL EFECTIVO: <span class="dato">C$ 363,522 </span></p>
            </div>

        </div>
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <p class="Datos">OBSERVACIONES</p>
                        <textarea id="obser" class="materialize-textarea"></textarea>

                    </div>
                </div>
            </form>
        </div>

    </div>





</div>
<!-- FIN MODAL -->
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                        MODAL DETALLE FRE
//////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<!-- Modal #4
                Modal Structure -->
<div id="Dfre" class="modal">
    <div class="modal-content">

        <div class="right row">
            <div class="col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>

        <h6 id="titulM" class="center Mcolor">DETALLE FRE</h6>

        <div class="container">
            <p class="center datos1 frpT"> N°FRE FC02389</p>
            <p class="center datos1 lineas"> 24/12/2016</p>
        </div>
        <h6  class="center datos1">00449 FARMACIA CASTELLÓN</h6>
        <p class="center Datos linea ruc"> RUC 4412000183001H</p>

        <div class="row text">
            <div class="col col s4 m4 l3">
                <p class="Datos ruc Cblack">CANJE: 100,000 Pts</p>
            </div>
            <div class="col s4 m4 l3 offset-l6 offset-s4 offset-m4">
                <p class="Datos ruc Cblack">EFECTIVO: C$ 50,000</p>
            </div>
        </div>

        <table id="tblpRODUCTOS" class=" TblDatos">
            <thead>
            <tr>
                <th>FECHA</th>
                <th>#FACTURA</th>
                <th>Pts</th>
                <th>Pts. a EFECT.</th>
                <th>ESTADO</th>

            </tr>
            </thead>

            <tbody>
            <tr>
                <td>24/01/2016</td>
                <td id="black">069424</td>
                <td id="black">25,000 Pts</td>
                <td>C$ 12,000</td>
                <td>PAGADO</td>

            </tr>
            <tr>
                <td>24/01/2016</td>
                <td id="black">069424</td>
                <td id="black">25,000 Pts</td>
                <td>C$ 12,000</td>
                <td>PAGADO</td>

            </tr>

            </tbody>
        </table>

        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <p class="Datos">OBSERVACIONES</p>
                        <textarea id="obser" class="materialize-textarea">
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                        </textarea>

                    </div>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col s2 m2 l2 offset-l5 offset-s4 offset-m4">
                <a  target="_blank" href="DetalleFRE" class=" BtnClose ">
                    <i class="medium material-icons">print</i>
                </a>
            </div>
            <div class="col s2 m2 l1">
                <a href="#"><img src="<?PHP echo base_url();?>assets/img/icono-pdf.png " width="35px" ></a>
            </div>
        </div>



    </div><!-- fin del contenido del modal -->



</div>
<!-- Fin de Modal#4-->
