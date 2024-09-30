<main id="main" class="main">
    <div class="pagetitle">
        <h1>Month Process</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Month Process</a></li>
                <li class="breadcrumb-item active"></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">

            <!-- Multi Columns Form -->
           <?= form_open('Payroll/month_process') ?>



        </div>
        <table class="table">

            <tbody>

                <tr>
                    <th>Processing Month</th>
                    <td> <div class="row g-3">
                           <div class="col-md-1">
                                <label for="Month" class="form-label">Month</label>
                            </div>
                            <div class="col-md-3">
                                <select name="Month" id="Month" class="form-control">
                                    <option value="">--</option>
                                    <?php
                                    $cmonth = date('m');

                                    for ($i = 1; $i <= 12; $i++) {
                                        ?>
                                        <option value="<?= $i ?>" <?php
                                        if ($i == $cmonth) {
                                            echo 'selected';
                                        }
                                        ?>><?php
                                                    $m = DateTime::createFromFormat('!m', $i);
                                                    echo $m->format('F');
                                                    ?></option>
                                    <?php } ?>
                                </select>
                                <span class="text-danger"><?= service('validation')->getError('Month') ?></span>

                            </div>
                            
                             <div class="col-md-1">

                                <label for="Year" class="form-label">Year</label>
                            </div>
                            <div class="col-md-3">  <select name="Year" id="Year" class="form-control">
                                    <option value="">--</option>
                                    <?php
                                    $cyear = date('Y');

                                    for ($i = 2023; $i <= 2030; $i++) {
                                        ?>
                                        <option value="<?= $i ?>" <?php
                                        if ($i == $cyear) {
                                            echo 'selected';
                                        }
                                        ?>><?= $i ?></option>
                                            <?php } ?>
                                </select>
                                <span class="text-danger"><?= service('validation')->getError('Year') ?></span>
                            </div> 
                             <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">Process</button>
                             </div>
                        </div>
                    </td>
                </tr>
           
            
            </tr>

          <?= form_close() ?>
            </tbody>
        </table>
    </section>
</main>


