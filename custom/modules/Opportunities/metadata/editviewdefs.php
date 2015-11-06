<?php
$viewdefs ['Opportunities'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'javascript' => '{$PROBABILITY_SCRIPT}',
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_PANEL_ASSIGNMENT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'opportunity_autoincrement_id_c',
            'label' => 'LBL_OPPORTUNITY_AUTOINCREMENT_ID',
          ),
          1 => 'opportunity_type',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'enquire_email_c',
            'label' => 'LBL_ENQUIRE_EMAIL',
          ),
          1 => 
          array (
            'name' => 'enquire_phone_c',
            'label' => 'LBL_ENQUIRE_PHONE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'enquire_user_id_c',
            'label' => 'LBL_ENQUIRE_USER_ID',
          ),
          1 => 
          array (
            'name' => 'jjwg_maps_address_c',
            'label' => 'LBL_JJWG_MAPS_ADDRESS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'enquire_item_id_c',
            'label' => 'LBL_ENQUIRE_ITEM_ID',
          ),
          1 => 
          array (
            'name' => 'enquire_ip_c',
            'label' => 'LBL_ENQUIRE_IP',
          ),
        ),
        4 => 
        array (
          1 => 
          array (
            'name' => 'enquire_country_id_c',
            'studio' => 'visible',
            'label' => 'LBL_ENQUIRE_COUNTRY_ID',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'enquire_id_c',
            'label' => 'LBL_ENQUIRE_ID',
          ),
          1 => 
          array (
            'name' => 'enquire_city_c',
            'label' => 'LBL_ENQUIRE_CITY',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'enquire_vendor_item_c',
            'label' => 'LBL_ENQUIRE_VENDOR_ITEM',
          ),
          1 => 
          array (
            'name' => 'enquire_state_c',
            'label' => 'LBL_ENQUIRE_STATE',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'currency_id',
            'label' => 'LBL_CURRENCY',
          ),
          1 => 'campaign_name',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'enquire_first_name_c',
            'label' => 'LBL_ENQUIRE_FIRST_NAME',
          ),
          1 => 'sales_stage',
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'enquire_last_name_c',
            'label' => 'LBL_ENQUIRE_LAST_NAME',
          ),
          1 => 'lead_source',
        ),
      ),
      'LBL_PANEL_ASSIGNMENT' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'comment' => 'Date record created',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'comment' => 'Date record last modified',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
        1 => 
        array (
          0 => 'description',
        ),
        2 => 
        array (
          0 => 'assigned_user_name',
        ),
      ),
    ),
  ),
);
?>
