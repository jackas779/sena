$(document).ready(function(){

//modal actualizar categorias
$('.act_btn').click(function(e){
    e.preventDefault();
    var categoria = $(this).attr('cat');
    alert(categoria);
});
//modal confirmacion eliminar categorias
$('.delete_btn').click(function (e) { 
    e.preventDefault();

    var id_cat = $(this).closest('tr').find('.id_cat').text();
    console.log(id_cat);
    $('#cod_id').val(id_cat);
    $('#eliminar_categoria').modal('show');
});
});