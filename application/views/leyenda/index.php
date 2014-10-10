<style type="text/css">
    .leyenda_formcontent{
        padding: 30px 30px 120px 30px;
    }
    #leyenda_formbody {
        padding: 20px;
    }
    #leyenda_formbody div{
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
</style>

    <div class="row leyenda_formcontent">
        <div class="col-md-8" style="border-right: 1px solid rgba(209, 209, 209, 0.5);">         
            <?php echo form_open('leyenda'); ?>
            <div id="leyenda_formbody">
                <div>
                    <i class="fa fa-asterisk"></i>
                    <span>Número de decreto</span>
                    <input id="decreto" name="decreto" class="form-control input-lg" type="text" placeholder="Número de decreto" value="<?php echo set_value('decreto'); ?>">
                    <?php echo form_error('decreto'); ?>
                </div>
                <div>
                    <i class="fa fa-asterisk"></i>
                    <span>Fecha de decreto</span>
                    <input id="fechadecreto" name="fechadecreto" class="form-control input-lg" type="date" placeholder="Fecha de decreto" value="<?php echo (strlen(set_value('fechadecreto')) > 0) ? set_value('fechadecreto') : date("Y-m-d"); ?>">
                    <?php echo form_error('fechadecreto'); ?>
                </div>
                <div>
                    <i class="fa fa-asterisk"></i>
                    <span>Leyenda</span>
                    <textarea id="textoleyenda" name="textoleyenda" class="form-control" rows="3"><?php echo set_value('textoleyenda'); ?></textarea>
                    <?php echo form_error('textoleyenda'); ?>
                </div>
                <div class="controles" style="padding-top: 20px;">
                    <input type="submit" value="Guardar" class="btn-entrar" />
                </div>
            </div>
            
        </div>
        <div id="infoarealeyenda">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-2">
                        <i class="fa fa-info-circle fa-5x"></i>
                    </div>
                    <div class="col-md-10" style="padding: 16px 0 0 18px;">
                        <span style="font-size: 28px; font-weight: bold; display: block; ">Información</span>
                        <span style="font-size: 13px; position: absolute; margin-top: -8;">que debes saber...</span>
                    </div>
                </div>
               
                <div class="row espacio" >
                    <div class="col-md-2">
                        <i class="fa fa-asterisk fa-2x"></i>
                    </div>
                    <div class="col-md-10">
                        <span>Campos requeridos</span>
                    </div>
                </div>
                <!--<div class="row espacio">
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




