function showMenu(object){
    if($(object).parent().find("ul").eq(0).css("display") == 'block'){
        $(object).parent().find("ul").eq(0).hide();
    }else{
        $(object).parent().find("ul").eq(0).show();
    }
}
