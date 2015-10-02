<?php /* Smarty version 2.6.11, created on 2015-10-02 16:08:23
         compiled from cache/include/InlineEditing/AccountsEditViewrating.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['rating']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['rating']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['rating']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['rating']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['rating']['name']; ?>
' size='30' 
    maxlength='100' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''  tabindex='1'      >