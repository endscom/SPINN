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
           <ul class="nav menu demo-navigation mdl-navigation__link" >
               <a href="Main"><li><i class="material-icons">home</i> inicio</li></a>
               <a href="EliminarVineta"><li><i class="material-icons">remove_circle</i> eliminar boucher</li></a>
               <a href="Clientes"><li><i class="material-icons">supervisor_account</i> clientes</li></a>
               <!--<a href="BajaClientes"><li><img src="<?PHP echo base_url()?>assets/img/bajacliente.png" width="30px"> baja clientes</li></a>-->
               <a href="PuntosClientes"><li><i class="material-icons">content_copy</i> puntos clientes</li></a>
               <a href="Frp"><li><i class="material-icons">payment</i> canje puntos (frp)</li></a>
               <a href="Catalogo"><li><i class="material-icons">dashboard</i> catálogo</li></a>
               <a href="Usuarios"><li><i class="material-icons">account_box</i> usuarios</li></a>
               <a href="Reportes"><li><i class="material-icons">description</i> reportes</li></a>
               <a href="salir"> <li><i class="material-icons">exit_to_app</i> cerrar sesión</li></a>
          </ul>
       </div>
    </div>

