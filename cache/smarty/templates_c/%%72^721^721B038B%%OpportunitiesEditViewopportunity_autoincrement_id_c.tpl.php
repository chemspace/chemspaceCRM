<?php /* Smarty version 2.6.11, created on 2015-11-09 15:31:10
         compiled from cache/include/InlineEditing/OpportunitiesEditViewopportunity_autoincrement_id_c.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['opportunity_autoincrement_id_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['opportunity_autoincrement_id_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['opportunity_autoincrement_id_c']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['opportunity_autoincrement_id_c']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['opportunity_autoincrement_id_c']['name']; ?>
' size='30' maxlength='255' value='<?php echo $this->_tpl_vars['value']; ?>
' title='' tabindex='1'    >