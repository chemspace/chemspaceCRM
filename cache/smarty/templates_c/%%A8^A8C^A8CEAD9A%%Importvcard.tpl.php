<?php /* Smarty version 2.6.11, created on 2015-09-03 15:52:40
         compiled from include/MVC/View/tpls/Importvcard.tpl */ ?>

<b><?php echo $this->_tpl_vars['MOD']['LBL_IMPORT_VCARDTEXT']; ?>
</b>
<?php echo '
<script type="text/javascript" src="cache/include/javascript/sugar_grp_yui_widgets.js"></script>
<script type="text/javascript">
<!--
function validate_vcard()
{
    if (document.getElementById("vcard_file").value=="") {
        YAHOO.SUGAR.MessageBox.show({msg: \'';  echo $this->_tpl_vars['ERROR_TEXT'];  echo '\'} );
    }
    else
        document.EditView.submit();
}
-->
</script>
'; ?>

<form name="EditView" method="POST" ENCTYPE="multipart/form-data" action="index.php">
<input type="hidden" name="max_file_size" value="30000">
<input type='hidden' name='action' value='ImportVCardSave'>
<input type='hidden' name='module' value='<?php echo $this->_tpl_vars['MODULE']; ?>
'>
<input type='hidden' name='from' value='ImportVCard'>

<input size="60" name="vcard" id="vcard_file" type="file" />&nbsp;
<input class='button' type="button" onclick='validate_vcard()' value="<?php echo $this->_tpl_vars['APP']['LBL_IMPORT_VCARD_BUTTON_LABEL']; ?>
" 
    title="<?php echo $this->_tpl_vars['APP']['LBL_IMPORT_VCARD_BUTTON_TITLE']; ?>
" />
</form>
<div class="error"><?php echo $this->_tpl_vars['ERROR']; ?>
</div>