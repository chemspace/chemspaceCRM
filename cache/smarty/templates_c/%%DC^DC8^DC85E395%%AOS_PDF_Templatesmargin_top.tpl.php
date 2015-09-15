<?php /* Smarty version 2.6.11, created on 2015-09-02 19:01:28
         compiled from cache/modules/Import/AOS_PDF_Templatesmargin_top.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_number_format', 'cache/modules/Import/AOS_PDF_Templatesmargin_top.tpl', 8, false),)), $this); ?>

<?php if (strlen ( $this->_tpl_vars['fields']['margin_top']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['margin_top']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['margin_top']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['margin_top']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['margin_top']['name']; ?>
' size='30' maxlength='255' value='<?php echo smarty_function_sugar_number_format(array('precision' => 0,'var' => $this->_tpl_vars['value']), $this);?>
' title='' tabindex='1'    >