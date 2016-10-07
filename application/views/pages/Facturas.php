<header class="demo-header mdl-layout__header ">
    <div class="centrado  ColorHeader">

        <span class=" title">FACTURAS</span>

    </div>
</header>

<!--//////////////////////////////////////////////////////////
                CONTENIDO
///////////////////////////////////////////////////////////-->

<main class="mdl-layout__content mdl-color--grey-100">
    <div class="contenedor ">

       <div class="container">
           <div id="buscar" class=" row column">
               <div class="col s1 m1 l1 offset-s3  offset-l2">
                   <i class="material-icons ColorS">search</i>
               </div>
               <div id="InputSearch" class="input-field col s6 m16 l5">
                   <input  id="sFactura" type="text" placeholder="Buscar Facturas o Cliente" class="validate">
                   <label for="search"></label>
               </div>
           </div>
       </div>

        <div id="getAllFactura" >

            <div class="right row">
                <div class="col s2 m2 l2">
                    <a href="#modal1" class="BtnEliminar waves-effect  btn modal-trigger">ELIMINAR</a>
                </div>
            </div>
            <table id="tblFacturas">
                <thead>
                <tr>
                    <th>FECHA.</th>
                    <th>FACTURA</th>
                    <th>CLIENTE</th>
                    <th>NOMBRE</th>
                    <th>P.ACUMULADO</th>
                    <th>P.DISPONIBLE</th>
                    <th>VENDEDOR</th>
                    <th>ELIMINAR</th>
                </tr>
                </thead>

                <tbody>
                <?php
                    foreach($Facturas as $fac){
                        echo "
                                 <tr>
                                    <td>".substr($fac['FECHA'],0,10)."</td>
                                    <td>".$fac['FACTURA']." </td>
                                    <td>".$fac['COD_CLIENTE']."</td>
                                    <td>".utf8_encode($fac['CLIENTE'])."</td>
                                    <td>".number_format($fac['ACUMULADO'])." Pts.</td>
                                    <td>".number_format($fac['DISPONIBLE'])." Pts.</td>
                                    <td>".utf8_encode($fac['VENDEDOR'])."</td>
                                    <td><a href='#modal3' class='modal-trigger'> <i class='material-icons'>&#xE417;</i></a></td>
                                 </tr>
                            ";
                    }
                ?>

                </tbody>
            </table>

            <div class="right row">
                <div class="col s12 m12 l12">
                    <p class="TextTotal">Total Pts.Cliente: <span>325,766 Pts.</span> </p>
                </div>
            </div>
        </div>

        </div>
    </div>
</main>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            Modales Facturas Commpleta
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div id="modal1" class="modal">
    <div class="modal-content">
        <div class=" row">
            <div class="right col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>
        <h6  class="center Mcolor">DESEA ELIMINAR EL BOUCHER:</h6>
        <div class="row">
            <div class="col s12">
                <table id="tblModal1">
                    <thead>
                        <tr>
                            <th>CANT.</th>
                            <th>DESCRIPCIÓN</th>
                            <th>LAB.</th>
                            <th>PUNTOS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>7</td>
                            <td>xxxxxxxxxxxxxxxxxxxxxxx</td>
                            <td>5155</td>
                            <td>70 pts</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="center row">
        <a href="#modal2" class="BtnEliminar modal-action modal-close btn modal-trigger">ELIMINAR</a>
    </div>
</div>

<div id="modal2" class="modal">
    <div class="modal-content">
            <div class="right row">
                <div class="col s1 m1 l1">
                    <a href="#!" class=" BtnClose modal-action modal-close ">
                        <i class="material-icons">highlight_off</i>
                    </a>
                </div>
            </div>
        <h6 class="center Mcolor1">EL BOUCHER FUE ELIMINADO</h6>
    </div>
</div>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            Fin Modales Facturas Commpleta
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            Modales Detalles Facturas
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<div id="modal3" class="modal">
    <div class="modal-content">
        <div class=" row">
            <div class="right col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>
        <h6  class="center Mcolor">FACTURA:</h6>
        <div class="row">
            <div class="col s12">
                <table id="tblModal1">
                    <thead>
                    <tr>
                        <th>CANT.</th>
                        <th>DESCRIPCIÓN</th>
                        <th>LAB.</th>
                        <th>PUNTOS</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>7</td>
                        <td>xxxxxxxxxxxxxxxxxxxxxxx</td>
                        <td>5155</td>
                        <td>70 pts</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="center row">
        <a href="#modal2" class="BtnEliminar modal-action modal-close btn modal-trigger">ELIMINAR</a>
    </div>
</div>

