<?php

// /custom/modules/Opportunities/Supplier_EnquiryCSPartnerLinkLogicHook.php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

class Supplier_EnquiryCSPartnerLinkLogicHook {

    function showCSPartnerFieldValue(&$bean, $event, $arguments)
    {
        // before_save

        if (!empty($bean->supplier_id_c)){
            $supplier = new Account();
            $supplier->retrieve_by_string_fields(array('supplier_id_c' => $bean->supplier_id_c));
            if(!empty($supplier->chemspace_partner_c)) $bean->cs_partner_c = $supplier->chemspace_partner_c;
        }
        //Load Account
        //$id = $bean->supplier_id_c;
        //$bean = BeanFactory::getBean('Accounts', $id);

        //If relationship is loaded
        //if ($bean->load_relationship('accounts'))
        //{
            //Fetch related beans
        //    $relatedBeans = $bean->contacts->getBeans();
        //}

    }

}
