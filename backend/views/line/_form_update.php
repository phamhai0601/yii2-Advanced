<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Line */
/* @var $form yii\widgets\ActiveForm */
/* @var $adminPackages \app\models\AdminPackage */
/* @var $bouquet \app\models\Bouquet */
?>
<hr>
<span class="btn btn-warning btn-lg">Expiration Date: 2019-12-06</span>
<br><br>
<?php $form = ActiveForm::begin(); ?>
<div class="form-group">
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
</div>
<div class="form-group">
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'type'=>'text'])?>
</div>
<div class="form-group pull-right">
    <a id="add_ips" class="btn btn-success btn-lg">Add New IPs</a>
</div>
<div class="clearfix"></div>
<div class="form-group">
    <table class="table table-hover table-bordered table-sortable" id="myTable">
        <thead style="background: lightgray">
        <tr>
            <th class="text-center col-sm-10">IPs</th>
            <th class="text-center col-sm-2"" width="">Option</th>
        </tr>
        </thead>
        <tbody id=ips>
        <?php
            $alowips = json_decode($model->allowed_ips);
        ?>
        <?php if(count($alowips) > 0){
            foreach ($alowips as $item){?>
                <tr>
                    <td class="text-center">
                        <input type="text" name="Line[allowed_ips][]" class="col-sm-12 form-control" value="<?php echo $item; ?>" placeholder="Please enter Ip...">
                    </td>
                    <td class="text-center">
                        <a class="btn btn-danger glyphicon glyphicon-remove"></a>
                    </td>
                </tr>
        <?php }}else{ ?>
                <tr>
                    <td class="text-center">
                        <input type="text" name="Line[allowed_ips][]" class="col-sm-12 form-control"  placeholder="Please enter Ip...">
                    </td>
                    <td class="text-center">
                        <a class="btn btn-danger glyphicon glyphicon-remove"></a>
                    </td>
                </tr>
        <?php }?>
        </tbody>
    </table>
</div>
<div class="form-group">
    <?= $form->field($model, 'reseller_notes')->textarea(['rows' => 4]) ?>
</div>
<div class="form-group">
    <?php
/*    echo '<pre>';
    print_r($model->bouquet);die;*/
    if(in_array("10", json_decode($model->bouquet))) {
        echo "Got Irix";
    }
    ?>
</div>
<div class="clearfix"></div>
<hr>
<div class="form-group">
    <button type="submit" class="btn btn-success btn-lg">Create Line</button>
    <button class="btn btn-danger btn-lg">Back to manage</button>
</div>
</form>
<div class="text-center">Already have an account? <a href="#">Login here</a></div>
</div>

<?php ActiveForm::end();?>
<?php
$js = <<< JS
    var deleRow = function() {
        var numRow = document.getElementById("ips").rows.length;
        var table = document.getElementById("ips");
        if(numRow>1)
        {
            table.deleteRow(0);
        }        
    }
    document.getElementById('add_ips').onclick = function() {
        var table = document.getElementById("ips");
        var row = table.insertRow(0);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        cell2.className='text-center';
        cell1.innerHTML = "<input type='text' name='Line[allowed_ips][]' class='col-sm-12 form-control' placeholder='Please enter Ip...'>";
        cell2.innerHTML = "<a class=\"btn btn-danger glyphicon glyphicon-remove\"></a>";
        var elts = document.getElementsByClassName("btn btn-danger glyphicon glyphicon-remove");
        for (var i = elts.length - 1; i >=0; --i) {
            elts[i].onclick = deleRow;
        }

    }

    document.getElementById("bouquetList").onclick=function() {
        var rowBouquet = document.getElementById("rowbouet");
        var property = rowBouquet.style.display;
        if(property == "none"){
            rowBouquet.style.display="block";
        }else
        {
            rowBouquet.style.display="none";
        }
    }
    document.getElementById("checkallbouquet").onclick=function(){
      var checkboxes = document.querySelectorAll("input[type=\"checkbox\"]");
      var checkallbouquet =document.getElementById('checkallbouquet');
      if(checkallbouquet.text =="Check All"){
          for (var checkbox of checkboxes) {
            checkbox.checked = "checked";
          }
          document.getElementById("Full channels").checked="";
          document.getElementById("Full user").checked="";
          checkallbouquet.text = "Un Check All";
      }else{    
          for (var checkbox of checkboxes) {
            checkbox.checked = "";
          }
          document.getElementById("Full channels").checked="checked";
          document.getElementById("Full user").checked="checked";
          checkallbouquet.text = "Check All"; 
        }
    }    

JS;
$this->registerJs($js);

?>
