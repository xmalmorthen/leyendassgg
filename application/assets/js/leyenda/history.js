var showhistoryinfoarea = function(){
            $('#actionshowinfoareahistory').hide();
            $('.history_formcontent #data').removeClass('col-md-12').addClass('col-md-9');
            $('#infoareahistory').show();
            $.cookie('panelinformacionhistory', 'true', { path: '/' });
        },
        hidehistoryinfoarea = function(){
            $('#infoareahistory').hide();
            $('.history_formcontent #data').removeClass('col-md-9').addClass('col-md-12');
            $('#actionshowinfoareahistory').show();
            $.cookie('panelinformacionhistory', 'false', { path: '/' });
        },
        inithistoryinfoarea = function(){          
            if ($.cookie('panelinformacionhistory') == 'false'){
               hidehistoryinfoarea();
            }
        };
    
    $(document).ready(function() {
        if(typeof $.cookie('panelinformacionhistory') == "undefined") {
            $.cookie('panelinformacionhistory', 'true', { path: '/' });
        }
        
        inithistoryinfoarea();
        
        $('#actionshowinfoareahistory').click(function(){
            showhistoryinfoarea();
        });
        $('#actionhideinfoareahistory').click(function(){
            hidehistoryinfoarea();
        });
    });

