<?php
class LoginCtr{

        //VALIDAMOS EL LOGIN
        static public function validarLoginCtr(){
                if(isset($_POST["btnLogin"])){
                        // Variables del login
                       $datos = array("usuario"=>$_POST["usuario"], "password"=>  $_POST["password"]); 
                        $respuesta = LoginMdl::validarLoginMdl("tblusuarios", $datos);

                        // Validamos el usuario y el correo para el Admin
                                if(is_array($respuesta)){
                                if ($datos["usuario"] == $respuesta["Usuario"] && $datos["password"] == $respuesta["Password"]) {

                                        if($respuesta["Rol"] == 1){ // ADMIN
                                                // Establecer las variables de sesión
                                                $_SESSION['validar'] = true;
                                                $_SESSION['usuario'] = $respuesta["Usuario"];
                                                $_SESSION['nombre'] =  $respuesta["Nombre"]." ".$respuesta["Apellido"];
                                                $_SESSION['rol'] =  $respuesta["Rol"];
                                                
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
                                        }else{
                                                $_SESSION['validar'] = true;
                                                $_SESSION['usuario'] = $respuesta["Usuario"];
                                                $_SESSION['nombre'] =  $respuesta["Nombre"]." ".$respuesta["Apellido"];
                                                $_SESSION['rol'] =  $respuesta["Rol"];
                                             
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
                                   
                                     
                                } 
                                
                                else if($datos["usuario"] == "" || $datos["password"] == ""){
                                         echo ' <div class="alert warning">
                                         <strong>Error!</strong> Las credenciales no pueden quedar vacías.
                                     </div>';
                                }
                                else{
                                        echo ' <div class="alert warning">
                                        <strong>Error!</strong> Credenciales incorrectas
                                    </div>';
                                }
        
                        }else{
                                echo ' <div class="alert warning">
                                <strong>Error!</strong> Credenciales incorrectas
                            </div>';
                        }


                }


        }

}

    