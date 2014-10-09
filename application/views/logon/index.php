<div id="login-box">
    <?php echo form_open('logon'); ?>
        <table>
            <tr>
                <td>
                    <span>Para ingresar es necesario contar con su nombre de usuario y contraseña  que se le brindó en las oficinas.</span>
                    <?php echo form_error('check_database'); ?>
                </td>
            </tr>
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
                    <input type="checkbox" name="remember" value="remember"> <label>Mantener la sesión iniciada</label><br>                    
                </td>
            </tr>
            <tr>
                <td>
                    <div class="controles">
                        <input type="submit" value="entrar" class="btn-entrar" />
                    </div>
                </td>
            </tr>
        </table>
    </form>
</div>
