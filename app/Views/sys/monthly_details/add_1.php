

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Monthly Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Monthly Details</a></li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Monthly Details</h5>

                <span class="text-success"><?= @$msg ?></span>
                <!-- Multi Columns Form -->
                <?= form_open('monthlydetails/add') ?>
                <div class="row g-3">
                    <div class="col-md-6">
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
                    <div class="col-md-6">
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
                        <span class="text-danger"><?= service('validation')->getError('Month') ?></span>
                    </div> 

                    <div class="row g-3">
                    <div class="col-md-6">
                        <label for="EmployeeCode" class="form-label">Employee Code</label>
                        <select id="EmployeeCode" class="form-select" name="EmployeeCode" >
                            <option>--</option>
                            <?php foreach ($employee_list as $key => $result) { ?>
                                <option value="<?= $result['EmployeeCode'] ?>"><?= $result['EmployeeCode'] ?>-<?= $result['FirstName'] ?></option>
                            <?php } ?>
                        </select>
                        <span class="text-danger"><?= service('validation')->getError('EmployeeCode') ?></span>
                    </div>          
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="ItemCode" class="form-label">Item Code</label>
                            <select id="ItemCode" class="form-select" name="ItemCode" >
                                <option value="">--</option>
                                <?php foreach ($item_list as $key => $result) { ?>
                                    <option value="<?= $result['Id'] ?>"><?= $result['Id'] ?>-<?= $result['ItemName'] ?></option>
                                <?php } ?>
                            </select>
                            <span class="text-danger"><?= service('validation')->getError('ItemCode') ?></span>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="FirstName" class="form-label">Amount (Rs.)</label>
                            <input type="text" class="form-control" id="Amount" name="Amount" value="<?= set_value('Amount') ?>">
                            <span class="text-danger"><?= service('validation')->getError('Amount') ?></span>
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

