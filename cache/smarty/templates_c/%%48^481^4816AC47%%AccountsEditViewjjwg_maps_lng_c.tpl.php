<?php /* Smarty version 2.6.11, created on 2015-10-05 13:12:35
         compiled from cache/include/InlineEditing/AccountsEditViewjjwg_maps_lng_c.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_number_format', 'cache/include/InlineEditing/AccountsEditViewjjwg_maps_lng_c.tpl', 10, false),)), $this); ?>

<?php if (strlen ( $this->_tpl_vars['fields']['jjwg_maps_lng_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['jjwg_maps_lng_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['jjwg_maps_lng_c']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['jjwg_maps_lng_c']['name']; ?>
'
id='<?php echo $this->_tpl_vars['fields']['jjwg_maps_lng_c']['name']; ?>
'
size='30'
maxlength='11'value='<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['value']), $this);?>
'
title='Longitude'
tabindex='1'
 
>