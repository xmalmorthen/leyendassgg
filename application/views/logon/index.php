<html>
    <head>
        <title>LogOn</title>
        <link href="/Content/logOn.css" rel="stylesheet" />
        <link href="http://www.colima-estado.gob.mx/ci/css/bs3/bootstrap.min.css" rel="stylesheet" />
    </head>
    <body>
        <header>
            <div class="adorno1"></div>
            <div class="adorno2"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <img src="~/Images/logOn/logo.png" class="logo"/>
                        <div class="textos">
                            <span class="negritas">SISTEMA DE</span><br />
                            <span>FIRMA MÚLTIPLE</span>
                        </div>
                    </div>
                </div>
            </div>
            
        </header>
        <section>
            <article id="seccionInicio" class="container">
                <div id="login-box">
                    @using (Html.BeginForm(new { ReturnUrl = ViewBag.ReturnUrl })) {
                        @Html.AntiForgeryToken()
                        @Html.ValidationSummary(true)

                        <table>
                            <tr>
                                <td>
                                    <span>Para ingresar es necesario contar con su nombre de usuario y contraseña  que se le brindó en las oficinas.</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    @Html.TextBoxFor(m => m.UserName, new { placeholder="     nombre de usuario", @class="inputUser"})
                                    @Html.ValidationMessageFor(m => m.UserName)
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    @Html.PasswordFor(m => m.Password, new { placeholder="     contraseña", @class="inputPassword"})
                                    @Html.ValidationMessageFor(m => m.Password)
                                    @*Html.CheckBoxFor(m => m.RememberMe)
                                    @Html.LabelFor(m => m.RememberMe, new { @class = "checkbox" })*@
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="controles">
                                        <a href="#" class="reqPass hide">olvidé mi contraseña</a>
                                        <input type="submit" value="entrar" class="btn-entrar" />
                                    </div>
                                </td>
                            </tr>
                        </table>
                    }
                </div>

            </article>
        </section>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <img src="~/Images/logOn/logo_2.png" class="logo" />
                        <div class="textos">
                            <span class="negritas">SISTEMA DE</span><br />
                            <span>FIRMA MÚLTIPLE</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        @section Scripts {
            <script src="@Url.Content("~/Scripts/jquery-1.11.1.min.js")"></script>
            <script>
                $(document).ready(function () {
                    if ("@ViewBag.ReturnUrl" != "/") {

                    }
                });
            </script>                   
        }
    </body>
</html>