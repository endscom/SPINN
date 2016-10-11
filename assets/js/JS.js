var activo = false;
$(document).ready(function() {

    $('#Filtros').openModal();
$('.datepicker').pickadate({ 
        selectMonths: true,selectYears: 15,format: 'dd-mm-yyyy',
        monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        weekdaysFull: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
        showMonthsShort: undefined,showWeekdaysFull: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],today: 'Hoy',
        clear: 'BORRAR',close: 'CERRAR' });
$('select').material_select();
/*METODOS PARA BUSCAR CON LOS INPUT SUPERIORES EN LAS TABLAS*/
 $('#searchUsuarios').on( 'keyup', function () {
    var table = $('#TbCatalogo').DataTable();
    table.search( this.value ).draw();
} );

$('#searchFacturasClientes').on( 'keyup', function () {
    var table = $('#PtosCliente').DataTable();
    table.search( this.value ).draw();
} );

$('#searchClientes').on( 'keyup', function () {
    var table = $('#ClienteAdd').DataTable();
    table.search( this.value ).draw();
} );


$('#searchCatalogo').on( 'keyup', function () {
    var table = $('#tblCatalogo2').DataTable();
    table.search( this.value ).draw();
} );
$('#checkTodos').change(function () {//funcion para seleccionar todos los checks
    var oTable = $('#tblCatalogoPasado').dataTable();
    var nNodes = oTable.fnGetNodes( );    
    if($(this).is(':checked') ) {
    $("label").trigger("click");
    }else{
        $("label").trigger("click");
   }
});

$('#txtimagen').change(function(){
    //var filename = $('input[type=file]').val().replace(/C:\\fakepath\\/i, '');
    var file = $('input[type=file]').val().replace(/C:\\fakepath\\/i, '')
    if ($('#bandera').val()==0){
        var codigo = file.split(".");$('#codigoArto').val(codigo[0]);
    }
});
var idImagenGlobal;
var IdCatalogoGlobal;
var rowCount;
$('#tblCatalogoPasado').DataTable( {
            "info":    false,
            "bPaginate": false,
            "paging": false,
            "lengthMenu": [[5,10,50,100,-1], [5,10,50,100,"Todo"]],
            "language": {
                "paginate": {
                    "first":      "Primera",
                    "last":       "Última ",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
                "lengthMenu": "MOSTRAR _MENU_ REGISTROS",
                "search":     "BUSCAR"
            }
        });

$('#tblCatalogo2,#tblCatalogoActual').DataTable( {
            "info":    false,
            "bPaginate": false,
            "lengthMenu": [[10,20,50,100,-1], [10,20,50,100,"Todo"]],
            "language": {
                "paginate": {
                    "first":      "Primera",
                    "last":       "Última ",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
                "lengthMenu": "MOSTRAR _MENU_ REGISTROS",
                "emptyTable": "No hay datos disponibles en la tabla",
                "search":     "BUSCAR"
            }
        });
$('#tblCatalogoActualModal').DataTable({            
            "info":    false,
            "bPaginate": false,
            "paging": false,
            "lengthMenu": [[5,10,50,100,-1], [5,10,50,100,"Todo"]],
            "language": {
                "paginate": {
                    "first":      "Primera",
                    "last":       "Última ",
                    "next":       "Siguiente",
                    "previous":   "Anterior"                    
                },
                "lengthMenu": "MOSTRAR _MENU_",
                "emptyTable": "No hay datos disponibles en la tabla",
                "search":     "BUSCAR"
            }
        });
         $('#tblCatalogoActualModal tbody').on( 'click', 'tr', function () {
                $('#tblCatalogoActualModal tbody').on( 'click', 'tr', function () {
                    $(this).toggleClass('selected');
                } );
            } );         
    $('#btnborrarSeleccionados').click( function () {
        var table = $('#tblCatalogoActualModal').DataTable();
        $("#tblCatalogoActualModal .selected").each(function (index){   
            table.row('.selected').remove().draw(false);
        })
    } );
    /******Agregar clase Activo a items del Menú******/
 $('#tblCatalogo').DataTable();
    $(".nav li a").each(function() {
        if(this.href.trim() == window.location){
            $(this).parent().addClass("active");
            activo = true;
        }
    });
    if(!activo){
        $('.nav li a:first').addClass("active");
    }
    /****** Seccíon del Menú ******/

    /**** DATATABLES ****/
    $('#tblFREimpre,#TbCatalogo,#TblMaVinetas,#MCXP,#tblFacturas,#ClienteAdd,#BajaCliente,#PtosCliente,#FRP,#tblpRODUCTOS,#tblModals').DataTable(
        {
            "info":    false,
            //"searching": false,
            "bLengthChange": true,
            "lengthMenu": [[10,15,32,100,-1], [10,15,32,100,"Todo"]],
            "language": {
                "paginate": {
                    "first":      "Primera",
                    "last":       "Última ",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
                "lengthMenu":"Mostrar _MENU_",
                "emptyTable": "No hay datos disponibles en la tabla",
                "search":     "" 
            }
        }
    );
   /**** END DATATABLES ****/

    $('.modal-trigger').leanModal();// INICIAR LOS MODALES
    Materialize.toast();
    //CARGAR LOS CLIENTES Y/O VENDEDORES EN EL SELECT (AGREGAR USUAARIO AL SISTEMA)
    $("#rol").change(function(){
        $("#vendedor").attr("disabled","disabled"); // inhabilitar el select
        str = $( "#rol option:selected" ).val();

        if(str=="Vendedor"||str=="Cliente"){
            if (str=="Vendedor"){
                str = "LoadVendedores";
            }else {
                str = "LoadCliente";
            }

            $.ajax({
                url: str,
                type: "get",

                async:true,
                success:
                    function(){
                        $("#vendedor").removeAttr("disabled");// habilitar el select
                        $("#vendedor").load(str);
                    }
            });

        }else{
            $("#vendedor option").remove();
        }
    });// FIN CARGAR LOS CLIENTES Y/O VENDEDORES EN EL SELECT (AGREGAR USUAARIO AL SISTEMA

} );//Fin Document ready

/* FUNCIONES */
//ENVIO DE DATOS DEL FORMULARIO
function EnviodeDatos(){
    $('#labelCodigo').hide();$('#labelDescripcion').hide();
    $('#labelPuntos').hide();$('#labelImagen').hide();$('#labelRol').hide();
    var user = $('#NombreUser').val();var nombre = $('#NombreUser2').val();
    var clave = $('#Contra').val();var clave2 = $('#Contra2').val();
    var rol = $('#rol option:selected').val();var idVendedor = $("#vendedorid option:selected").val();
    var vendedores = $("#vendedorid option:selected").text();
    //alert(rol);
    if (user=="") {$('#labelNombre').show(); return false;}
    if (clave=="") {$('#labelPass').show();return false;}
    if (clave2=="") {$('#labelPass2').show();return false;}
    if (rol=="") {$('#labelRol').show();return false;}
    if (clave!=clave2) {$('#labelPass2').show();return false;}
    if (rol == 3 && idVendedor =="") {$('#labelVendedor').show();return false;}
    else{        
        if(vendedores=='SELECCIONE VENDEDOR'){
            vendedores = '0';idVendedor='0';
        }$('#Adduser').hide();$('.progress').show();
        $.ajax({
            url: "NuevoUsuario/"+user+"/"+nombre+"/"+clave+"/"+rol+"/"+vendedores+"/"+idVendedor,
            type: "post",
            async:true,
            success:
                function(json){
                    Materialize.toast('EL USUARIO SE AGREGÓ CORRECTAMENTE', 3000);
                    var myVar = setInterval(myTimer, 2000);
                }
            });
        }
    }

function myTimer() {
    $(location).attr('href',"Usuarios");
}

//CAMBIAR DE ESTADO AL USUARIO EKISDE
function DellUsers(IdUser, Estado){
    $('#CsUser').openModal();

    if(Estado==1){
        $("p").html("DESEA CAMBIAR EL ESTADO ACTIVO AL USUARIO");
    }else{
        $("p").html("DESEA CAMBIAR EL ESTADO INACTIVO AL USUARIO");
    }

    $("#DellUsers").click(function(){
        $('#progressActUser').show();
        $('#TbCatalogo').hide();
        $.ajax({
            url: "ActUser/"+IdUser+"/"+Estado,
            type: "post",
            async:true,
            success: function(json){
                 $(location).attr('href',"Usuarios");
            }
        });
    });
}

function AddClients(){
    //$('#CsUser').openModal();
    $('#ClienteAdd tr').each( function () {
        if($(this).is('.selected')) {
            var cliente = $(this).find("td").eq(0).html();

            console.log(cliente);
            var patron="%20";

            var cadena=cliente.replace(patron,'');
            console.log(cadena);
            $.ajax({
                url: "FindClient/"+cadena,
                type: "post",
                async:true,
                success: function(json){
                   $(location).attr('Clientes');
                }
            });

        }

    });
}
    function exportar(formulario)
    {
        document.getElementById(formulario).submit();
    }

/*funcion para ingresar un nuevo articulo al catalogo*/
function subirimagen()
{    
    var file2 = $('#txtimagen').val().replace(/C:\\fakepath\\/i, '');
    //alert(file);
    var codigo = file2.split(".");
    //$('#txtimagen').hide(); 
    // $('#cargar22').hide();
    $('#labelCodigo').hide();   $('#labelDescripcion').hide();
    $('#labelPuntos').hide();   $('#labelImagen').hide();
    if ($('#bandera')==0){
    if ($('#txtimagen').val()=="") {$('#labelImagen').show(); return false;}
    if(codigo[0]!=$('#codigoArto').val()){$('#labelImagen3').show();return false;}
    }
    
    if ($('#codigoArto').val()=="") {$('#labelCodigo').show();return false;}
    if ($('#NombArto').val()=="") {$('#labelDescripcion').show();return false;}
    if ($('#PtArto').val()=="") {$('#labelPuntos').show();return false;} 
    else{   
    $('#agregar').hide();$('#loadIMG').show();
    //var file = $('input[type=file]').val().replace(/C:\\fakepath\\/i, '')
            var formData = new FormData($('#formimagen')[0]);
            //alert(formData[0]);
            $.ajax({
                url: "verificarImg/"+$('#bandera').val(),
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos)
                {
                    if (datos!=0) {
                    $("#mensajeIMG").html(datos);
                    $('#modalIMG').openModal(); 
                    $('#agregar').show();
                    $('#loadIMG').hide();
                    }else{
                        $('#formimagen').submit();
                    }
                }
            });
        }
}
/*funcion para editar un articulo*/
/*function guardarEditarArticulo()
{    
    $('#txtimagen2').hide(); $('#cargar222').hide();
    var file = $('#txtimagen2').val().replace(/C:\\fakepath\\/i, '');
    var codigo = file.split(".");
    $('#labelCodigo2').hide();   $('#labelDescripcion2').hide();
    $('#labelPuntos2').hide();   $('#labelImagen2').hide();
    if ($('#txtimagen2').val()=="") {$('#labelImagen2').show(); return false;}   
    if ($('#codigoArto2').val()=="") {$('#labelCodigo2').show();return false;}
    if ($('#NombArto2').val()=="") {$('#labelDescripcion2').show();return false;}
    if ($('#PtArto2').val()=="") {$('#labelPuntos2').show();return false;}
    if(codigo[0]!=$('#codigoArto2').val()){$('#labelImagen3').show();return false;}
    else{   
    $('#agregar2').hide();$('#loadIMG2').show(); 
            var formData = new FormData($("#formimagen2")[0]);
            $.ajax({
                url: "verificarImg",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos)
                {
                    if (datos!=0) {
                    $("#mensajeIMG2").html(datos);
                    $('#modalIMG2').openModal(); 
                    $('#agregar2').show();
                    $('#loadIMG').hide();
                    }else{
                        $('#formimagen2').submit();
                    }
                }
            });
        }
}*/
/*funcion para mandar a traer el catalogo de productos pasado EKISDE*/
    $('#cmbCatalogos').change(function(){
        Objtable = $('#tblCatalogoPasado').DataTable();
            Objtable.destroy();
            Objtable.clear();
            Objtable.draw();
            $('#tblCatalogoPasado').DataTable({
                "order": [[ 1, "desc" ]],
                ajax: "AjaxCatalogoPasado/"+ this.value,
                "info":    false,
                "bPaginate": false,
                "paging": false,
                "pagingType": "full_numbers",
                "lengthMenu": [[10, -1], [10, "Todo"]],
                "language": {
                    "emptyTable": "No hay datos disponibles en la tabla",
                    "lengthMenu": '_MENU_ ',
                    "search": '<i class=" material-icons">search</i>',
                    "loadingRecords": "",
                    "paginate": {
                        "first": "Primera",
                        "last": "Última ",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    }
                },
               columns: [
                    { "data": "CodigoImg" },
                    { "data": "Nombre" },
                    { "data": "Imagen" },
                    { "data": "Puntos" },
                    { "data": "check" }
              ]
            });
        $('#listaArticulos').openModal();
    });
    $("#aceptarIMG2").click(function(){
        $('#formimagen2').submit();
    });
    $("#aceptarIMG").click(function(){
        $('#formimagen').submit();
    });
    /*RECORRER LAS FILAS CHEKEADAS Y AGREGARLAS A LA TABLA DE CATALOGO ACTUAL EKISDE*/
    $('#addCatalogoAntiguo').click(function(){
         $("#tblCatalogoPasado input:checkbox:checked").each(function(index) {
            var valores = "";
            var table = $('#tblCatalogoActualModal').DataTable();
            var campo1 = "";
            var campo2 = "";
            var campo3 = "";
            var campo4 = ""; var campo5 = ""; var bandera = 0; 
            $(this).parents("tr").find("td").each(function(){
                switch($(this).parent().children().index($(this))) {//obtengo el index de la columna EKISDE
                    case 0:
                        campo1 = $(this).html();
                        break;
                    case 1:
                        campo2 = $(this).html();
                        break;
                    case 2:
                        campo3 = $(this).html();
                        break;
                    case 3:
                        campo4 = $(this).html()+'<input id="'+campo1+'" type="hidden" value="'+$('#cmbCatalogos').val()+'"/>';
                        break;
                    case 5:
                        campo5 = $(this).html();
                        break;
                    default:x="";
                }
            });/*valido si el articulo ya esta agregado*/
            table.cells().eq(0).each( function ( index ) {
                var cell = table.cell(index);             
                var data = cell.data();
                if (campo1 == data) {bandera=1;};
            } );
            if (bandera == 0) {
            table.row.add([
                        campo1,
                        campo2,
                        campo3,
                        campo4
                    ]).draw(false);var $toastContent = $('<span class"center">ARTÍCULO AGREGADO</span>');
            Materialize.toast($toastContent, 2500,'rounded');
            }
            else{
                var $toastContent = $('<span class="center">EL ARTICULO: <h6 class="negra noMargen">"'+campo2+'"</h6> YA ESTA AGREGADO</span>');
                Materialize.toast($toastContent, 3500,'rounded error');
            }
        });
    });

    function ActualizarPuntos(codImagen,IdCatalogo) {
        $('#tblCatalogoActual').hide();
        $('.progress2').show();
        $.ajax({
            url: "actualizarPuntos/"+codImagen+"/"+IdCatalogo+"/"+$('#'+codImagen).val(),
            type: "get",
            async:true,
            success: function(json){
                $(location).attr('href','NuevoCatalogo');
            }
        });
        //$('#tblCatalogoActual').show();
    }
    $("#darBajaOK").on('click',function(){

    $('#EditEstado').show();$('#darBajaOK').hide();
    var form_data = {
                idarticulo: idImagenGlobal,
                catalogo: IdCatalogoGlobal
                };
        $.ajax({
                url: "ActualizarEstadoArticulo",
                type: "post",
                async:true,
                data: form_data,
                success:
                    function(json){
                        var myVar = setInterval(myTimer3, 2000);
                    }
                });
    });
    function myTimer3() {
        Materialize.toast('SE GUARDARON LOS CAMBIOS EN EL CATALOGO, ESPERE..', 1000);
        $(location).attr('href',"Catalogo");
    }
     /*metodo para guardar el catalogo, con los nuevos articulos agregados*/
    $("#guardarCatalogo").on('click',function(){
            var contador = 0; var table2 = $('#tblCatalogoActualModal').DataTable();
            var rowCount = table2.page.info().recordsTotal;
            var codigo = ""; var articulo = ""; 
            var puntos = ""; var IdCatalogoArticulo = ""; var bandera = 0; 
            var IdCatalogo = $('#IdCatalogoActual').val(); $('#guardarCatalogo').hide();
            var table = $('#tblCatalogo2').DataTable();            
            $('.progress2').show();$('#tblCatalogoActualModal').hide();
            $("#tblCatalogoActualModal tbody tr").each(function(index) {
                $(this).children("td").each(function(index2){/*metodo para recorrer la tabla*/
                    switch($(this).parent().children().index($(this))) {//obtengo el index de la columna EKISDE
                        case 0:
                            codigo = $(this).html();
                            break;
                        case 1:
                            articulo = $(this).html();
                            break;
                        case 2:
                            break;
                        case 3:
                            puntos = $(this).html().split("<");
                            puntos = puntos[0];
                            IdCatalogoArticulo = $('#'+codigo+'').val();
                            break;
                        default: 
                    }
                });
                
            table.cells().eq(0).each( function ( index ) {/*VALIDO SI EL ARTICULO YA ESTA AGREGADO EN LA TABLA*/
                var cell = table.cell(index);             
                var data = cell.data();
                if (codigo == data) {bandera=1;};
            } );
            if (bandera!=1) {
            var form_data = {
                codigo: codigo,
                puntos: puntos,
                articulo: articulo,
                IdCatalogo: IdCatalogo,
                IdCatalogoArticulo: IdCatalogoArticulo
                };
             $.ajax({
                url: "actualizarCatalogo",
                type: "post",
                async:true,
                data: form_data,
                success:
                    function(json){
                        contador++;
                        alert(rowCount+" contador "+ contador);
                        if (contador==rowCount) {var myVar = setInterval(myTimer2, 3500);};
                    }
                });}
             else{
                var $toastContent = $('<span class="center">EL ARTICULO: <h6 class="negra noMargen">"'+articulo+'"</h6> YA EXISTE Y NO SE AGREGO</span>');
                Materialize.toast($toastContent, 3500,'rounded error');
                }
            });
    });
    function myTimer2() {
        Materialize.toast('SE GUARDARON LOS CAMBIOS EN EL CATALOGO, ESPERE...', 3000);
        $(location).attr('href',"Catalogo");
    }

    function darBaja(r){
         var table = $('#tblCatalogoActualModal').DataTable();
         
            $('#tblCatalogoActualModal tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            } );         
            $('#button').click( function () {
                table.row('.selected').remove().draw( false );
            } );
    }
    function darBaja(idImagen,IdCatalogo){
         $('#darBaja').openModal();
         idImagenGlobal = idImagen;
         IdCatalogoGlobal = IdCatalogo;
      } 
    $("#CrearCatalogo").on('click',function(){
        $('#labelDescripcion').hide();  $('#labelFecha2').hide();
        $('#labelDescripcion2').hide();
        if ($('#descripcionCat').val()=="") {$('#labelDescripcion2').show(); return false;}   
        if ($('#fechaCat2').val()=="") {$('#labelFecha2').show();return false;}
    else{
        $('#CrearCatalogo').hide();
        $('#formNuevoCatalogo').submit();
        }
    });

    $("#BtnFiltroReporte").click(function() {        
        var Cls = $("#idCliente").val();    var f1  = $("#fecha1").val();
        var f2  = $("#fecha2").val();
        $("#divFecha,#divFecha2").show(); $("#loadEstadoFactura").show();
        $("#tituloReport1,#tituloReport2,#divCliente,#divCliente2").show();
        $("#Modal1Fecha1").html(f1);    $("#Modal1Fecha2").html(f2);
        if (f1=="" || f2==""){
            f1=0;f2=0;
            $("#divFecha,#divFecha2").hide();
        };
        if(Cls == 0){
            $("#tituloReport1,#tituloReport2,#divCliente,#divCliente2").hide();
        }
        if($('#R1').is(':checked') ){            
            Objtable = $('#tblEstadoFactura').DataTable();
            Objtable.destroy();
            Objtable.clear();
            Objtable.draw();
            $('#tblEstadoFactura').DataTable({
                "order": [[ 1, "desc" ]],
                ajax: "ajaxEstadoFacturas/"+Cls+"/"+f1+"/"+f2,
                "info":    false,
                "bPaginate": false,
                "paging": true,
                "pagingType": "full_numbers",
                "lengthMenu": [[10, -1], [10, "Todo"]],
                "language": {
                    "emptyTable": "No hay datos disponibles en la tabla",
                    "lengthMenu": '_MENU_ ',
                    "search": '<i class=" material-icons">search</i>',
                    "loadingRecords": "",
                    "paginate": {
                        "first": "Primera",
                        "last": "Última ",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    }
                },
               columns: [
                    { "data": "NUMERO" },
                    { "data": "FECHA" },
                    { "data": "FACTURA" },
                    { "data": "COD_CLIENTE" },
                    { "data": "CLIENTE" },
                    { "data": "ESTADO" }
              ]
            });
            $('#EstadoFactura').openModal();
            $('#tblEstadoFactura').on( 'init.dt', function () {
                $("#loadEstadoFactura").hide();
            }).dataTable();
            
        }
        if($('#R2').is(':checked') ){
            $('#loadDisponiblePuntos').show();
            Objtable = $('#tblDisponibilidadPuntos').DataTable();
            Objtable.destroy();
            Objtable.clear();
            Objtable.draw();
            $('#tblDisponibilidadPuntos').DataTable({
                "order": [[ 1, "desc" ]],
                ajax: "ajaxDisponibilidadPuntos/"+Cls+"/"+f1+"/"+f2,
                "info":    false,
                "bPaginate": false,
                "paging": true,
                "pagingType": "full_numbers",
                "lengthMenu": [[10, -1], [10, "Todo"]],
                "language": {
                    "emptyTable": "No hay datos disponibles en la tabla",
                    "lengthMenu": '_MENU_ ',
                    "search": '<i class=" material-icons">search</i>',
                    "loadingRecords": "",
                    "paginate": {
                        "first": "Primera",
                        "last": "Última ",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    }
                },
               columns: [
                    { "data": "NUMERO" },
                    { "data": "FECHA" },
                    { "data": "FACTURA" },
                    { "data": "COD_CLIENTE" },
                    { "data": "CLIENTE" },
                    { "data": "P_ACUMULADOS" },
                    { "data": "P_DISPONIBLES" },
                    { "data": "ESTADO" }
              ]
            });
            $('#tblDisponibilidadPuntos').on( 'init.dt', function () {
                $("#loadDisponiblePuntos").hide();
            }).dataTable();
            $('#DisponiblePuntos').openModal();            
        }        
    });

    $('#sFactura').on( 'keyup', function () {
        $('#tblFacturas').DataTable().search( this.value ).draw();
    } );

    /*$("#idPreloader,#getOneFactura,#getAllFactura").hide();
    $("#search").keypress(function(e) {
        if(e.which == 13) {
            var filtro = $("#search").val();
            $("#getOneFactura,#getAllFactura").hide();
            if ((!jQuery.isEmptyObject(filtro)) && (filtro.length > 5)) {
                $("#idImgBack").hide();
                $("#idPreloader").show();
                if (filtro.toUpperCase().indexOf('CL') != -1) {
                    $("#getAllFactura").show();
                } else {
                    $("#getOneFactura").show();
                }
                $("#idPreloader").hide();
            } else{
                $("#idImgBack").show();
                alert("Contenido esta vacio o menor a 5 caracteres");
            }

        }
    });*/
    $( "#ListCliente").change(function() {
        var Cls = $(this).val();
        if(Cls !=0){
            $("#ClienteFRP,#ClienteFRPPremio").val(Cls);
            Objtable = $('#tblFacturaFRP').DataTable();
            Objtable.destroy();
            Objtable.clear();
            Objtable.draw();

            $('#tblFacturaFRP').DataTable({
                ajax: "getFacturaFRP/"+ Cls,
                "info":    false,
                "bPaginate": false,
                "paging": false,
                "pagingType": "full_numbers",
                "initComplete": function () {
                    var Total=0;
                    $('#tblFacturaFRP').DataTable().column(2).data().each( function ( value, index ) {
                        Total += parseInt(value);
                    } );

                    if (isNaN(Total)){ Total = 0;}
                    $("#PtsClientefrp").val(parseInt(Total));
                },
                columns: [
                    { "data": "FECHA" },
                    { "data": "FACTURA" },
                    { "data": "DISPONIBLE" },
                    { "data": "CAM1" },
                    { "data": "CAM2" },
                    { "data": "CAM3" },
                    { "data": "CAM4" },
                ]
            });

        }else{
            alert("No Selecciono ningun cliente");
        }
    });

    function DFactura(factura){
        $("#codFactura").text(factura);
        Objtable = $('#tblModal1').DataTable();
        Objtable.destroy();
        Objtable.clear();
        Objtable.draw();
        $('#tblModal1').DataTable({
            ajax: "getDetalleFactura/"+ factura,
            columns: [
                { "data": "COD_ARTICULO" },
                { "data": "ARTICULO" },
                { "data": "CANTIDAD" },
                { "data": "TT_PUNTOS" }
            ]
        });

    }
    $( "#ListCatalogo").change(function() {
        if ($("#ListCliente").val()!=0){

            var Prm = $(this).val();
            $("#CodPremioFRP").val(Prm);
            $("#CantPremioFRP").val("1");

            var form_data = {
                codigo: Prm
            };
            $.ajax({
                url: "viewPtsItemCatalogo",
                type: "post",
                async:true,
                data: form_data,
                success:
                    function(json){
                        $("#ValorPtsPremioFRP").val(json)
                    }
            });

        }else{
            alert("Seleccione un CLiente primero")
        }
    });

    $("#AddPremioTbl").on('click',function(){
        Objtable = $('#tblpRODUCTOS').DataTable();
        var cod= $( "#ListCatalogo option:selected" ).val();
        if (cod != 0){
            var name = $( "#ListCatalogo option:selected" ).html();
            var pts    = $("#ValorPtsPremioFRP").val();
            var cant   = $("#CantPremioFRP").val();
            var totalPts = parseInt(cant) * parseInt(pts);
            Objtable.row.add( [
                cant,
                cod,
                name,
                pts,
                totalPts,
                '<a href="#!" id="RowDelete" class="BtnClose"><i class="material-icons">highlight_off</i></a>'
            ] ).draw( false );

            var ttPts = 0;

            Objtable.column(4).data().each( function ( value, index ) {
                ttPts += parseInt(value);
            } );

            $("#idttPtsFRP").text(ttPts);

        }else{
            alert("Seleccione un Articulo del Catalogo");
        }
    });
    $('#tblpRODUCTOS tbody').on( 'click', 'tr', function () {

        $(this).toggleClass('selected');
    } );


    $("#tblpRODUCTOS").delegate("a", "click", function(){
        $('#tblpRODUCTOS').DataTable().row('.selected').remove().draw( false );
        var ttPts = 0;
        $('#tblpRODUCTOS').DataTable().column(4).data().each( function ( value, index ) {
            ttPts += parseInt(value);
        } );
        $("#idttPtsFRP").text(ttPts);
    });
    $("#cambiarImagen").on('click',function(){
        $('.cosaEdicion').hide();
        $('.cosa2').show();
        $(this).hide();
    });
     $('#subir').click( function () {
        $('#nuevoArticulo').openModal();$('#bandera').val(0);
        //$('#cargar22').trigger('click');
        $( 'img' ).remove( '#quitar' );
        $('#codigoArto').val("");$('#NombArto').val("");$('#PtArto').val("");
    } );
    function editarArticulo(imagen,codigo,descripcion,puntos) {
        $('#bandera').val(1);
        $('#codigoArto').val(codigo);
        $('#NombArto').val(descripcion);
        $('#PtArto').val(puntos);
        $('#nuevoArticulo').openModal();        
        $("#cargar22").trigger("click");
        document.getElementById("ImgContenedor").innerHTML = ['<img id="quitar" src="../assets/img/catalogo/'+imagen+'" title="', escape('Imagen_Actual'), '"/>'].join('');
    }
    function clientesPuntos(cliente,vendedor,ruc,codigo) {
        $('#loadIMG').show();$('#detalleCliente').hide();$('#modalPtsCliente').openModal();
        $('#nomCliente').text(cliente);$('#codCliente').text("COD: "+codigo);$('#rucCliente').text("RUC: "+ruc);
        $('#vendedorCliente').text(vendedor);
        $.ajax({//AJAX PARA TRAER LOS PUNTOS TOTALES DEL CLIENTE
                url: "PuntosCliente/"+codigo,
                type: "GET",
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(datos)
                {                    
                    //$("#AcuT").html(datos[0]['ACUMULADO']);
                    $.each(datos, function(i, item) {
                        $("#AcuT").html(item.ACUMULADO);
                        $("#Disp").html(item.DISPONIBLE);
                    });
                    $('#detalleCliente').show();
                    $('#loadIMG').hide();
                }
            });
    }
    // agrego evento para abrir y cerrar los detalles
    $('#PtosCliente').on('click', 'tbody .detallesFactura', function () {
        var table = $('#PtosCliente').DataTable();
        var tr = $(this).closest('tr'); $(this).addClass("detallesFacturOrange");
        var row = table.row(tr);
        var data = table.row( $(this).parents('tr') ).data();//obtengo todos los datos de la fila que di click
        //alert (data[1]); este es el dato de la segunda columna

        if (row.child.isShown()) {// esta fila ya se encuentra visible - cierrala
            row.child.hide();
            tr.removeClass('shown');
            $(this).removeClass("detallesFacturOrange");            
        } else {// muestra la fila
            $('#loader'+data[1]).show();
            $('#detail'+data[1]).hide();
            //$('.loadFlotante').show("slow");
            format(row.child,data[1],data[1]);
            tr.addClass('shown');
        }           
    });
    function format(callback,noPedido,div) {//funcion para traer llos datos y tabla de detalles
      var ia=0;
            $.ajax({
            url:'ajaxFacturasXcliente/'+noPedido,
            dataType: "json",
            complete: function (response) {
                var data = JSON.parse(response.responseText);
                console.log(data);
                    var thead = '',  tbody = '';
                    for (var key in data) {
                        thead += '<th class="negra center">FECHA</th>';
                        thead += '<th class="negra center">FACTURA</th>';
                        thead += '<th class="negra center">VENDEDOR</th>';
                        thead += '<th class="negra center">ACUMULADO</th>';
                        thead += '<th class="negra center">DISPONIBLE</th>';
                    }
                    $.each(data, function (i, d) {
                      $.each(d, function (a, b) {
                         ia++;
                      });
                        for (var x=0; x<ia; x++) {
                        tbody += '<tr class="center">' +
                                      '<td>' + d[x]["FECHA"] + '</td>'+
                                      '<td class="negra">' + d[x]["FACTURA"] + '</td>'+
                                      '<td>' + d[x]["VENDEDOR"] + '</td>'+
                                      '<td>' + d[x]["ACUMULADO"] + '</td>'+
                                      '<td>' + d[x]["DISPONIBLE"] + '</td>'+
                                  '</tr>';
                          }                   
                    });
                //console.log('<table>' + thead + tbody + '</table>');
                callback($('<table id="tblReportDetalles">' + thead + tbody + '</table>')).show();
                 $('#loader'+div).hide();
                 $('#detail'+div).show();
            },
            error: function () {
                $('#output').html('Hubo un error al cargar los detalles!');
            }
        });
      }

