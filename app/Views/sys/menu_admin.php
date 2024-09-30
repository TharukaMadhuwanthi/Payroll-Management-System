<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="<?= site_url('sys/dashboard') ?>">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Employee</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= site_url('employee/add') ?>">
                        <i class="bi bi-circle"></i><span>Add Employee</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('employee/view') ?>">
                        <i class="bi bi-circle"></i><span>View Employee</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-workplace" data-bs-toggle="collapse" href="#">
                <i class="bi bi-buildings-fill"></i><span>Work Place</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-workplace" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= site_url('workplace/add') ?>">
                        <i class="bi bi-circle"></i><span>Add Work Place</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('workplace/view') ?>">
                        <i class="bi bi-circle"></i><span>View Work Place</span>
                    </a>
                </li>
               

            </ul>
        </li>
        
         <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-attendance" data-bs-toggle="collapse" href="#">
                <i class="bi bi-buildings"></i><span>Attendance</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-attendance" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= site_url('attendance/add') ?>">
                        <i class="bi bi-circle"></i><span>Add Attendance</span>
                    </a>
                </li>
                
               

            </ul>
        </li>
        <!-- End Components Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-briefcase"></i><span>User Accounts</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= site_url('useraccount/add') ?>">
                        <i class="bi bi-circle"></i><span>Add User</span>
                    </a>
                </li>
                
                <li>
                    <a href="<?= site_url('useraccount/view') ?>">
                        <i class="bi bi-circle"></i><span>View User</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-wallet"></i><span>Items</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= site_url('item/add') ?>">
                        <i class="bi bi-circle"></i><span>Add Item</span>
                    </a>
                </li>
                
                <li>
                    <a href="<?= site_url('item/view') ?>">
                        <i class="bi bi-circle"></i><span>View Item</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->


        
         <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Changing Item Amounts</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= site_url('monthlydetails/add') ?>">
                        <i class="bi bi-circle"></i><span>Add details</span>
                    </a>
                </li>
                
                <li>
                    <a href="<?= site_url('monthlydetails/view') ?>">
                        <i class="bi bi-circle"></i><span>View details</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Charts Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-archive-fill"></i><span>Fixed Item Amounts</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= site_url('masterdetails/add') ?>">
                        <i class="bi bi-circle"></i><span>Add details</span>
                    </a>
                </li>
                
                <li>
                    <a href="<?= site_url('masterdetails/view') ?>">
                        <i class="bi bi-circle"></i><span>View details</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Icons Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-agent" data-bs-toggle="collapse" href="#">
                <i class="bi bi-send-check-fill"></i><span>Remittance Agent</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-agent" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= site_url('agent/add') ?>">
                        <i class="bi bi-circle"></i><span>Add Agent</span>
                    </a>
                </li>
                
                <li>
                    <a href="<?= site_url('agent/view') ?>">
                        <i class="bi bi-circle"></i><span>View Agent</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Icons Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-instructions" data-bs-toggle="collapse" href="#">
                <i class="bi bi-info-circle"></i><span>Instructions</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-instructions" class="nav-content collapse " data-bs-parent="#sidebar-nav">
 <li>
                    <a href="<?= site_url('instructions/add') ?>">
                        <i class="bi bi-circle"></i><span>Add Instructions</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('instructions/view') ?>">
                        <i class="bi bi-circle"></i><span>View Instructions</span>

                    </a>
                </li>
            </ul>

        </li><!-- End Icons Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-loantypes" data-bs-toggle="collapse" href="#">
                <i class="bi bi-database"></i><span>Loan Types</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-loantypes" class="nav-content collapse " data-bs-parent="#sidebar-nav">
