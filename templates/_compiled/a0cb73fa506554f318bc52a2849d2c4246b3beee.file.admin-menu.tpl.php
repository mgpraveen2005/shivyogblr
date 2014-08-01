<?php /* Smarty version Smarty-3.1.19-dev, created on 2014-07-31 18:01:11
         compiled from "./templates/admin-menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:205850519753da370f810bc2-72940066%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0cb73fa506554f318bc52a2849d2c4246b3beee' => 
    array (
      0 => './templates/admin-menu.tpl',
      1 => 1406790524,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '205850519753da370f810bc2-72940066',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'capability' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_53da370f814dc9_54226717',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53da370f814dc9_54226717')) {function content_53da370f814dc9_54226717($_smarty_tpl) {?><ol class="col-md-8 breadcrumb">
    <?php if ($_smarty_tpl->tpl_vars['capability']->value>7) {?>
        <li><a href="/admin/registrations">Registrations</a></li>
        <li><a href="/admin/reports">Reports</a></li>
        <li><a href="/admin/events">Event Management</a></li>
        <li><a href="/admin/users">User Management</a></li>
        <li><a href="/admin/groups">Group Management</a></li>
    <?php }?>
</ol><?php }} ?>
