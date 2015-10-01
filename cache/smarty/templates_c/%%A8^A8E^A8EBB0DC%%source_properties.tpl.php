<?php /* Smarty version 2.6.11, created on 2015-09-03 15:04:44
         compiled from modules/Connectors/tpls/source_properties.tpl */ ?>

<br/>
<?php if (! empty ( $this->_tpl_vars['connector_language']['LBL_LICENSING_INFO'] )):  echo $this->_tpl_vars['connector_language']['LBL_LICENSING_INFO']; ?>

<?php endif; ?>
<br/>
<table width="100%" border="0" cellspacing="1" cellpadding="0" >
<?php if (! empty ( $this->_tpl_vars['properties'] )):  $_from = $this->_tpl_vars['properties']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['value']):
?>
<tr>
<td class="dataLabel" width="35%">
<?php echo $this->_tpl_vars['connector_language'][$this->_tpl_vars['name']]; ?>
:&nbsp;
<?php if (isset ( $this->_tpl_vars['required_properties'][$this->_tpl_vars['name']] )): ?>
<span class="required">*</span>
<?php endif; ?>
</td>
<td class="dataLabel" width="65%">
<input type="text" id="<?php echo $this->_tpl_vars['source_id']; ?>
_<?php echo $this->_tpl_vars['name']; ?>
" name="<?php echo $this->_tpl_vars['source_id']; ?>
_<?php echo $this->_tpl_vars['name']; ?>
" size="75" value="<?php echo $this->_tpl_vars['value']; ?>
"></td>
</tr>
<?php endforeach; endif; unset($_from);  if ($this->_tpl_vars['hasTestingEnabled']): ?>
<tr>
<td class="dataLabel" colspan="2">
<input id="<?php echo $this->_tpl_vars['source_id']; ?>
_test_button" type="button" class="button" value="  <?php echo $this->_tpl_vars['mod']['LBL_TEST_SOURCE']; ?>
  " onclick="run_test('<?php echo $this->_tpl_vars['source_id']; ?>
');">
</td>
</tr>
<tr>
<td class="dataLabel" colspan="2">
<span id="<?php echo $this->_tpl_vars['source_id']; ?>
_result">&nbsp;</span>
</td>
</tr>
<?php endif;  else: ?>
<tr>
<td class="dataLabel" colspan="2">&nbsp;</td>
<td class="dataLabel" colspan="2"><?php echo $this->_tpl_vars['mod']['LBL_NO_PROPERTIES']; ?>
</td>
</tr>
<?php endif; ?>
</table>

<script type="text/javascript">
<?php $_from = $this->_tpl_vars['required_properties']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['label']):
?>
addToValidate("ModifyProperties", "<?php echo $this->_tpl_vars['source_id']; ?>
_<?php echo $this->_tpl_vars['id']; ?>
", "alpha", true, "<?php echo $this->_tpl_vars['label']; ?>
");
<?php endforeach; endif; unset($_from); ?>
</script>