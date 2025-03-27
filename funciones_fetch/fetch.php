

<!-- Este archivo se utiliza para realizar la conexión del modal con la base de datos respecto al modal
que se encuentra en el index.  -->

<?php
include '../private/conec_identidad_secont.php';
if (!empty($_POST['dep_id'])) {
    $id = intval($_POST['dep_id']);
    $sql = "SELECT * FROM `cat_dependencias` WHERE ID_TIPO_DEPENDENCIA  = $id";
    $query = mysqli_query($conexion_identidad, $sql);
?>
    <option value="">Seleccionar dependencia</option>
    <?php
    while ($row = mysqli_fetch_array($query)) {
    ?>
        <option value="<?php echo htmlentities($row['ID_DEPENDENCIA']); ?>">
            <?php echo htmlentities($row['NOMBRE_DEPENDENCIA']); ?>
        </option>
<?php
    }
}
?>