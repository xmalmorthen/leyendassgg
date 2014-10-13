<?php $sess = $this->session->userdata("logged_in"); ?>
<html>
    <head>
        <title><?php echo isset($title) ? $title : 'SAL' ; ?></title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        
        <link rel="stylesheet" href="<?php echo base_url('application/assets/bootstrap-3.2.0-dist/css/bootstrap.css'); ?>">
        <link href="<?php echo base_url('application/assets/font-awesome-4.2.0/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('application/assets/css/master.css'); ?>" rel="stylesheet" />        
        <?php echo isset($css) ? $css : ''; ?>
        
        <script src="<?php echo base_url('application/assets/js/jquery-1.11.1.min.js'); ?>"></script>
    </head>
    <body>
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
        </footer>        
        <script src="<?php echo base_url('application/assets/bootstrap-3.2.0-dist/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('application/assets/bootstrap-3.2.0-dist/js/tooltip.js'); ?>"></script>
        <script src="<?php echo base_url('application/assets/bootstrap-3.2.0-dist/js/popover.js'); ?>"></script>
        <script src="<?php echo base_url('application/assets/js/master.js'); ?>"></script>
        <?php echo isset($js) ? $js : ''; ?>
        
        <script languaje="javascript" type="text/javascript">            
            window.onbeforeunload = showloader;
            function showloader()
            {
                var loader=document.getElementById("loaderdiv");
                loader.style.display = 'block';
            }
        </script>
        
    </body>
</html>