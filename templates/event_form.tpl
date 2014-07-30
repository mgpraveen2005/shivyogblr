<html>
    <head>
        <title>{$pagetitle}</title>
        {include file='header.tpl'}
    </head>
    <body>
        {include file='navbar.tpl'}
        <div class="container">
            <div class="col-md-12 white-box">
                <h1>Event</h1>
                <div class="col-xs-12 article-content">
                    <form action="/admin/event" method="POST">
                        <table>
                            <tr>
                                <th>Event Name : </th>
                                <td>
                                    <input type="hidden" name='event_id' value="{$data['id']}"/>
                                    <input type="text" name='event_name' value="{$data['event_name']}"/>
                                </td>
                            </tr>
                            <tr>
                                <th>Start Date : </th>
                                <td><input type="text" name="start_date" value="{$data['start_date']}"/>
                                </td>
                            </tr>
                            <tr>
                                <th>End Date : </th>
                                <td><input type="text" name="end_date" value="{$data['end_date']}"/>
                                </td>
                            </tr>
                            <tr>
                                <th>Event Type : </th>
                                <td>
                                    {if $data['event_type']}
                                        <input type="checkbox" name="event_type" value="1" checked="checked">Paid
                                    {else}
                                        <input type="checkbox" name="event_type" value="1">Paid
                                    {/if}
                                </td>
                            </tr>
                            <tr>
                                <th>Event Code : </th>
                                <td><input type="text" name="event_slug" value="{$data['event_slug']}"/></td>
                            </tr>
                            <tr>
                                <th>Event Venue : </th>
                                <td><input type="text" name="venue" value="{$data['venue']}"/></td>
                            </tr>
                            <tr>
                                <th>Address : </th>
                                <td><input type="text" name="address" value="{$data['address']}"/></td>
                            </tr>
                            <tr>
                                <th>City : </th>
                                <td><input type="text" name="city" value="{$data['city']}"/></td>
                            </tr>
                            <tr>
                                <th>Country : </th>
                                <td><input type="text" name="country" value="{$data['country']}"/></td>
                            </tr>
                        </table>
                        <table>
                            <th>Category</th><th>Category Code</th><th>Amount</th>
                            {foreach from=$category key=i item=v}
                            <tr>
                                <td><input type="hidden" name="category_id_{$i}" value="{$data['id']}"/><input type="text" name="category_name_{$i}" value="{$data['category_name']}"/></td>
                                <td><input type="text" name="category_slug_{$i}" value="{$data['category_slug']}"/></td>
                                <td><input type="text" name="amount_{$i}" value="{$data['amount']}"/></td>
                            </tr>
                            {/foreach}
                            <tr>
                                <td><button>Save</button></td>
                                <td><a href="/admin/events">Cancel</a></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>           
        {include file='footer.tpl'}
    </body>
</html>