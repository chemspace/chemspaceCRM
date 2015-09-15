<?php /* Smarty version 2.6.11, created on 2015-09-03 12:59:15
         compiled from custom/modules/Administration/AOPAdmin.tpl */ ?>


<form id="ConfigureSettings" name="ConfigureSettings" enctype='multipart/form-data' method="POST"
      action="index.php?module=Administration&action=AOPAdmin&do=save">

    <span class='error'><?php echo $this->_tpl_vars['error']['main']; ?>
</span>

    <table width="100%" cellpadding="0" cellspacing="0" border="0" class="actionsContainer">
        <tr>
            <td>
                <?php echo $this->_tpl_vars['BUTTONS']; ?>

                 </td>
        </tr>
    </table>

    <script type="text/javascript">
        <?php echo '
        $(function() {
            $(\'#enable_aop\').change(function (){

                if($(\'#enable_aop\').is(":checked")){
                    $(\'#email_settings\').show();
                    $(\'#distribution_settings\').show();
                    $(\'#enable_portal_row\').show();
                }else{
                    $(\'#enable_portal\').attr(\'checked\', false);
                    removeFromValidate(\'ConfigureSettings\',\'joomla_url\');
                    $(\'#email_settings\').hide();
                    $(\'#distribution_settings\').hide();
                    $(\'#enable_portal_row\').hide();
                    $(\'#enable_portal\').change();
                }
            });
            $(\'#enable_aop\').change();
            $(\'#enable_portal\').change(function (){
                if($(\'#enable_portal\').is(":checked") && $(\'#enable_aop\').is(":checked")){
                    addToValidate(\'ConfigureSettings\',\'joomla_url\',\'text\',true,"';  echo $this->_tpl_vars['MOD']['LBL_AOP_JOOMLA_URL'];  echo '");
                    $(\'#joomla_url_row\').show();
                }else{
                    removeFromValidate(\'ConfigureSettings\',\'joomla_url\');
                    $(\'#joomla_url_row\').hide();
                }
            });
            $(\'#enable_portal\').change();
        });
        '; ?>

    </script>

    <table width="100%" border="0" cellspacing="1" cellpadding="0" class="edit view">
        <tr><th align="left" scope="row" colspan="4"><h4><?php echo $this->_tpl_vars['MOD']['LBL_AOP_JOOMLA_SETTINGS']; ?>
</h4></th>
        </tr>
        <tr>
            <td  scope="row" width="200"><?php echo $this->_tpl_vars['MOD']['LBL_AOP_ENABLE_AOP']; ?>
: </td>
            <td  >
                <input type='checkbox' id='enable_aop' name='enable_aop' <?php if ($this->_tpl_vars['config']['enable_aop']): ?>checked='checked'<?php endif; ?> >
            </td>

        </tr>
        <tr id="enable_portal_row">
            <td  scope="row" width="200"><?php echo $this->_tpl_vars['MOD']['LBL_AOP_ENABLE_PORTAL']; ?>
: </td>
            <td  >
                <input type='checkbox' id='enable_portal' name='enable_portal' <?php if ($this->_tpl_vars['config']['enable_portal']): ?>checked='checked'<?php endif; ?> >
            </td>

        </tr>
        <tr id='joomla_url_row'>
            <td  scope="row" width="200"><?php echo $this->_tpl_vars['MOD']['LBL_AOP_JOOMLA_URL']; ?>
: </td>
            <td  >
                <input type='text' name='joomla_url' value='<?php echo $this->_tpl_vars['config']['joomla_url']; ?>
' >
            </td>

        </tr>
        <!--<tr>
            <td  scope="row" width="200"><?php echo $this->_tpl_vars['MOD']['LBL_AOP_JOOMLA_ACCESS_KEY']; ?>
: </td>
            <td  >
                <input type='text' size='20' name='joomla_access_key' value='<?php echo $this->_tpl_vars['config']['joomla_access_key']; ?>
' >
            </td>
        </tr>-->
    </table>

    <table id='distribution_settings' width="100%" border="0" cellspacing="1" cellpadding="0" class="edit view">
        <tr><th align="left" scope="row" colspan="4"><h4><?php echo $this->_tpl_vars['MOD']['LBL_AOP_CASE_ASSIGNMENT']; ?>
</h4></th>
        </tr>
        <tr>
            <td  scope="row" width="200"><?php echo $this->_tpl_vars['MOD']['LBL_AOP_DISTRIBUTION_METHOD']; ?>
: </td>
            <td  >
                <select id='distribution_method_select' name='distribution_method' tabindex='241'><?php echo $this->_tpl_vars['DISTRIBUTION_METHOD']; ?>
</select>
            </td>
        </tr>
        <tr id="distribution_options_row">
            <td  scope="row" width="200"><?php echo $this->_tpl_vars['MOD']['LBL_AOP_ASSIGNMENT_OPTIONS']; ?>
: </td>
            <td><?php echo $this->_tpl_vars['DISTRIBUTION_OPTIONS']; ?>
</td>
        </tr>
        <tr id="distribution_user_row">
            <td  scope="row" width="200"><?php echo $this->_tpl_vars['MOD']['LBL_AOP_ASSIGNMENT_USER']; ?>
: </td>
            <td  >
                <input type="text" name="distribution_user_name" class="sqsEnabled" tabindex="0" id="distribution_user_name" size="" value="<?php echo $this->_tpl_vars['distribution_user_name']; ?>
" title='' autocomplete="off"  	 >
                <input type="hidden" name="distribution_user_id" id="distribution_user_id" value="<?php echo $this->_tpl_vars['config']['distribution_user_id']; ?>
">
<span class="id-ff multiple">
<button type="button" name="btn_distribution_user_name" id="btn_distribution_user_name" tabindex="0" title="Select User" class="button firstChild" value="Select User"
        <?php echo '
        onclick=\'open_popup(
                "Users",
                600,
                400,
                "",
                true,
                false,
        {"call_back_function":"set_return","form_name":"ConfigureSettings","field_to_name_array":{"id":"distribution_user_id","last_name":"distribution_user_name"}},
                "single",
                true
                );\' >
    '; ?>

    <img src="themes/default/images/id-ff-select.png"></button><button type="button" name="btn_clr_distribution_user_name" id="btn_clr_distribution_user_name" tabindex="0" title="Clear User"  class="button lastChild"
                                                                                                onclick="SUGAR.clearRelateField(this.form, 'distribution_user_name', 'distribution_user_id');"  value="Clear User" ><img src="themes/default/images/id-ff-clear.png"></button>
</span>
                <script type="text/javascript">
                    <?php echo '
                    if(typeof sqs_objects == \'undefined\'){
                        var sqs_objects = new Array;
                    }
                    sqs_objects[\'ConfigureSettings_distribution_user_name\']={
                        "form":"ConfigureSettings",
                        "method":"get_user_array",
                        "field_list":["user_name","id"],
                        "populate_list":["distribution_user_name","distribution_user_id"],
                        "required_list":["distribution_user_id"],
                        "conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],
                        "limit":"30",
                        "no_match_text":"No Match"};
                    SUGAR.util.doWhen(
                            "typeof(sqs_objects) != \'undefined\' && typeof(sqs_objects[\'ConfigureSettings_distribution_user_name\']) != \'undefined\'",
                            enableQS
                    );
                    '; ?>

                </script>

            </td>
        </tr>
    </table>
    <table id='case_status_settings' width="100%" border="0" cellspacing="1" cellpadding="0" class="edit view">
        <tr>
            <th align="left" scope="row" colspan="4"><h4><?php echo $this->_tpl_vars['MOD']['LBL_AOP_CASE_STATUS_SETTINGS']; ?>
</h4></th>
        </tr>
        <?php echo $this->_tpl_vars['currentStatuses']; ?>

        <tr><td><button type='button' id="addStatusButton"><?php echo $this->_tpl_vars['MOD']['LBL_AOP_ADD_STATUS']; ?>
</button></td></tr>
    </table>
    <table id='email_settings' width="100%" border="0" cellspacing="1" cellpadding="0" class="edit view">
        <tr><th align="left" scope="row" colspan="4"><h4><?php echo $this->_tpl_vars['MOD']['LBL_AOP_EMAIL_SETTINGS']; ?>
</h4></th>
        </tr>
        <tr>
            <td  scope="row" width="200"><?php echo $this->_tpl_vars['MOD']['LBL_SUPPORT_FROM_ADDRESS']; ?>
: </td>
            <td  >
                <input type="text" name="support_from_address" id="support_from_address" value="<?php echo $this->_tpl_vars['config']['support_from_address']; ?>
">
            </td>
        </tr>
        <tr>
            <td  scope="row" width="200"><?php echo $this->_tpl_vars['MOD']['LBL_SUPPORT_FROM_NAME']; ?>
: </td>
            <td  >
                <input type="text" name="support_from_name" id="support_from_name" value="<?php echo $this->_tpl_vars['config']['support_from_name']; ?>
">
            </td>
        </tr>
        <tr id="user_email_template_row">
            <td  scope="row" width="200"><?php echo $this->_tpl_vars['MOD']['LBL_AOP_USER_EMAIL_TEMPLATE']; ?>
: </td>
            <td  >
                <select id='user_email_template_id_select' name='user_email_template_id' onchange='show_edit_template_link(this);'><?php echo $this->_tpl_vars['USER_EMAIL_TEMPLATES']; ?>
</select>

                <a href='javascript:open_email_template_form("user_email_template_id")' ><?php echo $this->_tpl_vars['MOD']['LBL_CREATE_EMAIL_TEMPLATE']; ?>
</a>
                <span name='edit_template' id='user_email_template_id_edit_template_link' style='visibility: hidden;'>
                <a href='javascript:edit_email_template_form("user_email_template_id")' ><?php echo $this->_tpl_vars['MOD']['LBL_EDIT_EMAIL_TEMPLATE']; ?>
</a></span>
            </td>
        </tr>

        <tr id="contact_email_template_row">
            <td  scope="row" width="200"><?php echo $this->_tpl_vars['MOD']['LBL_AOP_CONTACT_EMAIL_TEMPLATE']; ?>
: </td>
            <td  >
                <select id='contact_email_template_id_select' name='contact_email_template_id' onchange='show_edit_template_link(this);'><?php echo $this->_tpl_vars['CONTACT_EMAIL_TEMPLATES']; ?>
</select>

                <a href='javascript:open_email_template_form("contact_email_template_id")' ><?php echo $this->_tpl_vars['MOD']['LBL_CREATE_EMAIL_TEMPLATE']; ?>
</a>
                <span name='edit_template' id='contact_email_template_id_edit_template_link' style='visibility: hidden;'>
                <a href='javascript:edit_email_template_form("contact_email_template_id")' ><?php echo $this->_tpl_vars['MOD']['LBL_EDIT_EMAIL_TEMPLATE']; ?>
</a></span>
            </td>
        </tr>
        <tr id="case_creation_email_template_row">
            <td  scope="row" width="200"><?php echo $this->_tpl_vars['MOD']['LBL_AOP_CASE_CREATION_EMAIL_TEMPLATE']; ?>
: </td>
            <td  >
                <select id='case_creation_email_template_id_select' name='case_creation_email_template_id' onchange='show_edit_template_link(this);'><?php echo $this->_tpl_vars['CREATION_EMAIL_TEMPLATES']; ?>
</select>

                <a href='javascript:open_email_template_form("case_creation_email_template_id")' ><?php echo $this->_tpl_vars['MOD']['LBL_CREATE_EMAIL_TEMPLATE']; ?>
</a>
                <span name='edit_template' id='case_creation_email_template_id_edit_template_link' style='visibility: hidden;'>
                <a href='javascript:edit_email_template_form("case_creation_email_template_id")' ><?php echo $this->_tpl_vars['MOD']['LBL_EDIT_EMAIL_TEMPLATE']; ?>
</a></span>
            </td>
        </tr>


        <tr id="case_closure_email_template_row">
            <td  scope="row" width="200"><?php echo $this->_tpl_vars['MOD']['LBL_AOP_CASE_CLOSURE_EMAIL_TEMPLATE']; ?>
: </td>
            <td  >
                <select id='case_closure_email_template_id_select' name='case_closure_email_template_id' onchange='show_edit_template_link(this);'><?php echo $this->_tpl_vars['CLOSURE_EMAIL_TEMPLATES']; ?>
</select>

                <a href='javascript:open_email_template_form("case_closure_email_template_id")' ><?php echo $this->_tpl_vars['MOD']['LBL_CREATE_EMAIL_TEMPLATE']; ?>
</a>
                <span name='edit_template' id='case_closure_email_template_id_edit_template_link' style='visibility: hidden;'>
                <a href='javascript:edit_email_template_form("case_closure_email_template_id")' ><?php echo $this->_tpl_vars['MOD']['LBL_EDIT_EMAIL_TEMPLATE']; ?>
</a></span>
            </td>
        </tr>

        <tr id="joomla_account_creation_email_template_row">
            <td  scope="row" width="200"><?php echo $this->_tpl_vars['MOD']['LBL_AOP_JOOMLA_ACCOUNT_CREATION_EMAIL_TEMPLATE']; ?>
: </td>
            <td  >
                <select id='joomla_account_creation_email_template_id_select' name='joomla_account_creation_email_template_id' onchange='show_edit_template_link(this);'><?php echo $this->_tpl_vars['JOOMLA_EMAIL_TEMPLATES']; ?>
</select>

                <a href='javascript:open_email_template_form("joomla_account_creation_email_template_id")' ><?php echo $this->_tpl_vars['MOD']['LBL_CREATE_EMAIL_TEMPLATE']; ?>
</a>
                <span name='edit_template' id='joomla_account_creation_email_template_id_edit_template_link' style='visibility: hidden;'>
                <a href='javascript:edit_email_template_form("joomla_account_creation_email_template_id")' ><?php echo $this->_tpl_vars['MOD']['LBL_EDIT_EMAIL_TEMPLATE']; ?>
</a></span>
            </td>
        </tr>

    </table>

    <div style="padding-top: 2px;">
        <?php echo $this->_tpl_vars['BUTTONS']; ?>

    </div>
    <?php echo $this->_tpl_vars['JAVASCRIPT']; ?>

</form>