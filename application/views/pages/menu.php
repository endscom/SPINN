<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <div class="trama_menu noOverflow demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header id="MenuFondo" class="demo-drawer-header">
            <img id="imgUser" src="<?PHP echo base_url();?>assets/img/sp_logo_menu.png" width="78%" >
           
            <div id="user">
                <i class=" material-icons" >face</i>
                <span class="Loggen"><?php echo $this->session->userdata('UserN');?></span>
            </div>
        </header>

       <div id="menu">
          <?php
            $menuH = '<ul class="nav menu demo-navigation mdl-navigation__link" >';
            
            $menuF = '<ul id="conTIcon2" class="nav menu demo-navigation mdl-navigation__link" >                    
                        <a href="salir"><li><i class="material-icons">exit_to_app</i> cerrar sesión</li></a>
                      </ul>';

            if ($this->session->userdata('IdRol')==1){
              $menuH .= '<a href="Main"><li><i class="material-icons">home</i> inicio</li></a>
                        <a href="Facturas"><li><i class="material-icons">remove_circle</i> Facturas</li></a>
                        <a href="Clientes"><li><i class="material-icons">supervisor_account</i> clientes</li></a>
                        <a href="PuntosClientes"><li><i class="material-icons">content_copy</i> puntos clientes</li></a>
                        <a href="Frp"><li><i class="material-icons">payment</i> canje puntos (frp)</li></a>
                        <a href="Catalogo"><li><i class="material-icons">dashboard</i> catálogo</li></a>
                        <a href="Usuarios"><li><i class="material-icons">account_box</i> usuarios</li></a>
                        <a href="Reportes"><li><i class="material-icons">description</i> reportes</li></a>
                        <a href="salir"> <li><i class="material-icons">exit_to_app</i> cerrar sesión</li></a>';                  
              }else if ($this->session->userdata('IdRol')==2){
                $menuH .= '<a href="Main"><li><i class="material-icons">home</i> inicio</li></a>
                          <a href="Clientes"><li><i class="material-icons">supervisor_account</i> clientes</li></a>
                          <div id="sac"><img src="'.base_url().'assets/img/sac_atencion.png" alt="Icon" /></div>';
                
                echo $menuF;
              } else if ($this->session->userdata('IdRol')==3){
                $menuH .= '<a href="Main"><li><i class="material-icons">home</i> inicio</li></a>
                           <a href="Clientes"><li><i class="material-icons">supervisor_account</i> clientes</li></a>
                           <div id="sac"><img src="'.base_url().'assets/img/sac_atencion.png" alt="Icon" /></div>';
                
                echo $menuF; 
              }

              $menuH .='</ul>';
              echo $menuH;
          ?>         
       </div>
    </div>