<li>
                    <a href="<?= site_url('loantypes/add') ?>">
                        <i class="bi bi-circle"></i><span>Add Loan Type</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('loantypes/view') ?>">
                        <i class="bi bi-circle"></i><span>View Loan Types</span>

                    </a>
                </li>
            </ul>
        </li><!-- End Icons Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-loanrequest" data-bs-toggle="collapse" href="#">
                <i class="bi bi-box-arrow-up-right"></i><span>Loan Request</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-loanrequest" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= site_url('loanrequest/add') ?>">
                        <i class="bi bi-circle"></i><span>Add Loan Request</span>
                    </a>
                </li>
                
                <li>
                    <a href="<?= site_url('loanrequest/view') ?>">
                        <i class="bi bi-circle"></i><span>View Loan Request</span>

                    </a>
                </li>
            </ul>

        </li><!-- End Icons Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-loan" data-bs-toggle="collapse" href="#">
                <i class="bi bi-database-check"></i><span>Loan Master Details</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-loan" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li>
                    <a href="<?= site_url('loanrequest/approvedview') ?>">
                        <i class="bi bi-circle"></i><span>View Approved Loan</span>

                    </a>
                </li>
                <li>
                    <a href="<?= site_url('loanmaster/requestdetails') ?>">
                        <i class="bi bi-circle"></i><span>Request Loan Details</span>

                    </a>
                </li>
                <li>
                    <a href="<?= site_url('loanmaster/grantedloans') ?>">
                        <i class="bi bi-circle"></i><span>View Granted Loans</span>

                    </a>
                </li>

            </ul>
        </li><!-- End Icons Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-substitution" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person-bounding-box"></i><span>Substitution</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-substitution" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                <a href="<?= site_url('substitution/add') ?>">
                    <i class="bi bi-circle"></i><span>Add Substitute</span>

                </a>
                </li>
               
                <li>
                    <a href="<?= site_url('substitution/view') ?>">
                        <i class="bi bi-circle"></i><span>View Substitute</span>

                    </a>
                </li>
       
    </ul>
</li><!-- End Icons Nav -->
<a class="nav-link collapsed" data-bs-target="#icons-reports" href="<?= site_url('reports/monthlyreport') ?>">
    <i class="bi bi-file-text-fill"></i><span>Reports</span>
</a>

<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-subitems" data-bs-toggle="collapse" href="#">
        <i class="bi bi-wallet-fill"></i><span>Sub Items</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-subitems" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="<?= site_url('SubItem/add') ?>">
                <i class="bi bi-circle"></i><span>Add Sub Item</span>
            </a>
        </li>

        <li>
            <a href="<?= site_url('SubItem/view') ?>">
                <i class="bi bi-circle"></i><span>View Sub Item</span>

            </a>
        </li>

    </ul>
</li><!-- End Icons Nav -->
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-subpayroll" data-bs-toggle="collapse" href="#">
        <i class="bi bi-stripe"></i><span>Sub Payroll</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-subpayroll" class="nav-content collapse " data-bs-parent="#sidebar-nav">

        <li>
            <a href="<?= site_url('SubPayroll/sub_month') ?>">
                <i class="bi bi-circle"></i><span>Sub Month Process</span>

            </a>
        </li>
        <li>
            <a href="<?= site_url('SubPayroll/monthendview') ?>">
                <i class="bi bi-circle"></i><span>Month end Process</span>
            </a>
        </li>
    </ul>
</li><!-- End Icons Nav -->
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-ot" data-bs-toggle="collapse" href="#">
        <i class="bi bi-gem"></i><span>Over Time</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-ot" class="nav-content collapse " data-bs-parent="#sidebar-nav">
<li>
                    <a href="<?= site_url('ot/add') ?>">
                        <i class="bi bi-circle"></i><span>Add Over Time</span>
                    </a>
                </li>
        <li>
            <a href="<?= site_url('ot/view') ?>">
                <i class="bi bi-circle"></i><span>View Over Time</span>

            </a>
        </li>
    </ul>
</li><!-- End Icons Nav -->
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-payroll" data-bs-toggle="collapse" href="#">
        <i class="bi bi-clipboard-fill"></i><span>Payroll</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-payroll" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="<?= site_url('payroll/month') ?>">
                <i class="bi bi-circle"></i><span>Month Process</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('payroll/monthendview') ?>">
                <i class="bi bi-circle"></i><span>Month end Process</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('payroll/payslip') ?>">
                <i class="bi bi-circle"></i><span>Pay Slip</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('payroll/paysheet') ?>">
                <i class="bi bi-circle"></i><span>Pay Sheet</span>
            </a>
        </li>

        <li>
            <a href="<?= site_url('payroll/coin_count') ?>">
                <i class="bi bi-circle"></i><span>Coin Count</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('payroll/slip_file') ?>">
                <i class="bi bi-circle"></i><span>Slip File</span>
            </a>
        </li>

    </ul>
</li><!-- End Icons Nav -->

</ul>

</aside><!-- End Sidebar-->


