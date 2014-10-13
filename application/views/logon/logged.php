<style type="text/css">
    #logged_data .img_logged{
        width: 62px;
        height: 62px;
        border: 3px solid #FFFFFF;
    }
    #logged_data .data_area{
        /*width: auto; */
        text-align: left; 
        margin-top: 4px;   
        float: right;
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

<div>
    <div style="float:right; max-width: 85%; padding: 7px 0 0 4px;">
        <span class="texto_negrita texto_bienvenida">Bienvenido...!!!</span>
        <a href="<?php echo site_url('logon/logout'); ?>" data-toggle="tooltip" data-placement="bottom" title="Cerrar sesión" style="float: right; margin: -15px 0 0 10px;">
            <i class="fa fa-sign-out fa-3x"></i>
        </a>        
        <br/>
        <span class="texto_normal"><?php echo $name; ?></span>       
    </div>    
    <div style="float:right;">
        <img src="<?php echo base_url('application/assets/images/logon/logged.png'); ?>" alt="Sesión iniciada" class="img-circle img_logged" />
    </div>
    
</div>