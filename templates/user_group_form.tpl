<html>
    <head>
        <title>www.sportskeeda.com</title>
        {include file='production/header.tpl'}
    </head>
    <body>
        {include file='navbar.tpl'}
        <div class="container">
            <div class="col-md-12 white-box">
                <h1>Dashboard</h1>                
                <div class="col-xs-12 article-content">
                    <form action="/admin/group" method="POST">
                        <table class="table-form">
                            <tr>
                                <th>User Group Name : </th>
                                <td>
                                    <input type="hidden" name='group_id' value="{$data['id']}"/>
                                    <input type="text" name='group_name' value="{$data['group_name']}"/>
                                </td>                
                            </tr>
                            <tr>
                                <th>Capability : </th>
                                <td>
                                    <input type="text" name='capability' value="{$data['capability']}"/>
                                </td>
                            </tr>
                            <tr>
                                <td><button>Save</button></td>
                                <td><a href="/admin/groups">Cancel</a></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>           
        {include file='production/footer.tpl'}
    </body>
</html>