<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente_id = $_POST["cliente_id"];
    $auto_id = $_POST["auto_id"];
    $fecha = $_POST["fecha"];

    $sql = "INSERT INTO compras (cliente_id, auto_id, fecha) VALUES ('$cliente_id', '$auto_id', '$fecha')";
    if ($conn->query($sql)) {
        echo "Compra registrada correctamente.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$clientes = $conn->query("SELECT * FROM clientes");
$autos = $conn->query("SELECT * FROM autos");
?>

<h2>Registrar Compra</h2>
<form method="post">
    Cliente:
    <select name="cliente_id">
        <?php while ($row = $clientes->fetch_assoc()): ?>
            <option value="<?= $row["id"] ?>"><?= $row["nombre"] ?></option>
        <?php endwhile; ?>
    </select><br>

    Auto:
    <select name="auto_id">
        <?php while ($row = $autos->fetch_assoc()): ?>
            <option value="<?= $row["id"] ?>"><?= $row["modelo"] ?> - <?= $row["marca"] ?></option>
        <?php endwhile; ?>
    </select><br>

    Fecha: <input type="date" name="fecha" required><br>
    <button type="submit">Registrar Compra</button>
</form>
