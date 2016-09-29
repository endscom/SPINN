<header class="demo-header mdl-layout__header ">
    <div class="centrado  ColorHeader">

        <span class=" title">reportes</span>

    </div>
</header>
<!--//////////////////////////////////////////////////////////
                CONTENIDO
///////////////////////////////////////////////////////////-->
<main class="mdl-layout__content mdl-color--grey-100">

    <div class="contenedor">

        <div  id="contenedor" class="container">

            <div class="row">
                <div class="col s3 m3 l2">
                    <a href="#cuentaXcliente" class=" IconBlue modal-action modal-close modal-trigger ">
                        <i class="medium material-icons iconoCenter">assignment</i>
                        <p class="TextIconos">CUENTA POR CLIENTE</p>
                    </a>
                </div>
                <div class="col s3 m3 l2 offset-l1">
                    <a href="#SP" class=" IconBlue modal-action modal-close modal-trigger ">
                        <i class="medium material-icons iconoCenter ">supervisor_account</i>
                        <p class="TextIconos">MASTER CUENTA SP</p>
                    </a>
                </div>
                <div class="col s3 m3 l3 offset-l1">
                    <a href="#CompraxProduc" class=" IconBlue modal-action modal-close  modal-trigger ">
                        <i class="medium material-icons iconoCenter">shopping_cart</i>
                        <p class="TextIconos">MASTER COMPRAS POR PRODUCTOS</p>
                    </a>
                </div>
                <div class="col s3 m3 l3">
                    <a href="#MxP" class=" IconBlue modal-action modal-close modal-trigger">
                        <i class="medium material-icons iconoCenter">add_shopping_cart</i>
                        <p class="TextIconos">MOVIMIENTO PRODUCTOS</p>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col s3 m3 l2">
                    <a href="#CanjeSP" class=" IconBlue modal-action modal-close modal-trigger">
                        <i class="medium material-icons iconoCenter">redeem</i>
                        <p class="TextIconos">CANJE PREMIOS SP</p>
                    </a>
                </div>
                <div class="col s3 m3 l2 offset-l1">
                    <a href="#ReFecha" class=" IconBlue modal-action modal-close modal-trigger">
                        <i class="medium material-icons iconoCenter">date_range</i>
                        <p class="TextIconos">REPORTE POR FECHA</p>
                    </a>
                </div>
                <div class="col s3 m3 l3 offset-l1">
                    <a href="#MaVineta" class=" IconBlue modal-action modal-close modal-trigger">
                        <i class="medium material-icons iconoCenter">receipt</i>
                        <p class="TextIconos">MASTER VIÑETAS</p>
                    </a>
                </div>
                <div class="col s3 m3 l3">
                    <a href="#!" class=" IconBlue modal-action modal-close ">
                        <i class="medium material-icons iconoCenter">assignment_turned_in</i>
                        <p class="TextIconos">MÁS REPORTES</p>
                    </a>
                </div>
            </div>



    </div>
</main>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            MODALES DE REPORTES
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            Modal Cuenta por Cliente
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- Modal Cuenta por Cliente -->
<div id="cuentaXcliente" class="modal">
    <div class="modal-content">
        <div class="right row">
            <div class="col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>

        <h6 class="center Mcolor AdUser">CUENTA POR CLIENTE</h6>

        <div class="row">
            <form class="col s12" action=""method="post" name="formnuevo">

                <div class="row">
                    <div class="input-field col s3">
                        <input name="unoUser" placeholder="Cod. Cliente" id="CodCliente" type="text" class="validate">
                    </div>

                    <div class="input-field col s9">
                        <input name="pass" placeholder="" id="Contra" type="text" class="validate">
                    </div>

                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input name="fecha1" placeholder="Desde" id="fecha1" type="text" class="datepicker1">
                    </div>
                    <div class="input-field col s6">
                        <input name="fecha2" placeholder="Hasta" id="vendednor" type="text" class="datepicker1">

                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col s6 m6 l5">
                <a href="#CtaXcte" class="Btnadd modal-action modal-close btn modal-trigger">GENERAR</a>
            </div>
        </div>
    </div><!-- fin del contenido modal -->
