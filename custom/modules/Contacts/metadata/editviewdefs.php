<?php
$viewdefs ['Contacts'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'hidden' => 
        array (
          0 => '<input type="hidden" name="opportunity_id" value="{$smarty.request.opportunity_id}">',
          1 => '<input type="hidden" name="case_id" value="{$smarty.request.case_id}">',
          2 => '<input type="hidden" name="bug_id" value="{$smarty.request.bug_id}">',
          3 => '<input type="hidden" name="email_id" value="{$smarty.request.email_id}">',
          4 => '<input type="hidden" name="inbound_email_id" value="{$smarty.request.inbound_email_id}">',
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
        'LBL_CONTACT_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_PANEL_ADVANCED' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'lbl_contact_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'first_name',
            'customCode' => '{html_options name="salutation" id="salutation" options=$fields.salutation.options selected=$fields.salutation.value}&nbsp;<input name="first_name"  id="first_name" size="25" maxlength="25" type="text" value="{$fields.first_name.value}">',
          ),
          1 => 
          array (
            'name' => 'last_name',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'phone_work',
            'comment' => 'Work phone number of the contact',
            'label' => 'LBL_OFFICE_PHONE',
          ),
          1 => 
          array (
            'name' => 'phone_mobile',
            'comment' => 'Mobile phone number of the contact',
            'label' => 'LBL_MOBILE_PHONE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'salutation',
            'comment' => 'Contact salutation (e.g., Mr, Ms)',
            'label' => 'LBL_SALUTATION',
          ),
          1 => 
          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL_ADDRESS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'account_name',
            'displayParams' => 
            array (
              'key' => 'billing',
              'copy' => 'primary',
              'billingKey' => 'primary',
              'additionalFields' => 
              array (
                'phone_office' => 'phone_work',
              ),
            ),
          ),
          1 => 
          array (
            'name' => 'phone_fax',
            'comment' => 'Contact fax number',
            'label' => 'LBL_FAX_PHONE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'company_name_c',
            'label' => 'LBL_COMPANY_NAME',
          ),
          1 => 
          array (
            'name' => 'country_c',
            'studio' => 'visible',
            'label' => 'LBL_COUNTRY',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'company_type_c',
            'label' => 'LBL_COMPANY_TYPE',
          ),
          1 => 
          array (
            'name' => 'role_c',
            'label' => 'LBL_ROLE',
          ),
        ),
        6 => 
        array (
          0 => 'department',
          1 => 
          array (
            'name' => 'primary_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'primary',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'position_c',
            'label' => 'LBL_POSITION',
          ),
          1 => 
          array (
            'name' => 'alt_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'alt',
              'copy' => 'primary',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'fe_user_id_c',
            'label' => 'LBL_FE_USER_ID',
          ),
          1 => 
          array (
            'name' => 'fe_email_c',
            'label' => 'LBL_FE_EMAIL',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'fe_salutation_c',
            'label' => 'LBL_FE_SALUTATION',
          ),
          1 => 
          array (
            'name' => 'fe_country_id_c',
            'studio' => 'visible',
            'label' => 'LBL_FE_COUNTRY_ID',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'fe_first_name_c',
            'label' => 'LBL_FE_FIRST_NAME',
          ),
          1 => 
          array (
            'name' => 'fe_last_name_c',
            'label' => 'LBL_FE_LAST_NAME',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'fe_currency_c',
            'studio' => 'visible',
            'label' => 'LBL_FE_CURRENCY',
          ),
          1 => 
          array (
            'name' => 'fe_company_name_c',
            'label' => 'LBL_FE_COMPANY_NAME',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'fe_email_notification_c',
            'label' => 'LBL_FE_EMAIL_NOTIFICATION',
          ),
          1 => 
          array (
            'name' => 'fe_reg_date_c',
            'label' => 'LBL_FE_REG_DATE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'fe_position_c',
            'label' => 'LBL_FE_POSITION',
          ),
          1 => 
          array (
            'name' => 'fe_change_date_c',
            'label' => 'LBL_FE_CHANGE_DATE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'fe_phone_c',
            'label' => 'LBL_FE_PHONE',
          ),
          1 => 
          array (
            'name' => 'fe_fax_c',
            'label' => 'LBL_FE_FAX',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'fe_count_logins_all_c',
            'label' => 'LBL_FE_COUNT_LOGINS_ALL',
          ),
          1 => 
          array (
            'name' => 'fe_last_visit_c',
            'label' => 'LBL_FE_LAST_VISIT',
          ),
        ),
      ),
      'LBL_PANEL_ADVANCED' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'lead_source',
            'comment' => 'How did the contact come about',
            'label' => 'LBL_LEAD_SOURCE',
          ),
          1 => 
          array (
            'name' => 'reg_ip_c',
            'label' => 'LBL_REG_IP',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'ban_reason_c',
            'label' => 'LBL_BAN_REASON',
          ),
          1 => 
          array (
            'name' => 'date_entered',
            'comment' => 'Date record created',
            'label' => 'LBL_DATE_ENTERED',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'ban_date_c',
            'label' => 'LBL_BAN_DATE',
          ),
          1 => 
          array (
            'name' => 'currency_c',
            'studio' => 'visible',
            'label' => 'LBL_CURRENCY',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'report_to_name',
            'label' => 'LBL_REPORTS_TO',
          ),
          1 => 
          array (
            'name' => 'status_c',
            'studio' => 'visible',
            'label' => 'LBL_STATUS',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
          1 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),
    ),
  ),
);
?>
