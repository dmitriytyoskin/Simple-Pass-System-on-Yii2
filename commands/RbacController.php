<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // добавляем разрешение "Contact"
        // $contact = $auth->createPermission('Contact');
        // $contact->description = 'Contacts section';
        // $auth->add($contact);

        // добавляем разрешение "About"
        // $about = $auth->createPermission('About');
        // $about->description = 'About section';
        // $auth->add($about);

        // добавляем роль "demo" и даём роли разрешение "Contact"
        $engineer = $auth->createRole('engineer');
        $auth->add($engineer);
        $superviser = $auth->createRole('superviser');
        $auth->add($superviser);
        $dispatcher = $auth->createRole('dispatcher');
        $auth->add($dispatcher);
        // $auth->addChild($author, $contact);

        // добавляем роль "admin" и даём роли разрешение "About"
        // а также все разрешения роли "demo"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        // $auth->addChild($admin, $about);
        //$auth->addChild($admin, $demo);

        // Назначение ролей пользователям. 1 и 2 это IDs возвращаемые IdentityInterface::getId()
        // обычно реализуемый в модели User.
        $auth->assign($engineer, 1);
        $auth->assign($superviser, 2);
        $auth->assign($dispatcher, 3);
        $auth->assign($admin, 4);
    }
}