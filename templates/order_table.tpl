<table class="table-list">
    <thead>
        <tr>
            <td>Reg-Date</td>
            <td>Name</td>
            <td>Email</td>
            <td>Mobile</td>
            <td>Category</td>
            <td>Reg-No</td>
            <td>Reg-Center</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        {if !empty($orders)}
            {foreach from=$orders item=order}
                <tr>
                    <td>{$order['created_date']|date_format:'%d-%m-%Y %H:%M:%S'}</td>
                    <td>{$order['firstname']} {$order['lastname']}</td>
                    <td>{$order['email']}</td>
                    <td>{$order['contact_no']}</td>
                    <td>{$order['category_name']}</td>
                    <td>{$order['reg_no']}</td>
                    <td>{$order['display_name']}</td>
                    <td>
                        <a href="/admin/register/{$order['id']}">
                            {if $capability > 5}
                                Edit
                            {else}
                                View
                            {/if}
                        </a>
                    </td>
                </tr>
            {/foreach}
        {else}
            <tr><td colspan="8" align="center" class="sy_error">No records</td></tr>
        {/if}
    </tbody>
</table>