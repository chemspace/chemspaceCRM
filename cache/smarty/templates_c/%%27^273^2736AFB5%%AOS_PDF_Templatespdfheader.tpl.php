<?php /* Smarty version 2.6.11, created on 2015-09-02 19:01:28
         compiled from cache/modules/Import/AOS_PDF_Templatespdfheader.tpl */ ?>

<?php if (empty ( $this->_tpl_vars['fields']['pdfheader']['value'] )):  $this->assign('value', $this->_tpl_vars['fields']['pdfheader']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['pdfheader']['value']);  endif; ?>  




<textarea  id='<?php echo $this->_tpl_vars['fields']['pdfheader']['name']; ?>
' name='<?php echo $this->_tpl_vars['fields']['pdfheader']['name']; ?>
'
rows="4" 
cols="20" 
title='' tabindex="1" 
 ><?php echo $this->_tpl_vars['value']; ?>
</textarea>

