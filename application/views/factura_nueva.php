<h1>Registrar Factura</h1>

<?php echo validation_errors(); ?>

<?php echo form_open('factura_nueva') ?>

  <label class="sr-only" for="numero">Número</label>
  <input class="form-control" type="input" name="numero" value="<?php echo set_value('numero') ?>" placeholder="Número"><br />

  <label class="sr-only" for="fecha">Fecha</label>
  <input class="form-control" type="input" name="fecha" value="<?php echo set_value('fecha') ?>" placeholder="Fecha"><br />

  <label class="sr-only" for="establecimiento">Establecimiento</label>
  <input class="form-control" type="input" name="establecimiento" value="<?php echo set_value('establecimiento') ?>" placeholder="Establecimiento"><br />

  <input class="btn btn-default" type="submit" name="submit" value="Registrar" />

</form>

<a href="<?php echo site_url('facturas/elegir_factura') ?>"><button class="btn btn-default">Agregar productos a factura existente</button></a>
