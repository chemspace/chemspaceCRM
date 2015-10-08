<?php /* Smarty version 2.6.11, created on 2015-10-08 17:25:29
         compiled from cache/modules/Notes/DetailView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_include', 'cache/modules/Notes/DetailView.tpl', 33, false),array('function', 'sugar_translate', 'cache/modules/Notes/DetailView.tpl', 40, false),array('function', 'counter', 'cache/modules/Notes/DetailView.tpl', 47, false),array('function', 'sugar_ajax_url', 'cache/modules/Notes/DetailView.tpl', 66, false),array('function', 'sugar_getimage', 'cache/modules/Notes/DetailView.tpl', 70, false),array('function', 'sugar_getjspath', 'cache/modules/Notes/DetailView.tpl', 254, false),array('modifier', 'strip_semicolon', 'cache/modules/Notes/DetailView.tpl', 57, false),array('modifier', 'escape', 'cache/modules/Notes/DetailView.tpl', 163, false),array('modifier', 'url2html', 'cache/modules/Notes/DetailView.tpl', 163, false),array('modifier', 'nl2br', 'cache/modules/Notes/DetailView.tpl', 163, false),)), $this); ?>


<script language="javascript">
<?php echo '
SUGAR.util.doWhen(function(){
    return $("#contentTable").length == 0;
}, SUGAR.themes.actionMenu);
'; ?>

</script>
<table cellpadding="0" cellspacing="0" border="0" width="100%" id="">
<tr>
<td class="buttons" align="left" NOWRAP width="80%">
<div class="actionsContainer">
<form action="index.php" method="post" name="DetailView" id="formDetailView">
<input type="hidden" name="module" value="<?php echo $this->_tpl_vars['module']; ?>
">
<input type="hidden" name="record" value="<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
">
<input type="hidden" name="return_action">
<input type="hidden" name="return_module">
<input type="hidden" name="return_id">
<input type="hidden" name="module_tab">
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="offset" value="<?php echo $this->_tpl_vars['offset']; ?>
">
<input type="hidden" name="action" value="EditView">
<input type="hidden" name="sugar_body_only">
</form>
<ul id="detail_header_action_menu" class="clickMenu fancymenu" ><li class="sugar_action_button" ><?php if ($this->_tpl_vars['bean']->aclAccess('edit')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_KEY']; ?>
" class="button primary" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Notes'; _form.return_action.value='DetailView'; _form.return_id.value='<?php echo $this->_tpl_vars['id']; ?>
'; _form.action.value='EditView';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Edit" id="edit_button" value="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_LABEL']; ?>
"><?php endif; ?> <ul id class="subnav" ><li><?php if ($this->_tpl_vars['bean']->aclAccess('edit')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_DUPLICATE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_DUPLICATE_BUTTON_KEY']; ?>
" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Notes'; _form.return_action.value='DetailView'; _form.isDuplicate.value=true; _form.action.value='EditView'; _form.return_id.value='<?php echo $this->_tpl_vars['id']; ?>
';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Duplicate" value="<?php echo $this->_tpl_vars['APP']['LBL_DUPLICATE_BUTTON_LABEL']; ?>
" id="duplicate_button"><?php endif; ?> </li><li><?php if ($this->_tpl_vars['bean']->aclAccess('delete')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_DELETE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_DELETE_BUTTON_KEY']; ?>
" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Notes'; _form.return_action.value='ListView'; _form.action.value='Delete'; if(confirm('<?php echo $this->_tpl_vars['APP']['NTC_DELETE_CONFIRMATION']; ?>
')) SUGAR.ajaxUI.submitForm(_form);" type="submit" name="Delete" value="<?php echo $this->_tpl_vars['APP']['LBL_DELETE_BUTTON_LABEL']; ?>
" id="delete_button"><?php endif; ?> </li></ul></li></ul>
</div>
</td>
<td align="right" width="20%"><?php echo $this->_tpl_vars['ADMIN_EDIT']; ?>

<?php echo $this->_tpl_vars['PAGINATION']; ?>

</td>
</tr>
</table><?php echo smarty_function_sugar_include(array('include' => $this->_tpl_vars['includes']), $this);?>

<div id="Notes_detailview_tabs"
class="yui-navset detailview_tabs"
>

<ul class="yui-nav">

<li><a id="tab0" href="javascript:void(0)"><em><?php echo smarty_function_sugar_translate(array('label' => 'LBL_NOTE_INFORMATION','module' => 'Notes'), $this);?>
</em></a></li>

<li><a id="tab1" href="javascript:void(0)"><em><?php echo smarty_function_sugar_translate(array('label' => 'LBL_PANEL_ASSIGNMENT','module' => 'Notes'), $this);?>
</em></a></li>
</ul>
<div class="yui-content">
<div id='tabcontent0'>
<div id='detailpanel_1' class='detail view  detail508 expanded'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<table id='LBL_NOTE_INFORMATION' class="panelContainer" cellspacing='<?php echo $this->_tpl_vars['gridline']; ?>
'>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['contact_name']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_CONTACT_NAME','module' => 'Notes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="inlineEdit" type="relate" field="contact_name" width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['contact_name']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['contact_id']['value'] )):  ob_start(); ?>index.php?module=Contacts&action=DetailView&record=<?php echo $this->_tpl_vars['fields']['contact_id']['value'];  $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('detail_url', ob_get_contents());ob_end_clean(); ?>
<a href="<?php echo smarty_function_sugar_ajax_url(array('url' => $this->_tpl_vars['detail_url']), $this);?>
"><?php endif; ?>
<span id="contact_id" class="sugar_field" data-id-value="<?php echo $this->_tpl_vars['fields']['contact_id']['value']; ?>
"><?php echo $this->_tpl_vars['fields']['contact_name']['value']; ?>
</span>
<?php if (! empty ( $this->_tpl_vars['fields']['contact_id']['value'] )): ?></a><?php endif;  endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['parent_name']['hidden']):  echo smarty_function_sugar_translate(array('label' => 'LBL_MODULE_NAME','module' => $this->_tpl_vars['fields']['parent_type']['value']), $this);?>

<?php endif; ?>
</td>
<td class="inlineEdit" type="parent" field="parent_name" width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['parent_name']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['parent_name']['value']; ?>
">
<input type="hidden" class="sugar_field" id="parent_id" value="<?php echo $this->_tpl_vars['fields']['parent_id']['value']; ?>
">
<a href="index.php?module=<?php echo $this->_tpl_vars['fields']['parent_type']['value']; ?>
&action=DetailView&record=<?php echo $this->_tpl_vars['fields']['parent_id']['value']; ?>
" class="tabDetailViewDFLink"><?php echo $this->_tpl_vars['fields']['parent_name']['value']; ?>
</a>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['name']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_SUBJECT','module' => 'Notes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="inlineEdit" type="name" field="name" width='37.5%' colspan='3' >
<?php if (! $this->_tpl_vars['fields']['name']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['name']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['name']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['name']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['name']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['name']['value']; ?>
</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['filename']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_FILENAME','module' => 'Notes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="inlineEdit" type="file" field="filename" width='37.5%' colspan='3' >
<?php if (! $this->_tpl_vars['fields']['filename']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
">
<a href="index.php?entryPoint=download&id=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&type=<?php echo $this->_tpl_vars['module']; ?>
" class="tabDetailViewDFLink" target='_blank'><?php echo $this->_tpl_vars['fields']['filename']['value']; ?>
</a>
</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['description']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_NOTE_STATUS','module' => 'Notes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="inlineEdit" type="text" field="description" width='37.5%' colspan='3' >
<?php if (! $this->_tpl_vars['fields']['description']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="sugar_field" id="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['description']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['description']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['assigned_user_name']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_NAME','module' => 'Notes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="inlineEdit" type="relate" field="assigned_user_name" width='37.5%' colspan='3' >
<?php if (! $this->_tpl_vars['fields']['assigned_user_name']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id="assigned_user_id" class="sugar_field" data-id-value="<?php echo $this->_tpl_vars['fields']['assigned_user_id']['value']; ?>
"><?php echo $this->_tpl_vars['fields']['assigned_user_name']['value']; ?>
</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_NOTE_INFORMATION").style.display='none';</script>
<?php endif; ?>
</div>    <div id='tabcontent1'>
<div id='detailpanel_2' class='detail view  detail508 expanded'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<table id='LBL_PANEL_ASSIGNMENT' class="panelContainer" cellspacing='<?php echo $this->_tpl_vars['gridline']; ?>
'>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['date_modified']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DATE_MODIFIED','module' => 'Notes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="inlineEdit" type="datetime" field="date_modified" width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['date_modified']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id="date_modified" class="sugar_field"><?php echo $this->_tpl_vars['fields']['date_modified']['value']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_BY']; ?>
 <?php echo $this->_tpl_vars['fields']['modified_by_name']['value']; ?>
</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['date_entered']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DATE_ENTERED','module' => 'Notes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="inlineEdit" type="datetime" field="date_entered" width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['date_entered']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id="date_entered" class="sugar_field"><?php echo $this->_tpl_vars['fields']['date_entered']['value']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_BY']; ?>
 <?php echo $this->_tpl_vars['fields']['created_by_name']['value']; ?>
</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_PANEL_ASSIGNMENT").style.display='none';</script>
<?php endif; ?>
</div>
</div>
</div>

</form>
<script>SUGAR.util.doWhen("document.getElementById('form') != null",
function(){SUGAR.util.buildAccessKeyLabels();});
</script><script type='text/javascript' src='<?php echo smarty_function_sugar_getjspath(array('file' => 'include/javascript/popup_helper.js'), $this);?>
'></script>
<script type="text/javascript" src="<?php echo smarty_function_sugar_getjspath(array('file' => 'cache/include/javascript/sugar_grp_yui_widgets.js'), $this);?>
"></script>
<script type="text/javascript">
var Notes_detailview_tabs = new YAHOO.widget.TabView("Notes_detailview_tabs");
Notes_detailview_tabs.selectTab(0);
</script>
<script type="text/javascript" src="include/InlineEditing/inlineEditing.js"></script>