<?php /* Smarty version Smarty-3.1.19-dev, created on 2014-08-01 15:36:15
         compiled from "./templates/admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21268892253da370f7fc511-15137724%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb669023950c29719bac9ad0fab891ac18fb23f9' => 
    array (
      0 => './templates/admin.tpl',
      1 => 1406887001,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21268892253da370f7fc511-15137724',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_53da370f80a8e8_97454441',
  'variables' => 
  array (
    'pagetitle' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53da370f80a8e8_97454441')) {function content_53da370f80a8e8_97454441($_smarty_tpl) {?><html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['pagetitle']->value;?>
</title>
        <?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </head>
    <body>
        <?php echo $_smarty_tpl->getSubTemplate ('navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div class="container content-wrap">
            <div class="block">
                <ul class="horizontal-list">
                    <header class="col-xs-12 no-pad">
                        <h2 class="col-md-4 block-title">Dashboard</h2>
                        <?php echo $_smarty_tpl->getSubTemplate ('admin-menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    </header>
                    <li class="post post-main">
                        <a href="">
                            <div class="block-top">

                                <img src="" alt="" width="480" height="200">
                            </div>
                            <h3 class="block-heading">
                                <!-- Title -->
                            </h3>                               
                            <div class="block-meta">
                                <span class="block-category">
                                    <span></span>
                                    <span class="view-count"></span>
                                </span>
                            </div>                                             
                        </a>
                    </li>        
                    <li class="post post-main">
                        <a href="">
                            <div class="block-top">

                                <img src="" alt="" width="480" height="200">
                            </div>
                            <h3 class="block-heading">
                                <!-- Title -->
                            </h3>                               
                            <div class="block-meta">
                                <span class="block-category">
                                    <span></span>
                                    <span class="view-count"></span>
                                </span>
                            </div>                                             
                        </a>
                    </li>       
                    <li class="post post-main">
                        <a href="">
                            <div class="block-top">

                                <img src="" alt="" width="480" height="200">
                            </div>
                            <h3 class="block-heading">
                                <!-- Title -->
                            </h3>                               
                            <div class="block-meta">
                                <span class="block-category">
                                    <span></span>
                                    <span class="view-count"></span>
                                </span>
                            </div>                                             
                        </a>
                    </li>
                </ul>
            </div>
        </div>           
        <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </body>
</html><?php }} ?>
