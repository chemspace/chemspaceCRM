<?php /* Smarty version 2.6.11, created on 2015-10-02 14:30:50
         compiled from cache/include/InlineEditing/AccountsEditViewcompany_id_c.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['company_id_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['company_id_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['company_id_c']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['company_id_c']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['company_id_c']['name']; ?>
' size='30' 
    maxlength='36' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''  tabindex='1'      >