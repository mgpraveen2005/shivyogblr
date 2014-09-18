<html>
    <head>
        <title>Upgrades | Shivyog Bangalore</title>
        {include file='header.tpl'}
    </head>
    <body>
        {include file='navbar.tpl'}
        <div class="container content-wrap">
            <div class="block">
                <ul class="horizontal-list">
                    <header class="col-xs-12 no-pad">
                        <h2 class="col-md-4 block-title">Upgrades/Cancellations</h2>
                        {include file='admin-menu.tpl'}
                    </header>
                </ul>
            </div>
            <div class="col-md-12 white-box">
                <h1>Upgrades/Cancellations</h1>
                <div class="col-xs-12 article-content">
                    <a href="/admin/upgrade" class="ok-btn">Add</a><br>
                    <table class="table-list">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Mobile</td>
                                <td>Old Seat</td>
                                <td>New Seat</td>
                                <td>Order Status</td>
                                <td>Date</td>
                                <td>Remarks</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach from=$orders item=order}
                                <tr>
                                    <td>{$order['firstname']} {$order['lastname']}</td>
                                    <td>{$order['contact_no']}</td>
                                    <td>{$order['old_reg_no']}</td>
                                    <td>{$order['new_reg_no']}</td>
                                    <td>
                                        {if $order['order_status'] == 1}
                                            Upgrade
                                        {else if $order['order_status'] == 2}
                                            Cancelled
                                        {/if}
                                    </td>
                                    <td>{$order['modified_date']|date_format:'%d-%m-%Y %H:%M:%S'}</td>
                                    <td>{$order['remarks']}</td>
                                    <td><a target="_blank" href="/admin/register/{$order['order_id']}">Edit</a></td>
                                </tr>
                            {/foreach}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {include file='footer.tpl'}
    </body>
</html>