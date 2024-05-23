<header>
       
       <nav>
           <div class="nav-container">
               <div class="logo-text">
                   <img class="logo" src="<?php echo $rutaLocal?>Views/assets/imagenes/logo.png" alt="">
                   <a href="<?php echo $rutaLocal ?>Client/CANP_Cliente">TravelHub</a>
               </div>
                    <h1> Dashboard del Cliente</h1>
               <ul class="nav-links">
                
                   <li>Admin | <?php echo $_SESSION["nombre"] ?></li>
                   <li><a href="<?php echo $rutaLocal?>logout">Salir</a></li>
               </ul>
           </div>
       </nav>

   </header>