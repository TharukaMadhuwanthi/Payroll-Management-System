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
                <!-- Multi Columns Form -->
                <?= form_open('user_account/add') ?>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="IDNo" class="form-label">ID No</label>
                        <input type="text" class="form-control" id="IDNo" name="IDNo" value="<?= set_value('ID_No') ?>">
                        <span class="text-danger"><?= service('validation')->getError('IDNo') ?></span>
                    </div>
                    <div class="col-md-6">
                        <label for="Name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="Name" name="Name" value="<?= set_value('Name') ?>">
                        <span class="text-danger"><?= service('validation')->getError('Name') ?></span>
                    </div>
                    <div class="col-md-6">
                        <label for="Designation" class="form-label">Designation</label>
                        <input type="Designation" class="form-control" id="Designation" name="Designation" value="<?= set_value('Designation') ?>">
                        <span class="text-danger"><?= service('validation')->getError('Designation') ?></span>
                    </div>
                    <div class="col-md-6">
                        <label for="Office" class="form-label">Office</label>
                        <input type="text" class="form-control" id="Office" name="Office" value="<?= set_value('Office') ?>">
                        <span class="text-danger"><?= service('validation')->getError('Office') ?></span>
                    </div>
                    <div class="col-md-6">
                        <label for="Password" class="form-label">Password</label>
                        <input type="text" class="form-control" id="Password" name="Password" value="<?= set_value('Password') ?>">
                        <span class="text-danger"><?= service('validation')->getError('Password') ?></span>
                    </div>
                    <div class="col-md-6">
                        <label for="ConfirmPassword" class="form-label">Confirm Password</label>
                        <input type="text" class="form-control" id="ConfirmPassword" name="ConfirmPassword" value="<?= set_value('ConfirmPassword') ?>">
                        <span class="text-danger"><?= service('validation')->getError('ConfirmPassword') ?></span>
                    </div>                    
              
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div><!-- End Multi Columns Form -->
<?= form_close() ?>
            </div>
        </div> 
    </section>
</main>