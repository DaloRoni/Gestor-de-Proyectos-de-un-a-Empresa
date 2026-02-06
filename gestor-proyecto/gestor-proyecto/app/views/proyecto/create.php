<h1>Crear Proyecto</h1>
<form action="index.php?route=proyecto_create" method="post" id="proyCreate">
    <label>Nombre</label>
    <input type="text" name="nombre" required>
    <label>Descripción</label>
    <textarea name="descripcion"></textarea>
    <label>Estado</label>
    <input type="text" name="estado" value="Pendiente">
    <button type="submit">Crear</button>
</form>
