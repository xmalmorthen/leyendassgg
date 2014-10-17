<!DOCTYPE html>
<html>
    <head>
        <?php $sess = $this->session->userdata("logged_in"); ?>        
        <title><?php echo isset($title) ? $title : 'SAL' ; ?></title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(ASSETS .'images/layout/favicon.ico'); ?>" />
        
        <link rel="stylesheet" href="<?php echo base_url(ASSETS . 'bootstrap-3.2.0-dist/css/bootstrap.css'); ?>">
        <link href="<?php echo base_url(ASSETS .'font-awesome-4.2.0/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url(ASSETS .'css/layout/master.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url(ASSETS .'css/layout/isloading.css'); ?>" rel="stylesheet" />        
        
        <?php echo isset($css) ? $css : ''; ?>
        
        <script src="<?php echo base_url(ASSETS .'js/jquery-1.11.1.min.js'); ?>"></script>
        <script src="<?php echo base_url(ASSETS .'js/jquery.cookie.js'); ?>"></script>
        <script src="<?php echo base_url(ASSETS .'js/modernizr.custom.98422.js'); ?>"></script>
        <script src="<?php echo base_url(ASSETS .'js/jquery.isloading.js'); ?>"></script>
        <script languaje="javascript" type="text/javascript">
            var $base_url = '<?php echo base_url(); ?>',
                $site_url = '<?php echo site_url(); ?>';
        </script>
    </head>
    <body>
        <div class="page-wrap">
            <noscript><meta http-equiv="refresh" content="0;url=<?php echo site_url('error/noscript'); ?>"></noscript>
            <header>
                <div class="adorno1"></div>
                <div class="adorno2"></div>
                <div class="container">                
                    <div class="row">
                        <div class="col-sm-7">
                            <img src="<?php echo base_url(ASSETS .'images/layout/logo.png'); ?>" class="logo"/>
                            <div class="textos">
                                <span class="negritas">SISTEMA PARA LA ADMINISTRACIÓN</span><br />
                                <span>DE LEYENDAS</span>
                            </div>
                        </div>
                        <?php if ($sess) { ?>
                        <div id="logged_data" class="col-sm-5">
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
        </div>
        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <img src="<?php echo base_url(ASSETS .'images/layout/logo_2.png'); ?>" class="logo" />
                        <div class="textos">
                            <span class="negritas">SISTEMA PARA LA ADMINISTRACIÓN</span><br />
                            <span>DE LEYENDAS</span>
                        </div>
                    </div>
                </div>
                <div id="loaderdiv"></div>
            </div>   
            <div class="optimized">
                <span>Sitio desarrollado en HTML5, optimizado para resolución mínima de 1024 x 768 pixeles,<br/>
                      navegadores Web Google Chrome, Mozilla Firefox, Internet Explorer 9 o superior</span>
            </div>
            
        </footer>        
        <script src="<?php echo base_url(ASSETS .'bootstrap-3.2.0-dist/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url(ASSETS .'bootstrap-3.2.0-dist/js/tooltip.js'); ?>"></script>
        <script src="<?php echo base_url(ASSETS .'bootstrap-3.2.0-dist/js/popover.js'); ?>"></script>
        <script src="<?php echo base_url(ASSETS .'js/master.js'); ?>"></script>
        <?php echo isset($js) ? $js : ''; ?>        
    </body>
</html>