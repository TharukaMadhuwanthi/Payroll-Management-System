

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Master Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Master Details</a></li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Master Details</h5>

                <span class="text-success"><?= @$msg ?></span>
                <!-- Multi Columns Form -->
                <?= form_open('masterdetails/add') ?>



                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="EmployeeCode" class="form-label">Employee</label>
                        <select id="EmployeeCode" class="form-select" name="EmployeeCode" >
                            <option>--</option>
                            <?php foreach ($employee_list as $key => $result) { ?>
                                <option value="<?= $result['EmployeeCode'] ?>"><?= $result['EmployeeCode'] ?>-<?= $result['FirstName'] ?> <?= $result['LastName'] ?></option>
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
                                    <option value="<?= $result['ItemCode'] ?>"><?= $result['ItemCode'] ?>-<?= $result['ItemName'] ?></option>
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


