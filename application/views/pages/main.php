<header class="demo-header mdl-layout__header ">
  <div class="centrado  ColorHeader">
    <span class=" title">BIENVENIDO AL SISTEMA DE PUNTOS INNOVA</span>
  </div>
</header>
<main class="mdl-layout__content mdl-color--grey-100">
  <div class="mdl-grid demo-content">       
   <div class="row TextColor center">            
     catálogo de premios            
   </div> 
   <div class="container">
    <div class="Buscar row column">               
      <div class="col s1 m1 l1 offset-l3 offset-m1">
        <i class="material-icons ColorS">search</i>
      </div>
      <div class="input-field col s12 m6 l4 offset-m1">
        <input  id="searchCatalogo" type="text" placeholder="Buscar" class="validate mayuscula">
        <label for="search"></label>
      </div>
    </div>
  </div>
  <div class="row center">
    <table id="tblCatalogo2" class="TableBlank transparente">
      <thead>
        <tr>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
       <?php 
       if (!($catalogo)) {}
        else{
          foreach ($catalogo as $key) {
            if ($key['v_Puntos1']!="0" and $key['v_Nombre1']!="") {
              echo "<tr>";
              echo "<td>
              <div class='images_ca'>                                
              <img src=".base_url()."assets/img/catalogo/".$key['v_IMG1']." alt=''>
              <div class='descripImg'>
              <p class='codP'>COD: ".$key['v_IdIMG1']."</p>
              <p class='descript'>".str_replace(array("/A%", "/E%","/I%","/O%","/U%","/-%"),array("á", "é", "í","ó","ú","ñ"),  $key['v_Nombre1'])."</p>
              <p class='ptsdes'>".$key['v_Puntos1']." puntos</p>
              </div>
              </div>
              </td>";
            }else{echo "<td></td>";}
            if ($key['v_Puntos2']!="0" and $key['v_Nombre2']!="") {
              echo "<td>
              <div class='images_ca'>                              
              <img src=".base_url()."assets/img/catalogo/".$key['v_IMG2']." alt=''>
              <div class='descripImg'>
              <p class='codP'>COD: ".$key['v_IdIMG2']."</p>
              <p class='descript'>".str_replace(array("/A%", "/E%","/I%","/O%","/U%","/-%"),array("á", "é", "í","ó","ú","ñ"),  $key['v_Nombre2'])."</p>
              <p class='ptsdes'>".$key['v_Puntos2']." puntos</p>
              </div>
              </div>
              </td>";
            }else{echo "<td></td>";}
            if ($key['v_Puntos3']!="0" and $key['v_Nombre3']!="") {
              echo"<td>
              <div class='images_ca'>                              
              <img src=".base_url()."assets/img/catalogo/".$key['v_IMG3']." alt=''>
              <div class='descripImg'>
              <p class='codP'>COD: ".$key['v_IdIMG3']."</p>
              <p class='descript'>".str_replace(array("/A%", "/E%","/I%","/O%","/U%","/-%"),array("á", "é", "í","ó","ú","ñ"),  $key['v_Nombre3'])."</p>
              <p class='ptsdes'>".$key['v_Puntos3']." puntos</p>
              </div>
              </div>
              </td>";
            }else{echo "<td></td>";}
            if ($key['v_Puntos4']!="0" and $key['v_Nombre4']!="") {
              echo"<td>
              <div class='images_ca'>                              
              <img src=".base_url()."assets/img/catalogo/".$key['v_IMG4']." alt=''>
              <div class='descripImg'>
              <p class='codP'>COD: ".$key['v_IdIMG4']."</p>
              <p class='descript'>".str_replace(array("/A%", "/E%","/I%","/O%","/U%","/-%"),array("á", "é", "í","ó","ú","ñ"),  $key['v_Nombre4'])."</p>
              <p class='ptsdes'>".$key['v_Puntos4']." puntos</p>
              </div>
              </div>
              </td>";
            }else{echo "<td></td>";}
            echo"</tr>";
          }
        }
        ?>
      </tbody>
    </table>
  </div>      
</div>
</main>
</div>