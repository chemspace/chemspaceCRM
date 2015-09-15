<?php /* Smarty version 2.6.11, created on 2015-09-02 19:01:28
         compiled from cache/modules/Import/AOS_PDF_Templatesmodified_user_id.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['modified_user_id']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['modified_user_id']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['modified_user_id']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['modified_user_id']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['modified_user_id']['name']; ?>
' size='30' 
     
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''  tabindex='1'      >