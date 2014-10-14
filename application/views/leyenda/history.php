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
    #infoareahistory .tamaniolabel{
        font-size: 16px;
    }
</style>

    <div class="row history_formcontent">
        <h1 style="font-size: 45px;font-weight: bold;border-bottom: 1px solid #DBDBDB;margin-right: 39%;padding-bottom: 5px;"><i class="fa fa-table fa-2x"></i> Histórico de leyendas</h1>
        <br/>
        <div class="col-md-9">
            <?php echo $historytable; ?>
        </div>
        <div id="infoareahistory">
            <div class="col-md-3" style="border-left: 1px solid rgba(209, 209, 209, 0.5);">
                <div class="row" style="padding-bottom: 30px;">
                    <div class="col-md-2">
                        <i class="fa fa-info-circle fa-5x"></i>
                    </div>
                    <div class="col-md-10" style="padding: 16px 0 0 34px;">
                        <span style="font-size: 28px; font-weight: bold; display: block; ">Información</span>
                        <span style="font-size: 13px; position: absolute; margin-top: -8px;">que debe saber...</span>
                    </div>
                </div>
               
                <div style="line-height: 22px;font-size: 12px">
                    <span>Rejilla que muestra el histórico de leyendas que se han usado año con año.</span>
                    <br/><br/>
                    La columna <span class="label label-default tamaniolabel">Año</span> indica el año que es o fue utilizada la leyenda.
                    La columna <span class="label label-default tamaniolabel">Núm. Decreto</span> ó <b>Número de decreto</b> indica el dato identificativo con el cual se decretó la leyenda.
                    La columna <span class="label label-default tamaniolabel">Leyenda</span> muestra la cadena de leyenda que es o fue utilizada en el año correcpondiente.
                    La columna <span class="label label-default tamaniolabel">Fecha Decreto</span> especifica la fecha en que fué decretada la leyenda.
                    La columna <span class="label label-default tamaniolabel">Fecha Registro</span> indica la fecha en que se registró en el sistema la leyenda y por lo tanto a partir del cuál el servicio WEB publicó la leyenda correspondiente.
                    <br/><br/>
                    La fila de la rejilla con color de <b>fondo oscuro</b> indica la <span class="label label-success tamaniolabel">leyenda actual</span>.
                    El grid permite filtrar los registros en el área de <span class="label label-success tamaniolabel">buscar</span>, así como <span class="label label-warning tamaniolabel">paginar</span> y cambiar los <span class="label label-warning tamaniolabel">resultados por página</span>
                </div>
            </div>
        </div>
    </div>

<script language="JavaScript" type="text/javascript"> 
    $(document).ready(function() {
        $('#historytable').DataTable({
            "lengthMenu": [[3, 5, 10, 25, 50, 100, -1], [3, 5, 10, 25, 50, 100, "Todos"]],
            "order": [[ 0, "desc" ]],
            "iDisplayLength" : 5,
            "bProcessing": true,
            "pagingType": "full_numbers",
            "language": { 
                "url": "<?php echo base_url(); ?>application/assets/dataTables-1.10.3/media/resourses/lang/datatables.spanish.lang"                
            },
            "columnDefs": [
                {
                    "targets": [ 5 ],
                    "visible": false,
                    "searchable": false
                }
            ],
            "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                if ( aData[5] == "true" )
                { 
                    $('td',nRow).css('background-color',"#cacaca");
                }
            }
        });
    });
</script>