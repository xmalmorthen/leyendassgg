<style type="text/css">
    .leyenda_formcontent{
        padding: 0px 30px 120px 30px;
    }
    #leyenda_formbody {
        padding: 20px;
    }
    #leyenda_formbody .espacio{
        padding: 10px 0;        
    }
    #leyenda_formbody i{
        margin-left: -5px;
    }
    #leyenda_formbody div span{
        font-size: 20px;
        color: #575757;
    }
    #leyenda_formbody textArea{
        max-width: 100%;
        max-height: 150px;
    }
    #leyenda_formbody .btn-entrar {
        background-color: #119548;
        transition: background-color 0.5s ease-in;
        color: #fff;
        border: none;
        padding: 15px 30px;
        float: right;
    }
    #leyenda_formbody .btn-entrar:hover {
        background-color: #15b457;
    }
    .field-validation-error {
        color: #f00;
    }
    #infoarealeyenda span{
        font-size: 20px;
        
    }
    #infoarealeyenda .espacio{
        padding: 17px 0 0 20px;
    }
    .popover{
        width:450px;
        max-width: 450px;
    }
    .popover .row{
        padding: 5px 0;
    }
    .popover .col-xs-5 {
        text-align: right;
        color: #7e7e7e;
        font-size: 14px;
    }
    .popover .col-xs-7 {
        font-size: 18px;
        color: #525252;
        font-weight: bold;
    }
    #infoarealeyenda .tamaniolabel{
        font-size: 16px;
    }
