<?php

// custom/modules/Contacts/Notes_ContactLogicHook.php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

class Notes_ContactLogicHook {

    function addNotesDescriptionField(&$bean, $event, $arguments) {
        // before_save

        if (!empty($bean->account_id)){
            $account = new Account();
            $account->retrieve($bean->account_id);
            if(!empty($account->account_type)) $bean->company_type_c =$account->account_type;

        }

    }

}
