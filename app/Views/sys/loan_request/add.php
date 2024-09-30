<main id="main" class="main">
    <div class="pagetitle">
        <h1>Loan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Loan</a></li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Loan Request</h5>
                <span class="text-success"><?= @$msg ?></span>
                <!-- Multi Columns Form -->
                <?= form_open('loanrequest/add') ?>
               
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
                                    ?>><?php $m=DateTime::createFromFormat('!m', $i);
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
                            <select id="EmployeeCode" class="form-select" name="EmployeeCode" >
                    <option>--</option>
                                <?php foreach ($employee_list as $key => $result) { ?>
                                    <option value="<?= $result['EmployeeCode'] ?>"><?= $result['EmployeeCode'] ?>-<?= $result['FirstName'] ?>&nbsp;<?= $result['LastName'] ?></option>
                                <?php } ?>
                            </select>
                            <span class="text-danger"><?= service('validation')->getError('EmployeeCode') ?></span>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="LoanType" class="form-label">Loan</label>
                            <select id="LoanType" class="form-select" name="LoanType" >
                                <option value="">--</option>
                                <?php foreach ($item_list as $key => $result) { ?>
                                    <option value="<?= $result['ItemCode'] ?>"><?= $result['ItemCode'] ?>-<?= $result['ItemName'] ?></option>
                                <?php } ?>
                            </select>
                            <span class="text-danger"><?= service('validation')->getError('LoanType') ?></span>
                        </div>



                        <div class="col-md-4">
                            <label for="Amount" class="form-label">Amount (Rs.)</label>
                            <input type="text" class="form-control" id="Amount" name="Amount" onchange="LoadAmount(this.value)">
                            <span class="text-danger"><?= service('validation')->getError('Amount') ?></span>
                        </div>

                    </div>
                    <div class="col-6">
                        <label for="Reason" class="form-label">Reason for Loan</label>
                        <textarea class="form-control" id="Reason" name="Reason" value="<?= set_value('Reason') ?>"></textarea>
                        <span class="text-danger"><?= service('validation')->getError('Reason') ?></span>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="EmployeeCode" class="form-label">Guarantor 1 </label>
                            <select id="Guarantor1" class="form-select" name="Guarantor1" >
                                <option>--</option>
                                <?php foreach ($employee_list as $key => $result) { ?>
                                    <option value="<?= $result['EmployeeCode'] ?>"><?= $result['EmployeeCode'] ?>-<?= $result['FirstName'] ?>&nbsp;<?= $result['LastName'] ?></option>
                                <?php } ?>
                            </select>
                            <span class="text-danger"><?= service('validation')->getError('Guarantor1') ?></span>
                        </div>
                        <div class="col-md-6">
                            <label for="EmployeeCode" class="form-label">Guarantor 2 </label>
                            <select id="Guarantor2" class="form-select" name="Guarantor2" >
                                <option>--</option>
                                <?php foreach ($employee_list as $key => $result) { ?>
                                    <option value="<?= $result['EmployeeCode'] ?>"><?= $result['EmployeeCode'] ?>-<?= $result['FirstName'] ?>&nbsp;<?= $result['LastName'] ?></option>
                                <?php } ?>
                            </select>
                            <span class="text-danger"><?= service('validation')->getError('Guarantor2') ?></span>
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
<script>
 function LoadAmount(did) {
        var formData = "ItemCode=" + did + "&";
        $.ajax({
            type: 'POST',
            url: '<?= site_url('loanrequest/getamount') ?>',
            data: formData,
            success: function (response) {
                $("#result").html(response);
            },
            error: function (xhr, status, error) {
                alert(error);
            }
        });
    }
    </script>