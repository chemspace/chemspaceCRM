<?php /* Smarty version 2.6.11, created on 2015-10-05 19:28:31
         compiled from cache/include/InlineEditing/ContactsEditViewactive_customer_c.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_translate', 'cache/include/InlineEditing/ContactsEditViewactive_customer_c.tpl', 7, false),array('function', 'sugar_getimagepath', 'cache/include/InlineEditing/ContactsEditViewactive_customer_c.tpl', 18, false),)), $this); ?>

<input type="text" name="<?php echo $this->_tpl_vars['fields']['active_customer_c']['name']; ?>
" class="sqsEnabled" tabindex="1" id="<?php echo $this->_tpl_vars['fields']['active_customer_c']['name']; ?>
" size="" value="<?php echo $this->_tpl_vars['fields']['active_customer_c']['value']; ?>
" title='' autocomplete="off"  	 >
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['active_customer_c']['id_name']; ?>
" 
	id="<?php echo $this->_tpl_vars['fields']['active_customer_c']['id_name']; ?>
" 
	value="<?php echo $this->_tpl_vars['fields']['account_id_c']['value']; ?>
">
<span class="id-ff multiple">
<button type="button" name="btn_<?php echo $this->_tpl_vars['fields']['active_customer_c']['name']; ?>
" id="btn_<?php echo $this->_tpl_vars['fields']['active_customer_c']['name']; ?>
" tabindex="1" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_SELECT_ACCOUNTS_TITLE'), $this);?>
" class="button firstChild" value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_SELECT_ACCOUNTS_LABEL'), $this);?>
"
onclick='open_popup(
    "<?php echo $this->_tpl_vars['fields']['active_customer_c']['module']; ?>
", 
	600, 
	400, 
	"", 
	true, 
	false, 
	<?php echo '{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":'; ?>
"<?php echo $this->_tpl_vars['fields']['active_customer_c']['id_name']; ?>
"<?php echo ',"name":'; ?>
"<?php echo $this->_tpl_vars['fields']['active_customer_c']['name']; ?>
"<?php echo '}}'; ?>
, 
	"single", 
	true
);' ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-select.png"), $this);?>
"></button><button type="button" name="btn_clr_<?php echo $this->_tpl_vars['fields']['active_customer_c']['name']; ?>
" id="btn_clr_<?php echo $this->_tpl_vars['fields']['active_customer_c']['name']; ?>
" tabindex="1" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_ACCOUNTS_TITLE'), $this);?>
"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['active_customer_c']['name']; ?>
', '<?php echo $this->_tpl_vars['fields']['active_customer_c']['id_name']; ?>
');"  value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_ACCOUNTS_LABEL'), $this);?>
" ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['<?php echo $this->_tpl_vars['form_name']; ?>
_<?php echo $this->_tpl_vars['fields']['active_customer_c']['name']; ?>
']) != 'undefined'",
		enableQS
);
</script>