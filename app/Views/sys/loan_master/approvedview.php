<main id="main" class="main">
    <div class="pagetitle">
        <h1>Approved Loan Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Approved Loans</a></li>
                <li class="breadcrumb-item active">View</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Approved Loan Details</h5>
                <span class="text-success"><?= @$msg ?></span>
                <!-- Multi Columns Form -->
                <?= form_open('loanrequest/getApprovedLoanDetails') ?>


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
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>

                    <th>Date</th>
                    <th>Employee</th>
                    <th>Loan</th>
                   
                    <th>Reason for loan</th>
                    <th>Guarantor 1</th>
                    <th>Guarantor 2</th>
                    <th>Capital</th>
                    <th>Monthly Interest</th>
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

                        <td><?= $result['Year'] ?>/<?= $result['Month'] ?>/<?= $result['Date'] ?></td>

                        <td><?= $result['EmployeeCode'] ?>-<?= $result['FirstName'] ?>&nbsp; <?= $result['LastName'] ?></td>
                        <td><?= $result['ItemCode'] ?>-<?= $result['ItemName'] ?></td>

                      
                        <td><?= $result['Reason'] ?></td>
                        <td><?= $result['Guarantor1'] ?>-<?= $result['g1FirstName'] ?>&nbsp; <?= $result['g1LastName'] ?></td>
                        <td><?= $result['Guarantor2'] ?>-<?= $result['g2FirstName'] ?>&nbsp; <?= $result['g2LastName'] ?></td>
                        <td><?= $result['Capital'] ?></td>
                        <td><?= $result['MonthlyInterest'] ?></td>
                        <td>

                            <a href="<?= site_url('loanrequest/grantview/' . $result['EmployeeCode'] . '/' . $result['requestid']) ?>"><button type="button" class="btn btn-success btn-sm" style="color: white;">Grant</button></a>


                        </td>             

                    </tr>

                    <?php
                    $i++;
                }
                ?>


            </tbody>
        </table>
    </section>
</main>