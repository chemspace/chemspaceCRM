
{if strlen($fields.cs_contact_id_c.value) <= 0}
{assign var="value" value=$fields.cs_contact_id_c.default_value }
{else}
{assign var="value" value=$fields.cs_contact_id_c.value }
{/if}  
<input type='text' name='{$fields.cs_contact_id_c.name}' 
id='{$fields.cs_contact_id_c.name}' size='30' maxlength='20' value='{sugar_number_format precision=0 var=$value}' title='' tabindex='1'    >