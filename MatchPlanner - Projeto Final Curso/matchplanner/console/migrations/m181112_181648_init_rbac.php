<?php

use yii\db\Migration;

/**
 * Class m181112_181648_init_rbac
 */
class m181112_181648_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181112_181648_init_rbac cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $auth = Yii::$app->authManager;

        //Events

        $createEvent = $auth->createPermission('createEvent');
        $createEvent->description = "Create event";
        $auth->add($createEvent);


        $readEvent = $auth->createPermission('readEvent');
        $readEvent->description = "Read event";
        $auth->add($readEvent);

        $updateOwnEvent = $auth->createPermission('updateEvent');
        $updateOwnEvent->description = "Update own event";
        $auth->add($updateOwnEvent);

        $deleteOwnEvent = $auth->createPermission('deleteEvent');
        $deleteOwnEvent->description = "Delete own event";
        $auth->add($deleteOwnEvent);

        //Posts
        $createPost = $auth->createPermission('createPost');
        $createPost->description = "Create post";
        $auth->add($createPost);

        $readPost = $auth->createPermission('readPost');
        $readPost->description = "Read post";
        $auth->add($readPost);

        $updateOwnPost = $auth->createPermission('updatePost');
        $updateOwnPost->description = "Update own post";
        $auth->add($updateOwnPost);

        $deleteOwnPost = $auth->createPermission('deletePost');
        $deleteOwnPost->description = "Delete own post";
        $auth->add($deleteOwnPost);

        //Comments
        $createComment = $auth->createPermission('createComment');
        $createComment->description = "Create comment";
        $auth->add($createComment);

        $readComment = $auth->createPermission('readComment');
        $readComment->description = "Read comment";
        $auth->add($readComment);

        $updateOwnComment = $auth->createPermission('updateOwnPost');
        $updateOwnComment->description = "Update own comment";
        $auth->add($updateOwnComment);

        $deleteOwnComment = $auth->createPermission('deleteOwnComment');
        $deleteOwnComment->description = "Delete own comment";
        $auth->add($deleteOwnComment);

        $user = $auth->createRole('user');
        $admin = $auth->createRole('admin');

        //Adiciona as roles ao AuthManager
        $auth->add($user);
        $auth->add($admin);

        //Adiciona permissões de eventos ao user
        $auth->addChild($user, $createEvent);
        //$auth->addChild($user, $readEvent);
        $auth->addChild($user, $updateOwnEvent);
        $auth->addChild($user, $deleteOwnEvent);

        //Adiciona permissões de posts ao user
        $auth->addChild($user, $createPost);
        $auth->addChild($user, $readPost);
        $auth->addChild($user, $updateOwnPost);
        $auth->addChild($user, $deleteOwnPost);

        //Adiciona permissões de comments ao user
        $auth->addChild($user, $createComment);
        $auth->addChild($user, $readComment);
        $auth->addChild($user, $updateOwnComment);
        $auth->addChild($user, $deleteOwnComment);
    }

    public function down()
    {
        echo "m181112_181648_init_rbac cannot be reverted.\n";

        return false;
    }

}
