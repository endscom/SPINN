<header class="demo-header mdl-layout__header ">
    <div class="centrado  ColorHeader">

        <span class=" title">PUNTOS</span>

    </div>
</header>
<!--//////////////////////////////////////////////////////////
                CONTENIDO
///////////////////////////////////////////////////////////-->

<main class="mdl-layout__content mdl-color--grey-100">

    <div class="contenedor">

        <div class=" row TextColor">
            <div class="col s5 m5 l12 offset-m4 offset-s2">
                 puntos clientes
            </div>
        </div>

        <div class="container">
            <div class=" Buscar row column">

                <div class="col s1 m1 l1 offset-l2 offset-m2 offset-s1">
                    <i class="material-icons ColorS">search</i>
                </div>

                <div class="input-field col col s2 m4 l4">
                    <input  id="search" type="text" placeholder="Buscar" class="validate">
                    <label for="search"></label>
                </div>

                <div class="col s1 m1 l1">
                    <img src="<?PHP echo base_url();?>assets/img/icono_excel.png " width="30px">
                </div>
                <div class="col s1 m1 l1 ">
                    <img src="<?PHP echo base_url();?>assets/img/icono-pdf.png " width="30px" >
                </div>
            </div>
        </div>

        <table id="PtosCliente" class=" TblDatos">

            <thead>
            <tr>
                <th>COD. CLIENTE</th>
                <th>RUC</th>
                <th>CLIENTE</th>
                <th>PUNTOS</th>
            </tr>
            </thead>

            <tbody>

            <tr>
                <td id="Codigo"><a href="DetalleFact">xxxx</a></td>
                <td>xxxxx</td>
                <td id="Codigo">xxxx</td>
                <td id="black">1212121 <span class="pts">Pts</span></td>
            </tr>

            <tr>
                <td id="Codigo">xxxx</td>
                <td>xxxxx</td>
                <td id="Codigo">aaaaa</td>
                <td id="black">1212121 <span class="pts">Pts</span></td>
            </tr>

            <tr>
                <td id="Codigo">xxxx</td>
                <td>xxxxx</td>
                <td id="Codigo">xxxx</td>
                <td id="black">1212121 <span class="pts">Pts</span></td>
            </tr>

            <tr>
                <td id="Codigo">xxxx</td>
                <td>xxxxx</td>
                <td id="Codigo">xxxx</td>
                <td id="black">1212121 <span class="pts">Pts</span></td>
            </tr>

            </tbody>

        </table>

    </div>
</main>