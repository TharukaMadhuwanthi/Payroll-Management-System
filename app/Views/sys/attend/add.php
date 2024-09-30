

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
                <?= form_open('attend/add') ?>
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
                    
         <div class="col-md-5">
                        <label for="FirstName" class="form-label">Worked Days</label>
                        <input type="text" class="form-control" id="workeddays" name="workeddays" value="<?= set_value('workeddays') ?>">
                        <span class="text-danger"><?= service('validation')->getError('workeddays') ?></span>
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


