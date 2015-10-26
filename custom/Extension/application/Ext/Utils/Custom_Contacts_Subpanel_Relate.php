<?php
function getSubpanelQueryParts($params)
{
    $bean = $GLOBALS['app']->controller->bean;

    $return_array['select']='SELECT contacts.id ';
    $return_array['from']='FROM contacts ';
    $return_array['where']=" WHERE contacts_cstm.cs_contact_id_c = '$bean->cs_contact_id_c' ";
    $return_array['join'] = "";
    $return_array['join_tables'][0] = '';

    return $return_array;
}