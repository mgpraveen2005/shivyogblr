<html>
    <head>
        <title>www.sportskeeda.com</title>
        {include file='production/header.tpl'}
    </head>
    <body>
        {include file='navbar.tpl'}
        <div class="container">
            <div class="col-md-12 white-box">
                <h1>User</h1>                
                <div class="col-xs-12 article-content">
                    <form action="/admin/user" method="POST">
                        <table>
                            <tr>
                                <th>Email : </th>
                                <td>
                                    <input type="hidden" name='user_id' value="{$data['id']}"/>
                                    <input type="text" name='email' value="{$data['email']}"/>
                                </td>                
                            </tr>
                            <tr>
                                <th>Name : </th>
                                <td><input type="text" name="display_name" value="{$data['display_name']}"/>
                                </td>
                            </tr>
                            <tr>
                                <th>User Group : </th>
                                <td>
                                    <select name='group_id'>
                                        {foreach from=$groups item=group}
                                            {if $data['group_id'] == $group['id']}
                                                <option value="{$group['id']}" selected>{$group['group_name']}</option>
                                            {else}
                                                <option value="{$group['id']}">{$group['group_name']}</option>
                                            {/if}
                                        {/foreach}
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Password : </th>
                                <td><input type="password" name="password"/></td>
                            </tr>
                            <tr>
                                <th>Confirm Password : </th>
                                <td><input type="password" name='confirm_password'/></td>
                            </tr>
                            <tr>
                                <td><button>Save</button></td>
                                <td><a href="/admin/users">Cancel</a></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>           
        {include file='production/footer.tpl'}            
    </body>
</html>