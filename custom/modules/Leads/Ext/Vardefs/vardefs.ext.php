<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2013-04-30 14:52:24
$dictionary["Lead"]["fields"]["fp_events_leads_1"] = array (
  'name' => 'fp_events_leads_1',
  'type' => 'link',
  'relationship' => 'fp_events_leads_1',
  'source' => 'non-db',
  'vname' => 'LBL_FP_EVENTS_LEADS_1_FROM_FP_EVENTS_TITLE',
);


 // created: 2015-09-01 18:37:53
$dictionary['Lead']['fields']['jjwg_maps_geocode_status_c']['inline_edit']=1;

 

 // created: 2015-09-01 18:37:53
$dictionary['Lead']['fields']['jjwg_maps_lng_c']['inline_edit']=1;

 


$dictionary['Lead']['fields']['SecurityGroups'] = array (
  	'name' => 'SecurityGroups',
    'type' => 'link',
	'relationship' => 'securitygroups_leads',
	'module'=>'SecurityGroups',
	'bean_name'=>'SecurityGroup',
    'source'=>'non-db',
	'vname'=>'LBL_SECURITYGROUPS',
);






 // created: 2015-09-01 18:37:54
$dictionary['Lead']['fields']['jjwg_maps_address_c']['inline_edit']=1;

 


$dictionary['Lead']['fields']['e_invite_status_fields'] =
		array (
			'name' => 'e_invite_status_fields',
			'rname' => 'id',
			'relationship_fields'=>array('id' => 'event_invite_id', 'invite_status' => 'event_status_name'),
			'vname' => 'LBL_CONT_INVITE_STATUS',
			'type' => 'relate',
			'link' => 'fp_events_leads_1',
			'link_type' => 'relationship_info',
            'join_link_name' => 'fp_events_leads_1',
			'source' => 'non-db',
			'importable' => 'false',
            'duplicate_merge'=> 'disabled',
			'studio' => false,
		);


$dictionary['Lead']['fields']['event_status_name'] =
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
$dictionary['Lead']['fields']['event_invite_id'] =
    array(
        'name' => 'event_invite_id',
        'type' => 'varchar',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_INVITE_STATUS',
        'studio' => array('listview' => false),
    );


$dictionary['Lead']['fields']['e_accept_status_fields'] =
        array (
            'name' => 'e_accept_status_fields',
            'rname' => 'id',
            'relationship_fields'=>array('id' => 'event_status_id', 'accept_status' => 'event_accept_status'),
            'vname' => 'LBL_CONT_ACCEPT_STATUS',
            'type' => 'relate',
            'link' => 'fp_events_leads_1',
            'link_type' => 'relationship_info',
            'join_link_name' => 'fp_events_leads_1',
            'source' => 'non-db',
            'importable' => 'false',
            'duplicate_merge'=> 'disabled',
            'studio' => false,
        );


$dictionary['Lead']['fields']['event_accept_status'] =
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
$dictionary['Lead']['fields']['event_status_id'] =
    array(
        'name' => 'event_status_id',
        'type' => 'varchar',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_ACCEPT_STATUS',
        'studio' => array('listview' => false),
    );

 // created: 2015-09-01 18:37:53
$dictionary['Lead']['fields']['jjwg_maps_lat_c']['inline_edit']=1;

 
?>