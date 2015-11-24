<?php
if(!defined('sugarEntry'))define('sugarEntry', true);

/**
 * This is a rest entry point for rest version 3.1.custom
 */
chdir('../../..');

require_once 'SugarWebServiceImplv3_1_custom.php'; // step # 1, implementation

$webservice_path = 'service/core/SugarRestService.php';
$webservice_class = 'SugarRestService';
$webservice_impl_class = 'SugarWebServiceImplv3_1_custom';

$registry_path = 'custom/service/v3_1_custom/registry.php'; // step # 2, registration
$registry_class = 'registry_v3_1_custom';

$location = 'custom/service/v3_1_custom/rest.php';

require_once 'service/core/webservice.php';
