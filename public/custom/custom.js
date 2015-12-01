
//Funcion para seleccionar el menu cuando se carga una vista
function seleccionarMenu(menu) {
    //Eliminamos todas las selecciones que haya
    $(".page-sidebar>ul>li.active").removeClass("active");
    //Seleccionamos el nuevo menu
    $("li:contains('" + menu + "')").addClass("active");
}