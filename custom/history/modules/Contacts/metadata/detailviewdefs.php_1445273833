<?php
$viewdefs ['Contacts'] = 
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
          4 => 
          array (
            'customCode' => '<input type="submit" class="button" title="{$APP.LBL_MANAGE_SUBSCRIPTIONS}" onclick="this.form.return_module.value=\'Contacts\'; this.form.return_action.value=\'DetailView\'; this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'Subscriptions\'; this.form.module.value=\'Campaigns\'; this.form.module_tab.value=\'Contacts\';" name="Manage Subscriptions" value="{$APP.LBL_MANAGE_SUBSCRIPTIONS}"/>',
            'sugar_html' => 
            array (
              'type' => 'submit',
              'value' => '{$APP.LBL_MANAGE_SUBSCRIPTIONS}',
              'htmlOptions' => 
              array (
                'class' => 'button',
                'id' => 'manage_subscriptions_button',
                'title' => '{$APP.LBL_MANAGE_SUBSCRIPTIONS}',
                'onclick' => 'this.form.return_module.value=\'Contacts\'; this.form.return_action.value=\'DetailView\'; this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'Subscriptions\'; this.form.module.value=\'Campaigns\'; this.form.module_tab.value=\'Contacts\';',
                'name' => 'Manage Subscriptions',
              ),
            ),
          ),
          'AOS_GENLET' => 
          array (
            'customCode' => '<input type="button" class="button" onClick="showPopup();" value="{$APP.LBL_GENERATE_LETTER}">',
          ),
          'AOP_CREATE' => 
          array (
            'customCode' => '{if !$fields.joomla_account_id.value && $AOP_PORTAL_ENABLED}<input type="submit" class="button" onClick="this.form.action.value=\'createPortalUser\';" value="{$MOD.LBL_CREATE_PORTAL_USER}"> {/if}',
            'sugar_html' => 
            array (
              'type' => 'submit',
              'value' => '{$MOD.LBL_CREATE_PORTAL_USER}',
              'htmlOptions' => 
              array (
                'title' => '{$MOD.LBL_CREATE_PORTAL_USER}',
                'class' => 'button',
                'onclick' => 'this.form.action.value=\'createPortalUser\';',
                'name' => 'buttonCreatePortalUser',
                'id' => 'createPortalUser_button',
              ),
              'template' => '{if !$fields.joomla_account_id.value && $AOP_PORTAL_ENABLED}[CONTENT]{/if}',
            ),
          ),
          'AOP_DISABLE' => 
          array (
            'customCode' => '{if $fields.joomla_account_id.value && !$fields.portal_account_disabled.value && $AOP_PORTAL_ENABLED}<input type="submit" class="button" onClick="this.form.action.value=\'disablePortalUser\';" value="{$MOD.LBL_DISABLE_PORTAL_USER}"> {/if}',
            'sugar_html' => 
            array (
              'type' => 'submit',
              'value' => '{$MOD.LBL_DISABLE_PORTAL_USER}',
              'htmlOptions' => 
              array (
                'title' => '{$MOD.LBL_DISABLE_PORTAL_USER}',
                'class' => 'button',
                'onclick' => 'this.form.action.value=\'disablePortalUser\';',
                'name' => 'buttonDisablePortalUser',
                'id' => 'disablePortalUser_button',
              ),
              'template' => '{if $fields.joomla_account_id.value && !$fields.portal_account_disabled.value && $AOP_PORTAL_ENABLED}[CONTENT]{/if}',
            ),
          ),
          'AOP_ENABLE' => 
          array (
            'customCode' => '{if $fields.joomla_account_id.value && $fields.portal_account_disabled.value && $AOP_PORTAL_ENABLED}<input type="submit" class="button" onClick="this.form.action.value=\'enablePortalUser\';" value="{$MOD.LBL_ENABLE_PORTAL_USER}"> {/if}',
            'sugar_html' => 
            array (
              'type' => 'submit',
              'value' => '{$MOD.LBL_ENABLE_PORTAL_USER}',
              'htmlOptions' => 
              array (
                'title' => '{$MOD.LBL_ENABLE_PORTAL_USER}',
                'class' => 'button',
                'onclick' => 'this.form.action.value=\'enablePortalUser\';',
                'name' => 'buttonENablePortalUser',
                'id' => 'enablePortalUser_button',
              ),
              'template' => '{if $fields.joomla_account_id.value && $fields.portal_account_disabled.value && $AOP_PORTAL_ENABLED}[CONTENT]{/if}',
            ),
          ),
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
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/Leads/Lead.js',
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
            'comment' => 'First name of the contact',
            'label' => 'LBL_FIRST_NAME',
          ),
          1 => 
          array (
            'name' => 'last_name',
            'comment' => 'Last name of the contact',
            'label' => 'LBL_LAST_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'phone_work',
            'label' => 'LBL_OFFICE_PHONE',
          ),
          1 => 
          array (
            'name' => 'phone_mobile',
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
            'name' => 'department',
            'label' => 'LBL_DEPARTMENT',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'account_name',
            'label' => 'LBL_ACCOUNT_NAME',
          ),
          1 => 
          array (
            'name' => 'phone_fax',
            'label' => 'LBL_FAX_PHONE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL_ADDRESS',
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
            'name' => 'primary_address_street',
            'label' => 'LBL_PRIMARY_ADDRESS',
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'primary',
            ),
          ),
          1 => 
          array (
            'name' => 'alt_address_street',
            'label' => 'LBL_ALTERNATE_ADDRESS',
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'alt',
            ),
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
          1 => 
          array (
            'name' => 'position_c',
            'label' => 'LBL_POSITION',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
          1 => 
          array (
            'name' => 'role_c',
            'label' => 'LBL_ROLE',
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
            'name' => 'currency_c',
            'studio' => 'visible',
            'label' => 'LBL_CURRENCY',
          ),
          1 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
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
            'name' => 'ban_reason_c',
            'label' => 'LBL_BAN_REASON',
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
            'name' => 'company_type_c',
            'label' => 'LBL_COMPANY_TYPE',
          ),
          1 => 
          array (
            'name' => 'photo',
            'label' => 'LBL_PHOTO',
          ),
        ),
      ),
    ),
  ),
);
?>
