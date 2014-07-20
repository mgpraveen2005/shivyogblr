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
                        {include file='admin-menu.tpl'}
                    </header>
                </ul>
            </div>
        </div>           
        {include file='production/footer.tpl'}
    </body>
</html>