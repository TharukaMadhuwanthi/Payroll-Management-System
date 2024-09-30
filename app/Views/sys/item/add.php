<main id="main" class="main">
    <div class="pagetitle">
        <h1>Items</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Items</a></li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Item</h5>
                <span class="text-success"><?= @$msg ?></span>
                <!-- Multi Columns Form -->
                <?= form_open('item/add') ?>
                <div class="row g-3">
                    <div class="col-md-2">
                        <label for="FirstName" class="form-label">Item Code</label>
                        <input type="text" class="form-control" id="ItemCode" name="ItemCode" value="<?= set_value('ItemCode') ?>">
                        <span class="text-danger"><?= service('validation')->getError('ItemCode') ?></span>
                    </div>
                    <div class="col-md-2">
                        <label for="Status" class="form-label">Status</label>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Status" id="active" value="Active">
                                <label class="form-check-label" for="active">
                                    Active
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Status" id="inactive" value="Inactive" checked>
                                <label class="form-check-label" for="inactive">
                                    Inactive
                                </label>
                            </div>
                        </div>
                    </div>
                     <div class="row g-3">
                    <div class="col-md-6">
                        <label for="ItemName" class="form-label">Item Name</label>
                        <input type="text" class="form-control" id="ItemName" name="ItemName" value="<?= set_value('ItemName') ?>">
                        <span class="text-danger"><?= service('validation')->getError('ItemName') ?></span>
                    </div>
                     </div>
                    <div class="col-12">
                        <label for="Description" class="form-label">Description</label>
                        <textarea class="form-control" id="Description" name="Description" value="<?= set_value('Description') ?>"></textarea>
                    </div>
                  
                    <div class="col-md-2">
                        <label for="Status" class="form-label">Item Type</label>
                        
                            <select id="ItemType" class="form-select" name="ItemType">
                            <option value="">--</option>
                            <option value="Addition" <?php
                            if (set_value('ItemType') == 'Addition') {
                                echo 'selected';
                            }
                            ?>>Addition</option>
                            <option value="Deduction" <?php
                            if (set_value('ItemType') == 'Deduction') {
                                echo 'selected';
                            }
                            ?>>Deduction</option>
                            <option value="Calculation" <?php
                            if (set_value('ItemType') == 'Calculation') {
                                echo 'selected';
                            }
                            ?>>Calculation</option>
                        </select>
                        <span class="text-danger"><?= service('validation')->getError('ItemType') ?></span>
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