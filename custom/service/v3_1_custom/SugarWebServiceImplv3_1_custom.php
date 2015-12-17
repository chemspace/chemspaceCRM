<?php
if(!defined('sugarEntry'))define('sugarEntry', true);

/**
 * This class is an implemenatation class for the rest v3_1_custom services
 * 
 * Methods are:
 *     register_new_user, change_user_profile, record_user_login;
 *     register_new_supplier, change_supplier_profile;
 *     create_new_enquire
 */
require_once 'service/v3_1/SugarWebServiceImplv3_1.php';
class SugarWebServiceImplv3_1_custom extends SugarWebServiceImplv3_1 {

	function create_new_enquire($session, $json)
	{
		$GLOBALS['log']->debug('Begin: create_new_enquire [start]');

		//Here we check that $session represents a valid session
		if (!self::$helperObject->checkSessionAndModuleAccess(
			$session, 'invalid_session', '', '', '', new SoapError())
		) {
			$GLOBALS['log']->error('End: create_new_enquire - session is invalid [stop]');
			return 'STOP - ERROR, session is invalid.';
		}

		// Check the data
		$data = json_decode($json, true);
		if (empty($data)) {
			$GLOBALS['log']->error('End: create_new_enquire - data is empty [skip]');
			return 'SKIP - ERROR, data is empty.';
		}
		if (!is_array($data)) {
			$GLOBALS['log']->error('End: create_new_enquire - data not array [skip]');
			return 'SKIP - ERROR, data not array.';
		}
		$keys = array('enquire_id', 'email', 'first_name', 'last_name', 'company_name', 'country_id', 'enquire_date');
		foreach ($keys as $key) {
			if (!isset($data[$key])) {
				$GLOBALS['log']->error('End: create_new_enquire - datakey not set (error, key is "' . $key . '")');
				return 'STOP - ERROR, datakey not set: "' . $key . '".';
			}
		}
		if (0 >= intval($data['enquire_id'])) {
			$GLOBALS['log']->error('End: create_new_enquire - enquire_id not positive (error, id is "' . ($data['enquire_id']) . '")');
			return 'STOP - ERROR, enquire_id not positive: "' . ($data['enquire_id']) . '".';
		}

		// Do the writing ...
		/*
		$bean = BeanFactory::newBean('Opportunities');
		$test = $bean->retrieve_by_string_fields(
			array('enquire_id_c' => intval($data['enquire_id']))
		);
		if (!(null === $test)) {
			$GLOBALS['log']->error('End: create_new_enquire - enquire_id not unique (error, id is "' . ($data['enquire_id']) . '")');
			return 'SKIP - ERROR, enquire_id not unique: "' . ($data['enquire_id']) . '".';
		}

		$bean->description = 'Enquire created via API.';
		$bean->enquire_id_c = intval($data['enquire_id']);

		$bean->enquire_email_c = strval($data['email']);
		$bean->enquire_first_name_c = strval($data['first_name']);
		$bean->enquire_last_name_c = strval($data['last_name']);

		//$bean->name = strval($data['supplier_name']);
		$bean->country_c = intval($data['country_id']);

		$bean->save();
		*/

		$GLOBALS['log']->debug('End: create_new_enquire [finish]');
		return 'DONE - OK.';
	}

