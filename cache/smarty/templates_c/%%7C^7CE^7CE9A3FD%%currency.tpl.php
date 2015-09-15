<?php /* Smarty version 2.6.11, created on 2015-09-10 09:44:33
         compiled from modules/DynamicFields/templates/Fields/Forms/currency.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_translate', 'modules/DynamicFields/templates/Fields/Forms/currency.tpl', 49, false),array('function', 'sugar_currency_format', 'modules/DynamicFields/templates/Fields/Forms/currency.tpl', 58, false),)), $this); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/DynamicFields/templates/Fields/Forms/coreTop.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  if ($this->_tpl_vars['range_search_option_enabled']): ?>
<tr>	
    <td class='mbLBL'><?php echo smarty_function_sugar_translate(array('module' => 'DynamicFields','label' => 'COLUMN_TITLE_ENABLE_RANGE_SEARCH'), $this);?>
:</td>
    <td>
        <input type='checkbox' name='enable_range_search' value=1 <?php if (! empty ( $this->_tpl_vars['vardef']['enable_range_search'] )): ?>checked<?php endif; ?> <?php if ($this->_tpl_vars['hideLevel'] > 5): ?>disabled<?php endif; ?> />
        <?php if ($this->_tpl_vars['hideLevel'] > 5): ?><input type='hidden' name='enable_range_search' value='<?php echo $this->_tpl_vars['vardef']['enable_range_search']; ?>
'><?php endif; ?>
    </td>	
</tr>
<?php endif; ?>
<tr><td class='mbLBL'><?php echo smarty_function_sugar_translate(array('module' => 'DynamicFields','label' => 'COLUMN_TITLE_DEFAULT_VALUE'), $this);?>
:</td><td>
<?php if ($this->_tpl_vars['hideLevel'] < 5): ?>
<input type='text' id='default' name='default' value='<?php echo smarty_function_sugar_currency_format(array('var' => $this->_tpl_vars['vardef']['default'],'currency_symbol' => false), $this);?>
'>
<script>
addToValidate('popup_form', 'default', 'float', false,'<?php echo smarty_function_sugar_translate(array('module' => 'DynamicFields','label' => 'COLUMN_TITLE_DEFAULT_VALUE'), $this);?>
' );
</script>
<?php else: ?>
<input type='hidden' name='default' value='<?php echo smarty_function_sugar_currency_format(array('var' => $this->_tpl_vars['vardef']['default'],'currency_symbol' => false), $this);?>
'><?php echo smarty_function_sugar_currency_format(array('var' => $this->_tpl_vars['vardef']['default']), $this);?>

<?php endif; ?>
</td></tr><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/DynamicFields/templates/Fields/Forms/coreBottom.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>