<?php
App::uses('PostsController', 'Controller');

/**
 * PostsController Test Case
 *
 */
class PostsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.post'
	];

    public function setUp()
    {
        parent::setUp();
        $this->controller = $this->generate('Posts', [  // コントローラをモックする
            'components' => ['Paginator', 'Session'],   // モックするコンポーネントを列挙
            'models'     => ['Post' => ['save']],       // モックするモデルを列挙
            'methods'    => ['redirect']                // モックするメソッドを列挙
        ]);
        $this->controller->autoRender = false;
    }

    public function testIndexアクションではページングの結果がpostsにセットされること()
    {
        $post = Fabricate::build('Post');
        /*
        $data = [
            ['Posts'=>['id'=>1, 'title'=>'Title1', 'body'=>'Body1']],
        ];
        */
        $this->controller->Paginator->expects($this->once())    // 8.paginate メソッドをモック
            ->method('paginate')->will($this->returnValue($post->data));
        $vars = $this->testAction('/user/blog', ['method'=>'get', 'return'=>'vars']);
                                                        // 9.テスト実行
        $this->assertEquals($post->data, $vars['posts']);
    }

    public function testAddアクションで保存が失敗した時メッセージがセットされること()
    {
        $this->controller->Post->expects($this->once()) // 10.保存が失敗したことにする
            ->method('save')->will($this->returnValue(false));
        $this->controller->Session->expects($this->once())  // 11.メッセージがセットされるべき
            ->method('setFlash')->with($this->equalTo('記事の投稿に失敗しました。入力内容を確認して再投稿してください'));
        $this->testAction('/blogs/new', [
            'method'=>'post',
            'data'=>['title'=>'Title1', 'body'=>'Body1']
        ]);
    }

    public function testAddアクションで保存が成功した時はメッセージがセットされ一覧表示にリダイレクトされること()
    {
        $this->controller->Post->expects($this->once())
            ->method('save')->will($this->returnValue(true));
        $this->controller->Session->expects($this->once())
            ->method('setFlash')->with($this->equalTo('新しい記事を受け付けました'));
        $this->controller->expects($this->once())  // 12.indexにリダイレクトされるべき
            ->method('redirect')->with($this->equalTo(['action'=>'index']));
        $this->testAction('/blogs/new', ['method'=>'post', 'data'=>['title'=>'Title1','body'=>'Body1']]);
    }
}
