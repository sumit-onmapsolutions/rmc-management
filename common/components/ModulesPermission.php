<?php
 
namespace common\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use common\models\RoleModulePermission;
use yii\helpers\Url;

class ModulesPermission extends Component
{
    public function getMenus()
    {
        if(isset(Yii::$app->user->identity)){
            $role_id = Yii::$app->user->identity->user_level;
            $modules =      RoleModulePermission::find()
                                 ->select('ML.module_name, ML.controller, ML.icon')
                                 ->join('LEFT JOIN', 'modules_list AS ML', 'ML.module_id = role_module_permission.module_id')
                                 ->where('role_id = :role_id', [':role_id' => $role_id])
                                 ->andWhere('role_module_permission.view = :view', [':view' => 1])
                                 ->andWhere('is_active = :is_active', [':is_active' => 1])
                                 ->asArray()->all();
                
            $items = array();
            $items[] = '<li id="dashboard"><a href="'. Url::to(['site/index']).'"><i class="fa fa-dashboard"></i><span> Dashboard</span></a></li>';
            for($i=0; $i<count($modules); $i++)
            {
                $items[] = '<li id="'.$modules[$i]['controller'].'"><a href="'. Url::to([$modules[$i]['controller'].'/']).'"><i class="fa '.$modules[$i]['icon'].'"></i> <span>'.$modules[$i]['module_name'].'</span></a></li>';
            }
            return $items;
        }else{
            return [];
        }


    }
    
    public function getPermission()
    {
        $actions = array();
        $actions['index']  = 'view';
        $actions['view']   = 'view';
        $actions['create'] = 'new';
        $actions['update'] = 'save';
        $actions['delete'] = 'remove';
        if(isset(Yii::$app->user->identity)){
            $role_id = Yii::$app->user->identity->user_level;    	
            $action = $actions[Yii::$app->controller->action->id];
            $controller = Yii::$app->controller->id;

            $permission = RoleModulePermission::find()
                                 ->select($action)
                                 ->join('LEFT JOIN', 'modules_list AS ML', 'ML.module_id = role_module_permission.module_id')
                                 ->where('role_id = :role_id', [':role_id' => $role_id])
                                 ->andWhere($action.' = :'.$action, [':'.$action => 1])
                                 ->andWhere('controller = :controller', [':controller' => $controller])
                                 ->one();
            
            
            return $permission[$action] ? true : false;
        }else{
            return  false;
        }
        

    }
}

?>