</div>
<!-- FIN DE MODAL CUENTA POR CLIENTE -->

<!-- MODAL DETALLES CUENTA POR CLIENTE -->
<div id="CtaXcte" class="modal">
    <div class="modal-content">
        <div class="right row">
            <div class="col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>


        <h6 class="center Mcolor AdUser">CUENTA POR CLIENTE</h6>

      <p class="frpT pts">DATOS DEL CLIENTE</p>

        <div class="row">
            <div class="col s5 m3 l6">
                <p class="Mcolor cod">00635 </p>
                <p class="Mcolor cod linea">FARMACIA VIDA</p>
                <p class="detalles linea">Frente a Unión Fenosa, Ocotal </p>
                <p class="detalles linea">27323298</p>
            </div>
            <div class="col s3 m4 l3">
                <p class="fecha">01/05/2016</p>
                   <p class="rango">Desde</p>
            </div>
            <div class="col s3 m4 l3">
                <p class="fecha">22/06/2016</p>
                <p class="rango">Hasta</p>
            </div>
        </div>
        <!-- TOTAL DE PUNTOS DEL CLIENTE -->
        <div id="Total" class="right row text">
            <div class="col s8 m8 l12">
                <p class="Dato">TOTAL DE PUNTOS: <span class="dato">6,000 Pts. </span></p>
            </div>
        </div>
        <!-- TABLA DE DETALLES -->
            <table id="tblEliminar" class=" TblDatos">
                <thead>
                <tr>
                    <th>FECHA</th>
                    <th>FACTURA</th>
                    <th>PUNTOS X COMPRA</th>
                    <th>ESTADO</th>

                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>24/01/2016</td>
                    <td id="black">067799</td>
                    <td >30,000 Pts.</td>
                    <td>ACTIVO</td>

                </tr>
                <tr>
                    <td>24/01/2016</td>
                    <td id="black">067799</td>
                    <td >30,000 Pts.</td>
                    <td>ACTIVO</td>
                </tr>

                </tbody>
            </table>

        <div id="Iconos" class="row">
            <div class="col s2 m2 l1 offset-l4 offset-s4 offset-m4">
                <a href="#!" class=" BtnClose ">
                    <i class="medium material-icons"  >print</i>
                </a>
            </div>
            <div class="col s2 m2 l1 offset-l1">
                <a href="#"><img src="<?PHP echo base_url();?>assets/img/icono_excel.png " width="38px" ></a>
            </div>
            <div class="col s2 m2 l1 offset-l1">
                <a href="#"><img src="<?PHP echo base_url();?>assets/img/icono-pdf.png " width="38px" ></a>
            </div>
        </div>

    </div>
</div>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                         Fin   Modal Cuenta por Cliente
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            Modal Master Cuenta SP
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div id="SP" class="modal">
    <div class="modal-content">
        <div class="right row">
            <div class="col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>

        <h6 class="center Mcolor AdUser">MASTER CUENTA SP</h6>

        <div class="row">
            <form class="col s12" action=""method="post" name="formSP">

                <div class="row">
                    <div class="input-field col s6">
                        <input name="fecha1" placeholder="Desde" id="fecha1" type="text" class="datepicker1">
                    </div>
                    <div class="input-field col s6">
                        <input name="fecha2" placeholder="Hasta" id="fecha2" type="text" class="datepicker1">

                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col s6 m6 l5">
                <a href="#SPdet" class="Btnadd modal-action modal-close btn modal-trigger">GENERAR</a>
            </div>
        </div>
    </div><!-- FIN CONTENIDO MODAL -->
</div>
<!-- Detalles del Master de Clientes SP -->

