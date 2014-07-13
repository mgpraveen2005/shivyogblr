<html>
    <head>
        <title>www.sportskeeda.com</title>
        {include file='production/header.tpl'}
    </head>
    <body>
        {include file='navbar.tpl'}
        <div class="container">
            <div class="block">
                <ul class="horizontal-list">
                    <header class="col-xs-12 no-pad">
                        <h2 class="col-md-4 block-title">User Management</h2>
                        <ol class="col-md-8 breadcrumb">
                            <li><a href="/admin/users">Manage Users</a></li>
                            <li><a href="/admin/groups">Manage Groups</a></li>
                        </ol>
                    </header>
                </ul>
            </div>
            <div class="col-md-12 white-box">
                <h1>Users</h1>                
                <div class="col-xs-12 article-content">
                    <a href="/admin/user">Add</a>
                    <table border='1'>
                        <thead>
                            <tr>
                                <td>Email</td>
                                <td>Name</td>
                                <td>Group</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach from=$users item=user}
                            <tr>
                                <td>{$user['email']}</td>
                                <td>{$user['display_name']}</td>
                                <td>{$user['group_name']}</td>
                                <td><a href="/admin/user/{$user['id']}">Edit</a></td>
                            </tr>
                            {/foreach}
                        </tbody>
                    </table>  
                </div>
            </div>
        </div>           
        {include file='production/footer.tpl'}            
    </body>
</html>