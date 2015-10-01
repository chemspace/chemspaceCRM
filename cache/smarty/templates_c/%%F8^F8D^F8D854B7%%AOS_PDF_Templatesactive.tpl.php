<?php /* Smarty version 2.6.11, created on 2015-09-02 19:01:28
         compiled from cache/modules/Import/AOS_PDF_Templatesactive.tpl */ ?>

<?php if (strval ( $this->_tpl_vars['fields']['active']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['active']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['active']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'CHECKED');  else:  $this->assign('checked', "");  endif; ?>
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['active']['name']; ?>
" value="0"> 
<input type="checkbox" id="<?php echo $this->_tpl_vars['fields']['active']['name']; ?>
" 
name="<?php echo $this->_tpl_vars['fields']['active']['name']; ?>
" 
value="1" title='' tabindex="1" <?php echo $this->_tpl_vars['checked']; ?>
 >