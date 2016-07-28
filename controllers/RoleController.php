<?php

namespace shmilyzxt\rbac\controllers;

use yii\rbac\Item;

/**
 * RoleController implements the CRUD actions for AuthItem model.
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class RoleController extends \mdm\admin\controllers\RoleController
{
    /**
     * @inheritdoc
     */
    public function labels()
    {
        return[
            'Item' => '角色',
            'Items' => '角色',
        ];
    }

    /**
     * @inheritdoc
     */
    public function getType()
    {
        return Item::TYPE_ROLE;
    }
}
