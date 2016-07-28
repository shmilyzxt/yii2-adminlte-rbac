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
        'fix.css',
    ];
    public $js = [];
    public $depends = [];
}
