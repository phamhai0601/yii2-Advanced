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

<?php $form = ActiveForm::begin(); ?>
<div class="form-group">
<!--    <label>UserName</label>
    <input type="text" class="form-control" name="username" placeholder="Username" >-->
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
        <tr>
            <td class="text-center">
                <input type="text" name="Line[allowed_ips][]" class="col-sm-12 form-control" placeholder="Please enter Ip...">
            </td>
            <td class="text-center">
                <a class="btn btn-danger glyphicon glyphicon-remove"></a>
            </td></tr>
        </tbody>
    </table>
</div>
<div class="form-group">
    <?= $form->field($model, 'package')->dropDownList(ArrayHelper::map($adminPackages, 'id', 'name')); ?>
</div>
<div class="form-group">
    <?= $form->field($model, 'reseller_notes')->textarea(['rows' => 4]) ?>
</div>
<div class="form-group">
    <div class="col-md-3">
        <a class="btn btn-success" id="bouquetList">Bouquet List</a>
    </div>
    <div class="col-md-9">
        <input type="text" class="form-control" name="" placeholder="Search...">
    </div>
</div>
<div class="clearfix"></div>
<div class="row" id ="rowbouet" style="padding: 15px; display: none;">
    <div class="form-group" style="padding-top: 20px">
        <div class="col-md-12" style="margin-bottom: 20px"><a class="btn btn-success btn-sm" id="checkallbouquet">Check All</a></div>
        <div class="clearfix"></div>
        <?php foreach ($bouquet as $item){
            if($item['allow_reseller'] == "1"){?>
        <div class="col-sm-3">
            <input type="checkbox" name="Line[bouquet][]" id="<?php echo $item['bouquet_name']; ?>" value="<?php echo $item['id']; ?>">
            <span><?php echo $item['bouquet_name']; ?></span>
        </div>
        <?php }}?>
    </div>
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
