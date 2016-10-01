<header class="demo-header mdl-layout__header ">
    <div class="centrado  ColorHeader">
        <span class=" title">CLIENTES</span>
    </div>
</header>
<!--//////////////////////////////////////////////////////////
                CONTENIDO
///////////////////////////////////////////////////////////-->
<main class="mdl-layout__content mdl-color--grey-100">

    <div class="contenedor">

        <div class=" row TextColor">
            <div class="col s12 m12 l12">
               CLIENTES PARA AGREGAR AL PROGRAMA DE PUNTOS
            </div>
        </div>

        <div class="container">
            <div class=" Buscar row column">

                <div class="col s1 m1 l1 offset-l3 offset-s1 offset-m2">
                    <i class="material-icons ColorS">search</i>
                </div>

                <div class="input-field col s5 m4 l4">
                    <input  id="searchClientes" type="text" placeholder="Buscar" class="validate">
                    <label for="search"></label>
                </div>

                <div class="col s2 m1 l1">
                    <a href="Exp_Clientes" onclick="generar_reporte_excel();"> <img src="<?PHP echo base_url();?>assets/img/icono_excel.png " width="30px"></a>
                </div>
                <div class="col s1 m1 l1 ">
                    <a href="ExpPDF" target="_blank" onclick="generar_reporte_pdf();"><img src="<?PHP echo base_url();?>assets/img/icono-pdf.png " width="30px" ></a>
                </div>
            </div>
        </div>

        <div class="right row">
                <a href="#modal1" id="btngenerar"  onclick="AddClients()" class="BtnBlue waves-effect  btn modal-trigger ">AGREGAR</a>
        </div>

     <form action="" name="FrmClientes" id="FrmClientes" method="post"> <!--Exportar datos a EXCEL -->
        <table id="ClienteAdd" class="table TblDatos">
            <thead>
            <tr>
                <th>CÓDIGO</th>
                <th>CLIENTE</th>
                <th>RUC</th>
                <th>DIRECCIÓN</th>
                <th>VENDEDOR</th>
            </tr>
            </thead>
            <tbody>
               <?PHP
                if(!($Clientes)){
                    } else {
                        foreach($Clientes as $cliente){
                            echo "
                                 <tr>
                                    <td>".$cliente['CODIGO']."</td>
                                    <td class='negra'>".$cliente['NOMBRE']."</td>
                                    <td>".$cliente['RUC']."</td>
                                    <td>".$cliente['DIRECCION']."</td>
                                    <td>".$cliente['VENDEDOR']."</td>
                                 </tr>
                            ";
                        }
                    }
                ?>
            </tbody>
        </table>
        </form>
    </div><!-- Fin Contenedor -->
</main>
<!--///////////////////////////////////////////////////////////////////////
                        MODALES
////////////////////////////////////////////////////////////////////////-->

<!-- Modal #1
                Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">

        <div class=" row">

            <div class="right col s3 m3 l3">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>
        <h6 class="center Mcolor">DESEA AGREGAR:</h6>

    <div class="row">
        <div class="col s12">

            <table id="tblModal1" class="TheadColor">

                <thead>
                <tr>
                    <th>CLIENTE.</th>
                    <th>COD.UNIMARK</th>
                    <th>ELIMINAR</th>
                </tr>
                </thead>

                <tbody>

                <tr>
                    <td>xxxxxxxxxxxxxxxxxxxxxxx</td>
                    <td id="black">03195</td>
                    <td>
                        <i class=" BtnClose material-icons">highlight_off</i>
                    </td>
                </tr>

                <tr>
                    <td>xxxxxxxxxxxxxxxxxxxxxxx</td>
                    <td id="black">03195</td>
                    <td>
                        <i class=" BtnClose material-icons">highlight_off</i>
                    </td>
                </tr>
                </tbody>

            </table>
        </div>
    </div>

    </div>

    <div class="row">
        <div class="col s6">
            <a href="#modal2" class="Btnadd modal-action modal-close btn modal-trigger">GENERAR</a>
        </div>
    </div>

</div>
<!-- Fin de Modal#1-->

<!--///////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////-->

<!-- Modal #2-->
<!-- Modal Structure -->
<div id="modal2" class="modal">
    <div class="modal-content">
        <div class=" row">
            <div class="right col s3 m3 l3">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>
        <h6 class="center Mcolor">CLIENTES AGREGADOS:</h6>

        <table id="tblModal2" class="TheadColor">
            <thead>
            <tr>
                <th>CLIENTE</th>
                <th>USUARIO VISYS</th>
                <th>CONTRASEÑA</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>xxxxxxx</td>
                <td id="black">xxxxxx</td>
                <td id="black">xxxx</td>
            </tr>
            </tbody>
        </table>

    </div>


</div>

