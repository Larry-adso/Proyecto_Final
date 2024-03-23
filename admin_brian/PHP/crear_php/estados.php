<?php
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
if ($id_rol == '4') {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar Estados</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/7fd910d257.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="underlay-photo"></div>
    <div class="underlay-black"></div>

    

    <form class="login-form" action="estados.php" method="post">
        <h1>Cargar Estados</h1>
        <p class="login-text">
            <span class="fa-stack">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa-solid fa-traffic-light fa-stack-1x"></i>
                </span>
                <h2>Inserta Un Nuevo Estado</h2>
                <?php
    include '../../conexion/db.php';

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tp_estado = $_POST['tp_estado'];
        $sql = "INSERT INTO estado (Estado) VALUES ('$tp_estado')";

        if ($conn->query($sql) === TRUE) {
            $mensaje = "el estado"." "."'".$tp_estado."'"." "."ha sido insertado correctamente.";
        } else {
            $mensaje = "Error: " . $sql . "<br>" . $conn->error;
        }

        
        header("Location: estados.php?mensaje=" . urlencode($mensaje));
        exit(); 
    }

   
    if (isset($_GET['mensaje'])) {
        echo "<h2>" . urldecode($_GET['mensaje']) . "</h2>";
    }
    ?>

        </p>
        <input type="text" class="login-username" autofocus="true" required="true" placeholder="ESTADO" name="tp_estado" />
        <input type="submit" name="Login" value="Registrar Estado" class="login-submit" />
    </form>
</body>

</html>
<?php
} else {
    echo '
    <script>
        alert("su rol no tiene acceso a esta pagina");
        window.location = "../../../modulo_larry/PHP/login.php";
    </script>
    ';
}
?>