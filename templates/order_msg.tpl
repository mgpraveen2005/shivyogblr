<html>
    <head>
        <title>{$pagetitle}</title>
        {include file='header.tpl'}
    </head>
    <body>
        {include file='navbar.tpl'}
        <div class="container content-wrap">
            <div class="col-md-12 white-box">
                <h1>Registration Details</h1>
                <div class="col-xs-12 article-content">
                    <p>Registration Completed Successfully! Please note down the following details.</p>
                    <div class="flow_form">
                        <div>
                            <div class="flow_elements">
                                <div class="lbl_first"><label>Registration No: </label></div><div class="lbl_last"><strong>{$data.reg_no}</strong></div>
                            </div>
                            <div class="flow_elements">
                                <div class="lbl_first"><label>Mobile No: </label></div><div class="lbl_last"><strong>{$data.contact_no}</strong></div>
                            </div>
                            <div class="flow_elements">
                                <div class="lbl_first"><label>First Name: </label></div><div class="lbl_last"><strong>{$data.firstname}</strong></div>
                            </div>
                            <div class="flow_elements">
                                <div class="lbl_first"><label>Last Name: </label></div><div class="lbl_last"><strong>{$data.lastname}</strong></div>
                            </div>
                            <div class="flow_elements">
                                <div class="lbl_first"><label>Email: </label></div><div class="lbl_last"><strong>{$data.email}</strong></div>
                            </div>
                        </div>
                    </div>
                    <a href="/admin/register" class="ok-btn pull-right">Add Another</a>
                </div>
            </div>
        </div>           
        {include file='footer.tpl'}
    </body>
</html>