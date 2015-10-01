<?php /* Smarty version 2.6.11, created on 2015-09-04 17:13:37
         compiled from themes/Suite7/tpls/_globalLinks.tpl */ ?>
<div id="alert-nav" class="dropdown nav navbar-nav navbar-right">
    <button class="alertsButton dropdown-toggle btn btn-success" data-toggle="dropdown" aria-expanded="false" onclick="$('#alert-nav #alerts').toggleClass('hidden');">
                   <span class="badge"><span class="alert_count" >0</span> <span class="glyphicon glyphicon-comment"></span>
    </button>
    <div id="alerts" class="dropdown-menu hidden" role="menu"><?php echo $this->_tpl_vars['APP']['LBL_EMAIL_ERROR_VIEW_RAW_SOURCE']; ?>
</div>
</div>
<div id="globalLinks">
        <ul id="drop-nav">
        <li> <a href="index.php?module=Users&action=EditView&record=<?php echo $this->_tpl_vars['CURRENT_USER_ID']; ?>
"><img src="index.php?entryPoint=getImage&imageName=cog.png" class="iconed"> <?php echo $this->_tpl_vars['CURRENT_USER']; ?>
</a>
            <ul>
                <?php $_from = $this->_tpl_vars['GCLS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['gcl'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['gcl']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['gcl_key'] => $this->_tpl_vars['GCL']):
        $this->_foreach['gcl']['iteration']++;
?>
                    <li>
                        <a id="<?php echo $this->_tpl_vars['gcl_key']; ?>
_link" href="<?php echo $this->_tpl_vars['GCL']['URL']; ?>
"<?php if (! empty ( $this->_tpl_vars['GCL']['ONCLICK'] )): ?> onclick="<?php echo $this->_tpl_vars['GCL']['ONCLICK']; ?>
"<?php endif; ?>><?php echo $this->_tpl_vars['GCL']['LABEL']; ?>
</a>
                    </li>
                <?php endforeach; endif; unset($_from); ?>
                <li><a id="logout_link" href='<?php echo $this->_tpl_vars['LOGOUT_LINK']; ?>
' class='utilsLink'><?php echo $this->_tpl_vars['LOGOUT_LABEL']; ?>
</a></li>
            </ul>

        </li>
    </ul>

    <ul id="quick-nav">
        <li> <a href="#"><img src="themes/Suite7/images/quickcreate.png" class="quick_create"></a>
            <ul>
                <li><a href="index.php?module=Accounts&action=EditView&return_module=Accounts&return_action=DetailView"><?php echo $this->_tpl_vars['APP']['LBL_QUICK_ACCOUNT']; ?>
</a></li>
                <li><a href="index.php?module=Contacts&action=EditView&return_module=Contacts&return_action=DetailView"><?php echo $this->_tpl_vars['APP']['LBL_QUICK_CONTACT']; ?>
</a></li>
                <li><a href="index.php?module=Opportunities&action=EditView&return_module=Opportunities&return_action=DetailView"><?php echo $this->_tpl_vars['APP']['LBL_QUICK_OPPORTUNITY']; ?>
</a></li>
                <li><a href="index.php?module=Leads&action=EditView&return_module=Leads&return_action=DetailView"><?php echo $this->_tpl_vars['APP']['LBL_QUICK_LEAD']; ?>
</a></li>
                <li><a href="index.php?module=Documents&action=EditView&return_module=Documents&return_action=DetailView"><?php echo $this->_tpl_vars['APP']['LBL_QUICK_DOCUMENT']; ?>
</a></li>
                <li><a href="index.php?module=Calls&action=EditView&return_module=Calls&return_action=DetailView"><?php echo $this->_tpl_vars['APP']['LBL_QUICK_CALL']; ?>
</a></li>
                <li><a href="index.php?module=Tasks&action=EditView&return_module=Tasks&return_action=DetailView"><?php echo $this->_tpl_vars['APP']['LBL_QUICK_TASK']; ?>
</a></li>
            </ul>

        </li>
    </ul>
</div>