
{if strlen($fields.jjwg_maps_lng_c.value) <= 0}
{assign var="value" value=$fields.jjwg_maps_lng_c.default_value }
{else}
{assign var="value" value=$fields.jjwg_maps_lng_c.value }
{/if}  
<input type='text' name='{$fields.jjwg_maps_lng_c.name}'
id='{$fields.jjwg_maps_lng_c.name}'
size='30'
maxlength='11'value='{sugar_number_format var=$value  }'
title='Longitude'
tabindex='1'
 
>