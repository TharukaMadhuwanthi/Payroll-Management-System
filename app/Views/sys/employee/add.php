<main id="main" class="main">
    <div class="pagetitle">
        <h1>Employee</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Employee</a></li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Register Employee</h5>
                <span class="text-success"><?= @$msg ?></span>
                <!-- Multi Columns Form -->
                <?= form_open('employee/add') ?>
                <div class="row g-3">
                    <div class="col-md-8">
                        <label for="WorkPlace" class="form-label">Work Place</label>
                        <select id="WorkPlace" class="form-select" name="WorkPlace" onchange="LoadEmployeeCode(this.value)">
                            <option value="">--</option>
                            <?php foreach ($work_place_list as $key => $result) { ?>
                                <option value="<?= $result['PlaceId'] ?>"><?= $result['Place'] ?></option>
                            <?php } ?>
                        </select>
                          <span class="text-danger"><?= service('validation')->getError('WorkPlace') ?></span>
                    </div>
                    <div class="col-md-2">
                        <label for="FirstName" class="form-label">Employee Code</label>
                        <input type="text" class="form-control" id="EmployeeCode" name="EmployeeCode" value="<?= set_value('EmployeeCode') ?>" readonly>
                        <span class="text-danger"><?= service('validation')->getError('EmployeeCode') ?></span>
                    </div>
                </div> 
                <div class="row g-3">
                    <div class="col-md-2">
                        <label for="Title" class="form-label">Title</label>
                        <select id="Title" class="form-select" name="Title">
                            <option value="">--</option>
                            <option value="Mr." <?php
                            if (set_value('Title') == 'Mr.') {
                                echo 'selected';
                            }
                            ?>>Mr.</option>
                            <option value="Mrs." <?php
                            if (set_value('Title') == 'Mrs.') {
                                echo 'selected';
                            }
                            ?>>Mrs.</option>
                            <option value="Miss." <?php
                            if (set_value('Title') == 'Miss.') {
                                echo 'selected';
                            }
                            ?>>Miss.</option>
                        </select>
                        <span class="text-danger"><?= service('validation')->getError('Title') ?></span>
                    </div>
                    <div class="col-md-5">
                        <label for="FirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="FirstName" name="FirstName" value="<?= set_value('FirstName') ?>">
                        <span class="text-danger"><?= service('validation')->getError('FirstName') ?></span>
                    </div>

                    <div class="col-md-5">
                        <label for="LastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="LastName" name="LastName" value="<?= set_value('LastName') ?>">
                        <span class="text-danger"><?= service('validation')->getError('LastName') ?></span>
                    </div>

                    <div class="col-2">
                        <label for="DOB" class="form-label">DOB</label>
                        <input type="date" class="form-control" id="DOB" name="DOB" value="<?= set_value('DOB') ?>" >
                          <span class="text-danger"><?= service('validation')->getError('DOB') ?></span>
                    </div>                    
                    <div class="col-md-5">
                        <label for="NIC" class="form-label">NIC</label>
                        <input type="text" class="form-control" id="NIC" name="NIC" value="<?= set_value('NIC') ?> "maxlength="11">
                        <span class="text-danger"><?= service('validation')->getError('NIC') ?></span>
                    </div>
                    <div class="col-md-5">
                        <label for="Type" class="form-label">Type</label>
                        <select id="Type" class="form-select" name="Type">
                            
                            <option value="">--</option>
                            <option value="Permanent" <?php
                            if (set_value('Title') == 'Permanent') {
                                echo 'selected';
                            }
                            ?>>Permanent</option>
                            <option value="Temporary" <?php
                            if (set_value('Title') == 'Temporary') {
                                echo 'selected';
                            }
                            ?>>Temporary</option>
                        </select>
                          <span class="text-danger"><?= service('validation')->getError('Type') ?></span>
                    </div>

                    <div class="col-2">
                        <label for="AppointmentDate" class="form-label">Appointment Date</label>
                        <input type="date" class="form-control" id="AppointmentDate" name="AppointmentDate" value="<?= set_value('AppointmentDate') ?>" >
                     <span class="text-danger"><?= service('validation')->getError('AppointmentDate') ?></span>
                    </div>   
                    <div class="col-md-5">
                        <label for="Designation" class="form-label">Designation</label>
                        <select id="Designation" class="form-select" name="Designation">
                            <option value="">--</option>
                            <?php foreach ($designation_list as $key => $result) { ?>
                                <option value="<?= $result['DesId'] ?>"><?= $result['DesId'] ?>-<?= $result['DesName'] ?></option>
                            <?php } ?>
                        </select>
                          <span class="text-danger"><?= service('validation')->getError('Designation') ?></span>
                    </div>

                   
                    <div class="col-md-6">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="Email" name="Email" value="<?= set_value('Email') ?>">
                        <span class="text-danger"><?= service('validation')->getError('Email') ?></span>
                    </div>
                    <div class="col-md-6">
                        <label for="TelNo" class="form-label">Tel. No.</label>
                        <input type="text" class="form-control" id="TelNo" name="TelNo" value="<?= set_value('TelNo') ?>">
                       <span class="text-danger"><?= service('validation')->getError('TelNo') ?></span>
                    </div>
                    <div class="col-12">
                        <label for="Address" class="form-label">Address</label>
                        <textarea class="form-control" id="Address" name="Address" value="<?= set_value('Address') ?>"></textarea>
                    <span class="text-danger"><?= service('validation')->getError('Address') ?></span>
                    </div>
                    <div class="col-md-2">
                        <label for="TelNo" class="form-label">Bank Code</label>
                        <input type="text" class="form-control" id="BankCode" name="BankCode" value="<?= set_value('BankCode') ?>">
                        <span class="text-danger"><?= service('validation')->getError('BankCode') ?></span>
                    </div>
                    <div class="col-md-2">
                        <label for="TelNo" class="form-label">Branch Code</label>
                        <input type="text" class="form-control" id="BranchCode" name="BranchCode" value="<?= set_value('BranchCode') ?>">
                        <span class="text-danger"><?= service('validation')->getError('BranchCode') ?></span>
                    </div>
                    <div class="col-md-4">
                        <label for="TelNo" class="form-label">Account No</label>
                        <input type="text" class="form-control" id="AccountNo" name="AccountNo" value="<?= set_value('AccountNo') ?>">
                        <span class="text-danger"><?= service('validation')->getError('AccountNo') ?></span>
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
                 <!--   <div class="col-md-12">

                        <label for="District" class="form-label">District</label>
                        <select id="District" class="form-select" name="District" onchange="loadDsDivision(this.value)">
                            <option>--</option>
                            <?php foreach ($district_list as $key => $result) { ?>
                                <option value="<?= $result['Id'] ?>"><?= $result['DistrictName'] ?></option>
                            <?php } ?>
                        </select>
                          <span class="text-danger"><?= service('validation')->getError('District') ?></span>
                    </div>
                    <div class="col-md-6">
                        <div id="result"></div>
                    </div>
                    -->

                    <div class="text-center">
                        
                        <button type="submit" onclick="saveEmployee()" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div><!-- End Multi Columns Form -->
                <?= form_close() ?>
            </div>
        </div> 
    </section>
</main>


<script>
    function LoadEmployeeCode(placeid) {
        var formData = "placeid=" + placeid + "&";
        $.ajax({
            type: 'POST',
            url: '<?= site_url('employee/getemployeecode') ?>',
            data: formData,
            success: function (response) {
                $("#EmployeeCode").val(response);
            },
            error: function (xhr, status, error) {
                alert(error);
            }
        });
    }

    function loadDsDivision(did) {
        var formData = "DistrictId=" + did + "&";
        $.ajax({
            type: 'POST',
            url: '<?= site_url('employee/getdsdivision') ?>',
            data: formData,
            success: function (response) {
                $("#result").html(response);
            },
            error: function (xhr, status, error) {
                alert(error);
            }
        });
    }

    function saveEmployee() {
        var formData = $('#form_employee').serialize();

        $.ajax({
            type: 'POST',
            url: '<?= site_url('employee/getdata') ?>',
            data: formData,
            success: function (response) {

            },
            error: function (xhr, ststus, error) {
                alert(error);
            }
        });
    }
    function openModel() {

        $('#regcust').modal('show');
    }

</script>






