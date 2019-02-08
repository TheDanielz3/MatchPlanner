<?php namespace frontend\tests;

use frontend\models\Post;

class PostTest extends \Codeception\Test\Unit
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

        $post = new Post();

        $post->event_id = -1;
        $this->assertFalse($post->validate(['event_id']));

        $post->content = 'dskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsdjfsldkjfdskljflskfjlsdkfjlsjlkjljljlkjllkjlkjljklkjkljlkjljljkljkkjkjkjkjlkjlkjlkjlklljliljiojik';
        $this->assertFalse($post->validate(['content']));

        $post->title = 'asdasdlkasdkalskdlaskdlaskdslakdaslkdalsdkalkdalkdalskdalsfkljfsdlkjfsldkfjsdkljfslkjfsdlkjfsdljkfsdlkfjsdlfjsdlkjfsdlkjfsldkjfsldkjfsljfslkjfslkfslkfjkldfdkfjsdlkjfdslkfjdklfsleifijfeiowjeodkfjwjfeiowjfwoijdfkdlsfj';
        $this->assertFalse($post->validate(['title']));

        $post->tag = 'asdasdlkasdkalskdlaskdlaskdslakdaslkdalsdkalkdalkdalskdalsfkljfsdlkjfsldkfjsdkljfslkjfsdlkjfsdljkfsdlkfjsdlfjsdlkjfsdlkjfsldkjfsldkjfsljfslkjfslkfslkfjkldfdkfjsdlkjfdslkfjdklfsleifijfeiowjeodkfjwjfeiowjfwoijdfkdlsfj';
        $this->assertFalse($post->validate(['tag']));

        $post->create_time = null;
        $this->assertFalse($post->validate(['create_time']));

        $post->image = 'asdasdlkasdkalskdlaskdlaskdslakdaslkdalsdkalkdalkdalskdalsfkljfsdlkjfsldkfjsdkljfslkjfsdlkjfsdljkfsdlkfjsdlfjsdlkjfsdlkjfsldkjfsldkjfsljfslkjfslkfslkfjkldfdkfjsdlkjfdslkfjdklfsleifijfeiowjeodkfjwjfeiowjfwoijdfkdlsfj';
        $this->assertFalse($post->validate(['image']));

        $postvalidate = new Post();

        $postvalidate->id = 100;
        $postvalidate->title = 'sou eu';
        $postvalidate->content = 'eu sou um post!';
        $postvalidate->tag = 'sod';
        $postvalidate->create_time = date('Y-m-d H:i:s');
        $postvalidate->event_id = 35;

        $postvalidate->save();


        $this->tester->seeRecord('frontend\models\Post', array('id' => 14));
        $this->tester->seeRecord('frontend\models\Post', array('title' => 'sou eu'));
        $this->tester->seeRecord('frontend\models\Post', array('content' => 'eu sou um post!'));
        $this->tester->seeRecord('frontend\models\Post', array('tag' => 'sod'));
        $this->tester->seeRecord('frontend\models\Post', array('create_time' => date('Y-m-d H:i:s')));
        $this->tester->seeRecord('frontend\models\Post', array('event_id' => 35));

        $postUpdate = Post::find()->where(['id' => 100])->one();

        $postUpdate->tag = "#somospost";

        $postUpdate->save();

        $this->tester->seeRecord('frontend\models\Post', array('tag' => '#somospost'));

        $postDelete = Post::find()->where(['id' => 100])->one();

        $postDelete->delete();

        $this->tester->dontSeeRecord('frontend\models\Post', array('id' => 100));
        $this->tester->dontSeeRecord('frontend\models\Post', array('title' => 'sou eu'));
        $this->tester->dontSeeRecord('frontend\models\Post', array('content' => 'eu sou um post!'));
        $this->tester->dontSeeRecord('frontend\models\Post', array('tag' => '#somospost'));
        $this->tester->dontSeeRecord('frontend\models\Post', array('create_time' => date('Y-m-d H:i:s')));
        $this->tester->dontSeeRecord('frontend\models\Post', array('event_id' => 35));
    }
}