<h1>Proyecto: <?php echo htmlspecialchars($item['nombre']); ?></h1>
<p><?php echo nl2br(htmlspecialchars($item['descripcion'])); ?></p>
<p>Estado: <?php echo htmlspecialchars($item['estado']); ?></p>
<p>Creado: <?php echo htmlspecialchars($item['fecha_creacion']); ?></p>
<a href="index.php?route=proyectos">Volver</a>
