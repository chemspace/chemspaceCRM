<?php /* Smarty version 2.6.11, created on 2015-10-08 17:25:46
         compiled from cache/modules/Notes/SearchForm_popup_query_form.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'counter', 'cache/modules/Notes/SearchForm_popup_query_form.tpl', 26, false),array('function', 'math', 'cache/modules/Notes/SearchForm_popup_query_form.tpl', 27, false),array('function', 'sugar_getimagepath', 'cache/modules/Notes/SearchForm_popup_query_form.tpl', 35, false),array('function', 'sugar_translate', 'cache/modules/Notes/SearchForm_popup_query_form.tpl', 44, false),array('function', 'html_options', 'cache/modules/Notes/SearchForm_popup_query_form.tpl', 123, false),array('function', 'sugar_getimage', 'cache/modules/Notes/SearchForm_popup_query_form.tpl', 135, false),array('modifier', 'default', 'cache/modules/Notes/SearchForm_popup_query_form.tpl', 259, false),)), $this); ?>

<script>
<?php echo '
	$(function() {
	var $dialog = $(\'<div></div>\')
		.html(SUGAR.language.get(\'app_strings\', \'LBL_SEARCH_HELP_TEXT\'))
		.dialog({
			autoOpen: false,
			title: SUGAR.language.get(\'app_strings\', \'LBL_SEARCH_HELP_TITLE\'),
			width: 700
		});
		
		$(\'.help-search\').click(function() {
		$dialog.dialog(\'open\');
		// prevent the default action, e.g., following a link
	});
	
	});
'; ?>

</script>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
      
      
	
	<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0" src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='10%' >
			<label for='name_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_NOTE_SUBJECT','module' => 'Notes'), $this);?>
</label>
		</td>
	<td  nowrap="nowrap" width='30%'>
			
<?php if (strlen ( $this->_tpl_vars['fields']['name_advanced']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['name_advanced']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['name_advanced']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['name_advanced']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['name_advanced']['name']; ?>
' size='30' 
    maxlength='255' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''      accesskey='9'  >
   	   	</td>
    
      
	
	<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0" src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='10%' >
		
		<label for='contact_name_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_CONTACT_NAME','module' => 'Notes'), $this);?>
</label>
    	</td>
	<td  nowrap="nowrap" width='30%'>
			
<?php if (strlen ( $this->_tpl_vars['fields']['contact_name_advanced']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['contact_name_advanced']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['contact_name_advanced']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['contact_name_advanced']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['contact_name_advanced']['name']; ?>
' size='30' 
     
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''      >
   	   	</td>
    
      
	
	<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0" src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='10%' >
		
		<label for='parent_name_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_RELATED_TO','module' => 'Notes'), $this);?>
</label>
    	</td>
	<td  nowrap="nowrap" width='30%'>
			
<select name='parent_type_advanced'   id='parent_type_advanced' title=''
onchange='document.search_form.<?php echo $this->_tpl_vars['fields']['parent_name_advanced']['name']; ?>
.value="";document.search_form.parent_id.value=""; 
        changeParentQSSearchView("<?php echo $this->_tpl_vars['fields']['parent_name_advanced']['name']; ?>
"); checkParentType(document.search_form.parent_type_advanced.value, document.search_form.btn_<?php echo $this->_tpl_vars['fields']['parent_name_advanced']['name']; ?>
);'>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['parent_name_advanced']['options'],'selected' => $this->_tpl_vars['fields']['parent_type_advanced']['value']), $this);?>

</select>
<br>
<?php if (empty ( $this->_tpl_vars['fields']['parent_name_advanced']['options'][$this->_tpl_vars['fields']['parent_type_advanced']['value']] )): ?>
	<?php $this->assign('keepParent', 0);  else: ?>
	<?php $this->assign('keepParent', 1);  endif; ?>
<input type="text" name="<?php echo $this->_tpl_vars['fields']['parent_name_advanced']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['parent_name_advanced']['name']; ?>
" class="sqsEnabled"   size="" value="<?php echo $this->_tpl_vars['fields']['parent_name_advanced']['value']; ?>
" autocomplete="off"><input type="hidden" name="parent_id" id="parent_id"  <?php if ($this->_tpl_vars['keepParent']): ?>value="<?php echo $this->_tpl_vars['fields']['parent_id']['value']; ?>
"<?php endif; ?>>
<span class="id-ff multiple">
<button type="button" name="btn_<?php echo $this->_tpl_vars['fields']['parent_name_advanced']['name']; ?>
"   title="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_TITLE']; ?>
"
	   class="button firstChild" value="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_LABEL']; ?>
"
	   onclick='if(document.search_form.parent_type_advanced.value != "") open_popup(document.search_form.parent_type_advanced.value, 600, 400, "", true, false, <?php echo '{"call_back_function":"set_return","form_name":"search_form","field_to_name_array":{"id":"parent_id","name":"parent_name_advanced"}}'; ?>
, "single", true);'><?php echo smarty_function_sugar_getimage(array('alt' => $this->_tpl_vars['app_strings']['LBL_ID_FF_SELECT'],'name' => "id-ff-select",'ext' => ".png",'other_attributes' => ''), $this);?>
</button>
<button type="button" name="btn_clr_<?php echo $this->_tpl_vars['fields']['parent_name_advanced']['name']; ?>
"   title="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_TITLE']; ?>
"  class="button lastChild" onclick="this.form.<?php echo $this->_tpl_vars['fields']['parent_name_advanced']['name']; ?>
.value = ''; this.form.<?php echo $this->_tpl_vars['fields']['parent_name_advanced']['id_name']; ?>
.value = '';" value="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_LABEL']; ?>
">
<?php echo smarty_function_sugar_getimage(array('alt' => $this->_tpl_vars['app_strings']['LBL_ID_FF_CLEAR'],'name' => "id-ff-clear",'ext' => ".png",'other_attributes' => ''), $this);?>

</button>
</span>
<?php echo '
<script type="text/javascript">
if (typeof(changeParentQSSearchView) == \'undefined\'){
function changeParentQSSearchView(field) {
	field = YAHOO.util.Dom.get(field);
    var form = field.form;
    var sqsId = form.id + "_" + field.id;
    var typeField =  form.elements["parent_type_advanced"];
    var new_module = typeField.value;
    if(typeof(disabledModules[new_module]) != \'undefined\') {
		sqs_objects[sqsId]["disable"] = true;
		field.readOnly = true;
	} else {
		sqs_objects[sqsId]["disable"] = false;
		field.readOnly = false;
    }
	//Update the SQS globals to reflect the new module choice
    sqs_objects[sqsId]["modules"] = new Array(new_module);
    if (typeof(QSFieldsArray[sqsId]) != \'undefined\')
    {
        QSFieldsArray[sqsId].sqs.modules = new Array(new_module);
    }
	if(typeof QSProcessedFieldsArray != \'undefined\')
    {
	   QSProcessedFieldsArray[sqsId] = false;
    }
    enableQS(false);
}}
YAHOO.util.Event.onContentReady(
'; ?>

"<?php echo $this->_tpl_vars['fields']['parent_name_advanced']['name']; ?>
"
<?php echo '
, function() {
    changeParentQSSearchView(
'; ?>

"<?php echo $this->_tpl_vars['fields']['parent_name_advanced']['name']; ?>
"
<?php echo '
    );
});
</script>
<script>var disabledModules=[];</script>
'; ?>

   	   	</td>
    
      
	
	<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0" src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='10%' >
			<label for='filename_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_FILENAME','module' => 'Notes'), $this);?>
</label>
		</td>
	<td  nowrap="nowrap" width='30%'>
			
<?php if (strlen ( $this->_tpl_vars['fields']['filename_advanced']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['filename_advanced']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['filename_advanced']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['filename_advanced']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['filename_advanced']['name']; ?>
' size='30' 
    maxlength='255' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''      >
   	   	</td>
    
      
	
	<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0" src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='10%' >
		
		<label for='date_entered_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_DATE_ENTERED','module' => 'Notes'), $this);?>
</label>
    	</td>
	<td  nowrap="nowrap" width='30%'>
			
<span class="dateTime">
<?php $this->assign('date_value', $this->_tpl_vars['fields']['date_entered_advanced']['value']); ?>
<input class="date_input" autocomplete="off" type="text" name="<?php echo $this->_tpl_vars['fields']['date_entered_advanced']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['date_entered_advanced']['name']; ?>
" value="<?php echo $this->_tpl_vars['date_value']; ?>
" title=''  tabindex=''    size="11" maxlength="10" >
<?php ob_start(); ?>alt="<?php echo $this->_tpl_vars['APP']['LBL_ENTER_DATE']; ?>
" style="position:relative; top:6px" border="0" id="<?php echo $this->_tpl_vars['fields']['date_entered_advanced']['name']; ?>
_trigger"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('other_attributes', ob_get_contents());ob_end_clean();  echo smarty_function_sugar_getimage(array('name' => 'jscalendar','ext' => ".gif",'other_attributes' => ($this->_tpl_vars['other_attributes'])), $this);?>

</span>
<script type="text/javascript">
Calendar.setup ({
inputField : "<?php echo $this->_tpl_vars['fields']['date_entered_advanced']['name']; ?>
",
form : "popup_query_form",
ifFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
daFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
button : "<?php echo $this->_tpl_vars['fields']['date_entered_advanced']['name']; ?>
_trigger",
singleClick : true,
dateStr : "<?php echo $this->_tpl_vars['date_value']; ?>
",
startWeekday: <?php echo ((is_array($_tmp=@$this->_tpl_vars['CALENDAR_FDOW'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
,
step : 1,
weekNumbers:false
}
);
</script>

   	   	</td>
	</tr>
<tr>
	<td colspan='20'>
		&nbsp;
	</td>
</tr>	
<?php if ($this->_tpl_vars['DISPLAY_SAVED_SEARCH']): ?>
<tr>
	<td colspan='2'>
		<a class='tabFormAdvLink' onhover href='javascript:toggleInlineSearch()'>
            <?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ALT_SHOW_OPTIONS'), $this); $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('alt_show_hide', ob_get_contents());ob_end_clean(); ?>
		<?php echo smarty_function_sugar_getimage(array('alt' => $this->_tpl_vars['alt_show_hide'],'name' => 'advanced_search','ext' => ".gif",'other_attributes' => 'border="0" id="up_down_img" '), $this);?>
&nbsp;<?php echo $this->_tpl_vars['APP']['LNK_SAVED_VIEWS']; ?>

		</a><br>
		<input type='hidden' id='showSSDIV' name='showSSDIV' value='<?php echo $this->_tpl_vars['SHOWSSDIV']; ?>
'><p>
	</td>
	<td scope='row' width='10%' nowrap="nowrap">
		<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SAVE_SEARCH_AS','module' => 'SavedSearch'), $this);?>
:
	</td>
	<td width='30%' nowrap>
		<input type='text' name='saved_search_name'>
		<input type='hidden' name='search_module' value=''>
		<input type='hidden' name='saved_search_action' value=''>
		<input title='<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
' value='<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
' class='button' type='button' name='saved_search_submit' onclick='SUGAR.savedViews.setChooser(); return SUGAR.savedViews.saved_search_action("save");'>
	</td>
	<td scope='row' width='10%' nowrap="nowrap">
	    <?php echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFY_CURRENT_SEARCH','module' => 'SavedSearch'), $this);?>
:
	</td>
	<td width='30%' nowrap>
        <input class='button' onclick='SUGAR.savedViews.setChooser(); return SUGAR.savedViews.saved_search_action("update")' value='<?php echo $this->_tpl_vars['APP']['LBL_UPDATE']; ?>
' title='<?php echo $this->_tpl_vars['APP']['LBL_UPDATE']; ?>
' name='ss_update' id='ss_update' type='button' >
		<input class='button' onclick='return SUGAR.savedViews.saved_search_action("delete", "<?php echo smarty_function_sugar_translate(array('label' => 'LBL_DELETE_CONFIRM','module' => 'SavedSearch'), $this);?>
")' value='<?php echo $this->_tpl_vars['APP']['LBL_DELETE']; ?>
' title='<?php echo $this->_tpl_vars['APP']['LBL_DELETE']; ?>
' name='ss_delete' id='ss_delete' type='button'>
		<br><span id='curr_search_name'></span>
	</td>
</tr>

<tr>
<td colspan='6'>
<div style='<?php echo $this->_tpl_vars['DISPLAYSS']; ?>
' id='inlineSavedSearch' >
	<?php echo $this->_tpl_vars['SAVED_SEARCH']; ?>

</div>
</td>
</tr>

<?php endif;  if ($this->_tpl_vars['displayType'] != 'popupView'): ?>
<tr>
	<td colspan='5'>
        <input tabindex='2' title='<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_BUTTON_TITLE']; ?>
' onclick='SUGAR.savedViews.setChooser()' class='button' type='submit' name='button' value='<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_BUTTON_LABEL']; ?>
' id='search_form_submit_advanced'/>&nbsp;
        <input tabindex='2' title='<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_TITLE']; ?>
'  onclick='SUGAR.searchForm.clear_form(this.form); document.getElementById("saved_search_select").options[0].selected=true; return false;' class='button' type='button' name='clear' id='search_form_clear_advanced' value='<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_LABEL']; ?>
'/>
        <?php if ($this->_tpl_vars['DOCUMENTS_MODULE']): ?>
        &nbsp;<input title="<?php echo $this->_tpl_vars['APP']['LBL_BROWSE_DOCUMENTS_BUTTON_TITLE']; ?>
" type="button" class="button" value="<?php echo $this->_tpl_vars['APP']['LBL_BROWSE_DOCUMENTS_BUTTON_LABEL']; ?>
" onclick='open_popup("Documents", 600, 400, "&caller=Documents", true, false, "");' />
        <?php endif; ?>
        <a id="basic_search_link" onclick="SUGAR.searchForm.searchFormSelect('<?php echo $this->_tpl_vars['module']; ?>
|basic_search','<?php echo $this->_tpl_vars['module']; ?>
|advanced_search')" href="javascript:void(0)" accesskey="<?php echo $this->_tpl_vars['APP']['LBL_ADV_SEARCH_LNK_KEY']; ?>
" ><?php echo $this->_tpl_vars['APP']['LNK_BASIC_SEARCH']; ?>
</a>
        <span class='white-space'>
            &nbsp;&nbsp;&nbsp;<?php if ($this->_tpl_vars['SAVED_SEARCHES_OPTIONS']): ?>|&nbsp;&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['APP']['LBL_SAVED_SEARCH_SHORTCUT']; ?>
</b>&nbsp;
            <?php echo $this->_tpl_vars['SAVED_SEARCHES_OPTIONS']; ?>
 <?php endif; ?>
            <span id='go_btn_span' style='display:none'><input tabindex='2' title='go_select' id='go_select'  onclick='SUGAR.searchForm.clear_form(this.form);' class='button' type='button' name='go_select' value=' <?php echo $this->_tpl_vars['APP']['LBL_GO_BUTTON_LABEL']; ?>
 '/></span>	
        </span>
	</td>
	<td class="help">
	    <?php if ($this->_tpl_vars['DISPLAY_SEARCH_HELP']): ?>
	    <img  border='0' src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
	    <?php endif; ?>
    </td>
</tr>
<?php endif; ?>
</table>

<script>
<?php echo '
	if(typeof(loadSSL_Scripts)==\'function\'){
		loadSSL_Scripts();
	}
'; ?>
	
</script><?php echo '<script language="javascript">if(typeof sqs_objects == \'undefined\'){var sqs_objects = new Array;}sqs_objects[\'popup_query_form_assigned_user_name_advanced\']={"form":"popup_query_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name_advanced","assigned_user_id_advanced"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'popup_query_form_modified_by_name_advanced\']={"form":"popup_query_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["modified_by_name_advanced","modified_user_id_advanced"],"required_list":["modified_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'popup_query_form_created_by_name_advanced\']={"form":"popup_query_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["created_by_name_advanced","created_by_advanced"],"required_list":["created_by"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'popup_query_form_parent_name_advanced\']={"form":"popup_query_form","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id"],"populate_list":["parent_name_advanced","parent_id_advanced"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'popup_query_form_contact_name_advanced\']={"form":"popup_query_form","method":"get_contact_array","modules":["Contacts"],"field_list":["salutation","first_name","last_name","id"],"populate_list":["contact_name_advanced","contact_id_advanced","contact_id_advanced","contact_id_advanced"],"required_list":["contact_id"],"group":"or","conditions":[{"name":"first_name","op":"like_custom","end":"%","value":""},{"name":"last_name","op":"like_custom","end":"%","value":""}],"order":"last_name","limit":"30","no_match_text":"No Match"};</script>'; ?>