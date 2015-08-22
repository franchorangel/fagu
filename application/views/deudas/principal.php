<h1>Deudas</h1>
<h3>Registrar</h3>
<?php echo validation_errors(); ?>

<?php echo form_open('index', 'class="form-inline"') ?>

  <label class="sr-only" for="momento"></label>
  <input class="form-control" type="input" name="momento" value="<?php echo set_value('momento') ?>" placeholder="Momento">

  <label class="sr-only" for="comida">Comida</label>
  <input class="form-control" type="input" name="comida" value="<?php echo set_value('comida') ?>" placeholder="Comida">

  <label class="sr-only" for="hora">Hora</label>
  <input class="form-control" type="input" name="hora" value="<?php echo set_value('hora') ?>" placeholder="hh:mm">

  <label class="sr-only" for="fecha">Fecha</label>
  <input class="form-control" type="date" name="establecimiento" value="<?php echo set_value('fecha') ?>" placeholder="Fecha">

  <input class="btn btn-primary" type="submit" name="submit" value="Registrar" />

</form>
//Mostrar deudas pendientes, sugerencias de pago, calculo de intereses, etc
