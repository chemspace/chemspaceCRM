<?php /* Smarty version 2.6.11, created on 2015-10-05 13:12:08
         compiled from cache/include/InlineEditing/AccountsEditViewjjwg_maps_geocode_status_c.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['jjwg_maps_geocode_status_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['jjwg_maps_geocode_status_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['jjwg_maps_geocode_status_c']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['jjwg_maps_geocode_status_c']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['jjwg_maps_geocode_status_c']['name']; ?>
' size='30' 
    maxlength='255' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title='Geocode Status'  tabindex='1'      >