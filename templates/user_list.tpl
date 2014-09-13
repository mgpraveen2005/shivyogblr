<html>
    <head>
        <title>Manage Users | Shivyog Bangalore</title>
        {include file='header.tpl'}
    </head>
    <body>
        {include file='navbar.tpl'}
        <div class="container content-wrap">
            <div class="block">
                <ul class="horizontal-list">
                    <header class="col-xs-12 no-pad">
                        <h2 class="col-md-4 block-title">User Management</h2>
                        {include file='admin-menu.tpl'}
                    </header>
                </ul>
            </div>
            <div class="col-md-12 white-box">
                <h1>Users</h1>                
                <div class="col-xs-12 article-content">
                    <a href="/admin/user" class="ok-btn">Add</a><br>
                    <table class="table-list">
                        <thead>
                            <tr>
                                <td>Email</td>
                                <td>Name</td>
                                <td>Group</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach from=$users item=user}
                            <tr>
                                <td>{$user['email']}</td>
                                <td>{$user['display_name']}</td>
                                <td>{$user['group_name']}</td>
                                <td>{if $user['is_enabled']}
                                        Enabled
                                    {else}
                                        Disabled
                                    {/if}
                                </td>
                                <td><a href="/admin/user/{$user['id']}">Edit</a></td>
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