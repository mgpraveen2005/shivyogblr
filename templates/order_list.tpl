<html>
    <head>
        <title>Registrations | Shivyog Bangalore</title>
        {include file='production/header.tpl'}
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
                    {$pagination}
                    <a href="/admin/register" class="ok-btn">Add</a><br>
                    <table class="table-list">
                        <thead>
                            <tr>
                                <td>Reg-Date</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Mobile</td>
                                <td>Category</td>
                                <td>Reg-No</td>
                                <td>Reg-Center</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach from=$orders item=order}
                                <tr>
                                    <td>{$order['created_date']|date_format:'%d-%m-%Y %H:%M:%S'}</td>
                                    <td>{$order['firstname']} {$order['lastname']}</td>
                                    <td>{$order['email']}</td>
                                    <td>{$order['contact_no']}</td>
                                    <td>{$order['category_name']}</td>
                                    <td>{$order['reg_no']}</td>
                                    <td>{$order['display_name']}</td>
                                    <td><a href="/admin/register/{$order['id']}">Edit</a></td>
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