
<h1>Facturas</h1>
<h3>Registrar</h3>
<?php echo validation_errors(); ?>

<?php echo form_open('factura_nueva', 'class="form-inline"') ?>

  <label class="sr-only" for="numero_factura">Número</label>
  <input class="form-control" type="input" name="numero_factura" value="<?php echo set_value('numero_factura') ?>" placeholder="Número">

  <label class="sr-only" for="fecha">Fecha</label>
  <input class="form-control" type="input" name="fecha" value="<?php echo set_value('fecha') ?>" placeholder="Fecha">

  <label class="sr-only" for="establecimiento">Establecimiento</label>
  <input class="form-control" type="input" name="establecimiento" value="<?php echo set_value('establecimiento') ?>" placeholder="Establecimiento">

  <input class="btn btn-primary" type="submit" name="submit" value="Registrar" />

</form>

<div class="row">
  <h3 class="col-md-3">Últimas Registradas</h3>
  <a href="#" class="col-md-1" style="margin-top:25px; margin-left:-55px;">Ver todas</a>
</div>

<div class="table-responsive">
  <table class="table">
    <tbody>
  <?php foreach ($facturas as $factura): ?>
    <tr>
      <td><?php echo $factura['numero'] ?></td>
      <td><?php echo $factura['fecha'] ?></td>
      <td><?php echo $factura['establecimiento'] ?></td>
      <td><a href="<?php echo site_url('facturas/detalles').'/'.$factura['numero'] ?>"><button class="btn btn-sm btn-default btn-warning">Ver / Editar</button></a></td>
    </tr>
  <?php endforeach ?>
    </tbody>
  </table>
</div>
