<html>
    <head>
        <title>Manage Users | Shivyog Bangalore</title>
        {include file='production/header.tpl'}
    </head>
    <body>
        {include file='navbar.tpl'}
        <div class="container content-wrap">
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
                <h1>User Groups</h1>
                <div class="col-xs-12 article-content">
                    <a href="/admin/group" class="ok-btn">Add</a><br>
                    <table class="table-list">
                        <thead>
                            <tr>
                                <td>User Group Name</td>
                                <td>Capability</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach from=$groups item=group}
                            <tr>
                                <td>{$group['group_name']}</td>
                                <td>{$group['capability']}</td>
                                <td><a href="/admin/group/{$group['id']}">Edit</a></td>
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