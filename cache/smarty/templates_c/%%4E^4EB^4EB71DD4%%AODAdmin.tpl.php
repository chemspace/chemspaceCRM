<?php /* Smarty version 2.6.11, created on 2015-09-03 15:53:13
         compiled from custom/modules/Administration/AODAdmin.tpl */ ?>


<form id="ConfigureSettings" name="ConfigureSettings" enctype='multipart/form-data' method="POST"
      action="index.php?module=Administration&action=AODAdmin&do=save">

    <span class='error'><?php echo $this->_tpl_vars['error']['main']; ?>
</span>

    <table width="100%" cellpadding="0" cellspacing="0" border="0" class="actionsContainer">
        <tr>
            <td>
                <?php echo $this->_tpl_vars['BUTTONS']; ?>

                 </td>
        </tr>
    </table>

    <table width="100%" border="0" cellspacing="1" cellpadding="0" class="edit view">
        <tr><th align="left" scope="row" colspan="4"><h4><?php echo $this->_tpl_vars['MOD']['LBL_GENERAL_SETTINGS']; ?>
</h4></th>
        </tr>
        <tr>
            <td  scope="row" width="200"><?php echo $this->_tpl_vars['MOD']['LBL_AOD_ENABLE']; ?>
: </td>
            <td  >
                <input type='checkbox' id='enable_aod' name='enable_aod' <?php if ($this->_tpl_vars['config']['enable_aod']): ?>checked='checked'<?php endif; ?> >
            </td>

        </tr>
    </table>
    <div style="padding-top: 2px;">
        <?php echo $this->_tpl_vars['BUTTONS']; ?>

    </div>
    <?php echo $this->_tpl_vars['JAVASCRIPT']; ?>

</form>