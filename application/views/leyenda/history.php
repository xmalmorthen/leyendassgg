<link rel="stylesheet" href="<?php echo base_url(ASSETS .'css/leyenda/history.css'); ?>">
<div class="row history_formcontent">
    <i id="actionshowinfoareahistory" class="fa fa-info-circle fa-5x" title="Mostrar información de la página" style="float: right;margin-top: 43px;color: #941E1E;cursor: pointer; display: none"></i>
    <h1 style="font-size: 45px;font-weight: bold;border-bottom: 1px solid #DBDBDB;margin-right: 33%;padding-bottom: 5px;"><i class="fa fa-table fa-2x"></i> Histórico de leyendas</h1>
    <br/>
    <div id="data" class="col-md-9">
        <?php if (isset($historytable)) echo $historytable;
              else { ?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <span class="label label-warning">ALERTA!</span>&nbsp;&nbsp;&nbsp;<span class="cuerpomensaje"><strong>Ocurrió un problema al obtener la leyenda, el servicio no se encuentra disponible</strong></span>
                </div>        
        <?php } ?>
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

            <div style="line-height: 27px;font-size: 12px; text-align: justify;">
                <span>Lista que muestra las leyendas registradas en los últimos años.</span>
                <br/><br/>
                La columna <span class="label label-default tamaniolabel">Año</span> indica el año en el que se utilizó la leyenda.
                La columna <span class="label label-default tamaniolabel">Núm. de decreto</span> indica el número con el cual se identifica el decretó de la leyenda.
                La columna <span class="label label-default tamaniolabel">Leyenda</span> muestra el texto de la leyenda utilizada en el año correspondiente.
                La columna <span class="label label-default tamaniolabel">Fecha de decreto</span> se refiere a la fecha en que se decidió registrar la leyenda.
                La columna <span class="label label-default tamaniolabel">Fecha de registro</span> indica la fecha en que se registró o actualizó la leyenda en el sistema.
                <br/><br/>
                La fila con color de <strong>fondo oscuro</strong> indica la <span class="label label-success tamaniolabel">leyenda actual</span>. 
                En la lista se permite filtrar los registros en el campo <span class="label label-success tamaniolabel">Buscar</span>, así como <span class="label label-warning tamaniolabel">paginar</span> y cambiar el <span class="label label-warning tamaniolabel">número de registros</span> a mostrar por página.
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
                },
                {
                    "targets": 1,
                    "width": "60px"
                },
                {
                    "targets": 3,
                    "width": "70px"
                },
                {
                    "targets": 4,
                    "width": "70px"
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