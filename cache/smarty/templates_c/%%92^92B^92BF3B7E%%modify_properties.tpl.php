<?php /* Smarty version 2.6.11, created on 2015-09-03 15:04:44
         compiled from modules/Connectors/tpls/modify_properties.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getjspath', 'modules/Connectors/tpls/modify_properties.tpl', 42, false),array('function', 'counter', 'modules/Connectors/tpls/modify_properties.tpl', 58, false),)), $this); ?>

<script type="text/javascript" src="<?php echo smarty_function_sugar_getjspath(array('file' => 'cache/include/javascript/sugar_grp_yui_widgets.js'), $this);?>
"></script>
<script type="text/javascript" src="<?php echo smarty_function_sugar_getjspath(array('file' => 'modules/Connectors/Connector.js'), $this);?>
"></script>
<link rel="stylesheet" type="text/css" href="<?php echo smarty_function_sugar_getjspath(array('file' => 'modules/Connectors/tpls/tabs.css'), $this);?>
"/>

<?php echo '

<script language="javascript">
 	var _tabView;
 	var _timer;
 	var _sourceArray = new Array();
var SourceTabs = {

    init : function() {
         _tabView = new YAHOO.widget.TabView();

    	'; ?>

    		 <?php echo smarty_function_counter(array('assign' => 'source_count','start' => 0,'print' => 0), $this);?>

	        <?php $_from = $this->_tpl_vars['SOURCES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['connectors'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['connectors']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['source']):
        $this->_foreach['connectors']['iteration']++;
?>
	            <?php echo smarty_function_counter(array('assign' => 'source_count'), $this);?>

		<?php echo '
		       	tab = new YAHOO.widget.Tab({
			        label: \'';  echo $this->_tpl_vars['source']['name'];  echo ' \',
			        dataSrc: '; ?>
'index.php?module=Connectors&action=SourceProperties&source_id=<?php echo $this->_tpl_vars['source']['id']; ?>
&to_pdf=true'<?php echo ',
			        cacheData: true,
			        '; ?>

			        <?php if ($this->_tpl_vars['source_count'] == 1): ?>
			        active: true
			        <?php else: ?>
			        active: false
			        <?php endif; ?>
			        <?php echo '
			    });
			    '; ?>

			    _tabView.addTab(tab);			    
			    tab.id = '<?php echo $this->_tpl_vars['source']['id']; ?>
';		    
			    //tab.addListener('beforeContentChange', SourceTabs.tabClicked);
			    tab.addListener('click', SourceTabs.afterContentChange);
			    _sourceArray[<?php echo $this->_tpl_vars['source_count']; ?>
-1] = '<?php echo $this->_tpl_vars['source']['id']; ?>
';
	       <?php endforeach; endif; unset($_from); ?>
		  <?php echo '
  		_tabView.appendTo(\'container\');
    },

    afterContentChange: function(info) { 

		if(typeof validate != \'undefined\') {
		   validate = new Array();
		   validate["ModifyProperties"] = new Array();
		}    
    
    	tab = _tabView.get(\'activeTab\');
    	if(typeof tab.get(\'content\') != \'undefined\') {
        	SUGAR.util.evalScript(tab.get(\'content\'));  
        	clearTimeout(_timer);
        } else {
            _timer = setTimeout(SourceTabs.afterContentChange, 1000);
        }
    },

    fitContainer: function() {
		content_div = _tabView.getElementsByClassName(\'yui-content\', \'div\')[0];
		content_div.style.overflow=\'auto\';
		content_div.style.height=\'405px\';
    }
}
YAHOO.util.Event.onDOMReady(SourceTabs.init);
</script>
'; ?>

<form name="ModifyProperties" method="POST">
<input type="hidden" name="modify" value="true">
<input type="hidden" name="module" value="Connectors">
<input type="hidden" name="action" value="SaveModifyProperties">
<input type="hidden" name="source_id" value="">
<input type="hidden" name="reset_to_default" value="">

<?php echo smarty_function_counter(array('assign' => 'source_count','start' => 0,'print' => 0), $this);?>

<?php $_from = $this->_tpl_vars['SOURCES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['connectors'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['connectors']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['source']):
        $this->_foreach['connectors']['iteration']++;
 echo smarty_function_counter(array('assign' => 'source_count'), $this);?>

<input type="hidden" name="source<?php echo $this->_tpl_vars['source_count']; ?>
" value="<?php echo $this->_tpl_vars['source']['id']; ?>
">
<?php endforeach; endif; unset($_from); ?>

<table border="0" class="actionsContainer">
<tr><td>
<input id="connectors_top_save" title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="button" type="submit" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" onclick="return check_form('ModifyProperties') || confirm('<?php echo $this->_tpl_vars['mod']['LBL_CONFIRM_CONTINUE_SAVE']; ?>
');">
<input id="connectors_top_cancel" title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="document.ModifyProperties.action.value='ConnectorSettings'; document.ModifyProperties.module.value='Connectors';" type="submit" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
">
</td></tr>
</table>


<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tr><td class="tabDetailViewDF">
<div >
<div id="container" style="height: 465px">

</div>
</div>
</td></tr>
</table>
<table border="0" class="actionsContainer">
<tr><td>
<input id="connectors_bottom_save" title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
"  class="button" type="submit" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" onclick="return check_form('ModifyProperties') || confirm('<?php echo $this->_tpl_vars['mod']['LBL_CONFIRM_CONTINUE_SAVE']; ?>
');">
<input id="connectors_bottom_cancel" title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
"  class="button" onclick="document.ModifyProperties.action.value='ConnectorSettings'; document.ModifyProperties.module.value='Connectors';" type="submit" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
">
</td></tr>
</table>
</form>

<script type="text/javascript">
<?php echo '
YAHOO.util.Event.onDOMReady(SourceTabs.fitContainer);
'; ?>


<?php $_from = $this->_tpl_vars['REQUIRED_FIELDS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['required_fields'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['required_fields']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['fields']):
        $this->_foreach['required_fields']['iteration']++;
?>
	<?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field_key'] => $this->_tpl_vars['field_label']):
?>
		addToValidate("ModifyProperties", "<?php echo $this->_tpl_vars['id']; ?>
_<?php echo $this->_tpl_vars['field_key']; ?>
", "alpha", true, "<?php echo $this->_tpl_vars['field_label']; ?>
");
	<?php endforeach; endif; unset($_from);  endforeach; endif; unset($_from); ?>
</script>