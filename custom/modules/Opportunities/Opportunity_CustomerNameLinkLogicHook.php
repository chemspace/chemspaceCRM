<?php

// /custom/modules/Opportunities/Opportunity_CustomerNameLinkLogicHook.php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

class Opportunity_CustomerNameLinkLogicHook {

    function linkFistNameAndLastName(&$bean, $event, $arguments) {
        // before_save

        if (!empty($bean->first_name) && !empty($bean->last_name)){
            $bean->name .= $bean->enquire_first_name_c;
            $bean->name .= " ";
            $bean->name .= $bean->enquire_last_name_c;
        }

    }

}
