var activo = false;
$(document).ready(function() {

$('.datepicker').pickadate({ 
        selectMonths: true,selectYears: 15,format: 'dd-mm-yyyy',
        monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        weekdaysFull: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
        showMonthsShort: undefined,showWeekdaysFull: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],today: 'Hoy',
        clear: 'BORRAR',close: 'CERRAR' });

    //$('#listaArticulosCatalogoActual').openModal();
    $('select').material_select();

$('#txtimagen').change(function(){
    //var filename = $('input[type=file]').val().replace(/C:\\fakepath\\/i, '');
    var file = $('input[type=file]').val().replace(/C:\\fakepath\\/i, '')
    var codigo = file.split(".");$('#codigoArto').val(codigo[0]);
});
var idImagenGlobal;
var IdCatalogoGlobal;
$('#tblCatalogoActual').DataTable( {
            "info":    false,
            "bPaginate": false,
            "lengthMenu": [[5,10,50,100,-1], [5,10,50,100,"Todo"]],
            "language": {
                "paginate": {
                    "first":      "Primera",
                    "last":       "Última ",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
                "lengthMenu": "MOSTRAR _MENU_ REGISTORS",
                "search":     "BUSCAR"
            }
        });
$('#tblCatalogoPasado').DataTable( {
            "info":    false,
            "bPaginate": true,
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
$('#tblCatalogoActualModal').DataTable( {
            "scrollY":        "280px",
            "scrollCollapse": true,
            "paging":         false,
            "info":    false,
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
                var table2 = $('#tblCatalogoActualModal').DataTable();
                $('#tblCatalogoActualModal tbody').on( 'click', 'tr', function () {
                    $(this).toggleClass('selected');
                } );
            } );         
            $('#btnborrarSeleccionados').click( function () {
                var table2 = $('#tblCatalogoActualModal').DataTable();
                table2.row('.selected').remove().draw( false );
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
    $('#tblFREimpre,#TbCatalogo,#TblMaVinetas,#MCXP,#tblEliminar,#ClienteAdd,#BajaCliente,#PtosCliente,#FRP,#tblpRODUCTOS,#tblModals,#tblCatalogo2').DataTable(
        {
            "info":    false,
            "searching": false,
            "bLengthChange": false,
            "lengthMenu": [[5,16,32,100,-1], [5,16,32,100,"Todo"]],
            "language": {
                "paginate": {
                    "first":      "Primera",
                    "last":       "Última ",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
                "lengthMenu":"MOSTRAR _MENU_",
                "emptyTable": "No hay datos disponibles en la tabla",
                "search":     "<i class='material-icons'>search</i>" 
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

    /********/
    $('#ClienteAdd tbody').on( 'click', 'tr', function () {
        if($(this).hasClass('odd')){
            $(this).removeClass('odd');
            $(this).toggleClass('selected');
        }else{
            $(this).removeClass('even');
            $(this).toggleClass('selected');
        }
    } );
} );//Fin Document ready

/* FUNCIONES */
//ENVIO DE DATOS DEL FORMULARIO
function EnviodeDatos(){
    $('#labelCodigo').hide();
    $('#labelDescripcion').hide();
    $('#labelPuntos').hide();
    $('#labelImagen').hide();
    if ($('#NombreUser').val()=="") {$('#labelNombre').show(); return false;}
    if ($('#Contra').val()=="") {$('#labelPass').show();return false;}
    if ($('#rol').val()==null) {$('#labelRol').show();return false;}
    //if ($('#vendedorid').val()==null) {$('#labelVendedor').show();return false;}
    else{
        var user = $('#NombreUser').val();/*LA INGRID TENIA VALUE Y getelementById DE JAVASCRIPT INGRID POR DIOS!!*/
        var clave = $('#Contra').val();/*LA INGRID TENIA VALUE Y getelementById DE JAVASCRIPT INGRID POR DIOS!!*/
        var rol = $('#rol').val();/*LA INGRID TENIA VALUE Y getelementById DE JAVASCRIPT INGRID POR DIOS!!*/
        var vendedores = $("#vendedorid option:selected").text();/*LA INGRID TENIA VALUE Y getelementById DE JAVASCRIPT INGRID POR DIOS!!*/
        if(vendedores=='SELECCIONE VENDEDOR'){
            vendedores = '0';
        }$('#Adduser').hide();$('.progress').show();
        $.ajax({
            url: "NuevoUsuario/"+user+"/"+clave+"/"+rol+"/"+vendedores,
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
function myTimer2() {
    Materialize.toast('SE GUARDARON LOS CAMBIOS EN EL CATALOGO, ESPERE..', 3000);
    $(location).attr('href',"NuevoCatalogo");
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
    //exportar a excel
    function generar_reporte_excel(){
        document.getElementById('FrmClientes').submit();
    }
    //Exportar a PDF
    function  generar_reporte_pdf(){
        document.getElementById('FrmClientes').submit();
    }
function subirimagen()
{    
    $('#labelCodigo').hide();   $('#labelDescripcion').hide();
    $('#labelPuntos').hide();   $('#labelImagen').hide();
    if ($('#txtimagen').val()=="") {$('#labelImagen').show(); return false;}   
    if ($('#codigoArto').val()=="") {$('#labelCodigo').show();return false;}
    if ($('#NombArto').val()=="") {$('#labelDescripcion').show();return false;}
    if ($('#PtArto').val()=="") {$('#labelPuntos').show();return false;} 
    else{   
    $('#agregar').hide();$('#loadIMG').show(); 
    var file = $('input[type=file]').val().replace(/C:\\fakepath\\/i, '')
            var formData = new FormData($("#formimagen")[0]);
            $.ajax({
                url: "verificarImg",
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
/*funcion para mandar a traer el catalogo de productos pasado EKISDE*/
    $('#cmbCatalogos').change(function(){
        Objtable = $('#tblCatalogoPasado').DataTable();
            Objtable.destroy();
            Objtable.clear();
            Objtable.draw();
            $('#tblCatalogoPasado').DataTable({
                "order": [[ 3, "desc" ]],
                ajax: "AjaxCatalogoPasado/"+ this.value,
                "info": false,
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
            Materialize.toast($toastContent, 3500,'rounded');
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
        $('#tblCatalogoActualModal').hide();
        $('.progress2').show();
        $('#guardarCatalogo').hide();
        $('#darBaja').closeModal();
    });
     /*metodo para guardar el catalogo, con los nuevos articulos agregados*/
    $("#guardarCatalogo").on('click',function(){
            var codigo = ""; var articulo = ""; 
            var puntos = ""; var IdCatalogoArticulo = ""; var bandera = 0; 
            var IdCatalogo = $('#IdCatalogoActual').val(); $('#guardarCatalogo').hide();
            var table = $('#tblCatalogoActual').DataTable();
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
                        var myVar = setInterval(myTimer2, 2000);
                    }
                });}
             else{
                var $toastContent = $('<span class="center">EL ARTICULO: <h6 class="negra noMargen">"'+articulo+'"</h6> YA EXISTE Y NO SE AGREGO</span>');
                Materialize.toast($toastContent, 3500,'rounded error');
                var myVar = setInterval(myTimer2, 2000);}
            });
    });

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
    $("#CrearCatalogo").on('click',function(){
        $('#labelDescripcion').hide();  $('#labelFecha').hide();
        if ($('#descripcionCat').val()=="") {$('#labelDescripcion').show(); return false;}   
        if ($('#fechaCat').val()=="") {$('#labelFecha').show();return false;}
    else{
        $('#CrearCatalogo').hide();
        $('#formNuevoCatalogo').submit();
        }
    });