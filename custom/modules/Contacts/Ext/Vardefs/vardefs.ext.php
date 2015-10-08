<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2015-10-07 14:43:55
$dictionary['Contact']['fields']['status_c']['inline_edit']='1';
$dictionary['Contact']['fields']['status_c']['labelValue']='Status';

 


$dictionary['Contact']['fields']['SecurityGroups'] = array (
  	'name' => 'SecurityGroups',
    'type' => 'link',
	'relationship' => 'securitygroups_contacts',
	'module'=>'SecurityGroups',
	'bean_name'=>'SecurityGroup',
    'source'=>'non-db',
	'vname'=>'LBL_SECURITYGROUPS',
);






 // created: 2015-10-08 18:30:58
$dictionary['Contact']['fields']['company_type_c']['inline_edit']='1';
$dictionary['Contact']['fields']['company_type_c']['labelValue']='Company type';

 

 // created: 2015-10-07 14:04:41
$dictionary['Contact']['fields']['position_c']['inline_edit']='1';
$dictionary['Contact']['fields']['position_c']['labelValue']='Position';

 

// created: 2014-06-24 15:48:56
$dictionary["Contact"]["fields"]["project_contacts_1"] = array (
  'name' => 'project_contacts_1',
  'type' => 'link',
  'relationship' => 'project_contacts_1',
  'source' => 'non-db',
  'module' => 'Project',
  'bean_name' => 'Project',
  'vname' => 'LBL_PROJECT_CONTACTS_1_FROM_PROJECT_TITLE',
);


$dictionary["Contact"]["fields"]["aos_quotes"] = array (
  'name' => 'aos_quotes',
    'type' => 'link',
    'relationship' => 'contact_aos_quotes',
    'module'=>'AOS_Quotes',
    'bean_name'=>'AOS_Quotes',
    'source'=>'non-db',
);
$dictionary["Contact"]["relationships"]["contact_aos_quotes"] = array (
	'lhs_module'=> 'Contacts', 
	'lhs_table'=> 'contacts', 
	'lhs_key' => 'id',
	'rhs_module'=> 'AOS_Quotes', 
	'rhs_table'=> 'aos_quotes', 
	'rhs_key' => 'billing_contact_id',
	'relationship_type'=>'one-to-many',
);

$dictionary["Contact"]["fields"]["aos_invoices"] = array (
  'name' => 'aos_invoices',
    'type' => 'link',
    'relationship' => 'contact_aos_invoices',
    'module'=>'AOS_Invoices',
    'bean_name'=>'AOS_Invoices',
    'source'=>'non-db',
);
$dictionary["Contact"]["relationships"]["contact_aos_invoices"] = array (
	'lhs_module'=> 'Contacts', 
	'lhs_table'=> 'contacts', 
	'lhs_key' => 'id',
	'rhs_module'=> 'AOS_Invoices', 
	'rhs_table'=> 'aos_invoices', 
	'rhs_key' => 'billing_contact_id',
	'relationship_type'=>'one-to-many',
);

$dictionary["Contact"]["fields"]["aos_contracts"] = array (
  'name' => 'aos_contracts',
    'type' => 'link',
    'relationship' => 'contact_aos_contracts',
    'module'=>'AOS_Contracts',
    'bean_name'=>'AOS_Contracts',
    'source'=>'non-db',
);
$dictionary["Contact"]["relationships"]["contact_aos_contracts"] = array (
	'lhs_module'=> 'Contacts', 
	'lhs_table'=> 'contacts', 
	'lhs_key' => 'id',
	'rhs_module'=> 'AOS_Contracts', 
	'rhs_table'=> 'aos_contracts', 
	'rhs_key' => 'contact_id',
	'relationship_type'=>'one-to-many',
);



/**
 *
 * @package Advanced OpenPortal
 * @copyright SalesAgility Ltd http://www.salesagility.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author Salesagility Ltd <support@salesagility.com>
 */
$dictionary["Contact"]["fields"]["aop_case_updates"] = array (
    'name' => 'aop_case_updates',
    'type' => 'link',
    'relationship' => 'contacts_aop_case_updates',
    'source' => 'non-db',
    'id_name' => 'contact_id',
    'vname' => 'LBL_AOP_CASE_UPDATES',
);

$dictionary["Contact"]["relationships"]["contacts_aop_case_updates"] = array (
    'lhs_module'=> 'Contacts',
    'lhs_table'=> 'contacts',
    'lhs_key' => 'id',
    'rhs_module'=> 'AOP_Case_Updates',
    'rhs_table'=> 'aop_case_updates',
    'rhs_key' => 'contact_id',
    'relationship_type'=>'one-to-many',
);

$dictionary["Contact"]["fields"]["joomla_account_id"] = array (
    'name' => 'joomla_account_id',
    'vname' => 'LBL_JOOMLA_ACCOUNT_ID',
    'type' => 'varchar',
    'len' => '255',
    'importable' => 'false',
    'studio' => 'true',
);
$dictionary["Contact"]["fields"]["portal_account_disabled"] = array (
    'name' => 'portal_account_disabled',
    'vname' => 'LBL_PORTAL_ACCOUNT_DISABLED',
    'type' => 'bool',
    'importable' => 'false',
    'studio' => 'false',
);
$dictionary["Contact"]["fields"]["joomla_account_access"] = array (
    'name' => 'joomla_account_access',
    'vname' => 'LBL_JOOMLA_ACCOUNT_ACCESS',
    'type' => 'varchar',
    'source' => 'non-db',
    'len' => '255',
    'importable' => 'false',
    'studio' => 'false',
);
$dictionary["Contact"]["fields"]["portal_user_type"] = array (
    'name' => 'portal_user_type',
    'vname' => 'LBL_PORTAL_USER_TYPE',
    'type' => 'enum',
    'options' => 'contact_portal_user_type_dom',
    'len' => '100',
    'default' => 'Single',
);
 

 // created: 2015-10-07 14:41:53
