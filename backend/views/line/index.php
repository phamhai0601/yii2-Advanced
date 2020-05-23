<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use kartik\grid\ActionColumn;
use kartik\grid\DataColumn;
use kartik\grid\EditableColumn;
use  common\models\User;
use app\models\MagDevices;
use app\models\AdminPackage;
use app\models\Line;
use kartik\editable\Editable;
use kartik\popover\PopoverX;
use yii\widgets\MaskedInput;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\LineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var int  $pagesize*/

$this->title = 'Lines';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-12">
        <div class="line-index">

            <h1><?= Html::encode($this->title) ?></h1>
            <?php $this->render('_search', ['model' => $searchModel]);?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
        /*            ['class' => 'yii\grid\SerialColumn'],*/
                    [
                            'class'     =>  DataColumn::class,
                            'attribute' =>'created_at',
                            'value'     =>function($model){
                                return date('Y-m-d', $model->created_at);
                            },
                            'width'     =>'100px',
                    ],
//                    [
//                            'class'     =>  DataColumn::class,
//                            'attribute' =>  'member_id',
//                            'value'     => function($model)
//                            {
//                                $user = User::findOne($model->member_id);
//                                return $user->username;
//                            },
//                            'width'     => '140px',
//                            'label'     =>  'Owner',
//                    ],
                    [
                            'class'     =>  DataColumn::class,
                            'attribute' =>  'username',
                            'width'     =>  '140px',
                    ],
                    [
                            'class'     =>  EditableColumn::class,
                            'attribute' => 'password',
                            'width'     => '140px',
                    ],
                    [
                            'class'     =>  DataColumn::class,
                            'attribute' =>  'mac',
//                            'editableOptions'   =>[
//                                    'closeOnBlur'   =>  true,
//                                    'inputType'     =>  Editable::INPUT_WIDGET,
//                                    /*'placement'     =>  PopoverX::ALIGN_TOP,*/
//                                    'widgetClass'   =>  MaskedInput::class,
//                                    'options'       =>  [
//                                            'clientOptions' =>  [
//                                                    'alias' =>  'mac',
//                                            ],
//                                    ],
//                            ],
                            'value'     =>  function($model){
                                $mag_device =   MagDevices::findOne(['user_id'=>$model->id]);
                                if($mag_device && $mag_device->mac){
                                    return base64_decode($mag_device->mac);
                                }
                                return "";
                            },
                            'width'     =>  '140px',
                    ],
                    [
                            'class'     =>  DataColumn::class,
                            'attribute' =>  'exp_date',
                            'value'     =>  function($model){
                                if($model->exp_date == null)
                                {
                                    return 'null';
                                }
                                return date('Y-m-d', $model->exp_date);
                            }
                    ],
                    [
                            'class'     =>  DataColumn::class,
                            'attribute' =>  'packages',
                            'filter'    =>  \yii\helpers\ArrayHelper::map(AdminPackage::find()->all(),'id','name'),
                            'value'     =>  function($model){
                                $adminPackage = AdminPackage::findOne(['id'=>$model->package]);
                                return $adminPackage->name;
                            }

                    ],
                    [
                            'class'     =>  EditableColumn::class,
                            'attribute' =>  'reseller_notes',

                    ],
                    [
                            'class'     =>  DataColumn::class,
                            'attribute' =>  'status',
                            //'filterType'=>  GridView::FILTER_SELECT2,
                            'filter'    =>  [
                                'active'  => 'Active',
                                'ban'     => 'Ban',
                                'expired' => 'Expired',
                                'block'   => 'Block',
                            ],
                            'width'     =>  '150px',
                            'value'     =>  function($model){
                                if($model->admin_enabled == Line::ADMIN_DISABLE) {
                                    return '<span class="badge badge-danger" style="font-size: 15px; margin: 3px;color: white">Block</span>';
                                }else if($model->admin_enabled == Line::ADMIN_ENABLE && $model->enabled == Line::DISABLE){
                                    return '<span class="badge badge-dark" style="font-size: 15px; margin: 3px;color: white">Ban</span>';
                                }else if($model->exp_date<time()){
                                    return '<span class="badge badge-warning" style="font-size: 15px; margin: 3px;color: white">Expired</span>';
                                }else{
                                    return '<span class="badge badge-success" style="font-size: 15px; margin: 3px;color: white">Active</span>';
                                }
                            },
                            'format'    => 'html',
                    ],
                    [
                            'class'     =>  ActionColumn::class,
                            'template'  => '{dropdown}',
                            'buttons'   => [
                                    'dropdown'  => function($url,$model){
                                        if($model->enabled == Line::DISABLE)
                                        {
                                            $actionBan = 'Un Ban';
                                            $classNotAllowed = 'not-allowed';
                                        }elseif ($model->enabled == Line::ENABLE) {
                                            $actionBan = 'Ban';
                                            $classNotAllowed = '';
                                        }
                                        return '
        <div class="dropdown dropleft">
          <button class="btn btn-primary dropdown-toggle" type="button" style="padding: 10px; margin: 0px" data-toggle="dropdown">Manage
          </button>
          <ul class="dropdown-menu">
            <li><a href="'.Url::toRoute(['line/update','id'=>$model->id]).'">Edit</a></li>
            <li><a href="#" id="link_extend_line" data-id="'.$model->id.'" data-toggle="modal" data-target="#exampleModal" class="dropdown-item extend-line-link '.$classNotAllowed.'">Extend Line</a></li>
            <li><a href="'.Url::to(['line/ban','id'=>$model->id]).'">'.$actionBan.'</a></li>
            <li class="divider"></li>
            <li><a href="'.Url::to(['line/remove','id'  =>$model->id]).'" data-confirm="Are you sure you still want to remove this line?">Remove</a></li>
          </ul>
        </div>    ';
                                    }
                            ],
                    ],
                ],
                'hover'         => true,
                'toolbar'       => [],
                'panel'         =>[
                        'type'              =>  GridView::TYPE_DEFAULT,
                        'heading'        => $this->title,
                        'summaryOptions'    => ['class' => 'pull-left',],
                ],
                'panelHeadingTemplate'      => '
        <div class="row">
            <div class="col-md-2">
                {title}{summary}
            </div>
        <!--    <div class="col-md-7">
                <form id="w0" class="form-vertical kv-form-bs4" action="/users/index" method="post" role="form" style="display:flex">
                    <input name="UserSearch[search_all]" type="text" value="1234"  class="form-control" id="filter-all" placeholder="Search All">
                </form>
            </div>-->
            <div class="col-md-10" style="text-align: right">
                <div class="btn-group">
                    <a class="btn btn-success white pull-left" style="margin-right:5px;padding: 10px" href="' . Url::toRoute(['line/create']) . '">Create Line</a>
                </div>
                <div class="pull-right dropdown">
                    <button class="btn btn-primary dropdown-toggle  color-summary" style="margin: 0px;padding: 10px" type="button" id="dropdownMenu1" data-toggle="dropdown">
                        Display per page: <b>' . $pagesize . '</b>
                    </button> 
                      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                      <a role="menuitem" tabindex="-1" href="' . Url::current(['pagesize' => 20]) . '">
                        <li class="dropdown-item" role="presentation">20</li>
                        </a>
                        <a role="menuitem" tabindex="-1" href="' . Url::current(['pagesize' => 50]) . '">
                        <li class="dropdown-item" role="presentation">50</li>
                        </a>
                        <a role="menuitem" tabindex="-1" href="' . Url::current(['pagesize' => 100]) . '">
                        <li class="dropdown-item" role="presentation">100</li>
                       </a>
                        <a role="menuitem" tabindex="-1" href="' . Url::current(['pagesize' => 150]) . '">
                        <li class="dropdown-item" role="presentation">150</li>
                        </a>
                        <a role="menuitem" tabindex="-1" href="' . Url::current(['pagesize' => 200]) . '">
                        <li class="dropdown-item" role="presentation">200</li>
                        </a>
                        <a role="menuitem" tabindex="-1" href="' . Url::current(['pagesize' => 500]) . '">
                        <li class="dropdown-item" role="presentation">500</li>
                        </a>
                        <a role="menuitem" tabindex="-1" href="' . Url::current(['pagesize' => 1000]) . '">
                        <li class="dropdown-item" role="presentation">1000</li>
                        </a>
                      </ul>   
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        
                        ',
            ]); ?>



        </div>
    </div>
