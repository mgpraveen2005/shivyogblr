<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <img class="img-responsive" src="/less/img/logo.png">
            </a>            
        </div>
        <div class="navbar-collapse collapse" style="height: 1px;">
            <ul class="nav navbar-nav">
                <li class="visible-lg"><a href="/">Home</a></li>
                <li class="visible-lg"><a href="/durga-saptashati">Durga Saptashati</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                {if $user}
                <li class="active dropdown"><a class="icon-doc-text-inv" href="#">{$username}</a>
                    <ul class="dropdown-menu">
                        <li><a href="/admin/user/{$user}">My Profile</a></li>
                        <li><a href="/admin/logout">Logout</a></li>
                   </ul>                
                </li>
                {/if}
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>