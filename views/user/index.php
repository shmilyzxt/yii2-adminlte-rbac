<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\Helper;
use yii\bootstrap\Modal;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel mdm\admin\models\searchs\User */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('rbac-admin', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Content Header (Page header) -->
    <div class="user-index">

    <?=
     \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'id'=>'userGrid',
        'autoXlFormat'=>true,
        'columns' => [
            [
                'class' => 'kartik\grid\SerialColumn',
                'header'=>"序号",
            ],
            [
                'attribute'=>'username',
                'label' => '用户名',
            ],
            [
                'attribute'=>'email',
                'label' => '邮箱',
            ],
            [
                'attribute'=>'created_at',
                'label' => '创建时间',
                'value' => function($model){
                    return date("Y-m-d",$model->created_at);
                },
            ],
            [
                'attribute' => 'status',
                'label' => '状态',
                'value' => function($model) {
                    return $model->status == 0 ? '未启用' : '已启用';
                },
                'filter' => [
                    0 => '未启用',
                    10 => '已启用'
                ]
            ],


            [
                'class' => 'kartik\grid\ActionColumn',
                /*'dropdown'=>true,
                'dropdownOptions' => ['class' => 'pull-right'],*/
                'deleteOptions' => ['label' => '<i class="glyphicon glyphicon-remove"></i>'],
                'template' => Helper::filterActionColumn(['view','activate','inactivate', 'delete']),
                'buttons' => [
                    'view' => function($url, $model) {
                        $options = [
                            'title' => Yii::t('rbac-admin', '查看'),
                            'aria-label' => Yii::t('rbac-admin', '查看'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                            'id'=>'view'.$model->id,
                            //'data-toggle'=>"modal",
                            //'data-target'=>'#w0'
                        ];
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
                    },

                    'activate' => function($url, $model) {
                        if ($model->status == \common\models\User::STATUS_ACTIVE) {
                            return '';
                        }
                        $options = [
                            'title' => Yii::t('rbac-admin', '启用'),
                            'aria-label' => Yii::t('rbac-admin', '启用'),
                            'data-confirm' => Yii::t('rbac-admin', '确定启用该用户吗?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, $options);
                    },
                    'inactivate' => function($url, $model) {
                        if ($model->status == \common\models\User::STATUS_DELETED) {
                            return '';
                        }
                        $options = [
                            'title' => Yii::t('rbac-admin', '禁用'),
                            'aria-label' => Yii::t('rbac-admin', '禁用'),
                            'data-confirm' => Yii::t('rbac-admin', '确定禁用该用户吗?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-cog"></span>', $url, $options);
                    },
                ]
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
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i>用户列表</h3>',
            /*'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Create Auth Item', ['create'], ['class' => 'btn btn-success']),*/
            /*'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),*/
        ],
        'persistResize'=>true,

        'floatHeader'=>true,
        //'floatHeaderOptions'=>['scrollingTop'=>'50']
        //'exportConfig'=>$exportConfig,
         'toolbar'=> [
            /* ['content'=>
                 Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>"添加", 'class'=>'btn btn-success', 'onclick'=>'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' '.
                 Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>"重置"])
             ],*/
             '{export}',
            /* '{toggleData}',*/
         ],
        // set export properties
        'export'=>[
            'fontAwesome'=>true,
            'encoding' => 'GBK'
        ],
    ]);
    ?>
</div>


