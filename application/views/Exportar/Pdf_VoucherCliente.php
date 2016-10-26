<html lang="en">
    <meta charset="UTF-8">
        <style>
        tbody td, thead th{ padding: 8px 10px;}
        #tblEstadoFactura{border-collapse: separate;border-spacing: 2px;color: white; font-family: 'robotoblack';}
        #tblEstadoFactura tbody td{color:black;font-size: 11px;}
        #tblEstadoFactura tr:nth-child(even){background: #ffffff;}
        #tblEstadoFactura tr:nth-child(odd){ background: #e7e2f7; }
        #tblEstadoFactura th{ background: white;color: black; font-size: 14px;}
        #tblEstadoFactura td{ font-size: 30px;}
        @font-face {
            font-family: 'robotoblack';
            src: url('roboto-black-webfont.eot');
            src: url('roboto-black-webfont.eot?#iefix') format('embedded-opentype'),
            url('roboto-black-webfont.woff2') format('woff2'),
            url('roboto-black-webfont.woff') format('woff'),
            url('roboto-black-webfont.ttf') format('truetype'),
            url('roboto-black-webfont.svg#robotoblack') format('svg');
            font-weight: normal;
            font-style: normal;
        }
        @font-face {
            font-family: 'robotobold';
            src: url('roboto-bold-webfont.eot');
            src: url('roboto-bold-webfont.eot?#iefix') format('embedded-opentype'),
            url('roboto-bold-webfont.woff2') format('woff2'),
            url('roboto-bold-webfont.woff') format('woff'),
            url('roboto-bold-webfont.ttf') format('truetype'),
            url('roboto-bold-webfont.svg#robotobold') format('svg');
            font-weight: normal;
            font-style: normal;
        }
        @font-face {
            font-family: 'robotomedium';
            src: url('roboto-medium-webfont.eot');
            src: url('roboto-medium-webfont.eot?#iefix') format('embedded-opentype'),
            url('roboto-medium-webfont.woff2') format('woff2'),
            url('roboto-medium-webfont.woff') format('woff'),
            url('roboto-medium-webfont.ttf') format('truetype'),
            url('roboto-medium-webfont.svg#robotomedium') format('svg');
            font-weight: normal;
            font-style: normal;
        }
        @font-face {
            font-family: 'robotoregular';
            src: url('roboto-regular-webfont.eot');
            src: url('roboto-regular-webfont.eot?#iefix') format('embedded-opentype'),
            url('roboto-regular-webfont.woff2') format('woff2'),
            url('roboto-regular-webfont.woff') format('woff'),
            url('roboto-regular-webfont.ttf') format('truetype'),
            url('roboto-regular-webfont.svg#robotoregular') format('svg');
            font-weight: normal;
            font-style: normal;
        }
        .center{text-align: center!important;}
        .negra{font-family: 'robotoblack'!important;}
        .mediana{font-family: 'robotomedium'!important;
        }.regular{font-family: 'robotoregular'!important;}
        .noMargen{margin: 0px;}
        .fecha{font-size: 5px;margin-top: 0px;}
        .Mcolor {
            color: black;
            font-size: 15px;
            font-family: 'robotoblack';}
        .titulos{
            color: black;
            font-size: 12px;
            font-family: 'robotoblack';
            font-weight: bold;
        }
        .detalleencabezado{
            color: black;
            font-size: 11px;
            font-family: 'robotomedium';
        }
        .detalles{
            color: black;
            font-size: 10px;
            font-family: 'robotomedium';
        }.info{
            color: black;
            font-size: 12px;
            font-family: 'robotoblack';
        }
        .row{
            width: 100%!important;
        }
    </style>
    <div class="row" style="width:288px!important;">
            <div class="row center">
                <img id="logo" src="<?PHP echo base_url();?>assets/img/spinnova_logo.png" width="35%">
            </div>
        <div class="row">
            <div class="center col s12 m12 l12">
                <h6 class="Mcolor noMargen">ESTADO DE CUENTA</h6>        
            </div>
        </div> 
        <div class="row">
            <div class="col s12">
                <div class="center">     
                    <p id="acumulado" class="titulos noMargen">CÓDIGO: </p>
                    <span class="detalleencabezado center"><?php echo $cliente[0]['COD_CLIENTE'];?></span>
                </div>
                <div class="center row">     
                    <p id="acumulado" class="titulos noMargen">CLIENTE: </p>
                    <span class="detalleencabezado center"><?php echo $cliente[0]['CLIENTE']; ?></span>
                </div>                
            </div>
        </div><br>
        <div class="row">
            <table id="tblEstadoFactura" style='width: 100%;'>
                <thead>
                    <tr>
                        <th>ACUMULADO</th>
                        <th>DISPONIBLE</th>                        
                        <th>CANJEADO</th>
                    </tr>
                </thead>
                <tbody>
                <?PHP
                        if(!($cliente)){
                            } else {
                                foreach($cliente as $factura){
                                    echo "
                                    <tr>
                                        <td class='center'>".number_format($factura['ACUMULADO'])."</td>
                                        <td class='center'>".number_format(($factura['DISPONIBLE']-$factura['CANJEADO']))."</td>
                                        <td class='center'>".number_format($factura['CANJEADO'])."</td>
                                    </tr>";
                            }
                        }
                ?>
                </tbody>
            </table>
        </div><br>
        <div class="row" style="text-align:right">
            <p class="fecha">FECHA: <?php echo date("d-m-Y"); ?></p>
        </div>
    </div>
</html>