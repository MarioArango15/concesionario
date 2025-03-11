<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $placa = $_POST["placa"];
    $precio = $_POST["precio"];

    $sql = "INSERT INTO autos (marca, modelo, placa, precio) VALUES ('$marca', '$modelo', '$placa', '$precio')";
    if ($conn->query($sql)) {
        echo "Auto agregado correctamente.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM autos");
?>

<h2>Registrar Auto</h2>
<form method="post">
    Marca: <input type="text" name="marca" required><br>
    Modelo: <input type="text" name="modelo" required><br>
    Placa: <input type="text" name="placa" required><br>
    Precio: <input type="number" name="precio" step="0.01" required><br>
    <button type="submit">Registrar</button>
</form>

<h2>Autos Registrados</h2>
<table border="1">
    <tr><th>ID</th><th>Marca</th><th>Modelo</th><th>Placa</th><th>Precio</th></tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["marca"] ?></td>
            <td><?= $row["modelo"] ?></td>
            <td><?= $row["placa"] ?></td>
            <td><?= $row["precio"] ?></td>
        </tr>
    <?php endwhile; ?>
</table>
