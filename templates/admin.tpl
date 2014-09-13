<html>
    <head>
        <title>{$pagetitle}</title>
        {include file='header.tpl'}
    </head>
    <body>
        {include file='navbar.tpl'}
        <div class="container content-wrap">
            <div class="block">
                <ul class="horizontal-list">
                    <header class="col-xs-12 no-pad">
                        <h2 class="col-md-4 block-title">Dashboard</h2>
                        {include file='admin-menu.tpl'}
                    </header>
                    <li class="post post-main">
                        <h3 class="block-heading">Total Registrations</h3> 
                        <div class="block-top">
                            {$totalA = 0}
                            {$totalB = 0}
                            {$totalC = 0}
                            <table class="table-list">
                                <tr><th>Reg Center</th><th>A</th><th>B</th><th>C</th><th>Total</th></tr>
                                {foreach from=$total_report item=list}
                                    <tr>
                                        <td>{$list['Reg Center']}</td>
                                        <td>{$list['A']}</td>
                                        <td>{$list['B']}</td>
                                        <td>{$list['C']}</td>
                                        <td>{$list['A']+$list['B']+$list['C']}</td>
                                    </tr>
                                    {$totalA = $totalA + $list['A']}
                                    {$totalB = $totalB + $list['B']}
                                    {$totalC = $totalC + $list['C']}
                                {/foreach}
                                <tr>
                                    <th>Total</th>
                                    <th>{$totalA}</th>
                                    <th>{$totalB}</th>
                                    <th>{$totalC}</th>
                                    <th>{$totalA+$totalB+$totalC}</th>
                                </tr>
                            </table>
                        </div>
                    </li>
                    <li class="post post-main">
                        <h3 class="block-heading">Today's Registrations</h3> 
                        <div class="block-top">
                            <table class="table-list">
                                <tr><th>Reg Center</th><th>A</th><th>B</th><th>C</th></tr>
                                        {foreach from=$today_report item=tlist}
                                    <tr>
                                        <td>{$tlist['Reg Center']}</td>
                                        <td>{$tlist['A']}</td>
                                        <td>{$tlist['B']}</td>
                                        <td>{$tlist['C']}</td>
                                    </tr>
                                {/foreach}
                            </table>
                        </div>
                    </li>
                </ul>
            </div>
        </div>           
        {include file='footer.tpl'}
    </body>
</html>