<?php $sess = $this->session->userdata("logged_in"); ?>
<html>
    <head>
        <title><?php echo isset($title) ? $title : 'SAL' ; ?></title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        
        <link rel="stylesheet" href="<?php echo base_url('application/assets/bootstrap-3.2.0-dist/css/bootstrap.min.css'); ?>">
        <link href="<?php echo base_url('application/assets/font-awesome-4.2.0/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('application/assets/css/master.css'); ?>" rel="stylesheet" />        
        <?php echo $css; ?>
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
                    <div id="logged_data" class="col-sm-5" style="float:right; padding-top: 5px;">
                        <?php $this->load->view('logon/logged',$sess); ?>
                    </div>
                    <?php } ?>
                </div>
            </div>            
        </header>
        <section>
            <article id="seccionContenido" class="container">
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
            </div>
        </footer>
        
        <script src="<?php echo base_url('application/assets/js/jquery-1.11.1.min.js'); ?>"></script>        
        <script src="<?php echo base_url('application/assets/bootstrap-3.2.0-dist/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('application/assets/bootstrap-3.2.0-dist/js/tooltip.js'); ?>"></script>
    </body>
</html>