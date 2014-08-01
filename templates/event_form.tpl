<html>
    <head>
        <title>{$pagetitle}</title>
        {include file='header.tpl'}
    </head>
    <body>
        {include file='navbar.tpl'}
        <div class="container content-wrap">
            <div class="col-md-12 white-box">
                <h1>Event</h1>
                <div class="col-xs-12 article-content">
                    <form action="/admin/event" method="POST">
                        <div class="flow_form">
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Event Name : </label></div>
                                    <div class="lbl_last">
                                        <input type="hidden" name='event_id' value="{$data['id']}"/>
                                        <input type="text" name='event_name' value="{$data['event_name']}"/>
                                    </div>
                                </div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Event Type : </label></div>
                                    <div class="lbl_last">
                                        {if $data['event_type']}
                                            <input type="checkbox" name="event_type" value="1" checked="checked">Paid
                                        {else}
                                            <input type="checkbox" name="event_type" value="1">Paid
                                        {/if}
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Start Date : </label></div>
                                    <div class="lbl_last"><input type="text" name="start_date" value="{$data['start_date']}"/>
                                    </div>
                                </div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>End Date : </label></div>
                                    <div class="lbl_last"><input type="text" name="end_date" value="{$data['end_date']}"/>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Event Code : </label></div>
                                    <div class="lbl_last"><input type="text" name="event_slug" value="{$data['event_slug']}"/></div>
                                </div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Event Venue : </label></div>
                                    <div class="lbl_last"><input type="text" name="venue" value="{$data['venue']}"/></div>
                                </div>
                            </div>
                            <div class="flow_elements">
                                <div class="lbl_first"><label>Address : </label></div>
                                <div class="lbl_last"><input type="text" name="address" value="{$data['address']}"/></div>
                            </div>
                            <div class="flow_elements">
                                <div class="lbl_first"><label>City : </label></div>
                                <div class="lbl_last"><input type="text" name="city" value="{$data['city']}"/></div>
                            </div>
                            <div class="flow_elements">
                                <div class="lbl_first"><label>Country : </label></div>
                                <div class="lbl_last"><input type="text" name="country" value="{$data['country']}"/></div>
                            </div>
                        </div>
                        <table class="table-list">
                            <th>Category</th><th>Category Code</th><th>Amount</th>
                            {foreach from=$category key=i item=v}
                                <tr>
                                    <td><input type="hidden" name="category_id_{$i}" value="{$v.id}"/><input type="text" name="category_name_{$i}" value="{$v.category_name}"/></td>
                                    <td><input type="text" name="category_slug_{$i}" value="{$v.category_slug}"/></td>
                                    <td><input type="text" name="amount_{$i}" value="{$v.amount}"/></td>
                                </tr>
                            {/foreach}
                        </table>
                        <div style="text-align:center;">
                            <button class="ok-btn">Save</button>
                            <a href="/admin/events" class="cancel-btn">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>           
        {include file='footer.tpl'}
    </body>
</html>