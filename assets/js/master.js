window.onbeforeunload = showloader;
function showloader()
{
    $.isLoading({ text: "Cargando..." });    
        
    /*var loader=document.getElementById("loaderdiv");
    loader.style.display = 'block';*/
}

$(document).ready(function() {       
    if (!Modernizr.borderradius) {
        window.location= $site_url +  "/error/compatibilidad";
    };
    
    $(document.body).tooltip({ selector: "[title]"});
});
