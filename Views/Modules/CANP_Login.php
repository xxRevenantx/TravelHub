


<?php include 'Components/header.php' ?>
    <div class="login-container">
        <form  method="post">
            <h2 class="login">Login</h2>
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" placeholder="Usuario" >
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Contraseña" >
            </div>

            <button type="submit" class="btnLogin" name="btnLogin">Iniciar Sesión</button>
        </form>
        <?php
        $login = new LoginCtr();
        $login -> validarLoginCtr();
        ?>
    </div>
