<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.15.35/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
  $(function () {
    $('#datetimepicker1').datetimepicker({
      format: 'DD/MM/YYYY',
      locale: moment.locale('es'),
    });
  });

  $(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? factory(require('../moment')) :
    typeof define === 'function' && define.amd ? define(['moment'], factory) :
    factory(global.moment)
  }(this, function (moment) { 'use strict';

    var monthsShortDot = 'Ene._Feb._Mar._Abr._May._Jun._Jul._Ago._Sep._Oct._Nov._Dic.'.split('_'),
        monthsShort = 'Ene_Feb_Mar_Abr_May_Jun_Jul_Ago_Sep_Oct_Nov_Dic'.split('_');

    var es = moment.defineLocale('es', {
        months : 'Enero_Febrero_Marzo_Abril_Mayo_Junio_Julio_Agosto_Septiembre_Octubre_Noviembre_Diciembre'.split('_'),
        monthsShort : function (m, format) {
            if (/-MMM-/.test(format)) {
                return monthsShort[m.month()];
            } else {
                return monthsShortDot[m.month()];
            }
        },
        weekdays : 'Domingo_Lunes_Martes_Miércoles_Jueves_Viernes_Sábado'.split('_'),
        weekdaysShort : 'Dom._Lun._Mar._Mié._Jue._Vie._Sáb.'.split('_'),
        weekdaysMin : 'Do_Lu_Ma_Mi_Ju_Vi_Sá'.split('_'),
        longDateFormat : {
            LT : 'H:mm',
            LTS : 'H:mm:ss',
            L : 'DD/MM/YYYY',
            LL : 'D [de] MMMM [de] YYYY',
            LLL : 'D [de] MMMM [de] YYYY H:mm',
            LLLL : 'dddd, D [de] MMMM [de] YYYY H:mm'
        },
        calendar : {
            sameDay : function () {
                return '[hoy a la' + ((this.hours() !== 1) ? 's' : '') + '] LT';
            },
            nextDay : function () {
                return '[mañana a la' + ((this.hours() !== 1) ? 's' : '') + '] LT';
            },
            nextWeek : function () {
                return 'dddd [a la' + ((this.hours() !== 1) ? 's' : '') + '] LT';
            },
            lastDay : function () {
                return '[ayer a la' + ((this.hours() !== 1) ? 's' : '') + '] LT';
            },
            lastWeek : function () {
                return '[el] dddd [pasado a la' + ((this.hours() !== 1) ? 's' : '') + '] LT';
            },
            sameElse : 'L'
        },
        relativeTime : {
            future : 'en %s',
            past : 'hace %s',
            s : 'unos segundos',
            m : 'un minuto',
            mm : '%d minutos',
            h : 'una hora',
            hh : '%d horas',
            d : 'un día',
            dd : '%d días',
            M : 'un mes',
            MM : '%d meses',
            y : 'un año',
            yy : '%d años'
        },
        ordinalParse : /\d{1,2}º/,
        ordinal : '%dº',
        week : {
            dow : 1, // Monday is the first day of the week.
            doy : 4  // The week that contains Jan 4th is the first week of the year.
        }
    });
    return es;
  }));
</script>
<link rel="stylesheet" href="<?php echo base_url('css/datetimepicker.min.css') ?>" />

<h1>Facturas</h1>
<h3>Registrar</h3>
<?php echo validation_errors(); ?>
<?php if ( isset($error) ) { echo $error; } ?>

<?php echo form_open('facturas', 'class="form-inline"') ?>

  <label class="sr-only" for="numero_factura">Número</label>
  <input class="form-control" type="input" name="numero_factura" value="<?php echo set_value('numero_factura') ?>" placeholder="Número">

  <label class="sr-only" for="fecha">Fecha</label>
  <div class ="input-group date" id="datetimepicker1">
    <input class="form-control" type="input" name="fecha" value="<?php echo set_value('fecha') ?>" placeholder="Fecha">
    <span class="input-group-addon">
      <span class="glyphicon glyphicon-calendar"></span>
    </span>
  </div>

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
      <thead>
        <th># Factura</th>
        <th>Fecha</th>
        <th>Establecimiento</th>
        <th></th>
      </thead>
      <?php foreach ($facturas as $factura): ?>
        <tr>
          <td><?php echo $factura['numero'] ?></td>
          <td><?php echo strftime('%d %b %y', strtotime($factura['fecha'])); ?></td>
          <td><?php echo $factura['establecimiento'] ?></td>
          <td><a href="<?php echo site_url('facturas/detalles').'/'.$factura['numero'] ?>"><button class="btn btn-sm btn-default btn-warning">Ver / Editar</button></a></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
