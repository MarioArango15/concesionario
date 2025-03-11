<?php
include 'db.php';

$sql = "SELECT compras.*, clientes.nombre AS cliente_nombre, coches.marca, coches.modelo, coches.matricula, coches.precio 
        FROM compras
        JOIN clientes ON compras.id_cliente = clientes.id
        JOIN coches ON compras.id_coche = coches.id";
$stmt = $pdo->query($sql);
$compras = $stmt->fetchAll();

echo "<table>";
echo "<tr><th>Cliente</th><th>Coche</th><th>Precio</th><th>Fecha Compra</th></tr>";

foreach ($compras as $compra) {
    echo "<tr>
        <td>{$compra['cliente_nombre']}</td>
        <td>{$compra['marca']} {$compra['modelo']} ({$compra['matricula']})</td>
        <td>{$compra['precio']}</td>
        <td>{$compra['fecha']}</td>
    </tr>";
}

echo "</table>";
?>