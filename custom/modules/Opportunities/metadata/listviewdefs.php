<?php
$listViewDefs ['Opportunities'] = 
array (
  'OPPORTUNITY_AUTOINCREMENT_ID_C' => 
  array (
    'type' => 'int',
    'default' => true,
    'label' => 'LBL_OPPORTUNITY_AUTOINCREMENT_ID',
    'width' => '10%',
  ),
  'ENQUIRE_EMAIL_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_ENQUIRE_EMAIL',
    'width' => '10%',
  ),
  'ACCOUNT_NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_ACCOUNT_NAME',
    'id' => 'ACCOUNT_ID',
    'module' => 'Accounts',
    'link' => true,
    'default' => true,
    'sortable' => true,
    'ACLTag' => 'ACCOUNT',
    'contextMenu' => 
    array (
      'objectType' => 'sugarAccount',
      'metaData' => 
      array (
        'return_module' => 'Contacts',
        'return_action' => 'ListView',
        'module' => 'Accounts',
        'parent_id' => '{$ACCOUNT_ID}',
        'parent_name' => '{$ACCOUNT_NAME}',
        'account_id' => '{$ACCOUNT_ID}',
        'account_name' => '{$ACCOUNT_NAME}',
      ),
    ),
    'related_fields' => 
    array (
      0 => 'account_id',
    ),
  ),
  'ENQUIRE_SUPPLIER_ID_C' => 
  array (
    'type' => 'int',
    'default' => true,
    'label' => 'LBL_ENQUIRE_SUPPLIER_ID',
    'width' => '10%',
  ),
  'ENQUIRE_VENDOR_ITEM_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_ENQUIRE_VENDOR_ITEM',
    'width' => '10%',
  ),
  'AMOUNT' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'width' => '10%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '30%',
    'label' => 'LBL_LIST_OPPORTUNITY_NAME',
    'link' => true,
    'default' => false,
  ),
  'ENQUIRE_LAST_NAME_C' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'label' => 'LBL_ENQUIRE_LAST_NAME',
    'width' => '10%',
  ),
  'ENQUIRE_ITEM_ID_C' => 
  array (
    'type' => 'int',
    'default' => false,
    'label' => 'LBL_ENQUIRE_ITEM_ID',
    'width' => '10%',
  ),
  'OPPORTUNITY_TYPE' => 
  array (
    'width' => '15%',
    'label' => 'LBL_TYPE',
    'default' => false,
  ),
  'LEAD_SOURCE' => 
  array (
    'width' => '15%',
    'label' => 'LBL_LEAD_SOURCE',
    'default' => false,
  ),
  'AMOUNT_USDOLLAR' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_AMOUNT_USDOLLAR',
    'align' => 'right',
    'default' => false,
    'currency_format' => true,
  ),
  'NEXT_STEP' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NEXT_STEP',
    'default' => false,
  ),
  'PROBABILITY' => 
  array (
    'width' => '10%',
    'label' => 'LBL_PROBABILITY',
    'default' => false,
  ),
  'CREATED_BY_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_CREATED',
    'default' => false,
  ),
  'MODIFIED_BY_NAME' => 
  array (
    'width' => '5%',
    'label' => 'LBL_MODIFIED',
    'default' => false,
  ),
  'DATE_CLOSED' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_DATE_CLOSED',
    'default' => false,
  ),
  'SALES_STAGE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_SALES_STAGE',
    'default' => false,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '5%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
  'ENQUIRE_FIRST_NAME_C' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'label' => 'LBL_ENQUIRE_FIRST_NAME',
    'width' => '10%',
  ),
  'ENQUIRE_COUNTRY_ID_C' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_ENQUIRE_COUNTRY_ID',
    'width' => '10%',
  ),
  'ENQUIRE_USER_ID_C' => 
  array (
    'type' => 'int',
    'default' => false,
    'label' => 'LBL_ENQUIRE_USER_ID',
    'width' => '10%',
  ),
);
?>
