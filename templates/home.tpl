<html>
    <head>
        <title>{$title} | Shivyog Bangalore</title>
        {include file='header.tpl'}
    </head>
    <body>
        {include file='navbar.tpl'}
        <div class="container nopad-left content-wrap">
            <div class="col-md-9 white-box">
                <h1>{$title}</h1>
                <div class="col-xs-12 article-content">
                    {$content}
                </div>
            </div>
            <div class="col-md-3 nopad-right">
                {include file='right-rail.tpl'}
            </div>
        </div>           
        {include file='footer.tpl'}
    </body>
</html>