	function change_supplier_profile($session, $json)
	{
		$GLOBALS['log']->debug('Begin: change_supplier_profile [start]');

		//Here we check that $session represents a valid session
		if (!self::$helperObject->checkSessionAndModuleAccess(
			$session, 'invalid_session', '', '', '', new SoapError())
		) {
			$GLOBALS['log']->error('End: change_supplier_profile - session is invalid [stop]');
			return 'STOP - ERROR, session is invalid.';
		}

		// Check the data
		$data = json_decode($json, true);
		if (empty($data)) {
			$GLOBALS['log']->error('End: change_supplier_profile - data is empty [skip]');
			return 'SKIP - ERROR, data is empty.';
		}
		if (!is_array($data)) {
			$GLOBALS['log']->error('End: change_supplier_profile - data not array [skip]');
			return 'SKIP - ERROR, data not array.';
		}
		$keys = array('supplier_id', 'last_update');
		foreach ($keys as $key) {
			if (!isset($data[$key])) {
				$GLOBALS['log']->error('End: change_supplier_profile - datakey not set (error, key is "' . $key . '")');
				return 'STOP - ERROR, datakey not set: "' . $key . '".';
			}
		}
		if (0 >= intval($data['supplier_id'])) {
			$GLOBALS['log']->error('End: change_supplier_profile - supplier_id not positive (error, id is "' . ($data['supplier_id']) . '")');
			return 'STOP - ERROR, supplier_id not positive: "' . ($data['supplier_id']) . '".';
		}

		$accountsBean = BeanFactory::newBean('Accounts');
		$bean = $accountsBean->retrieve_by_string_fields(
			array('supplier_id_c' => intval($data['supplier_id']))
		);
		if (null === $bean) {
			$GLOBALS['log']->error('End: change_supplier_profile - supplier_id not found (error, id is "' . ($data['supplier_id']) . '")');
			return 'SKIP - ERROR, supplier_id not found: "' . ($data['supplier_id']) . '".';
		}
		// Do the writing ...
		if (isset($data['supplier_name'])) {
			$bean->name = strval($data['supplier_name']);
		}
		if (isset($data['email'])) {
			$bean->email1 = strval($data['email']);
		}
		if (isset($data['country_id'])) {
			$bean->country_c = intval($data['country_id']);
		}

		if (isset($data['city'])) {
			$bean->billing_address_city = strval($data['city']);
		}
		if (isset($data['address'])) {
			$bean->billing_address_street = strval($data['address']);
		}
		if (isset($data['zip'])) {
			$bean->billing_address_postalcode = strval($data['zip']);
		}

		if (isset($data['phone'])) {
			$bean->phone_office = strval($data['phone']);
		}
		if (isset($data['web'])) {
			$bean->website = strval($data['web']);
		}

		if (isset($data['catalog_update_date'])) {
			$bean->fe_catalog_update_date_c = strval($data['catalog_update_date']);
		}
		$bean->fe_change_date_c = strval($data['last_update']);

		$bean->save();

		$GLOBALS['log']->debug('End: change_supplier_profile [finish]');
		return 'DONE - OK.';
	}

