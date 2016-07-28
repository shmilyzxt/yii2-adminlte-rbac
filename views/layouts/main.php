<?php
use yii\helpers\Html;

$actionId = Yii::$app->controller->action->id;
if ($actionId === 'login' ||  $actionId === 'signup' || $actionId === 'request-password-reset' || $actionId === 'reset-password') {
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {
    //adminlte资源
    $lte = new \shmilyzxt\rbac\AdminLteAsset();
    $lte->skin = "skin-blue";
    $lte->register($this);
    
    shmilyzxt\rbac\RbacAsset::register($this);

    //sweetalert资源
   // \backend\assets\SweetAlertAsset::register($this);

    //$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    $directoryAsset = '/dist';

    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <style>
            body {
                font-family: "微软雅黑";
            }

            .font12 {
                font-family: "微软雅黑";
                font-size: 13px;
            }

            .yahei {
                font-family: "微软雅黑";
            }
        </style>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition <?php echo $lte->skin ?> sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
<script>
    $(function () {
        $(".panel").addClass("font12");
    });
    
    window.alert = function (title,content,tip='success') {
        swal(title, content, tip);
    }

    yii.confirm = function (message, ok, cancel) {
        swal({
            title: "操作确认",
            text: message,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "确认",
            cancelButtonText: "取消",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            html: false
        }, function (isConfirm) {
            if (isConfirm) {
                !ok || ok();
            } else {
                !cancel || cancel();
            }
        });
    }

    window.confirm = yii.confirm;
</script>