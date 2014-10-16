/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var bPreguntar = true;
    
function preguntarAntesDeSalir()
{
  if (bPreguntar)
    return "¿Seguro que quieres salir?";
}

function submitDetailsForm() {
    bPreguntar = false;
    $("#formularioleyenda").submit();
}

function resetform(){
    if (confirm('Confirma la limpieza del formulario...?') == true) {
        window.onbeforeunload = showloader;
        return true;
    } else {
        return false;
    } 
}

var showleyendainfoarea = function(){
        $('#actionshowinfoarealeyenda').hide();
        $('.leyenda_formcontent #data').removeClass('col-md-12').addClass('col-md-8');
        $('#infoarealeyenda').show();
        $.cookie('panelinformacionleyenda', 'true', { path: '/' });
    },
    hideleyendainfoarea = function(){
        $('#infoarealeyenda').hide();
        $('.leyenda_formcontent #data').removeClass('col-md-8').addClass('col-md-12');
        $('#actionshowinfoarealeyenda').show();
        $.cookie('panelinformacionleyenda', 'false', { path: '/' });
    },
    initleyendainfoarea = function(){             
        if ($.cookie('panelinformacionleyenda') == 'false'){
           hideleyendainfoarea();
        }
    };

$(document).ready(function() {
    if(typeof $.cookie('panelinformacionleyenda') == "undefined") {
        $.cookie('panelinformacionleyenda', 'true', { path: '/' });
    }

    initleyendainfoarea();

    $('#datetimepicker').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        calendarWeeks: true,
        autoclose: true,
        todayHighlight: true
    });

    $('#masinfoleyenda').popover({
        html:true,
        placement:'auto',
        title: 'Información sobre la leyenda',
        content:function(){
            return $('.contentleyendainfo').html();
        }
    });
    $("#masinfoleyenda")
    .mouseenter(function() {
        $(this).popover('show');
    })
    .mouseleave(function() {
        $(this).popover('hide');
    });

    $("form .form-control").change(function() {
        window.onbeforeunload = preguntarAntesDeSalir;
    });         

    $('#actionshowinfoarealeyenda').click(function(){
        showleyendainfoarea();
    });
    $('#actionhideinfoarealeyenda').click(function(){
        hideleyendainfoarea();
    });
});      


