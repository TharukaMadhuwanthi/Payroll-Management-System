<main id="main" class="main">
    <div class="pagetitle">
        <h1>User Account</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">User Account</a></li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create User Account</h5>
                <span class="text-success"><?= @$msg ?></span>
                <?= form_open_multipart('Useraccount/add') ?>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="EmployeeCode" class="form-label">Employee</label>
                        <select id="EmployeeCode" class="form-select" name="EmployeeCode" >
                            <option>--</option>
                            <?php foreach ($employee_list as $key => $result) { ?>
                                <option value="<?= $result['EmployeeCode'] ?>"><?= $result['EmployeeCode'] ?>-<?= $result['FirstName'] ?>&nbsp;<?= $result['LastName'] ?></option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="col-md-2">
                        <label for="Status" class="form-label">Status</label>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Status" id="Active" value="Active">
                                <label class="form-check-label" for="Active">
                                    Active
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Status" id="Inactive" value="Inactive" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Inactive
                                </label>
                            </div>
                        </div>
<span class="text-danger"><?= service('validation')->getError('Status') ?></span>
                    </div>
                </div>
                <div class="row">                                
                    <div class="form-group col-md-6">
                        <label for="name">Email</label>
                        <input type="email" class="form-control" name="Email" id="Email" value="<?= set_value('Email') ?>">
                        <span class="text-danger"><?= service('validation')->getError('Email') ?></span>
                    </div>
                </div>
                <div class="row">                                
                    <div class="form-group col-md-6">
                        <label for="name">User Type</label>
                        <select id="Year" class="form-select" name="UserType" >
                            <option>--</option>
                            <option>Admin</option>
                            <option>Accountant</option> 
                            <option>Divisional Superintendent</option> 
                            <option>Regional Administrative Officer</option>
                            <option>Chief Clerk</option>
                            <option>Salary Clerk</option>
                            <option>Loan Clerk</option>
                            <option>Post Master</option>
                            <option>Employee</option>


                        </select>
                        <span class="text-danger"><?= service('validation')->getError('UserType') ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="UserName">Username</label>
                        <input type="text" name="Username" class="form-control" id="Username" value="<?= set_value('Username') ?>">
                        <span class="text-danger"><?= service('validation')->getError('Username') ?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Password">Password</label>
                        <input type="password" name="Password" class="form-control" id="Password" value="<?= set_value('Password') ?>">
                        <span class="text-danger"><?= service('validation')->getError('Password') ?></span>
                    </div>

                </div>
                <br/>
                <div class="text-center"><button type="submit" class="btn btn-primary">Create</button></div>
                <?= form_close() ?>
            </div>
        </div> 
    </section>
</main>