<div id="SPdet" class="modal">
    <div class="modal-content">
        <div class="right row">
            <div class="col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>


        <h6 class="center Mcolor AdUser">MASTER CLIENTES SP</h6>

        <div class="row">
            <div class="col s3 m4 l3 offset-l3 offset-m3 offset-s3">
                <p class="fecha">01/05/2016</p>
                <p class="rango">Desde</p>
            </div>
            <div class="col s3 m4 l3">
                <p class="fecha">22/06/2016</p>
                <p class="rango">Hasta</p>
            </div>
        </div>

        <!-- TOTAL DE PUNTOS DEL CLIENTE -->
        <div id="Total" class="right row text">
            <div class="col s8 m8 l12">
                <p class="Dato">TOTAL DE PUNTOS: <span class="dato">6,000 Pts. </span></p>
            </div>
        </div>
        <!-- TABLA DE DETALLES -->
        <table id="FRP" class=" TblDatos">
            <thead>
            <tr>
                <th>COD. CLIENTE</th>
                <th>RUC</th>
                <th>CLIENTE</th>
                <th>Pts.</th>
                <th>RUTA</th>

            </tr>
            </thead>

            <tbody>
            <tr>
                <td id="Codigo">067799</td>
                <td >0010202860051M</td>
                <td>farmacia san martín</td>
                <td id="Codigo">10,800 Pts.</td>
                <td id="Codigo">F09</td>

            </tr>
            <tr>
                <td id="Codigo">067799</td>
                <td >0010202860051M</td>
                <td>farmacia san martín</td>
                <td id="Codigo">10,800 Pts.</td>
                <td id="Codigo">F09</td>
            </tr>

            </tbody>
        </table>

        <div id="Iconos" class="row">
            <div class="col s2 m2 l1 offset-l4 offset-s4 offset-m4">
                <a href="#!" class=" BtnClose ">
                    <i class="medium material-icons"  >print</i>
                </a>
            </div>
            <div class="col s2 m2 l1">
                <a href="#"><img src="<?PHP echo base_url();?>assets/img/icono_excel.png " width="40px" ></a>
            </div>
            <div class="col s2 m2 l1 ">
                <a href="#"><img src="<?PHP echo base_url();?>assets/img/icono-pdf.png " width="38px" ></a>
            </div>
        </div>
    </div><!-- Fin Contenido Modal -->
</div>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                        Fin Modal Master Cuenta SP
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            Modal Master Compras X Producto
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div id="CompraxProduc" class="modal">
    <div class="modal-content">
        <div class="right row">
            <div class="col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>

        <h6 class="center Mcolor AdUser">MASTER COMPRAS POR PRODUCTO</h6>

        <div class="row">
            <form class="col s12" action=""method="post" name="formCXP">

                <div class="row">
                    <div class="input-field col s6">
                        <input name="fecha1" placeholder="Desde" id="fecha1" type="text" class="datepicker1">
                    </div>
                    <div class="input-field col s6">
                        <input name="fecha2" placeholder="Hasta" id="fecha2" type="text" class="datepicker1">

                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col s6 m6 l5">
                <a href="#cxpdet" class="Btnadd modal-action modal-close btn modal-trigger">GENERAR</a>
            </div>
        </div>
    </div><!-- FIN CONTENIDO MODAL -->
</div>
<!-- Detalles del Master Compras X Producto -->

