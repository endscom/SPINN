<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        #ClienteAdd{border-collapse: separate;border-spacing: 1px;color: white; font-family: 'robotoblack';}
        #tbla tbody td{color: #831f82;font-size: 14px;}
        #tbla tr:nth-child(even){background: #ffffff;}
        #tbla tr:nth-child(odd){ background: #e7e2f7; }
        #tbla th{ background: #ffffff;color: #831f82; font-size: 14px;}
        .Blank td {
            background: #ffffff;
        }
        .alert{
            color: #e74c3c ;
        }
        #view-source {
            position: fixed;
            display: block;
            right: 0;
            bottom: 0;
            margin-right: 40px;
            margin-bottom: 40px;
            z-index: 900;
        }
    </style>
    <link rel="stylesheet"href="<?PHP echo base_url();?>assets/css/materialize.css">
    <link rel="stylesheet" href="<?PHP echo base_url();?>assets/css/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="<?PHP echo base_url();?>assets/media/icon.css">

    <link rel="stylesheet" href="<?PHP echo base_url();?>assets/css/styles.css">
    <link rel="stylesheet" href="<?PHP echo base_url();?>assets/css/jquery.dataTables.css">
    <link rel="stylesheet" href="<?PHP echo base_url();?>assets/css/bootstrap.css">
<script>
    window.print();
</script>
</head>
<body>
<div id="tbla">
<div class="content">
    <div class="container center">
        <div class="col s1" style="height: 10px;">
            <div class="left row">
                <div class="col s12" >
                    <img src="<?PHP echo base_url();?>assets/img/sp_logo_para_impresion.png">
                </div>

            </div>

            <div class="right row">
                <div class="col s12" >
                    <span id="titulM" class="Mcolor"> DETALLE FRP</span>
                </div>

            </div>
        </div>
        <div class="col s1">
            <span class="center datos1 frpT"> N° FRP 38389</span><br>
            <span class="center datos1 lineas"> 24/12/2016</span>
        </div>
        <div class="col s1">
            <span id="Nfarmacia" class="Mcolor" >COD# 00449 NOMBRE: FARMACIA CASTELLÓN</span>
            <br>
            <span class="center Datos linea ruc"> Nº RUC 4412000183001H </span>
        </div>

    </div>


    <table id="tblModal1" class="Blank">
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

    <div class="row">
        <div class="Mcolor  col s6 offset-s7"><span class="alert">PUNTOS APLICADOS: 363,522 Pts.</span></div>
        <div class="Mcolor center col s12 ">PREMIO A CANJEAR</div>
    </div>
    <table id="tblModal1" class="Blank">
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

    <div class="row right">
        <h6 class="center Mcolor dat"><span class="alert">PUNTOS APLICADOS POR EL CANJE: 363,522 Pts.</span> </h6>

    </div>



</div>



</div>

</div>
</body>
</html>