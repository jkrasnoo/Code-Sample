<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController
{
/**
 * Components
 */
	public $components = array('RequestHandler');
	
/**
 * Helpers
 */
	//public $helpers = array('Html');
	
/**
 * beforeFilter
 * 
 */
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('login', 'logout', 'add');
		
		// Make sure we go to profile after login
		$this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'view');
		
		/*
		if ($this->request->is('ajax')) {
			$this->RequestHandler->setContent('json');
			$this->autoRender = false;
			$this->layout = 'ajax';
		}
		 * 
		 */
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->set('title_for_layout', 'User Profile');
		if ($id === null) {
			$id = $this->Auth->user('id');
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			$this->redirect('/users/login');
			//throw new NotFoundException(__('Invalid user'), 'default', array('class' => 'alert alert-error'));
		}
		
		// only read the fields listed below.
		$user = $this->User->read(array(
			'username',
			'email',
			'first_name',
			'last_name',
			'address',
			'city',
			'state',
			'zip'
		), $id);
		
		$this->set('user', $user);
		$this->request->data = $user;
	}
	
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			
			// Must always create a new user before we save a new user.
			$this->User->create();
			
			// If the new user has been created redirect to login.
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'login'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if ($id === null) {
			$id = $this->Auth->user('id');
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			
			if ($this->User->save($this->request->data, false)) {
				// Response is built in to javascript.
				//$this->Session->setFlash(__('The user has been saved'), 'default', array('class' => 'alert alert-success'));
				//$this->redirect(array('action' => 'view'));
			} else {
				throw new CakeException('The field could not be saved.');
				//$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		
		$this->User->id = $id;
		if (!$this->User->exists()) {
			return new CakeResponse(array('body' => json_encode(array('success' => false))));
			//throw new NotFoundException(__('Invalid user'),  'default', array('class' => 'alert alert-error'));
		}
		if ($this->User->delete()) {
			//$this->Session->setFlash(__('User deleted'), 'default', array('class' => 'alert alert-success'));
			//$this->redirect(array('action' => 'index'));
			return new CakeResponse(array('body' => json_encode(array('success' => true))));
			
		}
		//$this->Session->setFlash(__('User was not deleted'), 'default', array('class' => 'alert alert-error'));
		//$this->redirect(array('action' => 'index'));
		return new CakeResponse(array('body' => json_encode(array('success' => false))));
	}
	
/**
 * Non crud actions
 */
	
/**
 * login method
 * 
 * @return void
 */
	public function login()
	{
		if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect('/users/view'));
            } else {
                $this->Session->setFlash('Invalid username or password, try again', 'default', array('class' => 'alert alert-error'));
            }
        }
	}
	
/**
 * logout method
 */
	public function logout()
	{
		$this->Session->setFlash('You are now logged out.', 'default', array('class' => 'alert alert-success'));
		$this->redirect($this->Auth->logout());
	}
}
