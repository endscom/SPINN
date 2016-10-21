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
            color: black;
            font-size: 16px;
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
            color: green;
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
</head>
    <div class="row noMargen">
            <div class="row center">
                <img id="logo" src="<?PHP echo base_url();?>assets/img/spinnova_logo.png" width="35%">
            </div>
        <div class="row">
            <div class="center col s12 m12 l12">
                <h6 class="Mcolor noMargen">ESTADO DE CUENTA</h6>        
            </div>
        </div> 
        <div class="row">
            <div class="col s12"><br>
                <div class="center">     
                    <p id="acumulado" class="titulos noMargen">CóDIGO: </p>
                    <span class="detalleencabezado center"><?php echo $cliente[0]['COD_CLIENTE'];?></span>
                </div>                
                <div class="center row">     
                    <p id="acumulado" class="titulos noMargen">CLIENTE: </p>
                    <span class="detalleencabezado center"><?php echo $cliente[0]['CLIENTE']; ?></span>
                </div><br><br>
                <div class="col s12">     
                    <p id="acumulado" class="info noMargen">DISPONIBLE: <span class="detalles"><?php echo $cliente[0]['DISPONIBLE']; ?> Pts</span></p>
                </div>                
                <div class="col s12">
                    <p id="acumulado" class="info noMargen">ACUMULADO: <span class="detalles"><?php echo $cliente[0]['ACUMULADO']; ?> Pts</span></p>
                </div>                
                <div class="col s12">
                    <p id="acumulado" class="info noMargen">CANJEADO: <span class="detalles">PENDIENTE Pts</span></p>
                </div><br><br>           
                <div class="row center">
                    <p id="ModalFeet"  class="info noMargen">VENDEDOR:<br><span class="detalles">250,000</span></p>
                </div>
            </div>
        </div>
    </div>
</html>