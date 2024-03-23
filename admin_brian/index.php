<?php
session_start();
if (!isset($_SESSION['id_us'])) {
    echo '
            <script>
                alert("Por favor inicie sesión e intente nuevamente");
                window.location = "../modulo_larry/PHP/login.php";
            </script>
            ';
    session_destroy();
    die();
}

$id_rol = $_SESSION['id_rol'];
if ($id_rol == '5') {
?>
<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7fd910d257.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>TABLAS ADMIN</title>
    <style>
        body {
            font-family: "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            background-color: white;
            font-weight: 300;
            margin: 0;
            padding: 0;
        }



        p {
            color: rgba(255, 255, 255, 0.5);
            font-weight: 300;
        }

        h2 {
            font-size: 20px;
            color: black;
        }

        .content {
            padding: 50px 0;
        }

        .custom-table {
            text-align: center;
            width: 100%;
            border-collapse: collapse;
        }

        .custom-table thead tr,
        .custom-table thead th {
            padding: 20px 0;
            border: 2px solid black;
            color: #fff;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .2rem;
            background-color: rgb(65, 65, 65);

        }

        .custom-table tbody th,
        .custom-table tbody td {
            color: #777;
            font-weight: 400;
            padding: 20px 0;
            font-weight: 300;
            border: 2px solid black;
            transition: .3s all ease;
            background-color: rgb(46, 44, 44);
        }

        .custom-table tbody th small,
        .custom-table tbody td small {
            color: rgba(255, 255, 255, 0.3);
            font-weight: 300;
        }

        .custom-table tbody th a,
        .custom-table tbody td a {
            color: rgba(255, 255, 255, 0.3);
            transition: .3s all ease;
        }

        .custom-table tbody th .more,
        .custom-table tbody td .more {
            color: rgba(255, 255, 255, 0.3);
            font-size: 11px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: .2rem;
        }

        .custom-table tbody tr:hover td,
        .custom-table tbody tr:focus td {
            color: #fff;
        }

        .custom-table tbody tr:hover td a,
        .custom-table tbody tr:focus td a {
            color: #ffffff;
        }

        .custom-table tbody tr:hover td .more,
        .custom-table tbody tr:focus td .more {
            color: #ffffff;
        }

        /* Botón CARGAR */
        .button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: transparent;
            color: black;
            border: 2px solid black;
            border-radius: 4px;
            text-transform: uppercase;
            font-weight: bold;
            text-decoration: none;
            transition: .3s all ease;
            margin-bottom: 15px;
        }

        .button a:hover {
            background-color: black;
            color: white;
        }

        .nav {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            background-color: #777;
            height: 80px;


        }

        .nav a {
            color: #fff;
            text-decoration: none;
            margin: 5px;
            padding: 5px;
            font-size: 20px;
            transition: all 0.2s;

        }

        .nav a i {
            visibility: hidden;
            transition: all 0.2s;
        }

        .nav a:hover i {
            visibility: visible;
            transition: all 0.2s;
            font-size: 30px;
        }

        .nav a:hover {
            color: black;
            transition: all 0.2s;
            font-size: 30px;
        }

        /* Media query para estilos específicos en pantallas más pequeñas */
        @media screen and (max-width: 768px) {
            .nav {
                height: auto;
                /* Ajusta la altura automáticamente en pantallas más pequeñas */
                flex-direction: column;
                /* Cambia la dirección de los elementos a columna */
                align-items: flex-start;
                /* Alinea los elementos a la izquierda */
            }

            .nav a {
                margin: 5px 0;
                /* Ajusta el margen vertical */
                padding: 10px;
                /* Ajusta el relleno */
                font-size: 18px;
                /* Tamaño de fuente fijo */
            }

            .nav a i {
                font-size: 24px;
                /* Tamaño de ícono fijo */
            }

            .nav a:hover i {
                font-size: 28px;
                /* Ajusta el tamaño del ícono al pasar el cursor */
            }

            .nav a:hover {
                font-size: 24px;
                /* Ajusta el tamaño del texto al pasar el cursor */
            }
        }
    </style>
</head>

