<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nombre"], $_POST["dni"], $_POST["telefono"], $_POST["email"])) {
        $nombre = $_POST["nombre"];
        $dni = $_POST["dni"];
        $telefono = $_POST["telefono"];
        $email = $_POST["email"];

        $sql = "INSERT INTO clientes (nombre, dni, telefono, email) VALUES ('$nombre', '$dni', '$telefono', '$email')";
        if ($conn->query($sql)) {
            echo "Cliente agregado correctamente.";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$result = $conn->query("SELECT * FROM clientes");
?>
<h2>Registrar Cliente</h2>
<form method="post">
    Nombre: <input type="text" name="nombre" required><br>
    DNI: <input type="text" name="dni" required><br>
    Teléfono: <input type="text" name="telefono"><br>
    Email: <input type="email" name="email"><br>
    <button type="submit">Registrar</button>
</form>

<h2>Clientes Registrados</h2>
<table border="1">
    <tr><th>ID</th><th>Nombre</th><th>DNI</th><th>Teléfono</th><th>Email</th><th>Acciones</th></tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["nombre"] ?></td>
            <td><?= $row["dni"] ?></td>
            <td><?= $row["telefono"] ?></td>
            <td><?= $row["email"] ?></td>
            <td><a href="eliminar_cliente.php?id=<?= $row['id'] ?>">Eliminar</a></td>
        </tr>
    <?php endwhile; ?>
</table>
