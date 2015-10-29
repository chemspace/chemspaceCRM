<?php
$viewdefs ['Opportunities'] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
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
            'name' => 'enquire_first_name_c',
            'label' => 'LBL_ENQUIRE_FIRST_NAME',
          ),
          1 => 'account_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'enquire_last_name_c',
            'label' => 'LBL_ENQUIRE_LAST_NAME',
          ),
          1 => 'opportunity_type',
        ),
        2 => 
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
        3 => 
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
        4 => 
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
        5 => 
        array (
          0 => 
          array (
            'name' => 'enquire_supplier_id_c',
            'label' => 'LBL_ENQUIRE_SUPPLIER_ID',
          ),
          1 => 
          array (
            'name' => 'enquire_country_id_c',
            'studio' => 'visible',
            'label' => 'LBL_ENQUIRE_COUNTRY_ID',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'enquire_id_c',
            'label' => 'LBL_ENQUIRE_ID',
          ),
          1 => 'campaign_name',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'enquire_vendor_item_c',
            'label' => 'LBL_ENQUIRE_VENDOR_ITEM',
          ),
          1 => 'lead_source',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'currency_id',
            'comment' => 'Currency used for display purposes',
            'label' => 'LBL_CURRENCY',
          ),
          1 => 'sales_stage',
        ),
      ),
      'LBL_PANEL_ASSIGNMENT' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'label' => 'LBL_DATE_MODIFIED',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'nl2br' => true,
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
          ),
        ),
      ),
    ),
  ),
);
?>
