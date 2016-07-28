<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use mdm\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$controllerId = $this->context->uniqueId . '/';
?>
<div class="user-view">
    <?php
    echo DetailView::widget([
        'model' => $model,
        'condensed'=>false,
        'hover'=>true,
        'mode'=>Yii::$app->request->get('edit')=='t' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
        'panel'=>[
            'heading'=>$this->title,
            'type'=>DetailView::TYPE_INFO,
        ],
        'attributes' => [
            [
                'attribute'=>'username',
                'label' => "用户名",
            ],
            [
                'attribute'=>'email',
                'label' => "邮箱",
            ],
            [
                'attribute'=>'created_at',
                'label' => "创建时间",
                'value'=>date("Y-m-d H:i:s",$model->created_at),
                'displayOnly' => true,
            ],
            [
                'attribute'=>'status',
                'label'=>'状态',
                'format'=>'raw',
                'value'=>$model->status == \mdm\admin\models\User::STATUS_ACTIVE? '<span class="label label-success">启用</span>' : '<span class="label label-danger">禁用</span>',
                'type'=>DetailView::INPUT_SWITCH,
                'widgetOptions' => [
                    'pluginOptions' => [
                        'onText' => '启用',
                        'offText' => '禁用',
                        'onColor' => 'success',
                        'offColor' => 'danger',
                    ],
                ],
                'valueColOptions'=>['style'=>'width:30%']
            ],
        ],
        'deleteOptions'=>[
            'url'=>['delete'],
            /*'data'=>[
                'confirm'=>Yii::t('app', 'Are you sure you want to delete this item?'),
                'method'=>'post',
            ],*/
            'params' => ['id' => $model->id, 'kvdelete'=>true],
        ],
        'updateOptions'=>[
            'url'=>['detailview'],
        ],
        'container' => ['id'=>'kv-demo'],
        //'formOptions' => ['action' => \yii\helpers\Url::to("/mgr/history/detailviewdelete")],// your action to delete
        'enableEditMode'=>true,
    ]);
    ?>

    <?php
/*    echo \yii\widgets\DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute'=>'username',
                'label' => "用户名",
            ],
            [
                'attribute'=>'email',
                'label' => "邮箱",
            ],
            [
                'attribute'=>'created_at',
                'label' => "创建时间",
            ],
            [
                'attribute'=>'status',
                'label'=>'状态',
            ],
        ]
    ]);
    */?>

</div>
