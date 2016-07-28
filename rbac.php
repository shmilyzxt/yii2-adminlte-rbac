<?php

namespace shmilyzxt\rbac;

/**
 * rbac module definition class
 */
class rbac extends \mdm\admin\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'shmilyzxt\rbac\controllers';

    public $layout = '@vendor/shmilyzxt/yii2-adminlte-rbac/views/layouts/main.php';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function beforeAction($action)
    {
        if(parent::beforeAction($action)){
            $view = $action->controller->getView();

            foreach ($view->params['breadcrumbs'] as $k=>$v){
                if($v['url'] == ['/' . ($this->defaultUrl ?: $this->uniqueId)] ){
                    unset($view->params['breadcrumbs'][$k]);
                }
            }

            if($action->controller->id == 'user'){
                $title = "用户管理";
                $url = ['/' . ($this->defaultUrl ?: $this->uniqueId."/user")];
            }else{
                $title = "权限管理";
                $url = ['/' . ($this->defaultUrl ?: $this->uniqueId)];
            }

            $view->params['breadcrumbs'][] = [
                'label' => ($this->defaultUrlLabel ?: $title),
                'url' => $url
            ];

            return true;
        }else{
            return false;
        }
    }
}
