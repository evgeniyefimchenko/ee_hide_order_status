{$get_additional_statuses=true}
{$order_status_descr=$smarty.const.STATUSES_ORDER|fn_get_simple_statuses:$get_additional_statuses:true}
{$extra_status=$config.current_url|escape:"url"}
{if "MULTIVENDOR"|fn_allowed_for}
	{$notify_vendor=true}
{else}
	{$notify_vendor=false}
{/if}

{$statuses = []}
{$order_statuses=$smarty.const.STATUSES_ORDER|fn_get_statuses:$statuses:$get_additional_statuses:true}
{$order_statuses = $order_statuses|fn_ee_hide_order_status_change_status:$order_info.status}
{$order_status_descr = $order_status_descr|fn_ee_hide_order_status_change_status:$order_info.status}	
{include file="common/select_popup.tpl" suffix="o" id=$order_info.order_id status=$order_info.status items_status=$order_status_descr update_controller="orders" notify=true notify_department=true notify_vendor=$notify_vendor status_target_id="content_downloads" extra="&return_url=`$extra_status`" statuses=$order_statuses popup_additional_class="dropleft" text_wrap=true}
