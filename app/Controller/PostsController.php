<?php
class PostsController extends AppController {
    public $helpers = array('Html', 'Form');
    public function index() {
    	$params = array(
    		'limit' => 5,
    		'order' => 'created DESC'
    	);
        $this->set('posts', $this->Post->find('all', $params));
  	}
    public function view($id = null) {
        $this->Post->id = $id;
        $this->set('post', $this->Post->read());
    }
    public function add() {
        if ($this->request->is('post')) {
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash('記事の投稿に成功しました。');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add your post.');
            }
        }
    }
    public function edit($id = null) {
 	   $this->Post->id = $id;
    	if ($this->request->is('get')) {
        	$this->request->data = $this->Post->read();
    	} else {
	        if ($this->Post->save($this->request->data)) {
	            $this->Session->setFlash('記事の編集に成功しました。');
	            $this->redirect(array('action' => 'index'));
	        } else {
	            $this->Session->setFlash('Unable to update your post.');
	        }
	    }
	}
    public function delete($id) {
	    if ($this->request->is('get')) {
	        throw new MethodNotAllowedException();
	    }
	    if ($this->Post->delete($id)) {
	        $this->Session->setFlash('記事が削除されました。(記事ID:' . $id . ')');
	        $this->redirect(array('action' => 'index'));
	    }
	}
}