<div id="cxpdet" class="modal">
    <div class="modal-content">
        <div class="right row">
            <div class="col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>


        <h6 class="center Mcolor AdUser">MASTER COMPRAS POR PRODUCTO</h6>

        <div class="row">
            <div class="col s3 m4 l3 offset-l3 offset-m3 offset-s3">
                <p class="fecha">01/05/2016</p>
                <p class="rango">Desde</p>
            </div>
            <div class="col s3 m4 l3">
                <p class="fecha">22/06/2016</p>
                <p class="rango">Hasta</p>
            </div>
        </div>

        <!-- TOTAL DE PUNTOS DEL CLIENTE -->
        <div id="Total" class="right row text">
            <div class="col s8 m8 l12">
                <p class="Dato">TOTAL DE PUNTOS: <span class="dato">6,000 Pts. </span></p>
            </div>
        </div>
        <!-- TABLA DE DETALLES -->
        <table id="MCXP" class=" TblDatos">
            <thead>
            <tr>
                <th>N°</th>
                <th>FECHA</th>
                <th>FACTURA</th>
                <th>CANT.</th>
                <th>DESCRIPCIÓN</th>
                <th>LABOR.</th>
                <th>COD.</th>
                <th>CLIENTE</th>
                <th>RUTA</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>01/06/2016</td>
                <td>FC002678</td>
                <td>6</td>
                <td>acetominofen jarabe 120 ML</td>
                <td id="NomCliente">RAMOS</td>
                <td>03317</td>
                <td>farmacia mi farmacia</td>
                <td id="NomCliente">F10</td>
            </tr>
            <tr>
                <td>1</td>
                <td>01/06/2016</td>
                <td>FC002678</td>
                <td>6</td>
                <td>acetominofen jarabe 120 ML</td>
                <td id="NomCliente">RAMOS</td>
                <td>03317</td>
                <td>farmacia mi farmacia</td>
                <td id="NomCliente">F10</td>
            </tr>
            <tr>
                <td>1</td>
                <td>01/06/2016</td>
                <td>FC002678</td>
                <td>6</td>
                <td>acetominofen jarabe 120 ML</td>
                <td id="NomCliente">RAMOS</td>
                <td>03317</td>
                <td>farmacia mi farmacia</td>
                <td id="NomCliente">F10</td>
            </tr>
            </tbody>


        </table>

        <div id="Iconos" class="row">
            <div class="col s2 m2 l1 offset-l4 offset-s4 offset-m4">
                <a href="#!" class=" BtnClose ">
                    <i class="medium material-icons"  >print</i>
                </a>
            </div>
            <div class="col s2 m2 l1">
                <a href="#"><img src="<?PHP echo base_url();?>assets/img/icono_excel.png " width="40px" ></a>
            </div>
            <div class="col s2 m2 l1 ">
                <a href="#"><img src="<?PHP echo base_url();?>assets/img/icono-pdf.png " width="38px" ></a>
            </div>
        </div>
    </div><!-- Fin Contenido Modal -->
</div>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                        Fin Modal Master Compras X Producto
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            Modal Movimiento Producto
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div id="MxP" class="modal">
    <div class="modal-content">
        <div class="right row">
            <div class="col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>

        <h6 class="center Mcolor AdUser">MOVIMIENTO PRODUCTOS</h6>

        <div class="row">
            <form class="col s12" action=""method="post" name="formMxP">

                <div class="row">
                    <div class="input-field col s6">
                        <input name="fecha1" placeholder="Desde" id="fecha1" type="text" class="datepicker1">
                    </div>
                    <div class="input-field col s6">
                        <input name="fecha2" placeholder="Hasta" id="fecha2" type="text" class="datepicker1">

                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col s6 m6 l5">
                <a href="#MxPdet" class="Btnadd modal-action modal-close btn modal-trigger">GENERAR</a>
            </div>
        </div>
    </div><!-- FIN CONTENIDO MODAL -->
</div>
<!-- Detalles del Movientos por Productos -->

