<style type="text/css">
    #logged_data .img_logged{
        width: 62px;
        height: 62px;
        border: 3px solid #FFFFFF;
    }
    #logged_data .data_area{
        width: auto; 
        text-align: left; 
        margin: 6px 0px 0px 35px;       
    }
    #logged_data .btn_logout{
        padding: 11px 0 0 0;
    }
    #logged_data .texto_normal{
        color: #7e7e7e;
    }
    #logged_data .texto_negrita{
        color: #575757;
    }
    #logged_data .texto_bienvenida {
        font-size: 20px;
    }   
    a:visited,
    a:link {   
        text-decoration:none;
        color: #868686;
    }
</style>

<div class="row" style="float: right;">
    <div class="col-md-1">
        <img src="<?php echo base_url('application/assets/images/logon/logged.png'); ?>" alt="Sesión iniciada" class="img-circle img_logged" />
    </div>
    <div class="col-md-1 data_area">
        <span class="texto_negrita texto_bienvenida">Bienvenido...!!!</span><br/>
        <span class="texto_normal"><?php echo $name; ?></span>
    </div>
    <div class="col-md-1 btn_logout">
        <a href="<?php echo site_url('logon/logout'); ?>">
            <i class="fa fa-sign-out fa-3x" data-toggle="tooltip" data-placement="bottom" title="Cerrar sesión"></i>
        </a>
    </div>    
</div>