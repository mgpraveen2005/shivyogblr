<html>
    <head>
        <title>{$pagetitle}</title>
        {include file='production/header.tpl'}
    </head>
    <body>
        {include file='navbar.tpl'}
        <div class="container content-wrap">
            <div class="block">
                <ul class="horizontal-list">
                    <header class="col-xs-12 no-pad">
                        <h2 class="col-md-4 block-title">Dashboard</h2>
                        <ol class="col-md-8 breadcrumb">
                            {if $capability > 7}
                            <li><a href="/admin/users">Registrations</a></li>
                            <li><a href="/admin/groups">Reports</a></li>
                            <li><a href="/admin/users">Event Management</a></li>
                            <li><a href="/admin/users">User Management</a></li>
                            {/if}
                        </ol>
                    </header>
                </ul>
            </div>
        </div>           
        {include file='production/footer.tpl'}            
    </body>
</html>