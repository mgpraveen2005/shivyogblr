<html>
    <head>
        <title>{$pagetitle}</title>
        {include file='header.tpl'}
    </head>
    <body>
        {include file='navbar.tpl'}
        <div class="container nopad-right content-wrap">
            <!--Article Content-->            
            <div class="col-md-12 white-box">
                <h1>Please Login here!</h1>                
                <div class="col-xs-12 article-content">
                    {if !empty($error)}
                        <p class="error">{$error}</p>
                        <span class="error">{$password_error}</span>
                    {/if}
                    <form action="/admin/login" method="POST">
                        <table class="table-form">
                            <tr>
                                <th>Email: </th>
                                <td><input type="text" name="email" id="email" value="{$email_value}" /></td>
                            </tr>
                            <tr>
                                <th>Password: </th>
                                <td><input type="password" name="password" id="password" /></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td><button class="ok-btn">Login</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>           
        {include file='footer.tpl'}
    </body>
</html>

