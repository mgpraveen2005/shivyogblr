<table class="table-list">
    <tr><th>Status</th><th>Old Reg No</th><th>New Reg No</th><th>Amount</th>
    <th>Remarks</th><th>Date/Time</th></tr>
    {foreach from=$order_history item=order}
        <tr>
            <td>
                {if $order['order_status'] == 1}
                    Upgraded
                {else if $order['order_status'] == 2}
                    Cancelled
                {else if $order['order_status'] == 3}
                    Name Changed
                {/if}
            </td>
            <td>{$order['old_reg_no']}</td>
            <td>{$order['new_reg_no']}</td>
            <td>{$order['amount']}</td>
            <td>{$order['remarks']}</td>
            <td>{$order['modified_date']|date_format:'%d-%m-%Y %H:%M:%S'}</td>
        </tr>
    {/foreach}
</table>