<html>
    <head>
        <title>Registrations | Shivyog Bangalore</title>
        {include file='header.tpl'}
    </head>
    <body>
        {include file='navbar.tpl'}
        <div class="container content-wrap">
            <div class="block">
                <ul class="horizontal-list">
                    <header class="col-xs-12 no-pad">
                        <h2 class="col-md-4 block-title">Registrations</h2>
                        {include file='admin-menu.tpl'}
                    </header>
                </ul>
            </div>
            <div class="col-md-12 white-box">
                <h1>Registrations</h1>
                <div class="col-xs-12 article-content">
                    <fieldset id="js_src_box">
                        <legend>Search</legend>
                        <input type="text" placeholder="Name" id="js_src_name" />
                        <input type="text" placeholder="Email" id="js_src_email" />
                        <input type="text" placeholder="Mobile" id="js_src_mobile" />
                        <input type="text" placeholder="Reg No" id="js_src_reg_no" />
                        <button class="cancel-btn js_src_find">Find</button>
                        <div id="js_src_results"></div>
                    </fieldset>
                    {$pagination}
                    <br><a href="/admin/register" class="ok-btn">Add</a><br>
                    {include file='order_table.tpl'}
                </div>
            </div>
        </div>           
        {include file='footer.tpl'}
    </body>
</html>