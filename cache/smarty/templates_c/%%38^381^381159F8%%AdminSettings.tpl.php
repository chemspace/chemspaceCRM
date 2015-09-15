<?php /* Smarty version 2.6.11, created on 2015-09-03 15:07:03
         compiled from modules/SugarFeed/tpls/AdminSettings.tpl */ ?>
<form name="AdminSettings" method="POST">
<input type="hidden" name="action" value="AdminSettings">
<input type="hidden" name="module" value="SugarFeed">
<input type="hidden" name="process" value="">

<table width="100%" cellpadding="0" cellspacing="0" border="0" class="actionsContainer">
<tr>
<td width="100%" colspan="2">
<input type="button" id="activityStream_admin_save" onclick="document.AdminSettings.process.value='true'; if(check_form('AdminSettings')) { document.AdminSettings.submit(); }" class="button primary" title="<?php echo $this->_tpl_vars['app']['LBL_SAVE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['app']['LBL_SAVE_BUTTON_KEY']; ?>
" value="<?php echo $this->_tpl_vars['app']['LBL_SAVE_BUTTON_LABEL']; ?>
">
<input type="button" id="activityStream_admin_cancel" onclick="document.AdminSettings.process.value='false'; document.AdminSettings.submit();" class="button" title="<?php echo $this->_tpl_vars['app']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['app']['LBL_CANCEL_BUTTON_KEY']; ?>
" value="<?php echo $this->_tpl_vars['app']['LBL_CANCEL_BUTTON_LABEL']; ?>
">
<input type="button" id="activityStream_admin_delete" onclick="document.AdminSettings.process.value='deleteRecords'; if(confirm('<?php echo $this->_tpl_vars['mod']['LBL_CONFIRM_DELETE_RECORDS']; ?>
')) document.AdminSettings.submit();" class="button" title="<?php echo $this->_tpl_vars['mod']['LBL_FLUSH_RECORDS']; ?>
" value="<?php echo $this->_tpl_vars['mod']['LBL_FLUSH_RECORDS']; ?>
">
</td>
</tr>
</table>

<table width="100%" border="0" cellspacing="1" cellpadding="0" class="edit view">
<tr>
<td scope="row" align="right" nowrap><?php echo $this->_tpl_vars['mod']['LBL_ENABLE_FEED']; ?>
:</td>
<td align="left" width="25%" colspan='4'>
<input type="hidden" id="feed_enable_hidden" name="feed_enable" value="0">
<input type="checkbox" id="feed_enable" name="feed_enable" value="1" <?php echo $this->_tpl_vars['enabled_checkbox']; ?>
 onClick="SugarFeedDisableCheckboxes()">
</td>
</tr>
<tr>
<td scope="row" align="right" valign="top" nowrap><?php echo $this->_tpl_vars['mod']['LBL_ENABLE_MODULE_LIST']; ?>
:</td>
<td colspan="4" width="95%">
<table id="sugarfeed_modulelist" cellspacing=3 border=0>
<?php $_from = $this->_tpl_vars['module_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['feedModuleList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['feedModuleList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['entry']):
        $this->_foreach['feedModuleList']['iteration']++;
 if (( $this->_tpl_vars['i'] % 2 ) == 0): ?><tr><?php endif; ?>
<td scope="row" align="right"><?php echo $this->_tpl_vars['entry']['label']; ?>
:</td>
<td>
<input type="hidden" name="modules[module_<?php echo $this->_tpl_vars['entry']['module']; ?>
]" value="0">
<input type="checkbox" id="modules[module_<?php echo $this->_tpl_vars['entry']['module']; ?>
]" name="modules[module_<?php echo $this->_tpl_vars['entry']['module']; ?>
]" value="1" <?php if ($this->_tpl_vars['entry']['enabled'] == 1): ?>CHECKED<?php endif; ?>>
</td>
<?php if (( $this->_tpl_vars['i'] % 2 ) == 1): ?></tr><?php endif;  endforeach; endif; unset($_from); ?>
</table>
</td></tr>
<tr>
<td scope="row" align="right" nowrap><?php echo $this->_tpl_vars['mod']['LBL_ENABLE_USER_FEED']; ?>
:</td>
<td align="left" width="25%">
<input type="hidden" id="modules[module_UserFeed]" name="modules[module_UserFeed]" value="0">
<input type="checkbox" id="modules[module_UserFeed]" name="modules[module_UserFeed]" value="1" <?php if ($this->_tpl_vars['user_feed_enabled'] == 1): ?>CHECKED<?php endif; ?>>
</td>
<td colspan="3" width="70%">&nbsp;</td>
</tr>
</table>
</form>


<script type="text/javascript">
var SugarFeedCheckboxList = new Object();
SugarFeedCheckboxList['module_UserFeed'] = 'modules[module_UserFeed]';
<?php $_from = $this->_tpl_vars['module_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['feedModuleList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['feedModuleList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['entry']):
        $this->_foreach['feedModuleList']['iteration']++;
?>
SugarFeedCheckboxList['<?php echo $this->_tpl_vars['i']; ?>
'] = 'modules[module_<?php echo $this->_tpl_vars['entry']['module']; ?>
]';
<?php endforeach; endif; unset($_from);  echo '
addToValidate(\'AdminSettings\', \'tracker_prune_interval\', \'int\', true, "{$mod.LBL_TRACKER_PRUNE_RANGE}");
addToValidateRange(\'AdminSettings\', \'tracker_prune_interval\', \'range\', true, \'{$mod.LBL_TRACKER_PRUNE_RANGE}\', 1, 180);
function SugarFeedDisableCheckboxes(is_init) {
        var setDisabled = false;

        if ( document.getElementsByName(\'feed_enable\')[1].checked == true ) {
           setDisabled = false;
           if ( is_init != true ) {
               document.getElementsByName(\'modules[module_UserFeed]\')[1].checked = true;
           }
        } else {
           setDisabled = true;
        }

        var currElem = null;
        for ( var i in SugarFeedCheckboxList ) {
            currElem = document.getElementsByName(SugarFeedCheckboxList[i])[1];
            if ( typeof(currElem) != \'object\' ) { continue; }
            if ( currElem.type == \'checkbox\' ) {
               currElem.disabled = setDisabled;
               currElem.readonly = setDisabled;
            }
        }
}
SugarFeedDisableCheckboxes(true);
'; ?>

</script>