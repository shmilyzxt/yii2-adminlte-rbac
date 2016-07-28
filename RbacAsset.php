<?php

namespace shmilyzxt\rbac;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class RbacAsset extends AssetBundle
{
    public $sourcePath = '@vendor/shmilyzxt/yii2-adminlte-rbac/asset';
    public $css = [
        //'AdminLTE-fix.css', //修改过的adminlte
        'fix.css',
    ];
    public $js = [];
    public $depends = [];
}