<div id="MxPdet" class="modal">
    <div class="modal-content">
        <div class="right row">
            <div class="col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>


        <h6 class="center Mcolor AdUser">MOVIMIENTO PRODUCTOS</h6>

        <div class="row">
            <div class="col s3 m4 l3 offset-l3 offset-m3 offset-s3">
                <p class="fecha">01/05/2016</p>
                <p class="rango">Desde</p>
            </div>
            <div class="col s3 m4 l3">
                <p class="fecha">22/06/2016</p>
                <p class="rango">Hasta</p>
            </div>
        </div>

        <!-- TOTAL DE PUNTOS DEL CLIENTE -->
        <div id="Total" class="right row text">
            <div class="col s8 m8 l12">
                <p class="Dato">TOTAL DE PUNTOS: <span class="dato">6,000 Pts. </span></p>
            </div>
        </div>
        <!-- TABLA DE DETALLES -->
        <table id="ClienteAdd" class=" TblDatos">
            <thead>
            <tr>
                <th>COD. ARTO.</th>
                <th>DESCRIPCIÓN</th>
                <th>LABOR.</th>
                <th>CANT.</th>
                <th>PUNTOS</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>13614012</td>
                <td>xxxxxxx xxxxxxx xxxxxxx xxxxxx xxxxx</td>
                <td id="NomCliente">NANJIN</td>
                <td>6</td>
                <td id="NomCliente">28,940.00 pts.</td>
            </tr>
            <tr>
                <td>13614012</td>
                <td>xxxxxxx xxxxxxx xxxxxxx xxxxxx xxxxx</td>
                <td id="NomCliente">NANJIN</td>
                <td>6</td>
                <td id="NomCliente">28,940.00 pts.</td>
            </tr>
            <tr>
                <td>13614012</td>
                <td>xxxxxxx xxxxxxx xxxxxxx xxxxxx xxxxx</td>
                <td id="NomCliente">NANJIN</td>
                <td>6</td>
                <td id="NomCliente">28,940.00 pts.</td>
            </tr>
            </tbody>


        </table>

        <div id="Iconos" class="row">
            <div class="col s2 m2 l1 offset-l4 offset-s4 offset-m4">
                <a href="#!" class=" BtnClose ">
                    <i class="medium material-icons"  >print</i>
                </a>
            </div>
            <div class="col s2 m2 l1">
                <a href="#"><img src="<?PHP echo base_url();?>assets/img/icono_excel.png " width="40px" ></a>
            </div>
            <div class="col s2 m2 l1 ">
                <a href="#"><img src="<?PHP echo base_url();?>assets/img/icono-pdf.png " width="38px" ></a>
            </div>
        </div>
    </div><!-- Fin Contenido Modal -->
</div>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                        Fin Modal Movimiento Producto
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->


<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                        Modal Canje Premios SP
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div id="CanjeSP" class="modal">
    <div class="modal-content">
        <div class="right row">
            <div class="col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>

        <h6 class="center Mcolor AdUser">CANJE PREMIOS SP</h6>

        <div class="row">
            <form class="col s12" action=""method="post" name="formMxP">

                <div class="row">
                    <div class="input-field col s6">
                        <input name="fecha1" placeholder="Desde" id="fecha1" type="text" class="datepicker1">
                    </div>
                    <div class="input-field col s6">
                        <input name="fecha2" placeholder="Hasta" id="fecha2" type="text" class="datepicker1">

                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col s6 m6 l5">
                <a href="#CanjeSPDdet" class="Btnadd modal-action modal-close btn modal-trigger">GENERAR</a>
            </div>
        </div>
    </div><!-- FIN CONTENIDO MODAL -->
</div>
<!-- Detalles del Canje SP -->

