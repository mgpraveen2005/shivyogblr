<?php /* Smarty version Smarty-3.1.19-dev, created on 2014-07-31 18:00:50
         compiled from "./templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84914771153da36fa6c95f9-01368099%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5f63cf8bf5077cbe9e40e023158dd20352e878a' => 
    array (
      0 => './templates/login.tpl',
      1 => 1406715803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84914771153da36fa6c95f9-01368099',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pagetitle' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_53da36fa742847_46792983',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53da36fa742847_46792983')) {function content_53da36fa742847_46792983($_smarty_tpl) {?><html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['pagetitle']->value;?>
</title>
        <?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </head>
    <body>
        <?php echo $_smarty_tpl->getSubTemplate ('navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div class="container nopad-right content-wrap">
            <!--Article Content-->            
            <div class="col-md-12 white-box">
                <h1>Please Login here!</h1>                
                <div class="col-xs-12 article-content">
                    <?php if (!empty($_smarty_tpl->tpl_vars['error']->value)) {?>
                        <p class="sy_error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
                    <?php }?>
                    <form action="/admin/login" method="POST">
                        <table class="table-form">
                            <tr>
                                <th>Email: </th>
                                <td><input type="text" name="email" id="email" value="" autofocus="autofocus" /></td>
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
        <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </body>
</html>

<?php }} ?>
