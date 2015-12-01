<?php
if(!defined('sugarEntry'))define('sugarEntry', true);

/**
 * This class is an implemenatation class for the rest v3_1_custom services
 */
require_once 'service/v3_1/SugarWebServiceImplv3_1.php';
class SugarWebServiceImplv3_1_custom extends SugarWebServiceImplv3_1 {

	function change_user_profile($session, $json)
	{
		$GLOBALS['log']->debug('Begin: change_user_profile [start]');

		//Here we check that $session represents a valid session
		if (!self::$helperObject->checkSessionAndModuleAccess(
			$session,
			'invalid_session', '', '', '', new SoapError())
		) {
			$GLOBALS['log']->error('End: change_user_profile - session is invalid [error]');
			return false;
		}

		// Check the data
		$data = json_decode($json, true);
		if (empty($data)) {
			$GLOBALS['log']->error('End: change_user_profile - data is empty [error]');
			return false;
		}
		if (!is_array($data)) {
			$GLOBALS['log']->error('End: change_user_profile - data not array [error]');
			return false;
		}
		$keys = array('user_id', 'change_date');
		foreach ($keys as $key) {
			if (!isset($data[$key])) {
				$GLOBALS['log']->error('End: change_user_profile - data[' . $key . '] not set [error]');
				return false;
			}
		}
		if (0 >= intval($data['user_id'])) {
			$GLOBALS['log']->error('End: change_user_profile - user_id not positive [error]');
			return false;
		}

		$contactsBean = BeanFactory::newBean('Contacts');
		$bean = $contactsBean->retrieve_by_string_fields(
			array('fe_user_id_c' => intval($data['user_id']))
		);
		if (null === $bean) {
			$GLOBALS['log']->error('End: change_user_profile - user_id not found [error]');
			return false;
		}
		// Do the writing ...
		if (isset($data['email'])) {
			$bean->fe_email_c = strval($data['email']);
		}

		if (isset($data['salutation'])) {
			$bean->fe_salutation_c = strval($data['salutation']);
		}
		if (isset($data['firstname'])) {
			$bean->fe_first_name_c = strval($data['firstname']);
		}
		if (isset($data['lastname'])) {
			$bean->fe_last_name_c = strval($data['lastname']);
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
		return true;
	}

	function register_new_user($session, $json)
	{
		$GLOBALS['log']->debug('Begin: register_new_user [start]');

		//Here we check that $session represents a valid session
		if (!self::$helperObject->checkSessionAndModuleAccess(
			$session,
			'invalid_session', '', '', '', new SoapError())
		) {
			$GLOBALS['log']->error('End: register_new_user - session is invalid [error]');
			return false;
		}

		// Check the data
		$data = json_decode($json, true);
		if (empty($data)) {
			$GLOBALS['log']->error('End: register_new_user - data is empty [error]');
			return false;
		}
		if (!is_array($data)) {
			$GLOBALS['log']->error('End: register_new_user - data not array [error]');
			return false;
		}
		$keys = array('user_id', 'email', 'salutation', 'firstname', 'lastname', 'country_id', 'currency', 'company_name', 'social_account', 'email_notification', 'reg_date');
		foreach ($keys as $key) {
			if (!isset($data[$key])) {
				$GLOBALS['log']->error('End: register_new_user - data[' . $key . '] not set [error]');
				return false;
			}
		}

		// Do the writing ...
		$bean = BeanFactory::newBean('Contacts');
		$bean->description = 'Contact created via API.';

		$bean->fe_user_id_c = strval($data['user_id']);
		$bean->fe_email_c = strval($data['email']);

		$bean->email1 = strval($data['email']);

		$bean->salutation = strval($data['salutation']);
		$bean->first_name = strval($data['firstname']);
		$bean->last_name = strval($data['lastname']);

		$bean->fe_salutation_c = strval($data['salutation']);
		$bean->fe_first_name_c = strval($data['firstname']);
		$bean->fe_last_name_c = strval($data['lastname']);

		$bean->country_c = intval($data['country_id']);
		$bean->fe_country_id_c = intval($data['country_id']);

		$bean->currency_c = strval($data['currency']);
		$bean->fe_currency_c = strval($data['currency']);

		$bean->company_name_c = strval($data['company_name']);
		$bean->fe_company_name_c = strval($data['company_name']);

		$bean->fe_social_account_c = serialize($data['social_account']);
		$bean->fe_email_notification_c = boolval($data['email_notification']);
		$bean->fe_reg_date_c = strval($data['reg_date']);

		$bean->save();

		$GLOBALS['log']->debug('End: register_new_user [finish]');
		return true;
	}

	function write_user_data($session, $json)
	{
		$GLOBALS['log']->debug('Begin: write_user_data [start]');

		//Here we check that $session represents a valid session
		if (!self::$helperObject->checkSessionAndModuleAccess(
			$session,
			'invalid_session', '', '', '', new SoapError())
		)
		{
			$GLOBALS['log']->error('End: write_user_data [error]');
			return false;
		}
		$GLOBALS['log']->info($json);
		// do the writing ...
		$GLOBALS['log']->debug('End: write_user_data [finish]');
		return true;
	}
}

SugarWebServiceImplv3_1_custom::$helperObject = new SugarWebServiceUtilv3_1();
