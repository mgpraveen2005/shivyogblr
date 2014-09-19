<html>
    <head>
        <title>Reports | Shivyog Bangalore</title>
        {include file='header.tpl'}
    </head>
    <body>
        {include file='navbar.tpl'}
        <div class="container content-wrap">
            <div class="block">
                <ul class="horizontal-list">
                    <header class="col-xs-12 no-pad">
                        <h2 class="col-md-4 block-title">Reports</h2>
                        {include file='admin-menu.tpl'}
                    </header>
                </ul>
            </div>
            <div class="col-md-12 white-box">
                <h1>Reports</h1>
                <div class="col-xs-12 article-content">
                    <form action="/admin/reports" method="post" name="report_form">
                        <input type="hidden" name="event_id" value="{$event_id}" />
                        <div class="flow_form">
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>From <i class="star"></i></label></div>
                                    <div class="lbl_last"><input type="text" name="from_date" id="from_date" class="sy_date" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" title="DD-MM-YYYY" required/></div>
                                </div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>To </label></div>
                                    <div class="lbl_last"><input type="text" name="to_date" id="to_date" class="sy_date" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" title="DD-MM-YYYY"/></div>
                                </div>
                            </div>
                            <div>
                                <div class="flow_elements">
                                    <div class="lbl_first"><label>Type </label></div>
                                    <div class="lbl_last">
                                        <select name="report_type">
                                            <option value="registrations">Registration</option>
                                            <option value="summary">Summary</option>
                                            <option value="upgrades">Upgrades</option>
                                            <option value="cancellations">Cancellations</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="text-align:center;">
                            <button class="ok-btn">Export</button>
                            <p class="sy_error">{$error}</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {include file='footer.tpl'}
    </body>
</html>