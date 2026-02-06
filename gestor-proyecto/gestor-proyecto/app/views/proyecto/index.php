<h1>Proyectos</h1>
<a class="btn" href="index.php?route=proyecto_create">Crear nuevo</a>
<table>
    <thead><tr><th>Id</th><th>Nombre</th><th>Estado</th><th>Acciones</th></tr></thead>
    <tbody>
    <?php foreach ($items as $it): ?>
        <tr>
            <td><?php echo $it['id_proyecto']; ?></td>
            <td><?php echo htmlspecialchars($it['nombre']); ?></td>
            <td><?php echo htmlspecialchars($it['estado']); ?></td>
            <td>
                <a href="index.php?route=proyecto_show&id=<?php echo $it['id_proyecto']; ?>">Ver</a>
                <a href="index.php?route=proyecto_edit&id=<?php echo $it['id_proyecto']; ?>">Editar</a>
                <a href="#" data-delete="index.php?route=proyecto_delete&id=<?php echo $it['id_proyecto']; ?>" class="link-delete">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
