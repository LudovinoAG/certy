<h6 class='username'>
    <?php
         session_start();
         if(isset($_SESSION['nombre'])){
            echo '<span id="TitleUsuario"> ('.$_SESSION["tarjeta"].') '.$_SESSION["nombre"].' [</span><a class="btn btn-link btnlink" href="cerrar.php">Cerrar Sesión</a>]';
         }else{
                 header('location: login.php');
         }
    ?>
</h6>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Certificadoras</title>
</head>

<body>
<?php include_once('countAgent.php'); ?>
    <form id="form-ventas" class="form form-horizontal" action="save.php" method="POST">
        <h3>REGISTRO DE TIPIFICACIONES </h3>
        <div class="row">
            <div class="col-12-lg col-12-md col-12-sm">
                <div class="form-group">
                    <label class="form-label" for="lstProductos">Producto
                        <select class="form-control" name="lstProductos" id="lstProductos" required>
                            <option value=""></option>
                            <option value="Lineas Nuevas">Lineas Nuevas</option>
                            <option value="Renovacion">Renovacion</option>
                            <option value="TV">TV+</option>
                            <option value="Upsell">Upsell</option>
                            <option value="Combo Fijo">Combo Fijo</option>
                            <option value="Inalambrico">Inalambrico</option>
                            <option value="Claro Internet">Claro Internet</option>
                            <option value="Accesorios">Accesorios</option>
                        </select>
                    </label>

                    <label for="">BAN
                        <input name="ban" type="text" class="form-control" size="15" maxlength="15" required>
                    </label>

                    <label for="">Vendedor
                        <input name="agente" type="text" class="form-control" size="45" maxlength="65" required>
                    </label>

                    <label class="form-label" for="lstSegmento">Segmento
                        <select class="form-control" name="lstSegmento" id="lstSegmento" required>
                            <option value=""></option>
                            <option value="INBOUND">INBOUND</option>
                            <option value="OUTBOUND">OUTBOUND</option>
                        </select>
                    </label>

               

                    <input type="submit" class="btn btn-success btn-md" value="Guardar" />
                    <input type="reset" class="btn btn-danger btn-md" value="Limpiar" />

                </div>

            </div>
        </div>
    </form>
    <br>
    <div id="listado-registro">
        <?php include_once('listado.php'); ?>
    </div>
    
</body>

<script src="bootstrap.min.js"></script>
</html>