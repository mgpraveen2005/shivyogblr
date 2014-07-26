<html>
    <head>
        <title>{$pagetitle}</title>
        {include file='header.tpl'}
    </head>
    <body>
        {include file='navbar.tpl'}
        <div class="container content-wrap">
            <div class="col-md-12 white-box">
                <h1>Registration</h1>
                <div class="col-xs-12 article-content">
                    <p class="sy_error">{$error}</p>
                    <form action="/admin/register" method="post" name="reg_form" id="js_reg_form">
                        <input type="hidden" name="event_id" value="{$event_id}" />
                        <div class="flow_form">
                            <h5 class="block-title">Donation Details:</h5>
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>DD Number <i class="star"></i></label></div><div class="lbl_last"><input type="text" name="dd_number" id="dd_number" value="{$order.dd_number}" required/></div>
                                    <input type="hidden" name="dd_id" value="{$order.dd_id}" />
                                    <input type="hidden" name="payment_type" value="dd" />
                                </div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>DD Bank <i class="star"></i></label></div><div class="lbl_last"><input type="text" name="dd_bank" id="dd_bank" value="{$order.dd_bank}" required/></div>
                                </div>
                            </div>
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>DD Amount <i class="star"></i></label></div><div class="lbl_last"><input type="text" name="dd_amount" id="dd_amount" value="{$order.dd_amount}" required/></div>
                                </div>
                                {if $category}
                                    <div class="flow_elements">
                                        <div class="lbl_first"><label>Category <i class="star"></i></label></div>
                                        <div class="lbl_last">
                                            <select name="category_id" id="category_id">
                                                <option value="0" >Select</option>
                                                {foreach from=$category key=k item=v}
                                                    <option value="{$v.id}" {if ($order.category_id == $v.id)}selected{/if} data-amt="{$v.amount}">
                                                        {$v.category_name}
                                                    </option>
                                                {/foreach}
                                            </select>
                                        </div>
                                    </div>
                                {/if}
                            </div>
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>DD Date <i class="star"></i></label></div><div class="lbl_last">
                                        <input type="text" name="dd_date" id="dd_date" class="sy_date" data-date-format="dd-mm-yyyy" value="{$order.dd_date}" placeholder="DD-MM-YYYY" title="DD-MM-YYYY" required/>
                                    </div>
                                </div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>PAN Card No </label></div><div class="lbl_last"><input type="text" name="pan_no" id="pan_no" value="{$order.pan_no}" /></div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="flow_form">
                            <h5 class="block-title">Sadhak Details:</h5>
                            <div>
                                {if $order.order_id}
                                    <div class="flow_elements">
                                        <div class="lbl_first"><label>Registration No: </label></div><div class="lbl_last"><strong>{$order.reg_no}</strong></div>
                                    </div>
                                {/if}
                            </div>
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Title <i class="star"></i></label></div>
                                    <div class="lbl_last">
                                        <select name="title" id="title" class="js_title">
                                            <option value="Mr." {if ($order.title == "Mr.")}selected{/if} >Mr.</option>
                                            <option value="Ms." {if ($order.title == "Ms.")}selected{/if} >Ms.</option>
                                            <option value="Dr." {if ($order.title == "Dr.")}selected{/if} >Dr.</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Gender <i class="star"></i></label></div><div class="lbl_last"><input type="radio" name="gender" value="M" {if ($order.gender == 'M')}checked{/if} />Male &nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="F" {if ($order.gender == 'F')}checked{/if}/>Female</div>
                                </div>
                            </div>
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>First Name <i class="star"></i></label></div><div class="lbl_last"><input type="text" name="firstname" id="firstname" value="{$order.firstname}" required/></div>
                                    <input type="hidden" name="customer_id" value="{$order.id}" />
                                    <input type="hidden" name="order_id" value="{$order.order_id}" />
                                    <input type="hidden" name="payment_id" value="{$order.payment_id}" />
                                </div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Last Name </label></div><div class="lbl_last"><input type="text" name="lastname" id="lastname"  value="{$order.lastname}" /></div>
                                </div>
                            </div>
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Mobile No. <i class="star"></i></label></div><div class="lbl_last"><input type="text" name="contact_no" id="contact_no"  value="{$order.contact_no}" required /></div>
                                </div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Email ID </label></div><div class="lbl_last"><input type="text" name="email" id="email"  value="{$order.email}" /></div>
                                </div>
                            </div>
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Date of Birth </label></div><div class="lbl_last"><input type="text" class="sy_date" name="dob" id="dob" data-date-format="dd-mm-yyyy"  value="{$order.dob}" placeholder="DD-MM-YYYY" title="DD-MM-YYYY" /></div>
                                </div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Country <i class="star"></i></label></div><div class="lbl_last"><input type="text" name="country" id="country"  value="{$order.country}"  required/></div>
                                </div>
                            </div>
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>City <i class="star"></i></label></div><div class="lbl_last"><input type="text" name="city" id="city"  value="{$order.city}"  required/></div>
                                </div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>State </label></div><div class="lbl_last"><input type="text" name="state" id="state"  value="{$order.state}" /></div>
                                </div>
                            </div>
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Address </label></div><div class="lbl_last"><input type="text" name="address" id="address"  value="{$order.address}" /></div>
                                </div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>PIN Code </label></div><div class="lbl_last"><input type="text" name="pincode" id="pincode"  value="{$order.pincode}" /></div>
                                </div>
                            </div>
                        </div>
                        <div style="text-align:center;">
                            {if !$order.id}
                                <button class="ok-btn js_save">Submit</button>
                            {else}
                                {if $capability > 5}
                                    <button class="ok-btn js_save">Update</button>
                                {/if}
                            {/if}
                            <a href="/admin/registrations" class="cancel-btn">Back</a>
                            {if !$order.id}
                                <button type="reset" class="cancel-btn">Clear</button>
                            {/if}
                        </div>
                    </form>
                </div>
            </div>
        </div>           
        {include file='footer.tpl'}
    </body>
</html>