{$fields = "O"|fn_ee_hide_order_status_get_all_order_statuses}
{$selected_fields = "0"|fn_ee_hide_order_status_get_save_order_statuses_with_name}
<form id="form" action="https://son-da-drema.ru/adminsonda.php" method="post" name="product_update_form" class="form-horizontal form-edit cm-disable-empty-files cm-processed-form cm-check-changes" enctype="multipart/form-data">	
	{foreach from=$fields item="field_name" key="field_id"}
		<div class="control-group">
			<label class="control-label" style="font-weight: 800; font-size: x-large;" for='field_{$field_id}'>{$field_name}:</label>
			{include file="common/selectable_box.tpl" addon="ee_hide_order_status" name="field_`$field_id`" id="field_`$field_id`" fields=$fields selected_fields=$selected_fields.$field_id}
		</div>
	{/foreach}
</form>