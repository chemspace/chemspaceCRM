<?php /* Smarty version 2.6.11, created on 2015-09-02 12:00:55
         compiled from custom/modules/Administration/AOSAdmin.tpl */ ?>


<form id="ConfigureSettings" name="ConfigureSettings" enctype='multipart/form-data' method="POST"
      action="index.php?module=Administration&action=AOSAdmin&do=save">

    <span class='error'><?php echo $this->_tpl_vars['error']['main']; ?>
</span>

    <table width="100%" cellpadding="0" cellspacing="1" border="0" class="actionsContainer">
        <tr>
            <td>
                <?php echo $this->_tpl_vars['BUTTONS']; ?>

            </td>
        </tr>
    </table>

    <table width="100%" border="0" cellspacing="1" cellpadding="0" class="edit view">
        <tr><th align="left" scope="row" colspan="4"><h4><?php echo $this->_tpl_vars['MOD']['LBL_AOS_ADMIN_CONTRACT_SETTINGS']; ?>
</h4></th>
        <tr>
            <td  scope="row" width="200"><?php echo $this->_tpl_vars['MOD']['LBL_AOS_ADMIN_CONTRACT_RENEWAL_REMINDER']; ?>
: </td>
            <td  >
                <input type='text' size='10' name='aos_contracts_renewalReminderPeriod' value='<?php echo $this->_tpl_vars['config']['aos']['contracts']['renewalReminderPeriod']; ?>
' > <span><?php echo $this->_tpl_vars['MOD']['LBL_AOS_DAYS']; ?>
</span>
            </td>
        </tr>
    </table>


    <table width="100%" border="0" cellspacing="1" cellpadding="0" class="edit view">
        <tr><th align="left" scope="row" colspan="4"><h4><?php echo $this->_tpl_vars['MOD']['LBL_AOS_ADMIN_INVOICE_SETTINGS']; ?>
</h4></th>
        </tr>
        <tr>
            <td  scope="row" width="200"><?php echo $this->_tpl_vars['MOD']['LBL_AOS_ADMIN_INITIAL_INVOICE_NUMBER']; ?>
: </td>
            <td  >
                <input type='text' size='10' name='aos_invoices_initialNumber' value='<?php echo $this->_tpl_vars['config']['aos']['invoices']['initialNumber']; ?>
' >
            </td>
        </tr>
    </table>

    <table width="100%" border="0" cellspacing="1" cellpadding="0" class="edit view">
        <tr><th align="left" scope="row" colspan="4"><h4><?php echo $this->_tpl_vars['MOD']['LBL_AOS_ADMIN_QUOTE_SETTINGS']; ?>
</h4></th>
        </tr>
        <tr>
            <td  scope="row" width="200"><?php echo $this->_tpl_vars['MOD']['LBL_AOS_ADMIN_INITIAL_QUOTE_NUMBER']; ?>
: </td>
            <td  >
                <input type='text' size='10' name='aos_quotes_initialNumber' value='<?php echo $this->_tpl_vars['config']['aos']['quotes']['initialNumber']; ?>
' >
            </td>
        </tr>
    </table>

    <table width="100%" border="0" cellspacing="1" cellpadding="0" class="edit view">
        <tr><th align="left" scope="row" colspan="4"><h4><?php echo $this->_tpl_vars['MOD']['LBL_AOS_ADMIN_LINE_ITEM_SETTINGS']; ?>
</h4></th>
        </tr>
        <tr>
            <td  scope="row" width="200"><?php echo $this->_tpl_vars['MOD']['LBL_AOS_ADMIN_ENABLE_LINE_ITEM_GROUPS']; ?>
: </td>
            <?php if (isset ( $this->_tpl_vars['config']['aos']['lineItems']['enableGroups'] ) && $this->_tpl_vars['config']['aos']['lineItems']['enableGroups'] != 'true'): ?>
                <?php $this->assign('lineItems_enableGroups', ''); ?>
            <?php else: ?>
                <?php $this->assign('lineItems_enableGroups', 'CHECKED'); ?>
            <?php endif; ?>
            <td>
                <input type='hidden' name='aos_lineItems_enableGroups' value='false'>
                <input name='aos_lineItems_enableGroups'  type="checkbox" value="true" <?php echo $this->_tpl_vars['lineItems_enableGroups']; ?>
>
            </td>

            <td  scope="row" width="200"><?php echo $this->_tpl_vars['MOD']['LBL_AOS_ADMIN_ENABLE_LINE_ITEM_TOTAL_TAX']; ?>
: </td>
            <?php if (isset ( $this->_tpl_vars['config']['aos']['lineItems']['totalTax'] ) && $this->_tpl_vars['config']['aos']['lineItems']['totalTax'] != 'true'): ?>
                <?php $this->assign('lineItems_totalTax', ''); ?>
            <?php else: ?>
                <?php $this->assign('lineItems_totalTax', 'CHECKED'); ?>
            <?php endif; ?>
            <td>
                <input type='hidden' name='aos.lineItems.totalTax' value='false'>
                <input name='aos.lineItems.totalTax'  type="checkbox" value="true" <?php echo $this->_tpl_vars['lineItems_totalTax']; ?>
>
            </td>
        </tr>
    </table>

    <div style="padding-top: 2px;">
        <?php echo $this->_tpl_vars['BUTTONS']; ?>

    </div>
    <?php echo $this->_tpl_vars['JAVASCRIPT']; ?>

</form>