<body>

    <nav class="nav">
        <a href="../modulo_angie/admin/form_empleados.php"><i class="fa-solid fa-users"></i> Registrar usuarios</a>
        <a href="../modulo_angie/admin/form_prestamos.php"><i class="fa-solid fa-wallet"></i> Registrar prestamos</a>
        <a href="../modulo_angie/admin/form_puestos.php"><i class="fa-solid fa-address-book"></i> Registrar puestos</a>
        <a href="../modulo_angie/admin/form_permisos.php"><i class="fa-solid fa-clock"></i> Registrar Permisos</a>
        <a href="../modulo_larry/PHP/cerrar.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a>
    </nav>



    <div class="content">
        <div class="container">
            <h2 class="mb-5">TABLA ROLES</h2>
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <div class="button"><a href='PHP/crear_php/roles.php'>CARGAR ROLES</a></div>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">ROL</th>
                            <th scope="col">Acciones</th>
                            <th scope="col">CARGAR</th>
                        </tr>
                    </thead>
                    <tbody class="tbody">
                        <?php
                        include 'conexion/db.php';

                        $sql = "SELECT * FROM roles";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['ID'] . "</td>";
                                echo "<td>" . $row['TP_user'] . "</td>";
                                echo "<td><a href='PHP/editar_php/editar_roles.php?id=" . $row['ID'] . "'>Editar</a> | <a href='PHP/eliminar_php/eliminar_rol.php?id=" . $row['ID'] . "'>Eliminar</a></td>";
                                echo "<td><a href='PHP/crear_php/roles.php'>CARGAR</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No hay ROLES registrados.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <!-- Botón CARGAR siempre activo -->

            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <h2 class="mb-5">TABLA SALUD</h2>
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <div class="button"><a href='PHP/crear_php/salud.php'>CARGAR SALUD</a></div>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">VALOR</th>
                            <th scope="col">Acciones</th>
                            <th scope="col">CARGAR</th>
                        </tr>
                    </thead>
                    <tbody class="tbody">
                        <?php
                        include 'conexion/db.php';

                        $sql = "SELECT * FROM salud";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['ID'] . "</td>";
                                echo "<td>" . $row['valor'] . " %" . "</td>";
                                echo "<td><a href='PHP/editar_php/editar_salud.php?id=" . $row['ID'] . "'>Editar</a> | <a href='PHP/eliminar_php/eliminar_salud.php?id=" . $row['ID'] . "'>Eliminar</a></td>";
                                echo "<td><a href='PHP/crear_php/salud.php'>CARGAR</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No hay SALUD registrados.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <h2 class="mb-5">TABLA PENSION</h2>
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <div class="button"><a href='PHP/crear_php/pension.php'>CARGAR PENSION</a></div>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">VALOR</th>
                            <th scope="col">Acciones</th>
                            <th scope="col">CARGAR</th>
                        </tr>
                    </thead>
                    <tbody class="tbody">
                        <?php
                        include 'conexion/db.php';

                        $sql = "SELECT * FROM pension";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['ID'] . "</td>";
                                echo "<td>" . $row['valor'] . " %" . "</td>";
                                echo "<td><a href='PHP/editar_php/editar_pension.php?id=" . $row['ID'] . "'>Editar</a> | <a href='PHP/eliminar_php/eliminar_pension.php?id=" . $row['ID'] . "'>Eliminar</a></td>";
                                echo "<td><a href='PHP/crear_php/pension.php'>CARGAR</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No hay pension registrados.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <h2 class="mb-5">TABLA VALOR HORAS EXTRA</h2>
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <div class="button"><a href='PHP/crear_php/vhe.php'>CARGAR VALOR</a></div>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">VALOR</th>
                            <th scope="col">Acciones</th>
                            <th scope="col">CARGAR</th>
                        </tr>
                    </thead>
                    <tbody class="tbody">
                        <?php
                        include 'conexion/db.php';

                        $sql = "SELECT * FROM v_h_extra";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['ID'] . "</td>";
                                echo "<td>" . $row['V_H_extra'] . "</td>";
                                echo "<td><a href='PHP/editar_php/editar_valor_extra.php?id=" . $row['ID'] . "'>Editar</a> | <a href='PHP/eliminar_php/eliminar_v_hora_extra.php?id=" . $row['ID'] . "'>Eliminar</a></td>";
                                echo "<td><a href='PHP/crear_php/vhe.php'>CARGAR</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No hay valores de hora extra registrados.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
<?php
} else {
    echo '
    <script>
        alert("su rol no tiene acceso a esta pagina");
        window.location = "../modulo_larry/PHP/login.php";
    </script>
    ';
}
?>