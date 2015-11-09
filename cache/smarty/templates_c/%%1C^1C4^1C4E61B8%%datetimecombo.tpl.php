<?php /* Smarty version 2.6.11, created on 2015-11-09 12:49:28
         compiled from modules/DynamicFields/templates/Fields/Forms/datetimecombo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_translate', 'modules/DynamicFields/templates/Fields/Forms/datetimecombo.tpl', 69, false),array('function', 'html_options', 'modules/DynamicFields/templates/Fields/Forms/datetimecombo.tpl', 72, false),)), $this); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/DynamicFields/templates/Fields/Forms/coreTop.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  echo '
<script language="Javascript">
	function timeValueUpdate(){
		var fieldname = \'defaultTime\';
		var timeseparator = \':\';
		var newtime = \'\';
		
		id = fieldname + \'_hours\';
		h = window.document.getElementById(id).value;
		id = fieldname + \'_minutes\';
		m = window.document.getElementById(id).value;
		
		id = fieldname + \'_meridiem\';
		ampm = \'\';
		if(document.getElementById(id)) {
		   ampm = document.getElementById(id).value;
		}
		newtime = h + timeseparator + m + ampm;
		document.getElementById(fieldname).value = newtime;
		
	}
</script>
'; ?>

<tr>
	<td class='mbLBL'><?php echo smarty_function_sugar_translate(array('module' => 'DynamicFields','label' => 'COLUMN_TITLE_DEFAULT_VALUE'), $this);?>
:</td>
	<td>
	<?php if ($this->_tpl_vars['hideLevel'] < 5): ?>
		<?php echo smarty_function_html_options(array('name' => 'defaultDate','id' => 'defaultDate_date','options' => $this->_tpl_vars['default_values'],'selected' => $this->_tpl_vars['default_date']), $this);?>

	<?php else: ?>
		<input type='hidden' name='defaultDate' value='<?php echo $this->_tpl_vars['default_date']; ?>
'><?php echo $this->_tpl_vars['default_date']; ?>

	<?php endif; ?>
	</td>
</tr>
<tr>
	<td class='mbLBL'></td>
	<td>
	<?php if ($this->_tpl_vars['hideLevel'] < 5): ?>
		  <div>
			<?php echo smarty_function_html_options(array('name' => 'defaultHours','size' => '1','id' => 'defaultTime_hours','options' => $this->_tpl_vars['default_hours_values'],'onchange' => "timeValueUpdate();",'selected' => $this->_tpl_vars['default_hours']), $this);?>

		   :
		 <?php echo smarty_function_html_options(array('name' => 'defaultMinutes','size' => '1','id' => 'defaultTime_minutes','options' => $this->_tpl_vars['default_minutes_values'],'onchange' => "timeValueUpdate();",'selected' => $this->_tpl_vars['default_minutes']), $this);?>

		 <?php if ($this->_tpl_vars['show_meridiem'] === true): ?>
		 <?php echo smarty_function_html_options(array('name' => 'defaultMeridiem','size' => '1','id' => 'defaultTime_meridiem','options' => $this->_tpl_vars['default_meridiem_values'],'onchange' => "timeValueUpdate();",'selected' => $this->_tpl_vars['default_meridiem']), $this);?>

		 <?php endif; ?>
		</div>
		<input type='hidden' name='defaultTime' id='defaultTime' value="<?php echo $this->_tpl_vars['defaultTime']; ?>
">
	<?php else: ?>
		<input type='hidden' name='defaultTime' id='defaultTime' value='<?php echo $this->_tpl_vars['defaultTime']; ?>
'><?php echo $this->_tpl_vars['defaultTime']; ?>

	<?php endif; ?>
	</td>
</tr>
<tr>
	<td class='mbLBL'><?php echo smarty_function_sugar_translate(array('module' => 'DynamicFields','label' => 'COLUMN_TITLE_MASS_UPDATE'), $this);?>
:</td>
	<td>
	<?php if ($this->_tpl_vars['hideLevel'] < 5): ?>
		<input type="checkbox" id="massupdate" name="massupdate" value="1" <?php if (! empty ( $this->_tpl_vars['vardef']['massupdate'] )): ?>checked<?php endif; ?>/>
	<?php else: ?>
		<input type="checkbox" id="massupdate" name="massupdate" value="1" disabled <?php if (! empty ( $this->_tpl_vars['vardef']['massupdate'] )): ?>checked<?php endif; ?>/>
	<?php endif; ?>
	</td>
</tr>
<?php if ($this->_tpl_vars['range_search_option_enabled']): ?>
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
<script>
addToValidateBinaryDependency('popup_form',"defaultDate_date", 'alpha', false, "<?php echo $this->_tpl_vars['APP']['ERR_MISSING_REQUIRED_FIELDS']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_DATE']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_OR']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_HOURS']; ?>
" ,"defaultTime_hours");
addToValidateBinaryDependency('popup_form',"defaultTime_hours", 'alpha', false, "<?php echo $this->_tpl_vars['APP']['ERR_MISSING_REQUIRED_FIELDS']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_HOURS']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_OR']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_MINUTES']; ?>
" ,"defaultTime_minutes");
addToValidateBinaryDependency('popup_form', "defaultTime_minutes", 'alpha', false, "<?php echo $this->_tpl_vars['APP']['ERR_MISSING_REQUIRED_FIELDS']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_MINUTES']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_OR']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_MERIDIEM']; ?>
","defaultTime_meridiem");
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/DynamicFields/templates/Fields/Forms/coreBottom.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>