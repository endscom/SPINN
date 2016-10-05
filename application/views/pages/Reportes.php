<header class="demo-header mdl-layout__header ">
    <div class="centrado  ColorHeader">

        <span class=" title">reportes</span>

    </div>
</header>
<!--//////////////////////////////////////////////////////////
                CONTENIDO
///////////////////////////////////////////////////////////-->
<main class="mdl-layout__content mdl-color--grey-100">
        <div  id="contenedor">
            <a href="#Filtros" class=" IconBlue modal-action modal-close modal-trigger ">
                <i class="medium material-icons iconoCenter">assignment</i>
                <p class="TextIconos">REPORTES</p>

            </a>
        </div>

</main>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            MODALES DE REPORTES
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            Modal Filtros
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- Modal Cuenta por Cliente -->
<div id="Filtros" class="modal">
    <div class="modal-content">
        <div class="right row">
            <div class="col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>
        <h6 class="center Mcolor AdUser">REPORTES</h6>
        <div class="row">
            <form class="" name="frmReport">
                <div class="row">
                    <select class="chosen-select browser-default " id="idCliente">
                        <option value="0">Todos...</option>
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
                <div class="row">
                    <div class="input-field col s6">
                        <input name="fecha1" placeholder="Desde" id="fecha1" type="text" class="datepicker1 ">
                    </div>
                    <div class="input-field col s6">
                        <input name="fecha2" placeholder="Hasta" id="fecha2" type="text" class="datepicker1">

                    </div>
                </div>
                <div class="row">

                    <div class="input-field col s6">
                        <p>
                            <input class="with-gap" name="RptGrupo" type="radio" id="R1" checked />
                            <label for="R1">ESTADO DE FACTURA</label>
                        </p>
                    </div>
                    <div class="input-field col s6">
                        <p>
                            <input class="with-gap" name="RptGrupo" type="radio" id="R2" />
                            <label for="R2">DISPONIBILIDAD DE PUNTOS</label>
                        </p>
                    </div>
                </div>
            </form>
        </div>

        <div class="row center">
            <!--
                <a href="#EstadoFactura" class="Btnadd modal-action modal-close btn modal-trigger">GENERAR 1 </a>
                <a href="#DisponiblePuntos" class="Btnadd modal-action modal-close btn modal-trigger">GENERAR 2 </a>
                -->
            <a href="#" id="BtnFiltroReporte" class="Btnadd btn">GENERAR </a>
        </div>
    </div>
</div>




<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            View Estado de Factura
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div id="EstadoFactura" class="modal">
    <div class="modal-content">
        <div class="left row">
            <div class="col s12" >
                <img src="<?PHP echo base_url();?>assets/img/sp_logo_para_impresion.png">
            </div>
        </div>
        <div class="right row">
            <div class="col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>
        <br>

        <h6 class="center Mcolor AdUser">CUENTA POR CLIENTE</h6>
        <p class="frpT pts"><br></p>
        <div class="col s1" id="tituloReport1">  <p class="frpT pts">DATOS DEL CLIENTE</p></div>

        <div class="row">
            <div class="col s5 m3 l6" id="divCliente">
                <p class="Mcolor cod ">COD# <span id="Modal1CodCliente">000</span> </p>
                <p class="detalles cod linea"><span class="Mcolor">NOMBRE:</span> FARMACIA VIDA</p>
                <p class="detalles cod linea"><span class="Mcolor">DIRECCION:</span> Frente a Unión Fenosa, Ocotal</p>
                <p class="detalles cod linea"><span class="Mcolor">TELEFONO:</span> 27323298</p>
            </div>

            <div id="divFecha">
                <div class="col s3 m4 l3 " >
                    <p class="fecha" id="Modal1Fecha1" >00/00/0000</p>
                    <p class="rango">Desde</p>
                </div>
                <div class="col s3 m4 l3">
                    <p class="fecha" id="Modal1Fecha2">00/00/0000</p>
                    <p class="rango">Hasta</p>
                </div>
            </div>
        </div>
        <table id="tblEliminar" class=" TblDatos">
            <thead>
            <tr>
                <th>Nº</th>
                <th>FECHA</th>
                <th>FACTURA</th>
                <th>COD.</th>
                <th>CLIENTE</th>
                <th>ESTADO</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>0</td>
                <td>24/01/2016</td>
                <td id="black">067799</td>
                <td >000</td>
                <td>...</td>
                <td>CANCELADO</td>

            </tr>
            </tbody>
        </table>

        <div id="Iconos" class="center row">

                <a href="#"><img src="<?PHP echo base_url();?>assets/img/ico_imprimir.png" width="38px" ></a>

        </div>

    </div>
