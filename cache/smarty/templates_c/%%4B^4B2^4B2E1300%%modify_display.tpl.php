<?php /* Smarty version 2.6.11, created on 2015-09-03 15:04:56
         compiled from modules/Connectors/tpls/modify_display.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getjspath', 'modules/Connectors/tpls/modify_display.tpl', 41, false),array('function', 'counter', 'modules/Connectors/tpls/modify_display.tpl', 58, false),)), $this); ?>
<script type="text/javascript" src="<?php echo smarty_function_sugar_getjspath(array('file' => 'cache/include/javascript/sugar_grp_yui_widgets.js'), $this);?>
"></script>
<script type="text/javascript" src="<?php echo smarty_function_sugar_getjspath(array('file' => 'modules/Connectors/Connector.js'), $this);?>
"></script>
<link rel="stylesheet" type="text/css" href="<?php echo smarty_function_sugar_getjspath(array('file' => 'modules/Connectors/tpls/tabs.css'), $this);?>
"/>


<?php echo '

<script language="javascript">

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
'index.php?module=Connectors&action=DisplayProperties&source_id=<?php echo $this->_tpl_vars['source']['id']; ?>
'<?php echo ',
			        cacheData: true,
			        '; ?>

			        <?php if ($this->_tpl_vars['source_count'] == 1): ?>
			        active: true
			        <?php else: ?>
			        active: false
			        <?php endif; ?>
			        <?php echo '
			    });
			    _tabView.addTab(tab);
			    tab.addListener(\'contentChange\', SourceTabs.tabContentChanged);
			    _sourceArray[';  echo $this->_tpl_vars['source_count'];  echo '-1] = \'';  echo $this->_tpl_vars['source']['id'];  echo '\';
		'; ?>

	       <?php endforeach; endif; unset($_from); ?>
		  <?php echo '
  		_tabView.appendTo(\'container\');
  		//_tabView.addListener(\'contentChange\', SourceTabs.tabContentChanged);
 		_tabView.addListener(\'beforeActiveTabChange\', SourceTabs.tabIndexChanged);
    },

    tabContentChanged: function(info) {
    	tab = _tabView.get(\'activeTab\');
        SUGAR.util.evalScript(tab.get(\'content\'));
    },

    tabIndexChanged : function(info){

    },

    fitContainer: function() {
		_tabView = SourceTabs.getTabView();
		content_div = _tabView.getElementsByClassName(\'yui-content\', \'div\')[0];
		content_div.style.overflow=\'auto\';
		content_div.style.height=\'405px\';
    },

    getTabView : function() {
        return _tabView;
    }
}
YAHOO.util.Event.onDOMReady(SourceTabs.init);
</script>
'; ?>

<form name="ModifyDisplay" method="POST">
<input type="hidden" name="modify" value="true">
<input type="hidden" name="module" value="Connectors">
<input type="hidden" name="action" value="SaveModifyDisplay">

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
<input type="hidden" name="display_values" value="">
<input type="hidden" name="display_sources" value="">
<input type="hidden" name="reset_to_default" value="">

<table border="0" class="actionsContainer">
<tr><td>
<input id="connectors_top_save" title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="button" onclick="calculateValues();" type="submit" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
">
<input id="connectors_top_cancel" title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="document.ModifyDisplay.action.value='ConnectorSettings'; document.ModifyDisplay.module.value='Connectors';" type="submit" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
">
</td></tr>
</table>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tr><td>
<div >
<div id="container" style="height: 465px">
</div>
</div>
</td></tr>
</table>
<table border="0" class="actionsContainer">
<tr><td>
<input id="connectors_bottom_save" title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" class="button" onclick="calculateValues();" type="submit" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
">
<input id="connectors_bottom_cancel" title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" class="button" onclick="document.ModifyDisplay.action.value='ConnectorSettings'; document.ModifyDisplay.module.value='Connectors';" type="submit" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
">
</td></tr>
</table>
</form>

<script type="text/javascript">
<?php echo '
YAHOO.util.Event.onDOMReady(SourceTabs.fitContainer);
'; ?>

</script>


<script type="text/javascript">
<?php echo '
function calculateValues() {
    tabview = SourceTabs.getTabView();
    display_vals = \'\'
    source_vals = \'\';
    sources = new Array();
    //Get the source divs
    elements = tabview.getElementsByClassName(\'sources_table\', \'table\');
    for(el in elements) {
        if(typeof elements[el] == \'function\') {
           continue;
        }

        source_vals += \',\' + elements[el].id;

    }

    //Get the enabled div elements
    elements = tabview.getElementsByClassName(\'enabled_module_workarea\', \'div\');
    for(el in elements) {
        if(typeof elements[el] == \'function\') {
           continue;
        }

        //Get the li elements
 		enabled_list = YAHOO.util.Dom.getElementsByClassName(\'noBullet2\', \'li\', elements[el]);
        for(li in enabled_list) {
            if(typeof enabled_list[li] != \'function\') {
                display_vals += \',\' + enabled_list[li].getAttribute(\'id\');
            }
        }
    }

    document.ModifyDisplay.display_values.value = display_vals != \'\' ? display_vals.substr(1,display_vals.length) : \'\';
    document.ModifyDisplay.display_sources.value = source_vals != \'\' ? source_vals.substr(1, source_vals.length) : \'\';
}

YAHOO.util.Event.onDOMReady(SourceTabs.fitContainer);
'; ?>

</script>