<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Line */
/* @var $form yii\widgets\ActiveForm */
/* @var $adminPackages \app\models\AdminPackage */
/* @var $bouquet \app\models\Bouquet */
/* @var $dataModels */

?>
<div style="padding: 0 20%">
    <?php $form = ActiveForm::begin(); ?>
    <table>
        <tr>
            <td style="padding: 0 10px">
                <input type="text" name="daterange" value="01/01/2018 - 01/15/2018" style="background: lightgray;border: 2px;padding: 5px;"/>
            </td>
            <td style="padding: 0 10px">
                <div class="form-group">
                    <select class="form-control" name="status">
                        <option value="1" checked>1</option>
                        <option value="0">0</option>
                    </select>
                </div>
            </td>
            <td style="padding: 0 10px"><div style="padding: 0 10px"><button type="submit" class="btn btn-success btn-lg" >Draw chart</button></div></td>
        </tr>
    </table>

    <div style="width: 800px; height: 500px">
        <canvas id="myChart"></canvas>
    </div>

    <?php ActiveForm::end();?>
</div>

<?php
$date = $dataModels["date"];
$data = $dataModels["data"];
$color = $dataModels["color"];
$js = <<< JS
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});
JS;
$this->registerJs($js);


?>
