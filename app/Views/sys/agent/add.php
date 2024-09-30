<main id="main" class="main">
    <div class="pagetitle">
        <h1>Remittance Agent</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Remittance Agent</a></li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Remittance Agent</h5>
                <span class="text-success"><?= @$msg ?></span>
                <!-- Multi Columns Form -->
                <?= form_open('agent/add') ?>
              
                <div class="row g-3">
 <div class="row g-3">

                    <div class="col-md-5">
                        <label for="Agent" class="form-label">Agent </label>
                        <select id="ItemCode" class="form-select" name="ItemCode" >
                            <option>--</option>
                            <?php foreach ($item_list as $key => $result) { ?>
                                <option value="<?= $result['ItemCode'] ?>"><?= $result['ItemCode'] ?>-<?= $result['ItemName'] ?></option>
                            <?php } ?>
                        </select>
                        <span class="text-danger"><?= service('validation')->getError('ItemCode') ?></span>
                    </div>


                </div>
                    


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
                <div class="col-md-6">
                    <label for="TelNo" class="form-label">Account Number</label>
                    <input type="text" class="form-control" id="AccountNo" name="AccountNo" value="<?= set_value('AccountNo') ?>">
                    <span class="text-danger"><?= service('validation')->getError('AccountNo') ?></span>
                </div>
               
                <div class="text-center">

                    <button type="submit"  class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </div><!-- End Multi Columns Form -->
            <?= form_close() ?>
        </div>
        </div> 
    </section>
</main>