</div<div id="extend-line-box"></div>
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Extend line</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php $form = ActiveForm::begin([
                    'action' => Url::toRoute(['line/extend-line']),
                ]); ?>
                <div>
                    <label for="">Username</label>
                    <input type="text" id="extend-line-package-username" value="" name="Line[username]"
                           class="form-control" readonly>
                </div>
                <?= $form->field($modelLine, 'package')->dropDownList(ArrayHelper::map(AdminPackage::find()->all(),'id', 'name'), [
                    'id'     => 'extend-line-package',
                    'prompt' => 'Select package',
                ])->label('Package Name') ?>
<!--                <div class="form-group">-->
<!--                    <label for="">Amount</label>-->
<!--                    <input type="text" id="extend-line-package-amount-credit" value="0" readonly class="form-control">-->
<!--                </div>-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Extend Now</button>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>

<?php
$urlFormExtend      = Url::home() . "ajax/amount-credit-package";
$urlUsernamePackage = Url::home() . "ajax/username";
$urlShowCredit      = Url::home() . "ajax/show-credit-refund";
$urlDownload        = Url::home() . "ajax/download";
$urlRefund          = Url::home() . "ajax/refund";
$urlExtend          = Url::to(['/ajax/username-package']);
$js                 = <<< JS
$(document).ready(function(){
    var id_user = 0;
	$(".extend-line-link").on("click", function () {
		id_user = $(this).attr("data-id");
		$.ajax({
			type: "POST",
			cache: false,
			url:'$urlExtend&user_id='+id_user,
			//data:{user_id:id_user},
			success: function (response) {
				$("#extend-line-package-username").attr("value", response);
			},
			error: function (response) {
				$("#extend-line-package-username").attr("value", response);
			}
		});
	});
})
JS;
$this->registerJs($js);
?>
