<?php
class LoginCtr{

        //VALIDAMOS EL LOGIN
        static public function validarLoginCtr(){
                if(isset($_POST["btnLogin"])){
                        // Variables del login
                        $usuario = $_POST["usuario"];
                        $password = $_POST["password"];

                        // Variables del admin
                        $user_admin = "admin_CANP";
                        $password_admin = "es1921022834";


                        // Varibales del cliente
                        $user_cliente = "cliente_CANP";
                        $password_cliente = "es1921022834";

                        // Validamos el usuario y el correo para el Admin
                                if ($usuario == $user_admin && $password == $password_admin) {
                                   
                                       // Establecer las variables de sesión
                                        $_SESSION['validar'] = true;
                                        $_SESSION['usuario'] = "admin";
                                        $_SESSION['nombre'] =  $user_admin;
                                        
                                        // Mostrar mensaje de éxito
                                        echo '<div class="alert success">
                                                <strong>Correcto!</strong> Ingresando a tu dashboard, espera.
                                                </div>';
                                        
                                        // Redirigir después de 5 segundos
                                        echo '<script>
                                                setTimeout(function() {
                                                        window.location.href = "Admin/CANP_Admin";
                                                }, 2000);
                                                </script>';
                                } 
                                 // Validamos el usuario y el correo para el Cliente
                                else if($usuario ==$user_cliente && $password == $password_cliente){
                                     
                                        $_SESSION['validar'] = true;
                                        $_SESSION['usuario'] = "cliente";
                                        $_SESSION['nombre'] = $user_cliente;
                                     
                                       // Mostrar mensaje de éxito
                                       echo '<div class="alert success">
                                       <strong>Correcto!</strong> Ingresando a tu dashboard, espera.
                                       </div>';
                               
                                        // Redirigir después de 5 segundos
                                        echo '<script>
                                                setTimeout(function() {
                                                        window.location.href = "Client/CANP_Cliente";
                                                }, 2000);
                                                </script>';
                                       
                                }
                                else if($usuario == "" || $password == ""){
                                         echo ' <div class="alert warning">
                                         <strong>Error!</strong> Las credenciales no pueden quedar vacías.
                                     </div>';
                                }
                                else{
                                        echo ' <div class="alert warning">
                                        <strong>Error!</strong> Credenciales incorrectas
                                    </div>';
                                }
        
                    


                }


        }

}

    