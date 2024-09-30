<main id="main" class="main">
    <div class="pagetitle">
<h1>Requested Loan Details</h1>
        <nav>
            <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="index.html">Requested Loans</a></li>
                <li class="breadcrumb-item active">View</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Requested Loan Details</h5>
                <span class="text-success"><?= @$msg ?></span>
                <!-- Multi Columns Form -->
                <?= form_open('loan_request/view') ?>


                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="EmployeeCode" class="form-label">Employee Code</label>
                        <input type="text" class="form-control" id="EmployeeCode" name="EmployeeCode" value="<?= set_value('EmployeeCode') ?>">
                    </div>            


                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div><!-- End Multi Columns Form -->
                <?= form_close() ?>
            </div>
            
        </div>
        <?= $result['Year'] ?>/<?= $result['Month'] ?>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>

                    <th>Employee</th>
                    <th>Loan Type</th>
                    <th>Capital</th>
                    <th>Month Deduction</th>
                    <th>Paid</th>
                    <th>Remaining</th>
                    <th></th>
                  
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($list as $key => $result) {
                    ?>
                    <tr>
                        <th scope='row'><?= $i ?></th>

                        

                        <td><?= $result['EmployeeCode'] ?>-<?= $result['FirstName'] ?>&nbsp; <?= $result['LastName'] ?></td>
                        <td><?= $result['ItemCode'] ?>-<?= $result['ItemName'] ?></td>

                        <td><?= $result['Capital'] ?></td>
                        <td><?= $result['MonthlyDeduction'] ?></td>
                        <td>Paid</td>
                        <td>Remaining</td>
                           
        </tr>
        
                    <?php
                    $i++;
                }
                ?>
                    
               
            </tbody>
        </table>
    </section>
</main>

