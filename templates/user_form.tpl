<html>
    <head>
        <title>Manage Users | Shivyog Bangalore</title>
        {include file='production/header.tpl'}
    </head>
    <body>
        {include file='navbar.tpl'}
        <div class="container content-wrap">
            <div class="col-md-12 white-box">
                <h1>User</h1>                
                <div class="col-xs-12 article-content">
                    <form action="/admin/user" method="POST">
                        <table class="table-form">
                            <tr>
                                <th>Email : </th>
                                <td>
                                    <input type="hidden" name='user_id' value="{$data['id']}"/>
                                    {if !empty($edit_disable)}
                                        <input type="hidden" name='email' value="{$data['email']}"/>
                                        <input type="text" value="{$data['email']}" {$edit_disable}/>
                                    {else}
                                        <input type="text" name='email' value="{$data['email']}"/>
                                    {/if}

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
                                    {if !empty($edit_disable)}
                                        <input type="hidden" name='group_id' value="{$data['group_id']}"/>
                                        <select {$edit_disable}>
                                            {foreach from=$groups item=group}
                                                {if $data['group_id'] == $group['id']}
                                                    <option value="{$group['id']}" selected>{$group['group_name']}</option>
                                                {else}
                                                    <option value="{$group['id']}">{$group['group_name']}</option>
                                                {/if}
                                            {/foreach}
                                        </select>
                                    {else}
                                        <select name='group_id'>
                                            {foreach from=$groups item=group}
                                                {if $data['group_id'] == $group['id']}
                                                    <option value="{$group['id']}" selected>{$group['group_name']}</option>
                                                {else}
                                                    <option value="{$group['id']}">{$group['group_name']}</option>
                                                {/if}
                                            {/foreach}
                                        </select>
                                    {/if}
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
                                <td><button class="ok-btn">Save</button></td>
                                <td><a href="/admin/users" class="cancel-btn">Cancel</a></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>           
        {include file='production/footer.tpl'}            
    </body>
</html>