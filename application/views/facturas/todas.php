<a href="<?php echo site_url('facturas') ?>"><button class="btn btn-default">Regresar</button></a>

<div class="row">
  <h3 class="col-md-4 col-xs-8 col-lg-3">Facturas Registradas</h3>
</div>
<?php echo $links; ?>
<div class="table-responsive">
  <table class="table">
    <tbody>
      <thead>
        <th># Factura</th>
        <th>Fecha</th>
        <th>Establecimiento</th>
        <th>Total Bs.</th>
        <th></th>
      </thead>
      <?php foreach ($facturas as $factura): ?>
        <tr>
          <td><?php echo $factura['numero'] ?></td>
          <td><?php echo strftime('%d %b %y', strtotime($factura['fecha'])); ?></td>
          <td><?php echo $factura['establecimiento'] ?></td>
          <td><?php echo $total[$factura['numero']]; ?></td>
          <td><a href="<?php echo site_url('facturas/detalles').'/'.$factura['numero'] ?>"><button class="btn btn-sm btn-default btn-warning">Ver / Editar</button></a></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>

<?php echo $links; ?>
