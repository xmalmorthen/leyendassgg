<style type="text/css">
    .errorarea{
        text-align: left;
        padding: 20px 0px 0px 0px !Important;
    }    
</style>

<div id="login-box">
    <?php echo form_open('logon'); ?>
        <table>
            <tr>
                <td>
                    <span>Para ingresar es necesario contar con su nombre de usuario y contraseña  que se le brindó en las oficinas.</span>
                    <?php echo form_error('sumary_errors'); ?>
                </td>
            </tr>
            <?php if (isset($errorsumary)) { ?>
            <tr>
                <td>
                    <div class="error errorarea">
                        <i class="fa fa-exclamation-triangle"></i>
                        <span>Usuario y/o contraseña incorrectos...</span>
                    </div>                    
                </td>                    
            </tr>
            <?php } ?>
            <tr>
                <td>
                    <div class="inputarea">
                        <?php echo form_error('username'); ?>
                        <input type="text" id="username" name="username" class="inputUser" placeholder="     nombre de usuario" value="<?php echo set_value('username'); ?>"/>
                    </div>                    
                </td>
            </tr>
            <tr>
                <td>
                    <div class="inputarea">
                        <?php echo form_error('password'); ?>
                        <input type="password" id="passowrd" name="password" class="inputPassword"  placeholder="     contraseña"  value="<?php echo set_value('password'); ?>"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="controles" style="padding-top: 20px;">
                        <input type="submit" value="entrar" class="btn-entrar" />
                    </div>
                </td>
            </tr>
        </table>    
</div>