	function register_new_supplier($session, $json)
	{
		$GLOBALS['log']->debug('Begin: register_new_supplier [start]');

		//Here we check that $session represents a valid session
		if (!self::$helperObject->checkSessionAndModuleAccess(
			$session, 'invalid_session', '', '', '', new SoapError())
		) {
			$GLOBALS['log']->error('End: register_new_supplier - session is invalid [stop]');
			return 'STOP - ERROR, session is invalid.';
		}

		// Check the data
		$data = json_decode($json, true);
		if (empty($data)) {
			$GLOBALS['log']->error('End: register_new_supplier - data is empty [skip]');
			return 'SKIP - ERROR, data is empty.';
		}
		if (!is_array($data)) {
			$GLOBALS['log']->error('End: register_new_supplier - data not array [skip]');
			return 'SKIP - ERROR, data not array.';
		}
		$keys = array('supplier_id', 'supplier_name', 'email', 'country_id', 'city', 'address', 'zip', 'phone', 'web', 'reg_date');
		foreach ($keys as $key) {
			if (!isset($data[$key])) {
				$GLOBALS['log']->error('End: register_new_supplier - datakey not set (error, key is "' . $key . '")');
				return 'STOP - ERROR, datakey not set: "' . $key . '".';
			}
		}
		if (0 >= intval($data['supplier_id'])) {
			$GLOBALS['log']->error('End: register_new_supplier - supplier_id not positive (error, id is "' . ($data['supplier_id']) . '")');
			return 'STOP - ERROR, supplier_id not positive: "' . ($data['supplier_id']) . '".';
		}

		// Do the writing ...
		$bean = BeanFactory::newBean('Accounts');
		$test = $bean->retrieve_by_string_fields(
			array('supplier_id_c' => intval($data['supplier_id']))
		);
		if (!(null === $test)) {
			$GLOBALS['log']->error('End: register_new_supplier - supplier_id not unique (error, id is "' . ($data['supplier_id']) . '")');
			return 'SKIP - ERROR, supplier_id not unique: "' . ($data['supplier_id']) . '".';
		}

		$bean->description = 'Company (supplier) created via API.';
		$bean->account_type = 'Supplier';
		$bean->company_type_multi_c = 'Supplier';
		$bean->supplier_id_c = intval($data['supplier_id']);

		$bean->name = strval($data['supplier_name']);
		$bean->email1 = strval($data['email']);
		$bean->country_c = intval($data['country_id']);

		$bean->billing_address_city = strval($data['city']);
		$bean->billing_address_street = strval($data['address']);
		$bean->billing_address_postalcode = strval($data['zip']);

		$bean->phone_office = strval($data['phone']);
		$bean->website = strval($data['web']);

		if (isset($data['catalog_update_date'])) {
			$bean->fe_catalog_update_date_c = strval($data['catalog_update_date']);
		}
		$bean->fe_reg_date_c = strval($data['reg_date']);

		$bean->save();

		$GLOBALS['log']->debug('End: register_new_supplier [finish]');
		return 'DONE - OK.';
	}

	function record_user_login($session, $json)
	{
		$GLOBALS['log']->debug('Begin: record_user_login [start]');

		//Here we check that $session represents a valid session
		if (!self::$helperObject->checkSessionAndModuleAccess(
			$session, 'invalid_session', '', '', '', new SoapError())
		) {
			$GLOBALS['log']->error('End: record_user_login - session is invalid [stop]');
			return 'STOP - ERROR, session is invalid.';
		}

		// Check the data
		$data = json_decode($json, true);
		if (empty($data)) {
			$GLOBALS['log']->error('End: record_user_login - data is empty [skip]');
			return 'SKIP - ERROR, data is empty.';
		}
		if (!is_array($data)) {
			$GLOBALS['log']->error('End: record_user_login - data not array [skip]');
			return 'SKIP - ERROR, data not array.';
		}
		$keys = array('user_id', 'last_visit');
		foreach ($keys as $key) {
			if (!isset($data[$key])) {
				$GLOBALS['log']->error('End: record_user_login - datakey not set (error, key is "' . $key . '")');
				return 'STOP - ERROR, datakey not set: "' . $key . '".';
			}
		}
		if (0 >= intval($data['user_id'])) {
			$GLOBALS['log']->error('End: record_user_login - user_id not positive (error, id is "' . ($data['user_id']) . '")');
			return 'STOP - ERROR, user_id not positive: "' . ($data['user_id']) . '".';
		}

		$contactsBean = BeanFactory::newBean('Contacts');
		$bean = $contactsBean->retrieve_by_string_fields(
			array('fe_user_id_c' => intval($data['user_id']))
		);
		if (null === $bean) {
			$GLOBALS['log']->error('End: record_user_login - user_id not found (error, id is "' . ($data['user_id']) . '")');
			return 'SKIP - ERROR, user_id not found: "' . ($data['user_id']) . '".';
		}
		// Do the writing ...
		$count_logins_all = intval($bean->fe_count_logins_all_c);
		$bean->fe_count_logins_all_c = (0 < $count_logins_all) ? ($count_logins_all + 1) : 2;
		$bean->fe_last_visit_c = strval($data['last_visit']);

		$bean->save();

		$GLOBALS['log']->debug('End: record_user_login [finish]');
		return 'DONE - OK.';
	}

