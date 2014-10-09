<html>
    <head>
        <title><?php echo isset($title) ? $title : 'SAL' ; ?></title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link href="http://www.colima-estado.gob.mx/ci/css/bs3/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url('application/assets/css/master.css'); ?>" rel="stylesheet" />
        <?php echo $css; ?>
    </head>
    <body>
        <header>
            <div class="adorno1"></div>
            <div class="adorno2"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <img src="<?php echo base_url('application/assets/images/layout/logo.png'); ?>" class="logo"/>
                        <div class="textos">
                            <span class="negritas">SISTEMA PARA LA ADMINISTRACIÓN</span><br />
                            <span>DE LEYENDAS</span>
                        </div>
                    </div>
                </div>
            </div>            
        </header>
        <section>
            <article id="seccionInicio" class="container">
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
    </body>
</html>