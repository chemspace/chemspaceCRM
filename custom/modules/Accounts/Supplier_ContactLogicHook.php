<?php

// custom/modules/Accounts/Supplier_ContactLogicHook.php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

class Supplier_ContactLogicHook {

    function addContactToSubpanel(&$bean, $event, $arguments) {
        // before_save

        if (!empty($bean->cs_contact_id_c)){
            $contact = new Contact();
            $contact->retrieve_by_string_fields(array('cs_contact_id_c' => $bean->cs_contact_id_c ));
            if(!empty($contact->last_name || $contact->first_name)) $bean->description = 'Related contact person is: ' . $contact->first_name .= $contact->last_name;

        }

    }

}
