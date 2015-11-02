<?php

// custom/modules/Accounts/Country_CompanyAddressLogicHook.php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

class Country_CompanyAddressLogicHook {

    function addCountryToAddressField(&$bean, $event, $arguments) {
        // before_save
        if (!empty($bean->country_c)){
            $bean->billing_address_country .= $bean->country_c;

        }
    }

}