<div id="CanjeSPDdet" class="modal">
    <div class="modal-content">
        <div class="right row">
            <div class="col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>


        <h6 class="center Mcolor AdUser">CANJE PREMIOS SP</h6>

        <div class="row">
            <div class="col s3 m4 l3 offset-l3 offset-m3 offset-s3">
                <p class="fecha">01/05/2016</p>
                <p class="rango">Desde</p>
            </div>
            <div class="col s3 m4 l3">
                <p class="fecha">22/06/2016</p>
                <p class="rango">Hasta</p>
            </div>
        </div>

        <!-- TABLA DE DETALLES -->
        <table id="BajaCliente" class=" TblDatos">
            <thead>
            <tr>
                <th>N°</th>
                <th>CANT.</th>
                <th>CREADO</th>
                <th>#FRP</th>
                <th>COD. CLIENTE</th>
                <th>COD. ARTO.</th>
                <th>DESCRIPCIÓN</th>
                <th>Pts.</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>1</td>
                <td>23/06/2016</td>
                <td id="NomCliente">386</td>
                <td id="NomCliente">00641</td>
                <td id="NomCliente">134271</td>
                <td>maq coser singer 1408</td>
                <td id="NomCliente">6,208 pts.</td>
            </tr>
            <tr>
                <td>1</td>
                <td>1</td>
                <td>23/06/2016</td>
                <td id="NomCliente">386</td>
                <td id="NomCliente">00641</td>
                <td id="NomCliente">134271</td>
                <td>maq coser singer 1408</td>
                <td id="NomCliente">6,208 pts.</td>
            </tr>
            </tbody>


        </table>

        <div id="Iconos" class="row">
            <div class="col s2 m2 l1 offset-l4 offset-s4 offset-m4">
                <a href="#!" class=" BtnClose ">
                    <i class="medium material-icons"  >print</i>
                </a>
            </div>
            <div class="col s2 m2 l1">
                <a href="#"><img src="<?PHP echo base_url();?>assets/img/icono_excel.png " width="40px" ></a>
            </div>
            <div class="col s2 m2 l1 ">
                <a href="#"><img src="<?PHP echo base_url();?>assets/img/icono-pdf.png " width="38px" ></a>
            </div>
        </div>
    </div><!-- Fin Contenido Modal -->
</div>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                        Fin Modal Canje Premios SP
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                        Modal Reporte X Fecha
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div id="ReFecha" class="modal">
    <div class="modal-content">
        <div class="right row">
            <div class="col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>

        <h6 class="center Mcolor AdUser">REPORTE POR FECHA</h6>

        <div class="row">
            <form class="col s12" action=""method="post" name="formReFecha">

                <div class="row">
                    <div class="input-field col s6">
                        <input name="fecha1" placeholder="Desde" id="fecha1" type="text" class="datepicker1">
                    </div>
                    <div class="input-field col s6">
                        <input name="fecha2" placeholder="Hasta" id="fecha2" type="text" class="datepicker1">

                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col s6 m6 l5">
                <a href="#RepFechadet" class="Btnadd modal-action modal-close btn modal-trigger">GENERAR</a>
            </div>
        </div>
    </div><!-- FIN CONTENIDO MODAL -->
</div>
<!-- Detalles de Reporte por Fecha -->

<div id="RepFechadet" class="modal">
    <div class="modal-content">
        <div class="right row">
            <div class="col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>


        <h6 class="center Mcolor AdUser">REPORTE POR FECHA</h6>

        <div class="row">
            <div class="col s3 m4 l3 offset-l3 offset-m3 offset-s3">
                <p class="fecha">01/05/2016</p>
                <p class="rango">Desde</p>
            </div>
            <div class="col s3 m4 l3">
                <p class="fecha">22/06/2016</p>
                <p class="rango">Hasta</p>
            </div>
        </div>

        <!-- TABLA DE DETALLES -->
        <table id="tblpRODUCTOS" class=" TblDatos">
            <thead>
            <tr>
                <th>N°</th>
                <th>FECHA</th>
                <th>FACTURA</th>
                <th>RUTA</th>
                <th>PUNTOS</th>
                <th>COD. CLIENTE</th>
                <th>CLIENTE</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>24/05/2015</td>
                <td id="NomCliente">0075821</td>
                <td>F05</td>
                <td id="NomCliente">140 Pts.</td>
                <td>00115</td>
                <td>xxxx xxxxx xxxxx xxxx</td>
            </tr>
            <tr>
                <td>1</td>
                <td>24/05/2015</td>
                <td id="NomCliente">0075821</td>
                <td>F05</td>
                <td id="NomCliente">140 Pts.</td>
                <td>00115</td>
                <td>xxxx xxxxx xxxxx xxxx</td>
            </tr>
            </tbody>


        </table>

        <div id="Iconos" class="row">
            <div class="col s2 m2 l1 offset-l4 offset-s4 offset-m4">
                <a href="#!" class=" BtnClose ">
                    <i class="medium material-icons"  >print</i>
                </a>
            </div>
            <div class="col s2 m2 l1">
                <a href="#"><img src="<?PHP echo base_url();?>assets/img/icono_excel.png " width="40px" ></a>
            </div>
            <div class="col s2 m2 l1 ">
                <a href="#"><img src="<?PHP echo base_url();?>assets/img/icono-pdf.png " width="38px" ></a>
            </div>
        </div>
    </div><!-- Fin Contenido Modal -->
