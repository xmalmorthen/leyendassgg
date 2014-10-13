<style type="text/css">
    .history_formcontent{
        padding: 0px 30px 120px 30px;
    }
    #history_formbody {
        padding: 20px;
    }
    #history_formbody .espacio{
        padding: 10px 0;        
    }
    #history_formbody i{
        margin-left: -5px;
    }
    #history_formbody div span{
        font-size: 20px;
        color: #575757;
    }
    #history_formbody textArea{
        max-width: 100%;
        max-height: 150px;
    }
    #history_formbody .btn-entrar {
        background-color: #119548;
        transition: background-color 0.5s ease-in;
        color: #fff;
        border: none;
        padding: 15px 30px;
        float: right;
    }
    #history_formbody .btn-entrar:hover {
        background-color: #15b457;
    }
    .field-validation-error {
        color: #f00;
    }
    #infoareahistory span{
        font-size: 20px;
        
    }
    #infoareahistory .espacio{
        padding: 17px 0 0 20px;
    }
</style>

    <div class="row history_formcontent">
        <h1 style="font-size: 45px;font-weight: bold;border-bottom: 1px solid #DBDBDB;margin-right: 39%;padding-bottom: 5px;"><i class="fa fa-table fa-2x"></i> Histórico de leyendas</h1>
        <br/>
        <div class="col-md-9" style="border-right: 1px solid rgba(209, 209, 209, 0.5);">                     
            <?php echo $historytable; ?>
        </div>
        <div id="infoareahistory">
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-2">
                        <i class="fa fa-info-circle fa-5x"></i>
                    </div>
                    <div class="col-md-10" style="padding: 16px 0 0 34px;">
                        <span style="font-size: 28px; font-weight: bold; display: block; ">Información</span>
                        <span style="font-size: 13px; position: absolute; margin-top: -8;">que debe saber...</span>
                    </div>
                </div>
               
                <!--<div class="row espacio" >
                    <div class="col-md-2">
                        <i class="fa fa-asterisk fa-2x"></i>
                    </div>
                    <div class="col-md-10">
                        <span>Campos requeridos</span>
                    </div>
                </div>
                <div class="row espacio">
                    <div class="col-md-7">
                        <span>Número de decreto</span>
                    </div>
                    <div class="col-md-3" style="padding: 12px 0 0 0;">
                        <span></span>
                    </div>
                </div>-->
            </div>
        </div>
    </div>

<script language="JavaScript" type="text/javascript"> 
    $(document).ready(function() {
        $('#historytable').DataTable({
            "lengthMenu": [[3, 5, 10, 25, 50, 100, -1], [3, 5, 10, 25, 50, 100, "Todos"]],
            "pagingType": "full_numbers",
            "language": { 
                "url": "<?php echo base_url(); ?>application/assets/dataTables-1.10.3/media/resourses/lang/datatables.spanish.lang"
            }
        });
    });
</script>