$dictionary['Contact']['fields']['role_c']['inline_edit']='1';
$dictionary['Contact']['fields']['role_c']['labelValue']='Role';

 

 // created: 2015-10-07 14:45:02
$dictionary['Contact']['fields']['date_entered']['inline_edit']=true;
$dictionary['Contact']['fields']['date_entered']['comments']='Date record created';
$dictionary['Contact']['fields']['date_entered']['merge_filter']='disabled';

 

// created: 2013-04-15 12:13:27
$dictionary["Contact"]["fields"]["fp_events_contacts"] = array (
  'name' => 'fp_events_contacts',
  'type' => 'link',
  'relationship' => 'fp_events_contacts',
  'source' => 'non-db',
  'vname' => 'LBL_FP_EVENTS_CONTACTS_FROM_FP_EVENTS_TITLE',
);


 // created: 2015-09-01 18:37:52
$dictionary['Contact']['fields']['jjwg_maps_geocode_status_c']['inline_edit']=1;

 

 // created: 2015-09-01 18:37:51
$dictionary['Contact']['fields']['jjwg_maps_lng_c']['inline_edit']=1;

 

 // created: 2015-10-07 14:52:59
$dictionary['Contact']['fields']['country_c']['inline_edit']='1';
$dictionary['Contact']['fields']['country_c']['labelValue']='Country';

 

 // created: 2015-09-01 18:37:52
$dictionary['Contact']['fields']['jjwg_maps_address_c']['inline_edit']=1;

 

 // created: 2015-10-07 14:46:16
$dictionary['Contact']['fields']['ban_reason_c']['inline_edit']='1';
$dictionary['Contact']['fields']['ban_reason_c']['labelValue']='Ban reason';

 

 // created: 2015-09-01 18:37:52
$dictionary['Contact']['fields']['jjwg_maps_lat_c']['inline_edit']=1;

 


$dictionary['Contact']['fields']['e_invite_status_fields'] =
		array (
			'name' => 'e_invite_status_fields',
			'rname' => 'id',
			'relationship_fields'=>array('id' => 'event_invite_id', 'invite_status' => 'event_status_name'),
			'vname' => 'LBL_CONT_INVITE_STATUS',
			'type' => 'relate',
			'link' => 'fp_events_contacts',
			'link_type' => 'relationship_info',
            'join_link_name' => 'fp_events_contacts',
			'source' => 'non-db',
			'importable' => 'false',
            'duplicate_merge'=> 'disabled',
			'studio' => false,
		);

$dictionary['Contact']['fields']['event_status_name'] =
		array(
            'massupdate' => false,
            'name' => 'event_status_name',
            'type' => 'enum',
            'studio' => 'false',
            'source' => 'non-db',
            'vname' => 'LBL_LIST_INVITE_STATUS_EVENT',
            'options' => 'fp_event_invite_status_dom',
            'importable' => 'false',
        );
$dictionary['Contact']['fields']['event_invite_id'] =
    array(
        'name' => 'event_invite_id',
        'type' => 'varchar',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_INVITE_STATUS',
        'studio' => array('listview' => false),
    );


$dictionary['Contact']['fields']['e_accept_status_fields'] =
        array (
            'name' => 'e_accept_status_fields',
            'rname' => 'id',
            'relationship_fields'=>array('id' => 'event_status_id', 'accept_status' => 'event_accept_status'),
            'vname' => 'LBL_CONT_ACCEPT_STATUS',
            'type' => 'relate',
            'link' => 'fp_events_contacts',
            'link_type' => 'relationship_info',
            'join_link_name' => 'fp_events_contacts',
            'source' => 'non-db',
            'importable' => 'false',
            'duplicate_merge'=> 'disabled',
            'studio' => false,
        );


$dictionary['Contact']['fields']['event_accept_status'] =
        array(
            'massupdate' => false,
            'name' => 'event_accept_status',
            'type' => 'enum',
            'studio' => 'false',
            'source' => 'non-db',
            'vname' => 'LBL_LIST_ACCEPT_STATUS_EVENT',
            'options' => 'fp_event_status_dom',
            'importable' => 'false',
        );
$dictionary['Contact']['fields']['event_status_id'] =
    array(
        'name' => 'event_status_id',
        'type' => 'varchar',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_ACCEPT_STATUS',
        'studio' => array('listview' => false),
    );


 // created: 2015-10-07 14:47:16
$dictionary['Contact']['fields']['ban_date_c']['inline_edit']='1';
$dictionary['Contact']['fields']['ban_date_c']['labelValue']='Ban date';

 

 // created: 2015-10-07 14:54:26
$dictionary['Contact']['fields']['reg_ip_c']['inline_edit']='1';
$dictionary['Contact']['fields']['reg_ip_c']['labelValue']='Reg ip';

 

 // created: 2015-10-07 14:51:02
$dictionary['Contact']['fields']['currency_c']['inline_edit']='1';
$dictionary['Contact']['fields']['currency_c']['labelValue']='Currency';

 
?>