<h1>Registrar Factura</h1>

<?php echo validation_errors(); ?>

<?php echo form_open('factura_nueva') ?>

  <label for="numero">Número</label>
  <input type="input" name="numero" value="<?php echo set_value('numero') ?>"><br />

  <label for="fecha">Fecha</label>
  <input type="input" name="fecha" value="<?php echo set_value('fecha') ?>"><br />

  <label for="establecimiento">Establecimiento</label>
  <input type="input" name="establecimiento" value="<?php echo set_value('establecimiento') ?>"><br />

  <input type="submit" name="submit" value="Registrar" />

</form>

<a href="<?php echo site_url('facturas/elegir_factura') ?>"><button>Agregar productos a factura existente</button></a>
