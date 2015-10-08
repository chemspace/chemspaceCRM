
{if empty($fields.description.value)}
{assign var="value" value=$fields.description.default_value }
{else}
{assign var="value" value=$fields.description.value }
{/if}  




<textarea  id='{$fields.description.name}' name='{$fields.description.name}'
rows="2" 
cols="32" 
title='' tabindex="1" 
 >{$value}</textarea>


