<main id="main" class="main">
    <div class="pagetitle">
        <h1>Over Time</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Over Time</a></li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Over Time</h5>
                <span class="text-success"><?= @$msg ?></span>
                <!-- Multi Columns Form -->
                <?= form_open('ot/add') ?>

                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="Year" class="form-label">Year</label>
                        <select name="Year" id="Year" class="form-control">
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
                        <label for="Month" class="form-label">Month</label>
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
                                ?>><?php $m= DateTime::createFromFormat('!m', $i); 
                                echo $m->format('F');?></option>
                                    <?php } ?>
                        </select>
                        <span class="text-danger"><?= service('validation')->getError('Month') ?></span>
                    </div> 
                    <div class="col-md-2">
                        <label for="Date" class="form-label">Date</label>
                        <select name="Date" id="Date" class="form-control">
                            <option value="">--</option>
                            <?php
                            $cdate = date('d');

                            for ($i = 1; $i <= 30; $i++) {
                                ?>
                                <option value="<?= $i ?>" <?php
                                if ($i == $cdate) {
                                    echo 'selected';
                                }
                                ?>><?= $i ?></option>
                                    <?php } ?>
                        </select>
                        <span class="text-danger"><?= service('validation')->getError('Date') ?></span>
                    </div>
                </div>               

                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="EmployeeCode" class="form-label">Employee</label>
                        <select id="EmployeeCode" class="form-select" name="Employee" >
                            <option></option>
                            <?php foreach ($employee_list as $key => $result) { ?>
                                <option value="<?= $result['EmployeeCode'] ?>"><?= $result['EmployeeCode'] ?>-<?= $result['FirstName'] ?>&nbsp;<?= $result['LastName'] ?></option>
                            <?php } ?>
                        </select>
                        <span class="text-danger"><?= service('validation')->getError('Employee') ?></span>
                    </div>
                </div>



                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="Month" class="form-label">Month for OT</label>
                        <select id="OtMonth" class="form-select" name="OtMonth" >
                            <option></option>
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
                        <span class="text-danger"><?= service('validation')->getError('OtMonth') ?></span>
                    </div>
                    <div class="col-md-4">
                        <label for="Year" class="form-label">Year for OT</label>
                        <select id="OtYear" class="form-select" name="OtYear" >
                            <option></option>
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
                        <span class="text-danger"><?= service('validation')->getError('OtYear') ?></span>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="OtHours" class="form-label">OT Hours</label>
                        <input type="text" class="form-control" id="OtHours" name="OtHours" value="<?= set_value('OtHours') ?>">
                        <span class="text-danger"><?= service('validation')->getError('OtHours') ?></span>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-6">
                        <label for="OtReason" class="form-label">Reason of OT</label>
                        <textarea class="form-control" id="OtReason" name="OtReason" value="<?= set_value('OtReason') ?>"></textarea>
                        <span class="text-danger"><?= service('validation')->getError('OtReason') ?></span>
                    </div>


                </div>

            </div>

        </div>                          


        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
        </div><!-- End Multi Columns Form -->
        <?= form_close() ?>
        </div>
        </div> 
    </section>
</main>