<main id="main" class="main">
    <div class="pagetitle">
        <h1>Pay Slip</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Pay Slip</a></li>
                <li class="breadcrumb-item active">View</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Pay Slip</h5>
                <span class="text-success"><?= @$msg ?></span>
                <!-- Multi Columns Form -->
                <?= form_open('payroll/coin_count') ?>
                <div class="row g-3">

                    <div class="col-md-4">

                        <select id="EmployeeCode" class="form-select" name="EmployeeCode" >
                            <option>Employee Code</option>
                            <?php foreach ($employee_list as $key => $result) { ?>
                                <option value="<?= $result['EmployeeCode'] ?>"><?= $result['EmployeeCode'] ?>-<?= $result['FirstName'] ?> <?= $result['LastName'] ?></option>
                            <?php } ?>
                        </select>
                        <span class="text-danger"><?= service('validation')->getError('EmployeeCode') ?></span>
                    </div>             


                    <div class="col-md-3">
                        <select id="Year" class="form-select" name="Year" >
                            <option>Year</option>
                            <option>2020</option>
                            <option>2021</option> 
                            <option>2022</option> 
                            <option>2023</option>
                            <option>2024</option>
                            <option>2025</option>
                            <option>2026</option>
                            <option>2027</option>
                            <option>2028</option>
                            <option>2029</option>
                            <option>2030</option>
                            <option>2031</option>                            

                        </select>
                        <span class="text-danger"><?= service('validation')->getError('Year') ?></span>
                    </div>
                    <div class="col-md-3">
                        <select id="Month" class="form-select" name="Month" >
                            <option>Month</option>
                            <option>01</option>
                            <option>02</option> 
                            <option>03</option> 
                            <option>04</option>
                            <option>05</option>
                            <option>06</option>
                            <option>07</option>
                            <option>08</option>
                            <option>09</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>                            

                        </select>
                        <span class="text-danger"><?= service('validation')->getError('Month') ?></span>
                    </div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">View</button>

                    </div>
                </div><!-- End Multi Columns Form -->



                <?php if (!empty($emp)) { ?>
                    <table class="table">

                        <tbody>

                            

                                       </tbody>

                </table>
                <?php } ?>
                <?= form_close() ?>
            </div>
    </section>
</main>

