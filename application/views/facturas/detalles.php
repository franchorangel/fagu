<a href="<?php echo site_url('facturas') ?>"><button class="btn btn-default">Regresar</button></a>

<h1>Detalles de Factura #<?php echo $numero_factura ?></h1> <!--Agregar establecimiento-->

<?php echo validation_errors(); ?>

<?php echo form_open('facturas/detalles/'.$numero_factura, 'class="form-inline"') ?>
  <label for="numero_factura" class="sr-only">Nro Factura:</label>
  <input class="sr-only" type="input" name="numero_factura" value="<?php echo set_value('numero_factura', $numero_factura) ?>" readonly>

  <label for="marca" class="sr-only">Marca</label>
  <input class="form-control" type="input" name="marca" value="<?php echo set_value('marca') ?>" placeholder="Marca">

  <label for="Nombre" class="sr-only">Nombre</label>
  <input class="form-control" type="input" name="nombre" value="<?php echo set_value('nombre') ?>" placeholder="Nombre">

  <label for="precio" class="sr-only">Precio</label>
  <input class="form-control" type="input" name="precio" value="<?php echo set_value('precio') ?>" placeholder="Precio">

  <label for="cantidad" class="sr-only">Cantidad</label>
  <input class="form-control" type="input" name="cantidad" value="<?php echo set_value('cantidad') ?>" placeholder="Cantidad">

  <input class="btn btn-default btn-primary" type="submit" name="submit" value="Agregar" />

</form>

<div class="table-responsive">
  <table class="table">
    <thead>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Cantidad</th>
    </thead>
    <tbody>

<?php if( sizeof($productos) > 0 ): ?>
  <?php foreach ($productos as $producto): ?>
    <tr>
      <td><?php echo $producto['nombre'] ?></td>
      <td><?php echo $producto['precio'] ?></td>
      <td><?php echo $producto['cantidad'] ?></td>
      <td>
        <a href="<?php //Ir a pantalla de edicion de producto['id'] ?>"><button class="btn btn-sm btn-warning">Cambiar</button></a>
        <a href="<?php echo site_url('facturas/eliminar_producto/'.$producto['id'].'/'.$numero_factura); ?>"><button class="btn btn-sm btn-danger">Borrar</button></a>
      </td>
    </tr>
  <?php endforeach ?>
<?php else: ?>
  <tr><td>Esta factura todavía no tiene productos</td></tr>
<?php endif; ?>

    </tbody>
  </table>
</div>
