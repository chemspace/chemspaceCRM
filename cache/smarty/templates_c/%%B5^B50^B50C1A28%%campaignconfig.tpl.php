<?php /* Smarty version 2.6.11, created on 2015-09-03 10:40:03
         compiled from modules/EmailMan/tpls/campaignconfig.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getjspath', 'modules/EmailMan/tpls/campaignconfig.tpl', 45, false),)), $this); ?>
<?php echo $this->_tpl_vars['ROLLOVER']; ?>

<script type="text/javascript" src="<?php echo smarty_function_sugar_getjspath(array('file' => 'modules/Users/User.js'), $this);?>
"></script>
<script type="text/javascript">
<!--
<?php echo '
function change_state(radiobutton) 
{
	if (radiobutton.value == \'1\') {
		radiobutton.form[\'massemailer_tracking_entities_location\'].disabled=true;
		radiobutton.form[\'massemailer_tracking_entities_location\'].value=\'';  echo $this->_tpl_vars['MOD']['TRACKING_ENTRIES_LOCATION_DEFAULT_VALUE'];  echo '\';
	} 
	else {
		radiobutton.form[\'massemailer_tracking_entities_location\'].disabled=false;
		radiobutton.form[\'massemailer_tracking_entities_location\'].value=\'';  echo $this->_tpl_vars['SITEURL'];  echo '\';
	}
}
'; ?>

-->
</script>
<form name="ConfigureSettings" id="EditView" method="POST" >
	<input type="hidden" name="module" value="EmailMan">
	<input type="hidden" name="campaignConfig" value="true">
	<input type="hidden" name="action">
	<input type="hidden" name="return_module" value="<?php echo $this->_tpl_vars['RETURN_MODULE']; ?>
">
	<input type="hidden" name="return_action" value="<?php echo $this->_tpl_vars['RETURN_ACTION']; ?>
">
	<input type="hidden" name="source_form" value="config" />

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="edit view">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<th align="left" scope="row" colspan="4">
						<h4>
							<?php echo $this->_tpl_vars['MOD']['LBL_OUTBOUND_EMAIL_TITLE']; ?>

						</h4>
					</th>
				</tr>
				<tr>
					<td width="40%" scope="row">
						<?php echo $this->_tpl_vars['MOD']['LBL_EMAILS_PER_RUN']; ?>
&nbsp;<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
					</td>
					<td width="50%" >
						<input name='massemailer_campaign_emails_per_run' tabindex='1' maxlength='128' type="text" value="<?php echo $this->_tpl_vars['EMAILS_PER_RUN']; ?>
">
					</td>
				</tr>
				<tr>
					<td scope="row">
						<?php echo $this->_tpl_vars['MOD']['LBL_LOCATION_TRACK']; ?>
&nbsp;<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
					</td>
					<td >
						<input type='radio' onclick="change_state(this);" name='massemailer_tracking_entities_location_type' value="1" <?php echo $this->_tpl_vars['default_checked']; ?>
>
						<?php echo $this->_tpl_vars['MOD']['LBL_DEFAULT_LOCATION']; ?>
&nbsp;<input type='radio' <?php echo $this->_tpl_vars['userdefined_checked']; ?>
 onclick="change_state(this);" name='massemailer_tracking_entities_location_type' value="2"><?php echo $this->_tpl_vars['MOD']['LBL_CUSTOM_LOCATION']; ?>
 
				</tr>
				<tr>
					<td scope="row">
					</td>
					<td >
						<input name='massemailer_tracking_entities_location' <?php echo $this->_tpl_vars['TRACKING_ENTRIES_LOCATION_STATE']; ?>
 maxlength='128' type="text" value="<?php echo $this->_tpl_vars['TRACKING_ENTRIES_LOCATION']; ?>
">
					</td>
				</tr>
				<tr>
					<td scope="row">
					<div id="rollover">
						<?php echo $this->_tpl_vars['MOD']['LBL_CAMP_MESSAGE_COPY']; ?>
&nbsp;<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
                        <a href="#" class="rollover"><span><?php echo $this->_tpl_vars['MOD']['LBL_CAMP_MESSAGE_COPY_DESC']; ?>
</span><img border="0" alt=$mod_strings.LBL_HELP src="index.php?entryPoint=getImage&themeName=<?php echo $this->_tpl_vars['THEME']; ?>
&imageName=helpInline.gif"></a>
                    </div>
					</td>
					<td >
						<input type='radio' name='massemailer_email_copy' value="1" <?php echo $this->_tpl_vars['yes_checked']; ?>
>
						<?php echo $this->_tpl_vars['MOD']['LBL_YES']; ?>
&nbsp;<input type='radio' <?php echo $this->_tpl_vars['no_checked']; ?>
 name='massemailer_email_copy' value="2"><?php echo $this->_tpl_vars['MOD']['LBL_NO']; ?>
 
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<div style="padding-top:2px;">
    <input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_TITLE']; ?>
" class="button" onclick="this.form.action.value='Save';return verify_data(this);" type="submit" name="button" value=" <?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
 ">
    <input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" class="button" onclick="this.form.action.value='<?php echo $this->_tpl_vars['RETURN_ACTION']; ?>
'; this.form.module.value='<?php echo $this->_tpl_vars['RETURN_MODULE']; ?>
';" type="submit" name="button" value=" <?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
 ">
</div>

</form>
<?php echo $this->_tpl_vars['JAVASCRIPT']; ?>