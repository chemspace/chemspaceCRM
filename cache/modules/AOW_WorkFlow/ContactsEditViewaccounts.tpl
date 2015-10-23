
<input type="text" name="{$fields.accounts.name}" class="sqsEnabled" tabindex="1" id="{$fields.accounts.name}" size="" value="{$fields.accounts.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.accounts.id_name}" 
	id="{$fields.accounts.id_name}" 
	value="{$fields.accounts_id.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.accounts.name}" id="btn_{$fields.accounts.name}" tabindex="1" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_ACCOUNTS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_ACCOUNTS_LABEL"}"
onclick='open_popup(
    "{$fields.accounts.module}", 
	600, 
	400, 
	"", 
	true, 
	false, 
	{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":{/literal}"{$fields.accounts.id_name}"{literal},"name":{/literal}"{$fields.accounts.name}"{literal}}}{/literal}, 
	"single", 
	true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.accounts.name}" id="btn_clr_{$fields.accounts.name}" tabindex="1" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_ACCOUNTS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.accounts.name}', '{$fields.accounts.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_ACCOUNTS_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.accounts.name}']) != 'undefined'",
		enableQS
);
</script>