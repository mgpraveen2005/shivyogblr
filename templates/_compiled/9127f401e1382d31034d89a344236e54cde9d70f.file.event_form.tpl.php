<?php /* Smarty version Smarty-3.1.19-dev, created on 2014-07-31 18:06:20
         compiled from "./templates/event_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:113336198753da372588b7e2-68573770%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9127f401e1382d31034d89a344236e54cde9d70f' => 
    array (
      0 => './templates/event_form.tpl',
      1 => 1406810173,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113336198753da372588b7e2-68573770',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_53da37258c8805_93434306',
  'variables' => 
  array (
    'pagetitle' => 0,
    'data' => 0,
    'category' => 0,
    'i' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53da37258c8805_93434306')) {function content_53da37258c8805_93434306($_smarty_tpl) {?><html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['pagetitle']->value;?>
</title>
        <?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </head>
    <body>
        <?php echo $_smarty_tpl->getSubTemplate ('navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div class="container content-wrap">
            <div class="col-md-12 white-box">
                <h1>Event</h1>
                <div class="col-xs-12 article-content">
                    <form action="/admin/event" method="POST">
                        <div class="flow_form">
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Event Name : </label></div>
                                    <div class="lbl_last">
                                        <input type="hidden" name='event_id' value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
"/>
                                        <input type="text" name='event_name' value="<?php echo $_smarty_tpl->tpl_vars['data']->value['event_name'];?>
"/>
                                    </div>
                                </div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Event Type : </label></div>
                                    <div class="lbl_last">
                                        <?php if ($_smarty_tpl->tpl_vars['data']->value['event_type']) {?>
                                            <input type="checkbox" name="event_type" value="1" checked="checked">Paid
                                        <?php } else { ?>
                                            <input type="checkbox" name="event_type" value="1">Paid
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Start Date : </label></div>
                                    <div class="lbl_last"><input type="text" name="start_date" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['start_date'];?>
"/>
                                    </div>
                                </div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>End Date : </label></div>
                                    <div class="lbl_last"><input type="text" name="end_date" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['end_date'];?>
"/>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Event Code : </label></div>
                                    <div class="lbl_last"><input type="text" name="event_slug" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['event_slug'];?>
"/></div>
                                </div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Event Venue : </label></div>
                                    <div class="lbl_last"><input type="text" name="venue" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['venue'];?>
"/></div>
                                </div>
                            </div>
                            <div class="flow_elements">
                                <div class="lbl_first"><label>Address : </label></div>
                                <div class="lbl_last"><input type="text" name="address" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['address'];?>
"/></div>
                            </div>
                            <div class="flow_elements">
                                <div class="lbl_first"><label>City : </label></div>
                                <div class="lbl_last"><input type="text" name="city" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['city'];?>
"/></div>
                            </div>
                            <div class="flow_elements">
                                <div class="lbl_first"><label>Country : </label></div>
                                <div class="lbl_last"><input type="text" name="country" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['country'];?>
"/></div>
                            </div>
                        </div>
                        <table class="table-list">
                            <th>Category</th><th>Category Code</th><th>Amount</th>
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['category']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                <tr>
                                    <td><input type="hidden" name="category_id_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"/><input type="text" name="category_name_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['category_name'];?>
"/></td>
                                    <td><input type="text" name="category_slug_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['category_slug'];?>
"/></td>
                                    <td><input type="text" name="amount_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['amount'];?>
"/></td>
                                </tr>
                            <?php } ?>
                        </table>
                        <div style="text-align:center;">
                            <button class="ok-btn">Save</button>
                            <a href="/admin/events" class="cancel-btn">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>           
        <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </body>
</html><?php }} ?>
