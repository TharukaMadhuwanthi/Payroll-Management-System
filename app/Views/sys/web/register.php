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
<?= form_open_multipart('web/make_register') ?>
    <div class="row g-3">
        <div class="form-group col-md-6">
            <label for="name">First Name</label>
            <input type="text" name="FirstName" class="form-control" id="FirstName" value="<?= set_value('FirstName') ?>">
           <span class="text-danger"><?= service('validation')->getError('FirstName') ?></span>
        </div>
        <div class="form-group col-md-6">
            <label for="name">Last Name</label>
            <input type="text" name="LastName" class="form-control" id="LastName" value="<?= set_value('LastName') ?>" >
            <span class="text-danger"><?= service('validation')->getError('LaststName') ?></span>
        </div>
    </div>
    <div class="row">                                
        <div class="form-group col-md-6">
            <label for="name">Your Email</label>
            <input type="email" class="form-control" name="Email" id="Email" value="<?= set_value('Email') ?>">
            <span class="text-danger"><?= service('validation')->getError('Email') ?></span>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="UserName">User Name</label>
            <input type="text" name="UserName" class="form-control" id="UserName" value="<?= set_value('UserName') ?>">
            <span class="text-danger"><?= service('validation')->getError('Email') ?></span>
        </div>
        <div class="form-group col-md-6">
            <label for="Password">Password</label>
            <input type="text" name="Password" class="form-control" id="Password" value="<?= set_value('Password') ?>">
            <span class="text-danger"><?= service('validation')->getError('Email') ?></span>
        </div>
         <div class="mb-3">
        <label for="formFile" class="form-label">Upload Image</label>
        <input class="form-control" type="file" id="profile_image" name="profile_image" value="<?= set_value('UploadImage') ?>">
        <span class="text-danger"><?= service('validation')->getError('Email') ?></span>
    </div>
    </div>

    <div class="text-center"><button type="submit">Register</button></div>
<?= form_close() ?>
            </div>
        </div> 
    </section>
</main>