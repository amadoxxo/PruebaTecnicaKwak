<h2>Documentos</h2>
<a href="?logout=1">Logout</a>

<?php $editando = isset($docEdit); ?>

<form method="GET" action="index.php">
    <input name="q" placeholder="Buscar por nombre o código">
    <button>Buscar</button>
</form>

<form method="POST" action="index.php">
    <!-- ID oculto para editar -->
    <?php if ($editando): ?>
        <input type="hidden" name="id" value="<?= $docEdit['DOC_ID'] ?>">
    <?php endif; ?>

    <input name="nombre" placeholder="Nombre"
        value="<?= $editando ? htmlspecialchars($docEdit['DOC_NOMBRE']) : '' ?>">

    <input name="contenido" placeholder="Contenido"
        value="<?= $editando ? htmlspecialchars($docEdit['DOC_CONTENIDO']) : '' ?>">

    <select name="tipo">
        <option value="1" <?= $editando && $docEdit['DOC_ID_TIPO'] == 1 ? 'selected' : '' ?>>Instructivo</option>
        <option value="2" <?= $editando && $docEdit['DOC_ID_TIPO'] == 2 ? 'selected' : '' ?>>Manual</option>
    </select>

    <select name="proceso">
        <option value="1" <?= $editando && $docEdit['DOC_ID_PROCESO'] == 1 ? 'selected' : '' ?>>Ingeniería</option>
        <option value="2" <?= $editando && $docEdit['DOC_ID_PROCESO'] == 2 ? 'selected' : '' ?>>Calidad</option>
    </select>

    <!-- Botón cambia según modo -->
    <button name="<?= $editando ? 'update' : 'create' ?>">
        <?= $editando ? 'Actualizar' : 'Crear' ?>
    </button>

</form>

<table border="1">
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Codigo</th>
    <th>Acciones</th>
</tr>

<?php foreach ($docs as $d): ?>
<tr>
    <td><?= $d['DOC_ID'] ?></td>
    <td><?= htmlspecialchars($d['DOC_NOMBRE']) ?></td>
    <td><?= $d['DOC_CODIGO'] ?></td>
    <td>
        <a href="?edit=1&id=<?= $d['DOC_ID'] ?>">Editar</a>
        |
        <a href="?delete=1&id=<?= $d['DOC_ID'] ?>">Eliminar</a>
    </td>
</tr>
<?php endforeach; ?>

</table>