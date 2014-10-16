<link rel="stylesheet" href="<?php echo base_url(ASSETS .'css/leyenda/history.css'); ?>">
<div class="row history_formcontent">
    <i id="actionshowinfoareahistory" class="fa fa-info-circle fa-5x" title="Mostrar información de la página" style="float: right;margin-top: 43px;color: #941E1E;cursor: pointer; display: none"></i>
    <h1 style="font-size: 45px;font-weight: bold;border-bottom: 1px solid #DBDBDB;margin-right: 33%;padding-bottom: 5px;"><i class="fa fa-table fa-2x"></i> Histórico de leyendas</h1>
    <br/>
    <div id="data" class="col-md-9">
        <?php echo $historytable; ?>
    </div>
    <div id="infoareahistory">
        <div id="info" class="col-md-3" style="border-left: 1px solid rgba(209, 209, 209, 0.5);">
            <i id="actionhideinfoareahistory" class="fa fa-times fa-2x" title="Ocultar panel de información" style="float: right;color: #941E1E;cursor: pointer;"></i>
            <div class="row" style="padding-bottom: 30px;">
                <div class="col-md-2">
                    <i class="fa fa-info-circle fa-5x"></i>
                </div>
                <div class="col-md-6" style="padding: 16px 0 0 37px;">
                    <span style="font-size: 28px; font-weight: bold; display: block; ">Información</span>
                    <span style="font-size: 13px; position: absolute; margin-top: -8px;">que debe saber...</span>
                </div>
            </div>

            <div style="line-height: 22px;font-size: 12px">
                <span>Rejilla que muestra el histórico de leyendas que se han usado año con año.</span>
                <br/><br/>
                La columna <span class="label label-default tamaniolabel">Año</span> indica el año que es o fue utilizada la leyenda.
                La columna <span class="label label-default tamaniolabel">Núm. Decreto</span> o <b>Número de decreto</b> indica el dato identificativo con el cual se decretó la leyenda.
                La columna <span class="label label-default tamaniolabel">Leyenda</span> muestra la cadena de leyenda que es o fue utilizada en el año correspondiente.
                La columna <span class="label label-default tamaniolabel">Fecha Decreto</span> especifica la fecha en que fue decretada la leyenda.
                La columna <span class="label label-default tamaniolabel">Fecha Registro</span> indica la fecha en que se registró en el sistema la leyenda y por lo tanto a partir del cual el servicio WEB publicó la leyenda correspondiente.
                <br/><br/>
                La fila de la rejilla con color de <b>fondo oscuro</b> indica la <span class="label label-success tamaniolabel">leyenda actual</span>.
                La rejilla permite filtrar los registros en el área de <span class="label label-success tamaniolabel">buscar</span>, así como <span class="label label-warning tamaniolabel">paginar</span> y cambiar los <span class="label label-warning tamaniolabel">resultados por página</span>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(ASSETS .'js/leyenda/history.js'); ?>"></script>
<script language="JavaScript" type="text/javascript">         
    $(document).ready(function() {        
        $('#historytable').DataTable({
            "lengthMenu": [[3, 5, 10, 25, 50, 100, -1], [3, 5, 10, 25, 50, 100, "Todos"]],
            "order": [[ 0, "desc" ]],
            "iDisplayLength" : 5,
            "bProcessing": true,
            "pagingType": "full_numbers",
            "language": { 
                "url": "<?php echo base_url(ASSETS); ?>/dataTables-1.10.3/media/resourses/lang/datatables.spanish.lang"                
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