<h1>Editar Proyecto #<?php echo $item['id_proyecto']; ?></h1>
<form action="index.php?route=proyecto_edit&id=<?php echo $item['id_proyecto']; ?>" method="post" id="proyEdit">
    <label>Nombre</label>
    <input type="text" name="nombre" value="<?php echo htmlspecialchars($item['nombre']); ?>" required>
    <label>Descripción</label>
    <textarea name="descripcion"><?php echo htmlspecialchars($item['descripcion']); ?></textarea>
    <label>Estado</label>
    <input type="text" name="estado" value="<?php echo htmlspecialchars($item['estado']); ?>">
    <button type="submit">Guardar</button>
</form>
