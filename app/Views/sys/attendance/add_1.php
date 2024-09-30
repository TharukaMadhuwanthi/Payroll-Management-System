

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Attendance</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Attendance</a></li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Attendance</h5>

                <span class="text-success"><?= @$msg ?></span>
                <!-- Multi Columns Form -->
                <?= form_open('attendance/add') ?>
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
                    <div class="col-md-2">
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
                                ?>><?= $i ?></option>
                                    <?php } ?>
                        </select>
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
                        <label for="EmployeeCode" class="form-label">Employee Code</label>
                        <select id="EmployeeCode" class="form-select" name="EmployeeCode" >
                            <option>--</option>
                            <?php foreach ($employee_list as $key => $result) { ?>
                            <option value="<?= $result['EmployeeCode'] ?>"><?= $result['EmployeeCode'] ?>-<?= $result['FirstName'] ?>&nbsp;<?= $result['LastName'] ?></option>
                            <?php } ?>
                        </select>
                        <span class="text-danger"><?= service('validation')->getError('EmployeeCode') ?></span>
                    </div>          
                    <div class="col-md-2">
                        <label for="Presence" class="form-label">Presence</label>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Presence" id="1" value="1">
                                <label class="form-check-label" for="Active">
                                    1
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Presence" id="0" value="0" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    0
                                </label>
                            </div>
                        </div>
                        <span class="text-danger"><?= service('validation')->getError('Presence') ?></span>
                    </div>
                    <div class="col-md-6">
                        <label for="ReliefEmployee" class="form-label">Relief Employee</label>
                        <select id="ReliefEmployee" class="form-select" name="ReliefEmployee" >
                            <option>No</option>
                            <?php foreach ($employee_list as $key => $result) { ?>
                                <option value="<?= $result['EmployeeCode'] ?>"><?= $result['EmployeeCode'] ?>-<?= $result['FirstName'] ?>&nbsp;<?= $result['LastName'] ?></option>
                            <?php } ?>
                        </select>
                        <span class="text-danger"><?= service('validation')->getError('EmployeeCode') ?></span>
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