</style>

    <div class="row leyenda_formcontent">
        <i id="actionshowinfoarealeyenda" class="fa fa-info-circle fa-5x" title="Mostrar información de la página" style="float: right;margin-top: 43px;color: #941E1E;cursor: pointer; display: none"></i>
        <h1 style="font-size: 45px;font-weight: bold;border-bottom: 1px solid #DBDBDB;margin-right: 39%;padding-bottom: 5px;"><i class="fa fa-file-text fa-2x"></i> Actualizar leyenda </h1>        
        <div id="data" class="col-md-8">
            <?php if (isset($msgresponse)) {
                    if ($msgresponse == 'success') { ?>
            <div class="alert alert-success alert-dismissible" role="alert" style="margin: 10px auto 20px auto;">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <span class="label label-success" style="font-size: 25px">ÉXITO!</span>&nbsp;&nbsp;&nbsp;<span style="font-size: 22px;"><strong>La leyenda fué actualizada...</strong></span>
            </div>
            <?php } else { ?>
            <div class="alert alert-danger alert-dismissible" role="alert" style="margin: 10px auto 20px auto;">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <span class="label label-danger" style="font-size: 25px">ERROR!</span>&nbsp;&nbsp;&nbsp;<span style="font-size: 22px;"><strong>Oh, ohh! Algo salió mal al actualizar la leyenda, favor de intentarlo mas tarde...</strong></span>
            </div>
            <?php } }?>
            <?php if(isset($leyendaactual)) { ?>
            <div style="padding: 0px 5px 35px 5px;border: 2px solid rgba(236, 236, 236, 1);border-radius: 5px;-moz-border-radius: 5px;-webkit-border-radius:5px;">
                <h3>Leyenda actual</h3>
                <p style="padding: 0 23px;color: #7e7e7e;">
                    <?php echo isset($leyendaactual) ? $leyendaactual : ''; ?>
                </p>
                
                <span id="masinfoleyenda" 
                   style="float: right; cursor: pointer;"
                   data-toggle="popover" 
                   data-trigger="focus"
                   
                   data-contentwrapper=".contentleyendainfo"                   
                   rel="popover"
                   data-contentwrapper=".contentinfoleyenda"><i class="fa fa-info-circle fa-1x"></i> [ Ver mas información... ]</span>                   
            </div>
            
            <div class="contentleyendainfo" style="display: none;">
                <div class="row">
                    <div class="col-xs-5">Año :</div>                    
                    <div class="col-xs-7"><?php echo isset($anio) ? $anio : 'No se encontró el año'; ?></div>                    
                </div>
                <div class="row">
                    <div class="col-xs-5">Número de Decreto :</div>
                    <div class="col-xs-7"><?php echo isset($numDecreto) ? $numDecreto : 'No se encontró el número de decreto'; ?></div>
                </div>
                <div class="row">                    
                    <div class="col-xs-5">Fecha de Decreto :</div>
                    <div class="col-xs-7"><?php echo isset($fechaDecreto) ? $fechaDecreto : 'No se encontró el número de decreto'; ?></div>
                </div>
                <div class="row">
                    <div class="col-xs-5">Fecha de Registro :</div>
                    <div class="col-xs-7"><?php echo isset($fechaRegistro) ? $fechaRegistro : 'No se encontró el número de decreto'; ?></div>
                </div>                
            </div>            
            <?php } ?>
            <form id="formularioleyenda"  action="<?php echo site_url('leyenda'); ?>" onReset="resetform()" method="post" accept-charset="utf-8">
                <div id="leyenda_formbody">
                    <div class="espacio">
                        <i class="fa fa-asterisk"></i>
                        <span>Número de decreto</span>
                        <input id="decreto" name="decreto" class="form-control input-lg" type="text" placeholder="Número de decreto" value="<?php echo set_value('decreto'); ?>">
                        <?php echo form_error('decreto'); ?>
                    </div>
                    <div class="espacio">
                        <i class="fa fa-asterisk"></i>
                        <span>Fecha de decreto</span>
                        
                        <div class='input-group date' id='datetimepicker'>
                            <input id="fechadecreto" name="fechadecreto" type='text' class="form-control input-lg" data-date-format="DD/MM/YYYY" value="<?php echo (strlen(set_value('fechadecreto')) > 0) ? set_value('fechadecreto') : date("d/m/Y"); ?>"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        <?php echo form_error('fechadecreto'); ?>
                    </div>
                    <div class="espacio">
                        <i class="fa fa-asterisk"></i>
                        <span>Leyenda</span>
                        <textarea id="textoleyenda" name="textoleyenda" class="form-control" rows="3"><?php echo set_value('textoleyenda'); ?></textarea>
                        <?php echo form_error('textoleyenda'); ?>
                    </div>
                    <div class="controles" style="padding-top: 20px; float: right;">                    
                        <input type="submit" onClick="submitDetailsForm()" value="Guardar" class="btn btn-success btn-lg"  data-toggle="tooltip" data-placement="top" title="Actualizar leyenda"/>
                        <span>&nbsp;&nbsp;&nbsp;</span>
                        <input type="reset" value="Limpiar" class="btn btn-danger btn-lg" data-toggle="tooltip" data-placement="top" title="Limpiar formulario" />
                    </div>
                </div>
            </form>
        </div>
        <div id="infoarealeyenda">
            <div id="info" class="col-md-4" style="border-left: 1px solid rgba(209, 209, 209, 0.5);">
                <i id="actionhideinfoarealeyenda" class="fa fa-times fa-2x" title="Ocultar panel de información" style="float: right;color: #941E1E;cursor: pointer;"></i>
                <div class="row">
                    <div class="col-md-2">
                        <i class="fa fa-info-circle fa-5x"></i>
                    </div>
                    <div class="col-md-10" style="padding: 16px 0 34px 18px;">
                        <span style="font-size: 28px; font-weight: bold; display: block; ">Información</span>
                        <span style="font-size: 13px; position: absolute; margin-top: -8;">que debe saber...</span>
                    </div>
                </div>
               
               <div style="line-height: 22px;font-size: 12px">
                    <span>Formulario para actualizar la leyenda.</span>
                    <span class="label label-danger tamaniolabel">Nota:</span> <b>Únicamente se permite actualizar la leyenda actual...</b>
                    <br/><br/>
                    La primer parte del formulario muestra la <span class="label label-success tamaniolabel">leyenda actual</span> que se utiliza en los sistemas para los formatos de pié de páginas, 
                    en la parte de <span class="label label-success tamaniolabel"><i class="fa fa-info-circle fa-1x"></i> [ Ver mas información... ]</span> podrá consultar los datos complementarios a la leyenda actual como son
                    el <b>año</b>, <b>número de decreto</b>, <b>fecha de decreto</b> y <b>fecha de registro</b>.
                    <br/><br/>
                    La siguiente parte del formulario contiene los campos necesarios para la actualización de la leyenda. El símbolo <span class="label label-danger tamaniolabel"><i class="fa fa-asterisk"></i></span>
                    indica que es un dato requerido para que la actualización se realice con éxito. Los campos necesarios son los siguientes:
                    <br/>
                    <span class="label label-default tamaniolabel">Número de Decreto</span> se refiere al dato identificativo con el cual se decretó la leyenda,
                    <span class="label label-default tamaniolabel">Fecha de Decreto</span> se requiere especificar la fecha en que fué decretada la leyenda,
                    <span class="label label-default tamaniolabel">Leyenda</span> en éste campo es necesario escribir la cadena alfanumérica que se utilizará como la nueva leyenda.
                    <br/><br/>
                    En la parte inferior del formulario se encuentra el botón <span class="label label-success tamaniolabel">Guardar</span> el cuál, una vez capturada la información requerida, nos permitirá actualizar los cambios y tomarlos como permanentes hasta la próxima actualización.
                    El botón de <span class="label label-danger tamaniolabel">Limpiar</span> nos ayuda a reiniciar los contenedores de información a su estado inicial al momento de abrir el formulario.
                </div>
                
                
            </div>
        </div>
    </div>

<script language="JavaScript" type="text/javascript">     
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
            placement:'left',
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
</script>