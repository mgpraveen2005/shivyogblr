<html>
    <head>
        <title>{$pagetitle}</title>
        {include file='production/header.tpl'}
    </head>
    <body>
        {include file='navbar.tpl'}
        <div class="container content-wrap">
            <div class="col-md-12 white-box">
                <h1>Registration</h1>
                <div class="col-xs-12 article-content">
                    <form action="/admin/order" name="reg_form">
                        <div class="flow_form">
                            <h5 class="block-title">Transaction Details:</h5>
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>DD Number </label></div><div class="lbl_last"><input type="text" name="dd_number" value="" required/></div>
                                </div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>DD Amount </label></div><div class="lbl_last"><input type="text" name="dd_amount" value="" required/></div>
                                </div>
                            </div>
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>DD Bank </label></div><div class="lbl_last"><input type="text" name="dd_bank" value="" required/></div>
                                </div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>DD Date </label></div><div class="lbl_last">
                                        <input type="text" name="dd_date" class="sy_date" data-date-format="dd-mm-yyyy" value="" required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="flow_form">
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>PAN Card No. </label></div><div class="lbl_last"><input type="text" name="pan_no" value="" /></div>
                                </div>
                                {if $event_type}
                                    <div class="flow_elements">
                                        <div class="lbl_first"><label>Category </label></div>
                                        <div class="lbl_last">
                                            <select name="category_id">
                                                {foreach from=$category key=k item=v}
                                                    <option value="{$v.id}">{$v.category_name}</option>
                                                {/foreach}
                                            </select>
                                        </div>
                                    </div>
                                {/if}
                            </div>
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>First Name <span class="star"></span></label></div><div class="lbl_last"><input type="text" name="first_name" id="first_name" value="" required/></div>
                                </div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Last Name </label></div><div class="lbl_last"><input type="text" name="last_name" id="last_name"  value="" /></div>
                                </div>
                            </div>
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Date of Birth <span class="star"></span></label></div><div class="lbl_last"><input type="text" class="sy_date" name="dob" id="dob" data-date-format="dd-mm-yyyy"  value="" ></div>
                                </div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Gender <span class="star"></span></label></div><div class="lbl_last"><input type="radio" name="gender" value="M" checked />Male &nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="F" />Female</div>
                                </div>
                            </div>
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Mobile No. <span class="star"></span></label></div><div class="lbl_last"><input type="text" name="contact_no" id="contact_no"  value="" /></div>
                                </div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Email ID </label></div><div class="lbl_last"><input type="text" name="email" id="email"  value="" /></div>
                                </div>
                            </div>
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Country <span class="star"></span></label></div><div class="lbl_last"><input type="text" name="country" id="country"  value=""  required/></div>
                                </div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>City <span class="star"></span></label></div><div class="lbl_last"><input type="text" name="city" id="city"  value=""  required/></div>
                                </div>
                            </div>
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>State </label></div><div class="lbl_last"><input type="text" name="state" id="state"  value="" /></div>
                                </div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>PIN Code </label></div><div class="lbl_last"><input type="text" name="pin_code" id="pin_code"  value="" /></div>
                                </div>
                            </div>
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Address </label></div><div class="lbl_last"><input type="text" name="address" id="address"  value="" /></div>
                                </div>
                            </div>
                        </div>
                        <div style="text-align:center;">
                            <button class="ok-btn">Save</button>
                            <a href="/admin/registrations" class="cancel-btn">Back</a>
                            {if !$order}
                                <button type="reset" class="cancel-btn">Clear</button>
                            {/if}
                        </div>                            
                    </form>
                </div>
            </div>
        </div>           
        {include file='production/footer.tpl'}            
    </body>
</html>