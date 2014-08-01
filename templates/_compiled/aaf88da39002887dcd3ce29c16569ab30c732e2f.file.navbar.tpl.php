<?php /* Smarty version Smarty-3.1.19-dev, created on 2014-07-31 18:00:50
         compiled from "./templates/navbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59572512953da36fa74f868-76737825%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aaf88da39002887dcd3ce29c16569ab30c732e2f' => 
    array (
      0 => './templates/navbar.tpl',
      1 => 1406272298,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59572512953da36fa74f868-76737825',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'username' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_53da36fa755c43_81376307',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53da36fa755c43_81376307')) {function content_53da36fa755c43_81376307($_smarty_tpl) {?><div class="navbar navbar-default navbar-fixed-top" role="navigation">
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
                <?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
                <li class="active dropdown"><a class="icon-down-open" href="#"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</a>
                    <ul class="dropdown-menu">
                        <li><a href="/admin">Dashboard</a></li>
                        <li><a href="/admin/user/<?php echo $_smarty_tpl->tpl_vars['user']->value;?>
">My Profile</a></li>
                        <li><a href="/admin/logout">Logout</a></li>
                   </ul>                
                </li>
                <?php }?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div><?php }} ?>
