<div class="flow_elements">
    <div class="lbl_first"><label>Mobile No: </label></div><div class="lbl_last"><strong>{$data.contact_no}</strong></div>
</div>
<div class="flow_elements">
    <div class="lbl_first"><label>First Name: </label></div><div class="lbl_last"><strong>{$data.firstname}</strong></div>
</div>
<div class="flow_elements">
    <div class="lbl_first"><label>Last Name: </label></div><div class="lbl_last"><strong>{$data.lastname}</strong></div>
</div>
<div class="flow_elements">
    <div class="lbl_first"><label>Email: </label></div><div class="lbl_last"><strong>{$data.email}</strong></div>
</div>
<input type="hidden" name="order_id" value="{$data.order_id}" />
<input type="hidden" name="cust_id" value="{$data.id}" />
{if isset($data.category_id)}
    <input type="hidden" name="old_category_id" value="{$data.category_id}" />
{/if}