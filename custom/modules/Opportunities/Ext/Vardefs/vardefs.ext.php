<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2015-10-29 14:32:46
$dictionary['Opportunity']['fields']['enquire_ip_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['enquire_ip_c']['labelValue']='Ip';

 

 // created: 2015-10-29 14:20:10
$dictionary['Opportunity']['fields']['enquire_city_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['enquire_city_c']['labelValue']='City';

 

 // created: 2015-10-29 14:40:05
$dictionary['Opportunity']['fields']['enquire_id_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['enquire_id_c']['labelValue']='Enquire id';

 

 // created: 2015-10-29 14:14:35
$dictionary['Opportunity']['fields']['enquire_last_name_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['enquire_last_name_c']['labelValue']='Last name';

 

 // created: 2015-10-29 14:45:39
$dictionary['Opportunity']['fields']['enquire_vendor_item_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['enquire_vendor_item_c']['labelValue']='Vendor item';

 

 // created: 2015-10-29 14:12:21
$dictionary['Opportunity']['fields']['enquire_email_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['enquire_email_c']['labelValue']='Enquire email';

 

 // created: 2015-10-29 14:01:41
$dictionary['Opportunity']['fields']['name']['required']=false;
$dictionary['Opportunity']['fields']['name']['inline_edit']=true;
$dictionary['Opportunity']['fields']['name']['comments']='Name of the opportunity';
$dictionary['Opportunity']['fields']['name']['merge_filter']='disabled';
$dictionary['Opportunity']['fields']['name']['full_text_search']=array (
);

 

 // created: 2015-10-29 14:19:08
$dictionary['Opportunity']['fields']['enquire_phone_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['enquire_phone_c']['labelValue']='Phone';

 

 // created: 2015-10-29 14:24:39
$dictionary['Opportunity']['fields']['enquire_state_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['enquire_state_c']['labelValue']='State';

 

 // created: 2015-11-05 17:17:18
$dictionary['Opportunity']['fields']['opportunity_autoincrement_id_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['opportunity_autoincrement_id_c']['auto_increment']='1';
$dictionary['Opportunity']['fields']['opportunity_autoincrement_id_c']['labelValue']='Opportunity id';

 

 // created: 2015-10-29 14:44:24
$dictionary['Opportunity']['fields']['enquire_supplier_id_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['enquire_supplier_id_c']['labelValue']='Supplier id';

 

 // created: 2015-10-29 14:37:27
$dictionary['Opportunity']['fields']['enquire_country_id_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['enquire_country_id_c']['labelValue']='Country id';

 

 // created: 2015-09-01 18:37:57
$dictionary['Opportunity']['fields']['jjwg_maps_geocode_status_c']['inline_edit']=1;

 

 // created: 2015-10-29 14:03:35
$dictionary['Opportunity']['fields']['amount']['required']=false;
$dictionary['Opportunity']['fields']['amount']['inline_edit']=true;
$dictionary['Opportunity']['fields']['amount']['comments']='Unconverted amount of the opportunity';
$dictionary['Opportunity']['fields']['amount']['duplicate_merge']='enabled';
$dictionary['Opportunity']['fields']['amount']['duplicate_merge_dom_value']='1';
$dictionary['Opportunity']['fields']['amount']['merge_filter']='disabled';

 

 // created: 2015-09-01 18:37:56
$dictionary['Opportunity']['fields']['jjwg_maps_lng_c']['inline_edit']=1;

 

 // created: 2015-09-01 18:37:57
$dictionary['Opportunity']['fields']['jjwg_maps_address_c']['inline_edit']=1;

 

 // created: 2015-10-29 14:13:37
$dictionary['Opportunity']['fields']['enquire_first_name_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['enquire_first_name_c']['labelValue']='First name';

 

 // created: 2015-10-29 14:02:33
$dictionary['Opportunity']['fields']['date_closed']['required']=false;
$dictionary['Opportunity']['fields']['date_closed']['inline_edit']=true;
$dictionary['Opportunity']['fields']['date_closed']['comments']='Expected or actual date the oppportunity will close';
$dictionary['Opportunity']['fields']['date_closed']['merge_filter']='disabled';

 

$dictionary["Opportunity"]["fields"]["aos_quotes"] = array (
  'name' => 'aos_quotes',
    'type' => 'link',
    'relationship' => 'opportunity_aos_quotes',
    'module'=>'AOS_Quotes',
    'bean_name'=>'AOS_Quotes',
    'source'=>'non-db',
);

$dictionary["Opportunity"]["relationships"]["opportunity_aos_quotes"] = array (
	'lhs_module'=> 'Opportunities', 
	'lhs_table'=> 'opportunities', 
	'lhs_key' => 'id',
	'rhs_module'=> 'AOS_Quotes', 
	'rhs_table'=> 'aos_quotes', 
	'rhs_key' => 'opportunity_id',
	'relationship_type'=>'one-to-many',
);

$dictionary["Opportunity"]["fields"]["aos_contracts"] = array (
  'name' => 'aos_contracts',
    'type' => 'link',
    'relationship' => 'opportunity_aos_contracts',
    'module'=>'AOS_Contracts',
    'bean_name'=>'AOS_Contracts',
    'source'=>'non-db',
);

$dictionary["Opportunity"]["relationships"]["opportunity_aos_contracts"] = array (
	'lhs_module'=> 'Opportunities', 
	'lhs_table'=> 'opportunities', 
	'lhs_key' => 'id',
	'rhs_module'=> 'AOS_Contracts', 
	'rhs_table'=> 'aos_contracts', 
	'rhs_key' => 'opportunity_id',
	'relationship_type'=>'one-to-many',
);



 // created: 2015-09-01 18:37:56
$dictionary['Opportunity']['fields']['jjwg_maps_lat_c']['inline_edit']=1;

 


$dictionary['Opportunity']['fields']['SecurityGroups'] = array (
  	'name' => 'SecurityGroups',
    'type' => 'link',
	'relationship' => 'securitygroups_opportunities',
	'module'=>'SecurityGroups',
	'bean_name'=>'SecurityGroup',
    'source'=>'non-db',
	'vname'=>'LBL_SECURITYGROUPS',
);






 // created: 2015-10-29 14:41:14
$dictionary['Opportunity']['fields']['enquire_item_id_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['enquire_item_id_c']['labelValue']='Item id';

 

 // created: 2015-10-29 14:26:24
$dictionary['Opportunity']['fields']['enquire_user_id_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['enquire_user_id_c']['labelValue']='User id';

 
?>