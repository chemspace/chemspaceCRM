<?php /* Smarty version 2.6.11, created on 2015-09-02 11:09:07
         compiled from modules/Currencies/EditView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getjspath', 'modules/Currencies/EditView.tpl', 48, false),array('function', 'sugar_help', 'modules/Currencies/EditView.tpl', 56, false),)), $this); ?>

<script type="text/javascript">
js_iso4217 = <?php echo $this->_tpl_vars['JS_ISO4217']; ?>
;
</script>
<script type="text/javascript" src="<?php echo smarty_function_sugar_getjspath(array('file' => 'modules/Currencies/EditView.js'), $this);?>
"></script>
<table width="100%" cellspacing="0" cellpadding="0" border="0" class="edit view">
<tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="15%" scope="row" nowrap><slot><?php echo $this->_tpl_vars['MOD']['LBL_LIST_NAME']; ?>
: <span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span></slot></td>
<td width="35%"><slot><input name='name' tabindex='1' size='30' maxlength='50' type="text" value="<?php echo $this->_tpl_vars['NAME']; ?>
"></slot></td>
<td width="15%" scope="row" nowrap><slot><?php echo $this->_tpl_vars['MOD']['LBL_LIST_ISO4217']; ?>
:&nbsp;<?php echo smarty_function_sugar_help(array('text' => $this->_tpl_vars['MOD']['LBL_LIST_ISO4217_HELP']), $this);?>
</slot></td>
<td width="35%"><slot><input name='iso4217' tabindex='1' size='3'
  maxlength='3' type="text" value="<?php echo $this->_tpl_vars['ISO4217']; ?>
" onKeyUp='isoUpdate(this);'></slot></td>
</tr>
<tr>

</tr>
<tr>
<td width="15%" scope="row" nowrap><slot> <?php echo $this->_tpl_vars['MOD']['LBL_LIST_RATE']; ?>
: <span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span></slot></td>
<td width="35%"><slot><input name='conversion_rate' tabindex='1' size='30' maxlength='50' type="text" value="<?php echo $this->_tpl_vars['CONVERSION_RATE']; ?>
">
<?php echo smarty_function_sugar_help(array('text' => $this->_tpl_vars['MOD']['LBL_LIST_RATE_HELP']), $this);?>

</slot></td>
<td width="15%" scope="row" nowrap><slot><?php echo $this->_tpl_vars['MOD']['LBL_LIST_SYMBOL']; ?>
: <span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span></slot></td>
<td width="35%"><slot><input name='symbol' tabindex='1' size='3' maxlength='50' type="text" value="<?php echo $this->_tpl_vars['SYMBOL']; ?>
"></slot></td>

</tr>
<tr>

</tr>
<tr>
<td scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_LIST_STATUS']; ?>
:</slot></td>
<td><slot><select name='status' tabindex='1'><?php echo $this->_tpl_vars['STATUS_OPTIONS']; ?>
</select> <em><?php echo $this->_tpl_vars['MOD']['NTC_STATUS']; ?>
</em></slot></td>
</tr></table>
</td>
</tr>
</table>
<input type='hidden' name='record' value='<?php echo $this->_tpl_vars['ID']; ?>
'>
</form>
<?php echo $this->_tpl_vars['JAVASCRIPT']; ?>