</div>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                        Fin Modal Reporte X Fecha
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                        Modal Master de Viñetas
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div id="MaVineta" class="modal">
    <div class="modal-content">
        <div class="right row">
            <div class="col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>

        <h6 class="center Mcolor AdUser">MASTER DE VIÑETAS</h6>

        <div class="row">
            <form class="col s12" action=""method="post" name="formMaVineta">

                <div class="row">
                    <div class="input-field col s6">
                        <input name="fecha1" placeholder="Desde" id="fecha1" type="text" class="datepicker1">
                    </div>
                    <div class="input-field col s6">
                        <input name="fecha2" placeholder="Hasta" id="fecha2" type="text" class="datepicker1">

                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col s6 m6 l5">
                <a href="#MaVinetadet" class="Btnadd modal-action modal-close btn modal-trigger">GENERAR</a>
            </div>
        </div>
    </div><!-- FIN CONTENIDO MODAL -->
</div>
<!-- Detalles de Master de Viñetas -->

<div id="MaVinetadet" class="modal">
    <div class="modal-content">
        <div class="right row">
            <div class="col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>


        <h6 class="center Mcolor AdUser">MASTER VIÑETAS</h6>

        <div class="row">
            <div class="col s3 m4 l3 offset-l3 offset-m3 offset-s3">
                <p class="fecha">01/05/2016</p>
                <p class="rango">Desde</p>
            </div>
            <div class="col s3 m4 l3">
                <p class="fecha">22/06/2016</p>
                <p class="rango">Hasta</p>
            </div>
        </div>


        <!-- TABLA DE DETALLES -->
        <table id="TblMaVinetas" class=" TblDatos">
            <thead>
            <tr>
                <th>N°</th>
                <th>FECHA</th>
                <th>FACTURA</th>
                <th>COD. CLIENTE</th>
                <th>CLIENTE</th>
                <th>PUNTOS X COMPRA</th>
                <th>ESTADO</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>25/05/2015</td>
                <td id="Codigo">00000</td>
                <td>0000</td>
                <td>xxxxx xxxxx xxxxx</td>
                <td id="Codigo">000 pts.</td>
                <td id="dispo">ACTIVO</td>
            </tr>

            </tbody>


        </table>

        <div id="Iconos" class="row">
            <div class="col s2 m2 l1 offset-l4 offset-s4 offset-m4">
                <a href="#!" class=" BtnClose ">
                    <i class="medium material-icons"  >print</i>
                </a>
            </div>
            <div class="col s2 m2 l1 offset-l1">
                <a href="#"><img src="<?PHP echo base_url();?>assets/img/icono_excel.png " width="40px" ></a>
            </div>
            <div class="col s2 m2 l1 offset-l1">
                <a href="#"><img src="<?PHP echo base_url();?>assets/img/icono-pdf.png " width="38px" ></a>
            </div>
        </div>
    </div><!-- Fin Contenido Modal -->
</div>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                        Fin Modal Master de Viñetas
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->