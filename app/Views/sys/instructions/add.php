<main id="main" class="main">
    <div class="pagetitle">
        <h1>Instructions</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Instructions</a></li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Instructions</h5>
                <span class="text-success"><?= @$msg ?></span>
                <!-- Multi Columns Form -->
                <?= form_open('instructions/add') ?>
                <div class="row g-3">
                        <div class="col-md-4">
                            <label for="Amount" class="form-label">Instruction No</label>
                            <input type="text" class="form-control" id="InstructionId" name="InstructionId" value="<?= set_value('InstructionId') ?>">
                            <span class="text-danger"><?= service('validation')->getError('InstructionId') ?></span>
                        </div>
                </div>
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
                    <div class="col-md-2">
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
                                $m=DateTime::createFromFormat('!m', $i);
                                echo $m->format('F'); ?></option>
                                    <?php } ?>
                        </select>
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
                    <div class="col-12">
                        <label for="Description" class="form-label">Instruction</label>
                        <textarea class="form-control" id="Instruction" name="Instruction" value="<?= set_value('Instruction') ?>"></textarea>
                     <span class="text-danger"><?= service('validation')->getError('Instruction') ?></span>
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