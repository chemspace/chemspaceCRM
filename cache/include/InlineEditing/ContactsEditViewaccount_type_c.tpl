
<input type="text" name="{$fields.account_type_c.name}" class="sqsEnabled" tabindex="1" id="{$fields.account_type_c.name}" size="" value="{$fields.account_type_c.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.account_type_c.id_name}" 
	id="{$fields.account_type_c.id_name}" 
	value="{$fields.account_id_c.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.account_type_c.name}" id="btn_{$fields.account_type_c.name}" tabindex="1" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_ACCOUNTS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_ACCOUNTS_LABEL"}"
onclick='open_popup(
    "{$fields.account_type_c.module}", 
	600, 
	400, 
	"", 
	true, 
	false, 
	{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":{/literal}"{$fields.account_type_c.id_name}"{literal},"name":{/literal}"{$fields.account_type_c.name}"{literal}}}{/literal}, 
	"single", 
	true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.account_type_c.name}" id="btn_clr_{$fields.account_type_c.name}" tabindex="1" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_ACCOUNTS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.account_type_c.name}', '{$fields.account_type_c.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_ACCOUNTS_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.account_type_c.name}']) != 'undefined'",
		enableQS
);
</script>