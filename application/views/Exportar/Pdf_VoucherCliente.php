<html lang="en">
<head>
    <meta charset="UTF-8">
        <style>        
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
        .negra{
            font-family: 'robotoblack'!important;
        }
        .mediana{
            font-family: 'robotomedium'!important;
        }.regular{font-family: 'robotoregular'!important;}
        .noMargen{margin: 0px;}
        .Mcolor {
            color: #831F82;
            font-size: 16px;
            font-family: 'robotoblack';}
        .titulos{
            color: #831F82;
            font-size: 14px;
            font-family: 'robotoblack';
        }
        .detalles{
            color: #831F82;
            font-size: 10px;
            font-family: 'robotomedium';
        }.info{
            color: #831F82;
            font-size: 12px;
            font-family: 'robotomedium';
        }
        .row{
            width: 100%!important;
        }
    </style>
</head>
    <div id="detalleCliente" class="row noMargen">
        <div class="row">
            <div class="center col s12 m12 l12">
                <h6 class="Mcolor noMargen">ESTADO DE CUENTA</h6>        
            </div>
        </div> 
        <div class="row">
            <div class="col s12"><br>
                <div class="col s12">     
                    <p id="acumulado" class="titulos noMargen">CODIGO: <span class="detalles">
                    <?PHP
                                if(!($data)){echo "string";
                                    } else {
                                        foreach($data as $factura){
                                            echo $factura['CLIENTE'];
                                    }
                                }
                    ?>
                    Pts</span></p>
                </div>                
                <div class="col s12">     
                    <p id="acumulado" class="titulos noMargen">CLIENTE: <span class="detalles">Pts</span></p>
                </div><br><br>
                <div class="col s12">     
                    <p id="acumulado" class="info noMargen">DISPONIBLE: <span class="detalles">Pts</span></p>
                </div>                
                <div class="col s12">
                    <p id="acumulado" class="info noMargen">ACUMULADO: <span class="detalles">Pts</span></p>
                </div>                
                <div class="col s12">
                    <p id="acumulado" class="info noMargen">CANJEADO: <span class="detalles">Pts</span></p>
                </div><br><br>           
                <div class="row center">
                    <p id="ModalFeet"  class="info noMargen">VENDEDOR:<br><span class="detalles">250,000</span></p>
                </div>
            </div>
        </div>
    </div>
</html>