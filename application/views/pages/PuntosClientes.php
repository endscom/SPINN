<header class="demo-header mdl-layout__header ">
    <div class="centrado  ColorHeader">
        <span class=" title">LISTA DE FACTURAS POR CLIENTE</span>
    </div>
</header>
<!--//////////////////////////////////////////////////////////
                CONTENIDO
///////////////////////////////////////////////////////////-->

<main class="mdl-layout__content mdl-color--grey-100">
    <div class="contenedor">
        <div class=" row TextColor">
            <div class="col s5 m5 l12 offset-m4 offset-s2">
                 FACTURAS DE clientes
            </div>
        </div>

        <div class="container">
            <div class=" Buscar row column">
                <div class="col s1 m1 l1 offset-l2 offset-m2 offset-s1">
                    <i class="material-icons ColorS">search</i>
                </div>

                <div class="input-field col col s12 m6 l4">
                    <input  id="searchFacturasClientes" type="text" placeholder="Buscar" class="validate">
                    <label for="searchFacturasClientes"></label>
                </div>

                <div class="col offset-s3 s3 m1 l1">
                    <a href="ExpEXCELpuntosCliente" class="noHover" onclick="exportar(FrmPuntosClientes);"> <img src="<?PHP echo base_url();?>assets/img/icono_excel.png " width="30px"></a>
                </div>
                <div class="col offset-s1 s3 m1 l1 ">
                    <a href="ExpPDFpuntosCliente" target="_blank" class="noHover" onclick="exportar(FrmPuntosClientes);"><img src="<?PHP echo base_url();?>assets/img/icono-pdf.png " width="30px" ></a>
                </div>
            </div>
        </div>
    
        <form action="" name="FrmPuntosClientes" id="FrmPuntosClientes" method="post">
            <table id="PtosCliente" class=" TblDatos">
                <thead>
                    <tr>
                        <th>DETALLES</th>
                        <th>CÓDIGO</th>
                        <th>CLIENTE</th>
                        <th>VENDEDOR</th>
                        <th>ACUMULADO</th>
                        <th>DISPONIBLE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(!($Clientes)){
                        } else {
                            foreach($Clientes as $cliente){
                                echo "<tr>
                                        <td class='center green-text detallesFactura'><i id='detail".$cliente['CODIGO']."' class='material-icons'>details</i>
                                        <div id='loader".$cliente['CODIGO']."' style='display:none;' class='preloader-wrapper small active' >
                                            <div class='spinner-layer spinner-yellow-only'>
                                            <div style='overflow: visible!important;' class='circle-clipper left'>
                                                <div class='circle'></div>
                                            </div><div class='gap-patch'>
                                                <div class='circle'></div>
                                            </div><div style='overflow: visible!important;' class='circle-clipper right'>
                                                <div class='circle'></div>
                                            </div>
                                            </div>
                                        </div>
                                        </td>
                                        <td>".$cliente['CODIGO']."</td>
                                        <td class='negra'>".$cliente['CLIENTE']."</td>
                                        <td>".$cliente['VENDEDOR']."</td>
                                        <td>".$cliente['ACUMULADO']."</td>
                                        <td>".$cliente['DISPONIBLE']."</td>
                                    </tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
</main>