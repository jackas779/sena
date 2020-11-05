<script>
  //scrip editar proveedores
$(document).ready(function(){
  $('.act_btn').click(function(e){
    e.preventDefault();
    var producto = $(this).attr('prod');
    var action = 'infocate';
    $.ajax({
        type: "POST",
        url: "edit_prod_ajax.php",
        data: {actt:action,prov:producto},
        async:true,
        success: function (response) {
            if(response !='error'){
                $('#editar_prod').modal('show');
                var info = JSON.parse(response);
                $('#id_producto').val(info.id_product);
                $('#cod').val(info.id_product);
                $('#codigo_prod').val(info.codigo);
                $('#nombre_prod').val(info.nombre);
                $('#descripcion_prod').val(info.descripcion);
                $('#categoria_prod').val(info.id_categorias);
                $('#proveedor_prod').val(info.id_proveedor);
                $('#marca_prod').val(info.id_marca);  
                $('#prueba').val(info.nombre_prov); 
                $('label').val(info.nombre);    
            }
            if(response =='error'){
                alert("categoria inactiva");
            }
        },
        error:function(error){
            console.log(error);
        },
    });
   
    
});
//modal confirmacion eliminar proveedores
$('.delete_btn').click(function (e) { 
    e.preventDefault();

    var id_prod = $(this).closest('tr').find('.id_prod').text();
    $('#cod_id').val(id_prod);
    $('#eliminar_producto').modal('show');
});
// Funcion del modal de detalles
$('.info_btn').click(function(e){
    e.preventDefault();
    var producto = $(this).attr('prod');
    var action = 'infocate';
    $.ajax({
        type: "POST",
        url: "det_prod_ajax.php",
        data: {actt:action,prov:producto},
        async:true,
        success: function (response) {
            if(response !='error'){
                var info = JSON.parse(response);
                $('#id_prod_det').val(info.id_product);
                $('#cod_det').val(info.id_product);
                $('#codigo').val(info.codigo);
                $('#codigo_barras').val();
                $('#nombre_det').val(info.nombre);
                $('#descripcion_det').val(info.descripcion);
                $('#existencia_det').val(info.existencia);
                $('#categoria_det').val(info.cat_descripcion); 
                $('#marca_det').val(info.nombre_marca);
                $('#proveedor_det').val(info.nombre_prov);
                $('#fecha_cre_det').val(info.fecha_creacion);
                $('#usuario_cre_det').val(info.usuario_creacion);       
                $('#fecha_mod_det').val(info.fecha_modificacion); 
                $('#usuario_mod_det').val(info.usuario_modificacion);             

            }
            if(response =='error'){
                alert("categoria inactiva");
            }
        },
        error:function(error){
            console.log(error);
        },
    });
    $('#exampleModalLong').modal('show');
    
});
//modal agregar existencias
$('.add_btn').click(function (e) { 
    e.preventDefault();
    var producto = $(this).attr('prod');
    var action = 'infocate';
    $.ajax({
        type: "POST",
        url: "det_prod_ajax.php",
        data: {actt:action,prov:producto},
        async:true,
        success: function (response) {
            if(response !='error'){
                var info = JSON.parse(response);
                $('#id_product').val(info.nombre);
                $('#id').val(info.id_product);
                $('#exis').val(info.existencia);
            }
            if(response =='error'){
                alert("categoria inactiva");
            }
        },
        error:function(error){
            console.log(error);
        },
    });
    $('#existencias_modal').modal('show');
});
//modal obsoletos
$('.obs_btn').click(function (e) { 
    e.preventDefault();
    var producto = $(this).attr('prod');
    var action = 'infocate';
    $.ajax({
        type: "POST",
        url: "det_prod_ajax.php",
        data: {actt:action,prov:producto},
        async:true,
        success: function (response) {
            if(response !='error'){
                var info = JSON.parse(response);
                $('#id_pro').val(info.nombre);
                $('#id_prod').val(info.id_product);
                $('#exist').val(info.existencia);
                $('#cod_pr').val(info.codigo);
                $('#nom_pr').val(info.nombre);
            }
            if(response =='error'){
                alert("categoria inactiva");
            }
        },
        error:function(error){
            console.log(error);
        },
    });
    $('#obsoletos_modal').modal('show');
});
});
</script>
