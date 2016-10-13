<header class="demo-header mdl-layout__header ">
    <div class="centrado  ColorHeader"><span class=" title">BIENVENIDO AL SISTEMA DE PUNTOS INNOVA</span></div>
</header>

<main class="mdl-layout__content mdl-color--grey-100">
    <div class="mdl-grid demo-content">       
        <div class="row TextColor center">catálogo de premios</div>

<<<<<<< HEAD
        <div class="container">
            <div class="Buscar row column">               
                <div class="col s1 m1 l1 offset-l3 offset-m1"><i class="material-icons ColorS">search</i></div>
=======
<div class="row" style="width:100%">
    <div class="container">
      <div class="Buscar row column">               
        <div class="col s1 m1 l1 offset-l3 offset-m1"><i class="material-icons ColorS">search</i></div>
>>>>>>> e0f61a578ce2751c2e60bc7f53f2f2bf80e3a498
        
                <div class="input-field col s12 m6 l4 offset-m1">
                    <input  id="searchCatalogo" type="text" placeholder="Buscar" class="validate mayuscula">
                    <label for="search"></label>
                </div>
            </div>
        </div>
<<<<<<< HEAD

        <div class="row center">
            <table id="tblCatalogo2" class="TableBlank transparente">
                <thead>
                    <tr><th></th> <th></th> <th></th> <th></th></tr>
                </thead>
                
                <tbody>
                    <?php
                        if (!($catalogo)) {}
                        else{
                            foreach ($catalogo as $key) {
                            echo "<tr>";
                            
                            for($i=1; $i<5; ++$i){
                                if ($key['v_Puntos'.$i]!="0" and $key['v_Nombre'.$i]!="") {
                                    echo"<td>
                                            <div class='images_ca'>                              
                                                <img src=".base_url()."assets/img/catalogo/".$key['v_IMG'.$i]." alt=''>
                                                <div class='descripImg'>
                                                <p class='codP'>COD: ".$key['v_IdIMG'.$i]."</p>
                                                <p class='descript'>".str_replace(array("/A%", "/E%","/I%","/O%","/U%","/-%"),array("á", "é", "í","ó","ú","ñ"),  $key['v_Nombre'.$i])."</p>
                                                <p class='ptsdes'>".$key['v_Puntos'.$i]." puntos</p>
                                                </div>
                                            </div>
                                        </td>";
                                    } else {
                                        echo"<td></td>";
                                    }
                                }
                            
                                echo "</tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>      
    </div>
=======
      </div>
    </div>
</div>
    <div class="row center" style="width:100%">
      <table id="tblCatalogo2" class="TableBlank transparente">
        <thead>
          <tr> <th></th> <th></th> <th></th> <th></th> </tr>
        </thead>
        <tbody>
          <?php
            if (!($catalogo)) {}
              else{
                foreach ($catalogo as $key) {
                  echo "<tr>";
                  
                  for($i=1; $i<5; ++$i){
                    if ($key['v_Puntos'.$i]!="0" and $key['v_Nombre'.$i]!="") {
                      echo"<td>
                              <div class='images_ca'>                              
                                <img src=".base_url()."assets/img/catalogo/".$key['v_IMG'.$i]." alt=''>
                                <div class='descripImg'>
                                  <p class='codP'>COD: ".$key['v_IdIMG'.$i]."</p>
                                  <p class='descript'>".str_replace(array("/A%", "/E%","/I%","/O%","/U%","/-%"),array("á", "é", "í","ó","ú","ñ"),  $key['v_Nombre'.$i])."</p>
                                  <p class='ptsdes'>".$key['v_Puntos'.$i]." puntos</p>
                                </div>
                              </div>
                          </td>";
                    }else{
                      echo"<td></td>";
                    }
                  }                  
                  echo "</tr>";
                }
              }
          ?>
      </tbody>
    </table>
  </div>      
</div>
>>>>>>> e0f61a578ce2751c2e60bc7f53f2f2bf80e3a498
</main>
</div>