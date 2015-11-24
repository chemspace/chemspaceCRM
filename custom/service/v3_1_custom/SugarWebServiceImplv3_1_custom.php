<?php
if(!defined('sugarEntry'))define('sugarEntry', true);

/**
 * This class is an implemenatation class for the rest v3_1_custom services
 */
require_once 'service/v3_1/SugarWebServiceImplv3_1.php';
class SugarWebServiceImplv3_1_custom extends SugarWebServiceImplv3_1 {

	function write_user_data($session, $json)
	{
		$GLOBALS['log']->debug('Begin: write_user_data [start]');

		//Here we check that $session represents a valid session
		if (!self::$helperObject->checkSessionAndModuleAccess(
			$session,
			'invalid_session',
			'',
			'',
			'',
			new SoapError())
		)
		{
			$GLOBALS['log']->error('End: write_user_data [error]');
			return false;
		}
		$GLOBALS['log']->info($json);
		$GLOBALS['log']->debug('End: write_user_data [finish]');
		return true;
	}
}

SugarWebServiceImplv3_1_custom::$helperObject = new SugarWebServiceUtilv3_1();