	function change_user_profile($session, $json)
	{
		$GLOBALS['log']->debug('Begin: change_user_profile [start]');

		//Here we check that $session represents a valid session
		if (!self::$helperObject->checkSessionAndModuleAccess(
			$session, 'invalid_session', '', '', '', new SoapError())
		) {
			$GLOBALS['log']->error('End: change_user_profile - session is invalid [stop]');
			return 'STOP - ERROR, session is invalid.';
		}

		// Check the data
		$data = json_decode($json, true);
		if (empty($data)) {
			$GLOBALS['log']->error('End: change_user_profile - data is empty [skip]');
			return 'SKIP - ERROR, data is empty.';
		}
		if (!is_array($data)) {
			$GLOBALS['log']->error('End: change_user_profile - data not array [skip]');
			return 'SKIP - ERROR, data not array.';
		}
		$keys = array('user_id', 'change_date');
		foreach ($keys as $key) {
			if (!isset($data[$key])) {
				$GLOBALS['log']->error('End: change_user_profile - datakey not set (error, key is "' . $key . '")');
				return 'STOP - ERROR, datakey not set: "' . $key . '".';
			}
		}
		if (0 >= intval($data['user_id'])) {
			$GLOBALS['log']->error('End: change_user_profile - user_id not positive (error, id is "' . ($data['user_id']) . '")');
			return 'STOP - ERROR, user_id not positive: "' . ($data['user_id']) . '".';
		}

		$contactsBean = BeanFactory::newBean('Contacts');
		$bean = $contactsBean->retrieve_by_string_fields(
			array('fe_user_id_c' => intval($data['user_id']))
		);
		if (null === $bean) {
			$GLOBALS['log']->error('End: change_user_profile - user_id not found (error, id is "' . ($data['user_id']) . '")');
			return 'SKIP - ERROR, user_id not found: "' . ($data['user_id']) . '".';
		}
		// Do the writing ...
		if (isset($data['email'])) {
			$bean->fe_email_c = strval($data['email']);
		}

		if (isset($data['salutation'])) {
			$bean->fe_salutation_c = strval($data['salutation']);
		}
		if (isset($data['first_name'])) {
			$bean->fe_first_name_c = strval($data['first_name']);
		}
		if (isset($data['last_name'])) {
			$bean->fe_last_name_c = strval($data['last_name']);
		}

		if (isset($data['country_id'])) {
			$bean->fe_country_id_c = intval($data['country_id']);
		}
		if (isset($data['currency'])) {
			$bean->fe_currency_c = strval($data['currency']);
		}
		if (isset($data['company_name'])) {
			$bean->fe_company_name_c = strval($data['company_name']);
		}

		if (isset($data['position'])) {
			$bean->fe_position_c = strval($data['position']);
		}
		if (isset($data['phone'])) {
			$bean->fe_phone_c = strval($data['phone']);
		}
		if (isset($data['fax'])) {
			$bean->fe_fax_c = strval($data['fax']);
		}

		if (isset($data['social_account'])) {
			$bean->fe_social_account_c = serialize($data['social_account']);
		}
		if (isset($data['email_notification'])) {
			$bean->fe_email_notification_c = boolval($data['email_notification']);
		}

		$bean->fe_change_date_c = strval($data['change_date']);

		$bean->save();

		$GLOBALS['log']->debug('End: change_user_profile [finish]');
		return 'DONE - OK.';
	}

