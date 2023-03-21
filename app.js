$(document).ready(function(){
    var fecha = new Date();
    var dia = fecha.getDate();
    var mes = fecha.getMonth() + 1;
    var ano = fecha.getFullYear();
    var miFecha = ano + "-" + mes.toString().padStart(2,0) + "-" + dia.toString().padStart(2,0);
    $('#txtfecha').val(miFecha);
});