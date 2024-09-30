<main id="main" class="main">
    <div class="pagetitle">
        <h1>Granted Loans</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Granted Loan</a></li>
                <li class="breadcrumb-item active">View</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Loan Request Id</h5>
                <span class="text-success"><?= @$msg ?></span>
                <!-- Multi Columns Form -->
                <?= form_open('loanmaster/GrantedLoans') ?>


                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="ItemCode" class="form-label">Employee</label>
                        <input type="text" class="form-control" id="ItemCode" name="EmployeeCode" value="<?= set_value('EmployeeCode') ?>">
                    </div>            


                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div><!-- End Multi Columns Form -->
                <?= form_close() ?>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Loan Request Id</th>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Date</th>
                    <th>Employee</th>
                    <th>Loan Type</th>
                    <th>Capital</th>
                    <th>Monthly Installment</th>
                    
                    <th>Monthly Interest</th>
                    <th>Total Interest</th>
                    <th>Monthly Deduction</th>
                    <th>Recover Amount</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($glist as $key => $result) {
                    ?>
                    <tr>
                        <th scope='row'><?= $i ?></th>

                        <td><?= $result['LoanRequestId'] ?></td>
                        <td><?= $result['RYear'] ?></td>
                        <td><?= $result['RMonth'] ?></td>
                        <td><?= $result['RDate'] ?></td>
                        <td><?= $result['EmployeeCode'] ?>-<?= $result['FirstName'] ?> <?= $result['LastName'] ?></td>
                        <td><?= $result['LoanType'] ?><?= $result['ItemName'] ?></td>
                        <td><?= $result['Capital'] ?></td>
                        <td><?= $result['MonthlyInstallment'] ?></td>
                        <td><?= $result['MonthlyInterest'] ?></td>
                        <td><?= $result['TotalInterest'] ?></td>
                        <td><?= $result['MonthlyDeduction'] ?></td>
                        <td><?= $result['RecoverAmount'] ?></td>

                    </tr>
                    <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </section>
</main>