</div>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            Fin de Estado de Factura
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            View Disponibilidad de Puntos
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div id="DisponiblePuntos" class="modal">
    <div class="modal-content">
        <div class="col s1" style="height: 10px;">
            <div class="left row">
                <div class="col s12" >
                    <img src="<?PHP echo base_url();?>assets/img/sp_logo_para_impresion.png">
                </div>
            </div>
            <div class="right row">
                <div class="col s12">
                    <a href="#!" class=" BtnClose modal-action modal-close ">
                        <i class="material-icons">highlight_off</i>
                    </a>
                </div>
            </div>
        </div><br>
        <h6 class="center Mcolor AdUser">DISPONIBILIDAD POR PUNTOS </h6>
        <p class="frpT pts"><br></p>
        <div class="col s1" id="tituloReport2">  <p class="frpT pts">DATOS DEL CLIENTE</p></div>
        <div class="row">
            <div class="col s5 m3 l6" id="divCliente2">
                <p class="Mcolor cod ">COD# <span id="Modal2CodCliente">00000</span></p>
                <p class="detalles cod linea"><span class="Mcolor">NOMBRE:</span> FARMACIA VIDA</p>
                <p class="detalles cod linea"><span class="Mcolor">DIRECCION:</span> Frente a Unión Fenosa, Ocotal</p>
                <p class="detalles cod linea"><span class="Mcolor">TELEFONO:</span> 27323298</p>
            </div>
            <div id="divFecha2">
                <div class="col s3 m4 l3">
                    <p class="fecha" id="Modal2Fecha1" >00/00/0000</p>
                    <p class="rango">Desde</p>
                </div>
                <div class="col s3 m4 l3">
                    <p class="fecha" id="Modal2Fecha2" >00/00/0000</p>
                    <p class="rango">Hasta</p>
                </div>
            </div>
        </div>
        <div class="center row">
            <div class="col s6 ">
                <p class="detalles cod linea"><span class="Mcolor">TOTAL PUNTOS ACUMULADOS:</span> 0 Pts.</p>
            </div>
            <div class="col s6 ">
                <p class="detalles cod linea"><span class="Mcolor">TOTAL PUNTOS DISPONIBLES:</span> 0 Pts.</p>
            </div>
        </div>

        <table id="tblEliminar" class=" TblDatos">
            <thead>
            <tr>
                <th>Nº</th>
                <th>FECHA</th>
                <th>FACTURA</th>
                <th>COD.</th>
                <th>CLIENTE</th>
                <th>P. ACUMULADOS</th>
                <th>P. DISPONIBLES</th>
                <th>ESTADO</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>0</td>
                <td>24/01/2016</td>
                <td id="black">067799</td>
                <td >000</td>
                <td>...</td>
                <td>...</td>
                <td>...</td>
                <td>CANCELADO</td>

            </tr>
            </tbody>
        </table>

        <div id="Iconos" class="center row">

            <a href="#"><img src="<?PHP echo base_url();?>assets/img/ico_imprimir.png" width="38px" ></a>

        </div>

    </div>
</div>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            Fin de Disponibilidad de Puntos
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
