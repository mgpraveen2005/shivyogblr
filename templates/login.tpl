<html>
    <head>
        <title>www.sportskeeda.com</title>
        {include file='production/header.tpl'}
    </head>
    <body>
        {include file='navbar.tpl'}
        <div class="container nopad-right">
            <!--Article Content-->            
            <div class="col-md-12 white-box">
                <h1>Please Login here!</h1>                
                <div class="col-xs-12 article-content">
                    {if !empty($error)}
                    <p class="error">{$error}</p>
                    {/if}
                    <form action="/admin/login" method="POST">
                        <p>
                            Email: <input type="text" name="email" id="email" value="{$email_value}" /> 
                            <span class="error">{$email_error}</span>
                        </p>
                        <p>
                            Password: <input type="password" name="password" id="password" />
                            <span class="error">{$password_error}</span>
                        </p>
                        <p><input type="submit" value="Login" />
                    </form>
                </div>
            </div>
        </div>           
        {include file='production/footer.tpl'}            
    </body>
</html>

