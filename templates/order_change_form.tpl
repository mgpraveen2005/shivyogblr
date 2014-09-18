<html>
    <head>
        <title>{$pagetitle}</title>
        {include file='header.tpl'}
    </head>
    <body>
        {include file='navbar.tpl'}
        <div class="container content-wrap">
            <div class="col-md-12 white-box">
                <h1>Upgrade/Cancellation</h1>
                <div class="col-xs-12 article-content">
                    <form action="/admin/upgrade" method="post" name="upgrade_form" id="js_upgrade_form">
                        <input type="hidden" name="event_id" value="{$event_id}" />
                        <div class="flow_form">
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Registration No </label></div>
                                    <div class="lbl_last">
                                        <input id="js_old_reg_no" style="text-transform: uppercase" type="text" name="old_reg_no" value="" autofocus="autofocus" /> <button class="cancel-btn js_find_reg" type="button" >Find</button>
                                    </div>
                                </div>
                            </div>
                            <div id="js_upgrade_res"></div>
                            <div id="js_upgrade_action" style="display:none;">
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Action </label></div>
                                    <div class="lbl_last">
                                        <select name="order_status" id="js_order_status">
                                            <option value="0" >Choose</option>
                                            <option value="1" >Upgrade</option>
                                            <option value="2" >Cancellation</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="js_upgrade_blk" style="display:none;">
                                {if $category}
                                    <div class="flow_elements">
                                        <div class="lbl_first"><label>Category </label></div>
                                        <div class="lbl_last">
                                            <select name="category_id" id="js_category_id">
                                                <option value="0" >Select</option>
                                                {foreach from=$category key=k item=v}
                                                    <option value="{$v.id}" data-amt="{$v.amount}">
                                                        {$v.category_name}
                                                    </option>
                                                {/foreach}
                                            </select>
                                        </div>
                                    </div>
                                {/if}
                            </div>
                            <div class="js_upgrade_blk" style="display:none;">
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Amount </label></div><div class="lbl_last"><input type="text" name="amount" id="js_amount" value="" /></div>
                                </div>
                            </div>
                            <div class="js_cancel_blk" style="display:none;">
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Remarks </label></div><div class="lbl_last"><textarea name="remarks"></textarea></div>
                                </div>
                            </div>
                        </div>
                        <div style="text-align:center;display:none;" id="js_upgrade_btns">
                            <button class="ok-btn js_upgrade_save">Submit</button>
                            <a href="/admin/upgrades" class="cancel-btn">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {include file='footer.tpl'}
    </body>
</html>