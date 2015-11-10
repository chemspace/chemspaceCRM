<?php

// /custom/modules/Opportunities/Supplier_EnquiryCSPartnerLinkLogicHook.php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

class Supplier_EnquiryCSPartnerLinkLogicHook {

    function showCSPartnerFieldValue(&$bean, $event, $arguments) {
        // before_save

        if (!empty($bean->enquire_supplier_id_c)){
            $supplier = new Account();
            $supplier->retrieve($bean->enquire_supplier_id_c);
            if(!empty($supplier->chemspace_partner_c)) $bean->cs_partner_c =$supplier->chemspace_partner_c;
        }

    }

}
