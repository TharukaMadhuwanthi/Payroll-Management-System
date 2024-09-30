

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Common Entries</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Common Entries</a></li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Common Entries</h5>

                <span class="text-success"><?= @$msg ?></span>
                <!-- Multi Columns Form -->
                <?= form_open('commonentries/add') ?>
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
                            ?>><?php
                            
                             $m= DateTime::createFromFormat('!m', $i);
                        echo $m->format('F');
                             ?></option>
                                <?php } ?>
                    </select>
                    <span class="text-danger"><?= service('validation')->getError('Month') ?></span>
                </div> 
                </div>
                <div class="row g-3">
                          
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


