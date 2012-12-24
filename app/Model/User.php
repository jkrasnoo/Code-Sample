<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 * @property File $File
 */
class User extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Username is a required field.',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'alphanumeric' => array(
				'rule' => '/^[a-z0-9_]{3,20}$/i',
				'message' => 'Only letters, integers and the underscore(_) are allowed.',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'between' => array(
				'rule' => array('between', 3, 20),
				'message' => 'Usernames must be between 3 and 20 characters.',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'create' // Limit validation to 'create' or 'update' operations
			)
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Password is a required field',
				'allowEmpty' => false,
				'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create' // Limit validation to 'create' or 'update' operations
			),
			'between' => array(
				'rule' => array('between', 8, 20),
				'message' => 'Passwords must be between 8 and 20 characters.',
				'allowEmpty' => false,
				'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create' // Limit validation to 'create' or 'update' operations
			)
		),
		'password_verify' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Password Verify is a required field',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'between' => array(
				'rule' => array('between', 8, 20),
				'message' => 'Passwords must be 8 and 20 characters.',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'compare' => array(
				'rule' => array('passwordMatch', 'password'),
				'message' => 'The two passwords you have entered do not match.',
				'required' => true,
				'on' => 'create'
			)
		),
		'first_name' => array(
			'alphanumeric' => array(
				'rule' => '/^[a-z0-9 ]{3,}$/i',
				'message' => 'First Name may only contain letters and numbers.',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'update', // Limit validation to 'create' or 'update' operations
			)
		),
		'last_name' => array(
			'alphanumeric' => array(
				'rule' => '/^[a-z0-9 ]{3,}$/i',
				'message' => 'Last Name may only contain letters and numbers.',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'update', // Limit validation to 'create' or 'update' operations
			)
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Invalid email address.',
				'allowEmpty' => false,
				'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Email is a required field.',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'create' // Limit validation to 'create' or 'update' operations
			)
		),
		'address' => array(
			'alphanumeric' => array(
				'rule' => '/^[a-z0-9 ]{3,}$/i',
				'message' => 'Only letters and integers are allowed',
				'allowEmpty' => true,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'update', // Limit validation to 'create' or 'update' operations
			)
		),
		'city' => array(
			'alphanumeric' => array(
				'rule' => '/^[a-z0-9 ]{3,}$/i',
				'message' => 'Only letters, intergers and spaces are allowed.',
				'allowEmpty' => true,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'update', // Limit validation to 'create' or 'update' operations
			)
		),
		'state' => array(
			'alphanumeric' => array(
				'rule' => '/^[a-z]{3,}$/i',
				'message' => 'Only letters and intergers are allowed.',
				'allowEmpty' => true,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'update', // Limit validation to 'create' or 'update' operations
			)
		),
		'zip' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Zip Code can only have numbers.',
				'allowEmpty' => true,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'update'// Limit validation to 'create' or 'update' operations
			),
			'minlength' => array(
				'rule' => array('minlength', 5),
				'message' => 'Zip Codes must be no less than 5 digits.',
				'allowEmpty' => true,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'update', // Limit validation to 'create' or 'update' operations
			),
			'maxlength' => array(
				'rule' => array('maxlength', 5),
				'message' => 'Zip Codes must be no more than 5 digits.',
				'allowEmpty' => true,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'update' // Limit validation to 'create' or 'update' operations
			)
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'File' => array(
			'className' => 'File',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
/**
 * before save method
 */
	public function beforeSave($options = array())
	{
		parent::beforeSave($options);
		if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
	}
	
/**
 * Ensures that the passwords match.
 * 
 * @param array $data Data provided by the controller
 * @param string $password_field The original password
 */
	public function passwordMatch($data, $password_field)
	{
		$password = $this->data[$this->alias][$password_field];
		$keys = array_keys($data);
		$password_verify = $data[$keys[0]];
		return $password === $password_verify;
	}

}
