<main id="main" class="main">
    <div class="pagetitle">
        <h1>Loan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Loan</a></li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Loan Master Details</h5>
                <span class="text-success"><?= @$msg ?></span>
                <!-- Multi Columns Form -->
                <?= form_open('loanmaster/add') ?>
                <div class="row g-3">
                   
                    <div class="col-md-4">
                        <label for="FirstName" class="form-label">Relevant Item Code</label>
                         <select id="ItemCode" class="form-select" name="ItemCode" >
                                <option value="">--</option>
                                <?php foreach ($item_list as $key => $result) { ?>
                                    <option value="<?= $result['ItemCode'] ?>"><?= $result['ItemCode'] ?>-<?= $result['ItemName'] ?></option>
                                <?php } ?>
                            </select>
                        <span class="text-danger"><?= service('validation')->getError('ItemCode') ?></span>
                    </div>

                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="Amount" class="form-label">Amount (Rs.)</label>
                            <input type="text" class="form-control" id="Amount" name="Amount" value="<?= set_value('Amount') ?>">
                                                    </div>

                        <div class="col-md-4">
                            <label for="Amount" class="form-label">Monthly Interest</label>
                            <input type="text" class="form-control" id="MonthlyInterest" name="MonthlyInterest" value="<?= set_value('MonthlyInterest') ?>"></textarea>
                            <span class="text-danger"><?= service('validation')->getError('MonthlyInterest') ?></span>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="NumInstallments" class="form-label">Number of Installments</label>
                            <input type="text" class="form-control" id="NumInstallments" name="NumInstallments" value="<?= set_value('NumInstallments') ?>"></textarea>
                            <span class="text-danger"><?= service('validation')->getError('NumInstallments') ?></span>
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