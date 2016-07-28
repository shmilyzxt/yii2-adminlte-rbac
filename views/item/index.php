<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\RouteRule;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\searchs\AuthItem */
/* @var $context mdm\admin\components\ItemController */

$context = $this->context;
$labels = $context->labels();
$this->title = Yii::t('rbac-admin', $labels['Items']);
$this->params['breadcrumbs'][] = $this->title;

$rules = array_keys(Yii::$app->getAuthManager()->getRules());
$rules = array_combine($rules, $rules);
unset($rules[RouteRule::RULE_NAME]);
?>

<div class="role-index ">

    <?=
    \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'id'=>'roleGrid',
        'autoXlFormat'=>true,
        'columns' => [
           /* [
                'class' => 'kartik\grid\SerialColumn',
                'header'=>"序号",
            ],*/
            [
                'attribute'=>'name',
                'label' => '名称',
            ],
            [
                'attribute'=>'ruleName',
                'label' => '规则名称',
            ],


            [
                'attribute'=>'description',
                'label' => '描述',
            ],

            [
                'class' => 'kartik\grid\ActionColumn',
            ],
        ],
        'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        //'pjax'=>true, // pjax is set to always true for this demo

        // set export properties
        'export'=>false,
        // parameters from the demo form
        'bordered'=>true,
        'striped'=>true,
        'condensed'=>true,
        'responsive'=>true,
        'hover'=>true,
        //'showPageSummary'=>true,
        'panel'=>[
            'type'=>\kartik\grid\GridView::TYPE_PRIMARY,
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i>角色列表</h3>',
            'before'=>Html::a(Yii::t('rbac-admin', '新建' . $labels['Item']), ['create'], ['class' => 'btn btn-success']),
        ],
        'persistResize'=>true,

        'floatHeader'=>true,
    ])
    ?>

</div>
