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
            <a class="nav-link collapsed" data-bs-target="#icons-loanrequest" data-bs-toggle="collapse" href="#">
                <i class="bi bi-box-arrow-up-right"></i><span>Loan Request</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-loanrequest" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= site_url('loanrequest/add') ?>">
                        <i class="bi bi-circle"></i><span>Add Loan Request</span>
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

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-substitution" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gem"></i><span>Substitution</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-substitution" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= site_url('substitution/add') ?>">
                        <i class="bi bi-circle"></i><span>Add Substitute</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('substitution/edit') ?>">
                        <i class="bi bi-circle"></i><span>Edit Substitute</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('substitution/view') ?>">
                        <i class="bi bi-circle"></i><span>View Substitute</span>

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
               
            </ul>
        </li><!-- End Icons Nav -->
                
          <a class="nav-link collapsed" data-bs-target="#icons-reports" href="<?= site_url('reports/monthlyreport') ?>">
                <i class="bi bi-file-text-fill"></i><span>Reports</span>
            </a>

    </ul>

</aside><!-- End Sidebar-->


