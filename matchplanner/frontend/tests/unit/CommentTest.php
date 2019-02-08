<?php namespace frontend\tests;

use frontend\models\Comment;

class CommentTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $comment = new Comment();

        $comment->team_id = -1;
        $this->assertFalse($comment->validate(['team_id']));

        $comment->content = 'dskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsjlkjljljlkjllkjlkjljklkjkljlkjljljkljkkjkjkjkjlkjlkjlkjlklljliljiojik';
        $this->assertFalse($comment->validate(['content']));

        $comment->tag = 'dskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjllkçkçlkçlk';
        $this->assertFalse($comment->validate(['tag']));

        $comment->user_id = -1;
        $this->assertFalse($comment->validate(['user_id']));

        $comment->post_id = -1;
        $this->assertFalse($comment->validate(['post_id']));

        $comment->event_id = -1;
        $this->assertFalse($comment->validate(['event_id']));

        $comment->create_time = null;
        $this->assertFalse($comment->validate(['create_time']));



        $commentvalidado = new Comment();

        $commentvalidado->id = 14;
        $commentvalidado->content = 'eu sou um comentario!';
        $commentvalidado->tag = 'sod';
        $commentvalidado->create_time = date('Y-m-d H:i:s');
        $commentvalidado->event_id = 20;
        $commentvalidado->post_id = 14;

        $commentvalidado->save();

        $this->tester->seeRecord('frontend\models\Comment', array('id' => 14));
        $this->tester->seeRecord('frontend\models\Comment', array('content' => 'eu sou um comentario!'));
        $this->tester->seeRecord('frontend\models\Comment', array('tag' => 'sod'));
        $this->tester->seeRecord('frontend\models\Comment', array('create_time' => date('Y-m-d H:i:s')));
        $this->tester->seeRecord('frontend\models\Comment', array('event_id' => 20));
        $this->tester->seeRecord('frontend\models\Comment', array('post_id' => 14));

        $commentUpdate = Comment::find()->where(['id' => 14])->one();

        $commentUpdate->tag = '#somos_sod';

        $commentUpdate->save();

        $this->tester->seeRecord('frontend\models\Comment', array('tag' => '#somos_sod'));

        $commentDelete = Comment::find()->where(['id' => 14])->one();

        $commentDelete->delete();


        $this->tester->dontSeeRecord('frontend\models\Comment', array('id' => 14));
        $this->tester->dontSeeRecord('frontend\models\Comment', array('content' => 'eu sou um comentario!'));
        $this->tester->dontSeeRecord('frontend\models\Comment', array('tag' => '#somos_sod'));
        $this->tester->dontSeeRecord('frontend\models\Comment', array('create_time' => date('Y-m-d H:i:s')));
        $this->tester->dontSeeRecord('frontend\models\Comment', array('event_id' => 20));
        $this->tester->dontSeeRecord('frontend\models\Comment', array('post_id' => 14));

    }
}