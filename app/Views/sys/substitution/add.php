

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Substitution</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Substitution</a></li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Substitution</h5>

                <span class="text-success"><?= @$msg ?></span>
                <!-- Multi Columns Form -->
                <?= form_open('substitution/add') ?>
                <div class="row g-6">

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
                                ?>><?php
                                            $m = DateTime::createFromFormat('!m', $i);
                                            echo $m->format('F');
                                            ?></option>
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
            </div>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="Employee" class="form-label">Employee</label>
                    <select id="EmployeeCode" class="form-select" name="EmployeeCode" >
                        <option>--</option>
                        <?php foreach ($employee_list as $key => $result) { ?>
                            <option value="<?= $result['EmployeeCode'] ?>"><?= $result['EmployeeCode'] ?>-<?= $result['FirstName'] ?>&nbsp;<?= $result['LastName'] ?></option>
<?php } ?>
                    </select>
                    <span class="text-danger"><?= service('validation')->getError('Employee') ?></span>
                </div>          

                <div class="col-md-6">
                    <label for="ReliefEmployee" class="form-label">Substituted Employee</label>
                    <select id="SubstitutedEmployee" class="form-select" name="SubstitutedEmployee" >
                        <option>No</option>
                        <?php foreach ($employee_list as $key => $result) { ?>
                            <option value="<?= $result['EmployeeCode'] ?>"><?= $result['EmployeeCode'] ?>-<?= $result['FirstName'] ?>&nbsp;<?= $result['LastName'] ?></option>
<?php } ?>
                    </select>
                    <span class="text-danger"><?= service('validation')->getError('Employee') ?></span>
                </div> 
                <div class="col-md-2">
                    <label for="Availability" class="form-label">Availability</label>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Availability" id="yes" value="yes">
                            <label class="form-check-label" for="active">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Availability" id="no" value="no" >
                            <label class="form-check-label" for="inactive">
                                No
                            </label>
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


