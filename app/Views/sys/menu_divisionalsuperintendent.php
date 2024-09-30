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
                    <a href="<?= site_url('employee/view') ?>">
                        <i class="bi bi-circle"></i><span>View Employee</span>
                    </a>
                </li>
               

            </ul>
        </li><!-- End Components Nav -->
 
       


   

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-instructions" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gem"></i><span>Instructions</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-instructions" class="nav-content collapse " data-bs-parent="#sidebar-nav">
             
                <li>
                    <a href="<?= site_url('instructions/view') ?>">
                        <i class="bi bi-circle"></i><span>View Instructions</span>

                    </a>
                </li>
            </ul>

        </li><!-- End Icons Nav -->
  
        

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-substitution" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gem"></i><span>Substitution</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-substitution" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
                    <a href="<?= site_url('ot/view') ?>">
                        <i class="bi bi-circle"></i><span>View Over Time</span>

                    </a>
                </li>
            </ul>
        </li><!-- End Icons Nav -->
                  <a class="nav-link collapsed" data-bs-target="#icons-reports" href="<?= site_url('reports/monthlyreport') ?>">
                <i class="bi bi-file-text-fill"></i><span>Reports</span>
            </a>

    </ul>

</aside><!-- End Sidebar-->


