<h2>Documentos</h2>
<a href="?logout=1">Logout</a>

<form method="POST" action="index.php">
    <input name="nombre" placeholder="Nombre">
    <input name="contenido" placeholder="Contenido">
    <select name="tipo">
        <option value="1">Instructivo</option>
        <option value="2">Manual</option>
    </select>
    <select name="proceso">
        <option value="1">Ingeniería</option>
        <option value="2">Calidad</option>
    </select>
    <button name="create">Crear</button>
</form>

<table border="1">
<tr><th>ID</th><th>Nombre</th><th>Codigo</th><th>Acciones</th></tr>
<?php foreach ($docs as $d): ?>
<tr>
<td><?= $d['DOC_ID'] ?></td>
<td><?= htmlspecialchars($d['DOC_NOMBRE']) ?></td>
<td><?= $d['DOC_CODIGO'] ?></td>
<td><a href="?delete=1&id=<?= $d['DOC_ID'] ?>">Eliminar</a></td>
</tr>
<?php endforeach; ?>
</table>
