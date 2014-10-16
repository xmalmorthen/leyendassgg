<link rel="stylesheet" href="<?php echo base_url(ASSETS .'css/leyenda/index.css'); ?>">
<div class="row leyenda_formcontent">
    <i id="actionshowinfoarealeyenda" class="fa fa-info-circle fa-5x" title="Mostrar información de la página"></i>
    <h1 id="title"><i class="fa fa-file-text fa-2x"></i> Actualizar leyenda </h1>        
    <div id="data" class="col-md-8">
        <?php if (isset($msgresponse)) {
                if ($msgresponse == 'success') { ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <span class="label label-success">ÉXITO!</span>&nbsp;&nbsp;&nbsp;<span class="cuerpomensaje"><strong>La leyenda fué actualizada...</strong></span>
        </div>
        <?php } elseif ($msgresponse == 'error')  { ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <span class="label label-danger">ERROR!</span>&nbsp;&nbsp;&nbsp;<span class="cuerpomensaje"><strong>Oh, ohh! Algo salió mal al actualizar la leyenda, favor de intentarlo mas tarde...</strong></span>
        </div>
        <?php } elseif ($msgresponse == 'formerror')  { ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <span class="label label-danger">ERROR!</span>&nbsp;&nbsp;&nbsp;<span class="cuerpomensaje"><strong>Oh, ohh! Quizá le falte información... Favor de verificar...</strong></span>
        </div>
        <?php } }?>
        <?php if(isset($leyendaactual)) { ?>
        <div id="actualleyendaarea">
            <h3>Leyenda actual</h3>
            <p>
                <?php echo isset($leyendaactual) ? $leyendaactual : ''; ?>
            </p>
            <span id="masinfoleyenda" data-toggle="popover" data-trigger="focus" data-contentwrapper=".contentleyendainfo" rel="popover" data-contentwrapper=".contentinfoleyenda"><i class="fa fa-info-circle fa-1x"></i> [ Ver más información... ]</span>
        </div>

        <div class="contentleyendainfo">
            <div class="row">
                <div class="col-xs-5 popovertitle">Año :</div>                    
                <div class="col-xs-7 popoverdata"><?php echo isset($anio) ? $anio : 'No se encontró el año'; ?></div>                    
            </div>
            <div class="row">
                <div class="col-xs-5 popovertitle">Número de Decreto :</div>
                <div class="col-xs-7 popoverdata"><?php echo isset($numDecreto) ? $numDecreto : 'No se encontró el número de decreto'; ?></div>
            </div>
            <div class="row">                    
                <div class="col-xs-5 popovertitle">Fecha de Decreto :</div>
                <div class="col-xs-7 popoverdata"><?php echo isset($fechaDecreto) ? $fechaDecreto : 'No se encontró el número de decreto'; ?></div>
            </div>
            <div class="row">
                <div class="col-xs-5 popovertitle">Fecha de Registro :</div>
                <div class="col-xs-7 popoverdata"><?php echo isset($fechaRegistro) ? $fechaRegistro : 'No se encontró el número de decreto'; ?></div>
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
                <div class="controles">                    
                    <input type="submit" onClick="submitDetailsForm()" value="Guardar" class="btn btn-success btn-lg"  data-toggle="tooltip" data-placement="top" title="Actualizar leyenda"/>
                    <span>&nbsp;&nbsp;&nbsp;</span>
                    <input type="reset" value="Limpiar" class="btn btn-danger btn-lg" data-toggle="tooltip" data-placement="top" title="Limpiar formulario" />
                </div>
            </div>
        </form>
    </div>
    <div id="infoarealeyenda">
        <div id="info" class="col-md-4">
            <i id="actionhideinfoarealeyenda" class="fa fa-times fa-2x" title="Ocultar panel de información"></i>
            <div class="row">
                <div class="col-md-2">
                    <i class="fa fa-info-circle fa-5x"></i>
                </div>
                <div class="col-md-8 titleinfo">
                    <span class="superior">Información</span>
                    <span class="inferior">que debe saber...</span>
                </div>
            </div>

            <div class="bodyinfo">
                <span>Formulario para actualizar la leyenda.</span>
                <span class="label label-danger tamaniolabel">Nota:</span> <b>Únicamente se permite actualizar la leyenda actual...</b>
                <br/><br/>
                La primer parte del formulario muestra la <span class="label label-success tamaniolabel">leyenda actual</span> que se utiliza en los sistemas para los formatos de pie de páginas, 
                en la parte de <span class="label label-success tamaniolabel"><i class="fa fa-info-circle fa-1x"></i> [ Ver más información... ]</span> podrá consultar los datos complementarios a la leyenda actual como son
                el <b>año</b>, <b>número de decreto</b>, <b>fecha de decreto</b> y <b>fecha de registro</b>.
                <br/><br/>
                La siguiente parte del formulario contiene los campos necesarios para la actualización de la leyenda. El símbolo <span class="label label-danger tamaniolabel"><i class="fa fa-asterisk"></i></span>
                indica que es un dato requerido para que la actualización se realice con éxito. Los campos necesarios son los siguientes:
                <br/>
                <span class="label label-default tamaniolabel">Número de Decreto</span> se refiere al dato identificativo con el cual se decretó la leyenda,
                <span class="label label-default tamaniolabel">Fecha de Decreto</span> se requiere especificar la fecha en que fue decretada la leyenda,
                <span class="label label-default tamaniolabel">Leyenda</span> en éste campo es necesario escribir la cadena alfanumérica que se utilizará como la nueva leyenda.
                <br/><br/>
                En la parte inferior del formulario se encuentra el botón <span class="label label-success tamaniolabel">Guardar</span> el cuál, una vez capturada la información requerida, nos permitirá actualizar los cambios y tomarlos como permanentes hasta la próxima actualización.
                El botón de <span class="label label-danger tamaniolabel">Limpiar</span> nos ayuda a reiniciar los contenedores de información a su estado inicial al momento de abrir el formulario.
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(ASSETS .'js/leyenda/index.js'); ?>"></script>