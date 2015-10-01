<?php /* Smarty version 2.6.11, created on 2015-09-02 10:01:15
         compiled from modules/Home/Dashlets/iFrameDashlet/configure.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'modules/Home/Dashlets/iFrameDashlet/configure.tpl', 65, false),)), $this); ?>


<div style='width:100%'>
<form name='configure_<?php echo $this->_tpl_vars['id']; ?>
' action="index.php" method="post" onSubmit='return SUGAR.dashlets.postForm("configure_<?php echo $this->_tpl_vars['id']; ?>
", SUGAR.mySugar.uncoverPage);'>
<input type='hidden' name='id' value='<?php echo $this->_tpl_vars['id']; ?>
'>
<input type='hidden' name='module' value='Home'>
<input type='hidden' name='action' value='ConfigureDashlet'>
<input type='hidden' name='to_pdf' value='true'>
<input type='hidden' name='configure' value='true'>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="edit view" align="center">
<tr>
    <td scope='row'><?php echo $this->_tpl_vars['titleLBL']; ?>
</td>
    <td>
    	<input class="text" name="title" size='20' maxlength='80' value='<?php echo $this->_tpl_vars['title']; ?>
'>
    </td>
</tr>
<?php if ($this->_tpl_vars['isRefreshable']): ?>
<tr>
    <td scope='row'>
        <?php echo $this->_tpl_vars['autoRefresh']; ?>

    </td>
    <td>
        <select name='autoRefresh'>
            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['autoRefreshOptions'],'selected' => $this->_tpl_vars['autoRefreshSelect']), $this);?>

        </select>
    </td>
</tr>
<?php endif; ?>
<tr>
    <td scope='row'><?php echo $this->_tpl_vars['urlLBL']; ?>
</td>
    <td>
    	<input class="text" name="url" size='20' maxlength='255' value='<?php echo $this->_tpl_vars['url']; ?>
'>
    </td>
</tr>
<tr>
    <td scope='row'><?php echo $this->_tpl_vars['heightLBL']; ?>
</td>
    <td>
    	<input class="text" name="height" size='20' maxlength='80' value='<?php echo $this->_tpl_vars['height']; ?>
'>
    </td>
</tr>
<tr>
    <td align="right" colspan="2">
        <input type='submit' class='button' value='<?php echo $this->_tpl_vars['saveLBL']; ?>
'>
   	</td>
</tr>
</table>
</form>
</div>