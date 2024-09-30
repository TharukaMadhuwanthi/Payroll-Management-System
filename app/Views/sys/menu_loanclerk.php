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
            <a class="nav-link collapsed" data-bs-target="#icons-instructions" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Instructions</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-instructions" class="nav-content collapse " data-bs-parent="#sidebar-nav">
               
                    <a href="<?= site_url('instructions/view') ?>">
                        <i class="bi bi-circle"></i><span>View Instructions</span>

                    </a>
                </li>
            </ul>

        </li><!-- End Icons Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-loantypes" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gem"></i><span>Loan Types</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-loantypes" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= site_url('loantypes/add') ?>">
                        <i class="bi bi-circle"></i><span>Add Loan Type</span>
                    </a>
                </li>
                
                <li>
                    <a href="<?= site_url('loantypes/view') ?>">
                        <i class="bi bi-circle"></i><span>View Loan Type</span>

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
                    <a href="<?= site_url('loanmaster/edit') ?>">
                        <i class="bi bi-circle"></i><span>Edit Loan</span>
                    </a>
                </li>
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
                    <a href="<?= site_url('loanrequest/edit') ?>">
                        <i class="bi bi-circle"></i><span>Edit Loan Request</span>
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
            <a class="nav-link collapsed" data-bs-target="#icons-loanreports" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gem"></i><span>Salary Reports</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-loanreports" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= site_url('loanreports/proceed') ?>">
                        <i class="bi bi-circle"></i><span>Payslips</span>
                    </a>

            </ul>

        </li><!-- End Icons Nav -->

                  <a class="nav-link collapsed" data-bs-target="#icons-reports" href="<?= site_url('reports/monthlyreport') ?>">
                <i class="bi bi-file-text-fill"></i><span>Reports</span>
            </a>

    </ul>

</aside><!-- End Sidebar-->


