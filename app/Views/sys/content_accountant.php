 <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Employee Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                
                <div class="card-body">
                  <h5 class="card-title">Total Employee </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?= count($emp) ?></h6>
                      <a href="<?= base_url('employee/view') ?>" class="text-success small pt-1 fw-bold">View Details</a>
                                          
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- Employee Card -->
             <!-- Total Paid Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">


                <div class="card-body">
                  <h5 class="card-title">Salary Analysis </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-bank"></i>
                    </div>
                    <div class="ps-3">
                        <a href="<?= base_url('payroll/month_summary') ?>">  <h6> View for <?php
                        $m= DateTime::createFromFormat('!m', $an[0]['Month']);
                        echo $m->format('F')."/".$an[0]['Year'];
                      
                                
                                ?></h6> </a>
                     

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Paid Card -->
                     

            <!-- Total Paid Card -->
            
            <!-- Instructions Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                
                <div class="card-body">
                  <h5 class="card-title">Instructions </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-list"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?= count($ins) ?></h6>
                      <a href="<?= base_url('instructions/view') ?>" class="text-success small pt-1 fw-bold">View more</a>
                      
                    </div>
                  </div>
                </div>

              </div>
            </div>
            
            <!-- End Instructions Card -->

                  
                     
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          

          

        <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">


               <div class="card-body">
                  <h5 class="card-title">Total Paid </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-lkr">Rs.</i>
                    </div>
                    <div class="ps-3">
                        <h6>Month:<?= $ttl[0]['Month'] ?></h6>
                     <h6><?= $ttl[0]['Total'] ?></h6>
                     <h6>Month:<?= ($ttl[1]['Month']) ?></h6>
                     <h6><?= ($ttl[1]['Total'])  ?></h6>
                      
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Paid Card -->

                 
        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->


