<h1>Registrar Producto o Servicio</h1>

<?php echo validation_errors(); ?>

<?php echo form_open('agregar_producto') ?>
  <label for="numero_factura">Nro Factura:</label>
  <input type="input" name="numero_factura" value="<?php echo set_value('numero_factura', $numero_factura) ?>" readonly><br />

  <label for="marca">Marca</label>
  <input type="input" name="marca" value="<?php echo set_value('marca') ?>"><br />

  <label for="Nombre">Nombre</label>
  <input type="input" name="nombre" value="<?php echo set_value('nombre') ?>"><br />

  <label for="precio">Precio</label>
  <input type="input" name="precio" value="<?php echo set_value('precio') ?>"><br />

  <label for="cantidad">Cantidad</label>
  <input type="input" name="cantidad" value="<?php echo set_value('cantidad') ?>"><br/>

  <label for="otro">Registrar otro: </label>
  <input type="checkbox" name="otro" value="1" checked><br />
  <input type="submit" name="submit" value="Registrar" />

</form>

<a href="<?php echo site_url('facturas') ?>"><button>Cancelar</button></a>
