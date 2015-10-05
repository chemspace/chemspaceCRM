
{if strlen($fields.jjwg_maps_geocode_status_c.value) <= 0}
{assign var="value" value=$fields.jjwg_maps_geocode_status_c.default_value }
{else}
{assign var="value" value=$fields.jjwg_maps_geocode_status_c.value }
{/if}  
<input type='text' name='{$fields.jjwg_maps_geocode_status_c.name}' 
    id='{$fields.jjwg_maps_geocode_status_c.name}' size='30' 
    maxlength='255' 
    value='{$value}' title='Geocode Status'  tabindex='1'      >