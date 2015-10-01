<?php /* Smarty version 2.6.11, created on 2015-09-03 13:04:50
         compiled from cache/modules/AOW_WorkFlow/TrackersEditViewitem_summary.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['item_summary']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['item_summary']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['item_summary']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['item_summary']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['item_summary']['name']; ?>
' size='30' 
    maxlength='255' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''  tabindex='1'      >