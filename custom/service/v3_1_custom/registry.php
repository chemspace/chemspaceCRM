<?php
if(!defined('sugarEntry'))define('sugarEntry', true);

require_once 'service/v3_1/registry.php';
class registry_v3_1_custom extends registry_v3_1 {
	
	/**
	 * This method registers all the functions on the service class
	 */
	protected function registerFunction() 
	{
		parent::registerFunction();

		$this->serviceClass->registerFunction(
			'create_new_enquire',
			array(
				'session'=>'xsd:string',
				'json'=>'xsd:string'
			),
			array(
				'return'=>'xsd:string'
			)
		);

		$this->serviceClass->registerFunction(
			'change_supplier_profile',
			array(
				'session'=>'xsd:string',
				'json'=>'xsd:string'
			),
			array(
				'return'=>'xsd:string'
			)
		);

		$this->serviceClass->registerFunction(
			'register_new_supplier',
			array(
				'session'=>'xsd:string',
				'json'=>'xsd:string'
			),
			array(
				'return'=>'xsd:string'
			)
		);

		$this->serviceClass->registerFunction(
			'record_user_login',
			array(
				'session'=>'xsd:string',
				'json'=>'xsd:string'
			),
			array(
				'return'=>'xsd:string'
			)
		);

		$this->serviceClass->registerFunction(
			'change_user_profile',
			array(
				'session'=>'xsd:string',
				'json'=>'xsd:string'
			),
			array(
				'return'=>'xsd:string'
			)
		);

		$this->serviceClass->registerFunction(
			'register_new_user',
			array(
				'session'=>'xsd:string',
				'json'=>'xsd:string'
			),
			array(
				'return'=>'xsd:string'
			)
		);
	}
}
