<html>
    <head>
        <title>{$pagetitle}</title>
        {include file='header.tpl'}
    </head>
    <body>
        {include file='navbar.tpl'}
        <div class="container">
            <div class="col-md-12 white-box">
                <h1>Events</h1>
                <div class="col-xs-12 article-content">
                    <a href="/admin/event">Add</a>
                    <table border='1'>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Start Date</td>
                                <td>End Date</td>
                                <td>City</td>
                                <td>Event Type</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach from=$events item=event}
                            <tr>
                                <td>{$event['event_name']}</td>
                                <td>{$event['start_date']}</td>
                                <td>{$event['end_date']}</td>
                                <td>{$event['city']}</td>
                                <td>{$event['event_type']}</td>
                                <td><a href="/admin/event/{$event['id']}">Edit</a></td>
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