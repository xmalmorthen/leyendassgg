<!DOCTYPE html>
<html>
    <head>
        <?php $sess = $this->session->userdata("logged_in"); ?>        
        <title><?php echo isset($title) ? $title : 'SAL' ; ?></title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('application/assets/images/layout/favicon.ico'); ?>" />
        
        <link rel="stylesheet" href="<?php echo base_url('application/assets/bootstrap-3.2.0-dist/css/bootstrap.css'); ?>">
        <link href="<?php echo base_url('application/assets/font-awesome-4.2.0/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('application/assets/css/master.css'); ?>" rel="stylesheet" />        
        <?php echo isset($css) ? $css : ''; ?>
        
        <script src="<?php echo base_url('application/assets/js/jquery-1.11.1.min.js'); ?>"></script>
        <script src="<?php echo base_url('application/assets/js/modernizr.custom.98422.js'); ?>"></script>
        <script languaje="javascript" type="text/javascript">
            var $base_url = '<?php echo base_url(); ?>',
                $site_url = '<?php echo site_url(); ?>';
        </script>
    </head>
    <body>
        <noscript><meta http-equiv="refresh" content="0;url=<?php echo site_url('error/noscript'); ?>"></noscript>
        <header>
            <div class="adorno1"></div>
            <div class="adorno2"></div>
            <div class="container">                
                <div class="row">
                    <div class="col-sm-6">
                        <img src="<?php echo base_url('application/assets/images/layout/logo.png'); ?>" class="logo"/>
                        <div class="textos">
                            <span class="negritas">SISTEMA PARA LA ADMINISTRACIÓN</span><br />
                            <span>DE LEYENDAS</span>
                        </div>
                    </div>
                    <?php if ($sess) { ?>
                    <div id="logged_data" class="col-sm-5" style="float:right; padding-top: 17px;">
                        <?php $this->load->view('logon/logged',$sess); ?>
                    </div>
                    <?php } ?>
                </div>
            </div>            
        </header>
        
        <section>
            <article id="seccionContenido" class="container">
                <?php if ($sess) { $this->load->view('layout/menu'); } ?>
                <?php echo isset($content) ? $content : NULL; ?>
            </article>
        </section>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <img src="<?php echo base_url('application/assets/images/layout/logo_2.png'); ?>" class="logo" />
                        <div class="textos">
                            <span class="negritas">SISTEMA PARA LA ADMINISTRACIÓN</span><br />
                            <span>DE LEYENDAS</span>
                        </div>
                    </div>
                </div>
                <div id="loaderdiv"></div>
            </div>   
            <div class="optimized" style="text-align: right; color: #E0E0E0; font-size: 12px">
                <span>Sitio desarrollado en HTML5,<br/>
                      optimizado para Google Chrome, <br/>Mozilla Firefox, Internet Explorer 9 o superior</span>
            </div>
            
        </footer>        
        <script src="<?php echo base_url('application/assets/bootstrap-3.2.0-dist/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('application/assets/bootstrap-3.2.0-dist/js/tooltip.js'); ?>"></script>
        <script src="<?php echo base_url('application/assets/bootstrap-3.2.0-dist/js/popover.js'); ?>"></script>
        <script src="<?php echo base_url('application/assets/js/master.js'); ?>"></script>
        <?php echo isset($js) ? $js : ''; ?>        
    </body>
</html>