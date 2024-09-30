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

                   <!-- Total Paid Card -->
            
                     
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          

          

          

                 
        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->


