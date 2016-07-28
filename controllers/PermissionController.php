<?php

namespace shmilyzxt\rbac\controllers;

use yii\rbac\Item;

/**
 * PermissionController implements the CRUD actions for AuthItem model.
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class PermissionController extends \mdm\admin\controllers\PermissionController
{

    /**
     * @inheritdoc
     */
    public function labels()
    {
        return[
            'Item' => '权限',
            'Items' => '权限',
        ];
    }

    /**
     * @inheritdoc
     */
    public function getType()
    {
        return Item::TYPE_PERMISSION;
    }
}
