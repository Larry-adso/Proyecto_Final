<?php
require_once("../db/conection.php");
$db = new Database();
$con = $db->conectar();
session_start();
if (!isset($_SESSION['id_us'])) {
    echo '
            <script>
                alert("Por favor inicie sesión e intente nuevamente");
                window.location = "../../modulo_larry/PHP/login.php";
            </script>
            ';
    session_destroy();
    die();
}

$id_rol = $_SESSION['id_rol'];
if ($id_rol == '5') {
$sql = $con -> prepare ("SELECT * FROM usuarios, puestos, roles WHERE usuarios.id_puesto = puestos.ID and usuarios.id_rol AND usuarios.id_us = '".$_GET['id']."'");
$sql -> execute();
$usua = $sql -> fetch();
?>

<?php
if(isset($_POST["update"]))
{
    $id_us = $_POST['id_us'];
    $nombre_us = $_POST['nombre_us'];
    $apellido_us = $_POST['apellido_us'];
    $correo_us = $_POST['correo_us'];
    $pass = $_POST['pass'];
    $tel_us = $_POST['tel_us'];
    $id_puesto = $_POST['id_puesto'];
    $id_rol = $_POST['id_rol'];
    $Codigo = $_POST['Codigo'];

    $insertSQL = $con->prepare ("UPDATE usuarios SET id_us ='$id_us', nombre_us = '$nombre_us', apellido_us = '$apellido_us', correo_us = '$correo_us', pass = '$pass', tel_us = '$tel_us', id_puesto = '$id_puesto',
    id_rol = '$id_rol', Codigo = '$Codigo' WHERE id_us = '".$_GET['id']."'");
    $insertSQL->execute();
    echo '<script>alert ("Actualización Exitosa");
    window.close("empleados_up.php");

    </script>';

    
}
?>

<!DOCTYPE html>
<html lang="en">
    <script>
        function centrar() {
            iz=(screen.width-document.body.clientwidth) / 2;
            de=(screen.height-document.body.clientHeight) / 2;
            moveTo(iz,de);
        }
    </script>    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Actualizar datos</title>
</head>

<body onload="centrar();">

        <table class="center">
            <form autocomplete="off" name="form_regis" method="POST">

            <tr>
                    <td>ID usuario</td>
                    <td><input name ="id_us" value="<?php echo $usua['id_us']?>" readonly></td>
                </tr>

                <tr>
                    <td>Nombres</td>
                    <td><input name ="nombre_us" value="<?php echo $usua['nombre_us']?>"></td>
                </tr>

                <tr>
                    <td>Apellidos</td>
                    <td><input name ="apellido_us" value="<?php echo $usua['apellido_us']?>" ></td>
                </tr>

                <tr>
                    <td>Correo</td>
                    <td><input name ="correo_us" value="<?php echo $usua['correo_us']?>" ></td>
                </tr>

                <tr>
                    <td>Contraseña</td>
                    <td><input name ="pass" value="<?php echo $usua['pass']?>"></td>
                </tr>

                <tr>
                    <td>Telefono</td>
                    <td><input name ="tel_us" value="<?php echo $usua['tel_us']?>"></td>
                </tr>
                <tr>
                <tr>
                    <td>Puesto</td>   
                    <td>                 
                <select name="id_puesto">
                    <option value="<?php echo($usua['id_puesto'])?>"><?php echo($usua['cargo'])?></option>
                <?php
                    $control = $con->prepare("SELECT * from estado where ID_Es > 3");
                    $control->execute();
                    while ($fila = $control->fetch(PDO::FETCH_ASSOC)) {
                     echo "<option value=" . $fila['id_puesto'] . ">" . $fila['id_puesto'] . "</option>";
                    }
                ?>

            </select>
                    </td>
                </tr>

                <tr>
                    <td>Rol</td>   
                    <td>                 
                <select name="id_rol">
                    <option value="<?php echo($usua['id_rol'])?>"><?php echo($usua['TP_user'])?></option>
                <?php
                    $control = $con->prepare("SELECT * from roles where ID > 0");
                    $control->execute();
                    while ($fila = $control->fetch(PDO::FETCH_ASSOC)) {
                     echo "<option value=" . $fila['ID'] . ">" . $fila['TP_user'] . "</option>";
                    }
                ?>

            </select>
                    </td>
                </tr>
        
                </tr>
            
        
                </tr>

                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr> 
                <tr>
                    <td><input type="submit" name="update" value="Actualizar"></td>
            </tr>
            </form>
            </table>

            </body>
            </html>
            <?php
} else {
    echo '
    <script>
        alert("su rol no tiene acceso a esta pagina");
        window.location = "../../modulo_larry/PHP/login.php";
    </script>
    ';
}
?>