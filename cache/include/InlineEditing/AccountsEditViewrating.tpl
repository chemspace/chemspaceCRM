
{if strlen($fields.rating.value) <= 0}
{assign var="value" value=$fields.rating.default_value }
{else}
{assign var="value" value=$fields.rating.value }
{/if}  
<input type='text' name='{$fields.rating.name}' 
    id='{$fields.rating.name}' size='30' 
    maxlength='100' 
    value='{$value}' title=''  tabindex='1'      >