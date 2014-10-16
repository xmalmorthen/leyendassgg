<html>
    <head>
        <title><?php echo isset($title) ? $title : 'SAL - Oh, ohh...!!!' ; ?></title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link href="http://www.colima-estado.gob.mx/ci/css/bs3/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(ASSETS .'css/master.css'); ?>" rel="stylesheet" />
        <style type="text/css">
            a:link, a:hover, a:visited
            {   
                text-decoration:none;   
                color: #fff;
            }
            .margensuperior{
                padding-top: 25px;
            }
            .margeninferior{
                padding-bottom: 150px;
            }
            .normal{
                font-family: "RobotoRegular";                
            }
            .negrita{
                font-family: "RobotoBold";                
            }
            .titleerr{
                font-size: 85px;
            }
            .subt{
                font-size: 35px;
            }
            .infoarea{
                text-align: center;
                padding-top: 200px;
            }
            .btn-back {
                background-color: #119548;
                transition: background-color 0.5s ease-in;
                color: #fff;
                border: none;
                padding: 15px 30px;
                margin: 20px 0 0 0;
                display: inline-block;
            }
            .btn-back:hover {
                background-color: #15b457;
            }
        </style>
    </head>
    <body>
        <header>
            <div class="adorno1"></div>
            <div class="adorno2"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <img src="<?php echo base_url(ASSETS .'images/layout/logo.png'); ?>" class="logo"/>
                        <div class="textos">
                            <span class="negritas">SISTEMA PARA LA ADMINISTRACIÓN</span><br />
                            <span>DE LEYENDAS</span>
                        </div>
                    </div>
                </div>
            </div>            
        </header>
        <section>
            <article id="seccionContenido" class="container">
                <div class="row margensuperior margeninferior">
                    <div class="col-md-8" style="text-align: center;">
                        <img src="<?php echo base_url(ASSETS .'images/layout/error.png'); ?>" alt="Error" height="500" width="500">
                    </div>
                    <div class="col-md-4 infoarea">
                        <span class="negrita titleerr">¡Oh, no!</span><br/>
                        <span class="negrita subt">Algo salió mal.</span><br/>
                        <span>Gracias por darte cuenta - vamos a solucionarlo y todo volverá a la normalidad pronto</span><br/><br/>
                        <a href="<?php echo base_url(); ?>" ><input id="loginbtnsubmit" type="submit" value="Ir al inicio" class="btn btn-success btn-lg"></a>
                    </div>
                </div>                
                
            </article>
        </section>
        <footer>
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
            </div>
        </footer>
    </body>
</html>