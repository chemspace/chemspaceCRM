<?php

// /custom/modules/Opportunities/Opportunity_CustomerNameLinkLogicHook.php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

class Opportunity_CustomerNameLinkLogicHook {

    function linkFistNameAndLastName(&$bean, $event, $arguments) {
        // before_save

        if (!empty($bean->first_name) && !empty($bean->last_name)){
            $bean->name = $bean->first_name . ' ' . $bean->last_name;

        }

    }

}
