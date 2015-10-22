<?php 
 //WARNING: The contents of this file are auto-generated


$dictionary["Account"]["fields"]["aos_quotes"] = array (
  'name' => 'aos_quotes',
    'type' => 'link',
    'relationship' => 'account_aos_quotes',
    'module'=>'AOS_Quotes',
    'bean_name'=>'AOS_Quotes',
    'source'=>'non-db',
);

$dictionary["Account"]["relationships"]["account_aos_quotes"] = array (
	'lhs_module'=> 'Accounts', 
	'lhs_table'=> 'accounts', 
	'lhs_key' => 'id',
	'rhs_module'=> 'AOS_Quotes', 
	'rhs_table'=> 'aos_quotes', 
	'rhs_key' => 'billing_account_id',
	'relationship_type'=>'one-to-many',
);

$dictionary["Account"]["fields"]["aos_invoices"] = array (
  'name' => 'aos_invoices',
    'type' => 'link',
    'relationship' => 'account_aos_invoices',
    'module'=>'AOS_Invoices',
    'bean_name'=>'AOS_Invoices',
    'source'=>'non-db',
);

$dictionary["Account"]["relationships"]["account_aos_invoices"] = array (
	'lhs_module'=> 'Accounts', 
	'lhs_table'=> 'accounts', 
	'lhs_key' => 'id',
	'rhs_module'=> 'AOS_Invoices', 
	'rhs_table'=> 'aos_invoices', 
	'rhs_key' => 'billing_account_id',
	'relationship_type'=>'one-to-many',
);

$dictionary["Account"]["fields"]["aos_contracts"] = array (
  'name' => 'aos_contracts',
    'type' => 'link',
    'relationship' => 'account_aos_contracts',
    'module'=>'AOS_Contracts',
    'bean_name'=>'AOS_Contracts',
    'source'=>'non-db',
);

$dictionary["Account"]["relationships"]["account_aos_contracts"] = array (
	'lhs_module'=> 'Accounts', 
	'lhs_table'=> 'accounts', 
	'lhs_key' => 'id',
	'rhs_module'=> 'AOS_Contracts', 
	'rhs_table'=> 'aos_contracts', 
	'rhs_key' => 'contract_account_id',
	'relationship_type'=>'one-to-many',
);



 // created: 2015-10-05 14:29:15
$dictionary['Account']['fields']['shipping_address_street_3_c']['inline_edit']='1';
$dictionary['Account']['fields']['shipping_address_street_3_c']['labelValue']='Shipping street 3';

 

 // created: 2015-10-22 17:56:20
$dictionary['Account']['fields']['supplier_id_c']['inline_edit']='1';
$dictionary['Account']['fields']['supplier_id_c']['labelValue']='Supplier id';

 

 // created: 2015-10-05 14:28:20
$dictionary['Account']['fields']['shipping_address_street_2_c']['inline_edit']='1';
$dictionary['Account']['fields']['shipping_address_street_2_c']['labelValue']='Shipping street 2';

 

 // created: 2015-10-05 14:26:46
$dictionary['Account']['fields']['billing_address_street_3_c']['inline_edit']='1';
$dictionary['Account']['fields']['billing_address_street_3_c']['labelValue']='Billing street 3';

 

 // created: 2015-10-02 16:03:45
$dictionary['Account']['fields']['vat_number_c']['inline_edit']='1';
$dictionary['Account']['fields']['vat_number_c']['labelValue']='VAT number';

 

 // created: 2015-10-22 18:17:35
$dictionary['Account']['fields']['chemspace_partner_c']['inline_edit']='1';
$dictionary['Account']['fields']['chemspace_partner_c']['labelValue']='Chemspace partner';

 

 // created: 2015-10-01 19:20:19
$dictionary['Account']['fields']['active_customer_c']['inline_edit']='1';
$dictionary['Account']['fields']['active_customer_c']['labelValue']='Active customer';

 

 // created: 2015-09-01 18:37:48
$dictionary['Account']['fields']['jjwg_maps_geocode_status_c']['inline_edit']=1;

 


$dictionary['Account']['fields']['SecurityGroups'] = array (
  	'name' => 'SecurityGroups',
    'type' => 'link',
	'relationship' => 'securitygroups_accounts',
	'module'=>'SecurityGroups',
	'bean_name'=>'SecurityGroup',
    'source'=>'non-db',
	'vname'=>'LBL_SECURITYGROUPS',
);






 // created: 2015-09-01 18:37:48
$dictionary['Account']['fields']['jjwg_maps_lng_c']['inline_edit']=1;

 

 // created: 2015-10-21 11:39:50
$dictionary['Account']['fields']['country_c']['inline_edit']='1';
$dictionary['Account']['fields']['country_c']['labelValue']='Country';

 

 // created: 2015-09-01 18:37:49
$dictionary['Account']['fields']['jjwg_maps_address_c']['inline_edit']=1;

 

 // created: 2015-10-05 14:25:13
$dictionary['Account']['fields']['billing_address_street_2_c']['inline_edit']='1';
$dictionary['Account']['fields']['billing_address_street_2_c']['labelValue']='Billing street 2';

 

 // created: 2015-10-22 17:57:37
$dictionary['Account']['fields']['cs_contact_id_c']['inline_edit']='1';
$dictionary['Account']['fields']['cs_contact_id_c']['labelValue']='Contact id';

 

 // created: 2015-09-01 18:37:48
$dictionary['Account']['fields']['jjwg_maps_lat_c']['inline_edit']=1;

 

 // created: 2015-10-22 10:50:30
$dictionary['Account']['fields']['company_type_multi_c']['inline_edit']='1';
$dictionary['Account']['fields']['company_type_multi_c']['labelValue']='Company type';

 
?>