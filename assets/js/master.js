window.onbeforeunload = showloader;
function showloader()
{
    $.isLoading({ text: "Cargando..." });    
}

$(document).ready(function() {       
    if (!Modernizr.borderradius) {
        window.location= $site_url +  "/error/compatibilidad";
    };
    
    $(document.body).tooltip({ selector: "[title]"});
});
