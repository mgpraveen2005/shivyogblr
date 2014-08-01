<?php /* Smarty version Smarty-3.1.19-dev, created on 2014-07-31 18:01:15
         compiled from "./templates/events.tpl" */ ?>
<?php /*%%SmartyHeaderCode:154702041453da37132aebe3-66375737%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36f1d954dc01d59e84ad2f465e17d3f4d1503279' => 
    array (
      0 => './templates/events.tpl',
      1 => 1406790524,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154702041453da37132aebe3-66375737',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pagetitle' => 0,
    'events' => 0,
    'event' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_53da37132e2295_32386369',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53da37132e2295_32386369')) {function content_53da37132e2295_32386369($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/sportskeeda/workspace/local/vendor/smarty/smarty/distribution/libs/plugins/modifier.date_format.php';
?><html>
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
                        <h2 class="col-md-4 block-title">Event Management</h2>
                        <?php echo $_smarty_tpl->getSubTemplate ('admin-menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    </header>
                </ul>
            </div>
            <div class="col-md-12 white-box">
                <h1>Events</h1>
                <div class="col-xs-12 article-content">
                    <!--a href="/admin/event" class="ok-btn">Add</a-->
                    <table class="table-list">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Start Date</td>
                                <td>End Date</td>
                                <td>City</td>
                                <td>Event Type</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $_smarty_tpl->tpl_vars['event'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['event']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['events']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['event']->key => $_smarty_tpl->tpl_vars['event']->value) {
$_smarty_tpl->tpl_vars['event']->_loop = true;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['event']->value['event_name'];?>
</td>
                                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['event']->value['start_date'],'%d-%m-%Y %H:%M:%S');?>
</td>
                                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['event']->value['end_date'],'%d-%m-%Y %H:%M:%S');?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['event']->value['city'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['event']->value['event_type'];?>
</td>
                                <td><!--a href="/admin/event/<?php echo $_smarty_tpl->tpl_vars['event']->value['id'];?>
">Edit</a--></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </body>
</html><?php }} ?>