	function register_new_user($session, $json)
	{
		$GLOBALS['log']->debug('Begin: register_new_user [start]');

		//Here we check that $session represents a valid session
		if (!self::$helperObject->checkSessionAndModuleAccess(
			$session, 'invalid_session', '', '', '', new SoapError())
		) {
			$GLOBALS['log']->error('End: register_new_user - session is invalid [stop]');
			return 'STOP - ERROR, session is invalid.';
		}

		// Check the data
		$data = json_decode($json, true);
		if (empty($data)) {
			$GLOBALS['log']->error('End: register_new_user - data is empty [skip]');
			return 'SKIP - ERROR, data is empty.';
		}
		if (!is_array($data)) {
			$GLOBALS['log']->error('End: register_new_user - data not array [skip]');
			return 'SKIP - ERROR, data not array.';
		}
		$keys = array('user_id', 'email', 'salutation', 'first_name', 'last_name', 'country_id', 'currency', 'company_name', 'social_account', 'email_notification', 'reg_date');
		foreach ($keys as $key) {
			if (!isset($data[$key])) {
				$GLOBALS['log']->error('End: register_new_user - datakey not set (error, key is "' . $key . '")');
				return 'STOP - ERROR, datakey not set: "' . $key . '".';
			}
		}
		if (0 >= intval($data['user_id'])) {
			$GLOBALS['log']->error('End: register_new_user - user_id not positive (error, id is "' . ($data['user_id']) . '")');
			return 'STOP - ERROR, user_id not positive: "' . ($data['user_id']) . '".';
		}

		// Do the writing ...
		$bean = BeanFactory::newBean('Contacts');
		$test = $bean->retrieve_by_string_fields(
			array('fe_user_id_c' => intval($data['user_id']))
		);
		if (!(null === $test)) {
			$GLOBALS['log']->error('End: register_new_user - user_id not unique (error, id is "' . ($data['user_id']) . '")');
			return 'SKIP - ERROR, user_id not unique: "' . ($data['user_id']) . '".';
		}
		$new_record = true;
		// Recheck that we may have contact with such email
		$list = $bean->get_full_list('date_modified DESC',
			"contacts.id IN (SELECT eabr.bean_id FROM email_addr_bean_rel eabr JOIN email_addresses ea ON (eabr.email_address_id = ea.id) WHERE eabr.bean_module = 'Contacts' AND ea.email_address_caps = '" . strtoupper($data['email']) . "' AND eabr.deleted=0 AND ea.deleted=0)"
		);
		if (is_array($list) && (0 < count($list))) {
			$id = $list[0]->id;
			$GLOBALS['log']->debug('Check: register_new_user found id="' . print_r($id, TRUE) . '" [processing]');
			$bean = BeanFactory::getBean('Contacts', $id);
			if (0 < intval($bean->fe_user_id_c)) {
				$GLOBALS['log']->error('End: register_new_user - user_id already exists (error, id is "' . ($bean->fe_user_id_c) . '")');
				return 'SKIP - ERROR, user_id already exists: "' . ($bean->fe_user_id_c) . '".';
			}
			$new_record = false;
		}
		if ($new_record) {
			$bean->description = 'Contact created via API.';
		}

		$bean->fe_user_id_c = strval($data['user_id']);
		$bean->fe_email_c = strval($data['email']);

		if ($new_record) {
			$bean->email1 = strval($data['email']);

			$bean->salutation = strval($data['salutation']);
			$bean->first_name = strval($data['first_name']);
			$bean->last_name = strval($data['last_name']);

			$bean->country_c = intval($data['country_id']);
			$bean->currency_c = strval($data['currency']);
			$bean->company_name_c = strval($data['company_name']);
			$bean->company_type_c = 'Customer';
		}

		$bean->fe_salutation_c = strval($data['salutation']);
		$bean->fe_first_name_c = strval($data['first_name']);
		$bean->fe_last_name_c = strval($data['last_name']);

		$bean->fe_country_id_c = intval($data['country_id']);
		$bean->fe_currency_c = strval($data['currency']);
		$bean->fe_company_name_c = strval($data['company_name']);

		$bean->fe_social_account_c = serialize($data['social_account']);
		$bean->fe_email_notification_c = boolval($data['email_notification']);
		$bean->fe_reg_date_c = strval($data['reg_date']);

		$bean->save();

		$GLOBALS['log']->debug('End: register_new_user [finish]');
		return 'DONE - OK.';
	}
}

SugarWebServiceImplv3_1_custom::$helperObject = new SugarWebServiceUtilv3_1();
