<main id="main" class="main">
    <div class="pagetitle">
        <h1>Grant Loan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Grant Loan</a></li>
                <li class="breadcrumb-item active"></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">

            <!-- Multi Columns Form -->
            <?= form_open('grantloans/add') ?>



        </div>
        <table class="table">

            <tbody>
                <?php
                $i = 1;
                foreach ($list as $key => $result) {
                    ?>
                    <tr>
                        <th>No</th>    <th scope='row'><input type="text" name="Id" value="<?= $result['requestid'] ?>"></th>
                    </tr>
                    <tr>
                        <th>Grant Date</th> <td> <div class="row g-3">
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
                                            $m = DateTime::createFromFormat('!m', $i);
                                            echo $m->format('F');
                                            ?></option>
                            <?php } ?>
                        </select>
                        <span class="text-danger"><?= service('validation')->getError('Month') ?></span>
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
                        </td>
                    </tr>
                    <tr>
                        <th>Employee</th><td><input type="text" name="Employee" value="<?= $result['EmployeeCode'] ?>-<?= $result['FirstName'] ?>&nbsp; <?= $result['LastName'] ?>">
                        <input type="text" name="EmployeeCode" value="<?= $result['EmployeeCode'] ?>"></td>
                    </tr>
                    <tr>
                        <th>Loan</th><td><input type="text" name="Type" value="<?= $result['ItemCode'] ?>-<?= $result['ItemName'] ?>"></td>
                    </tr>

                    <tr>
                        <th>Reason for loan</th>  <td><input type="text" name="Reason" value="<?= $result['Reason'] ?>"></td>
                    </tr>
                    <tr>
                        <th>Guarantor 1</th>  <td><input type="text" name="Guarantor1" value="<?= $result['Guarantor1'] ?>-<?= $result['g1FirstName'] ?>&nbsp; <?= $result['g1LastName'] ?>"></td>
                    </tr>
                    <tr>
                        <th>Guarantor 2</th> <td><input type="text" name="Guarantor2" value="<?= $result['Guarantor2'] ?>-<?= $result['g2FirstName'] ?>&nbsp; <?= $result['g2LastName'] ?>"></td>

                    </tr>
                    <tr>
                        <th>Capital</th> <td><input type="text" name="Capital" value="<?= $result['Capital'] ?>"></td>

                    </tr>
                    <tr>
                        <th>Monthly Interest Rate</th> <td><input type="text" name="MonthlyInstallmentRate" value="<?= $result['MonthlyInterest'] ?>"></td>

                    </tr>
                    <tr>
                        <th>Monthly Installment</th> <td><input type="text" name="MonthlyInstallment" value="<?= $result['NumInstallments'] ?>"></td>

                    </tr>
                    <tr>
                        <th>Monthly Installment Amount (Rs.)</th> <td><input type="text" name="MonthlyInstallmentAmount" value="<?= $result['Capital'] / $result['NumInstallments'] ?>"></td>

                    </tr>
                    <tr>
                        <th>Monthly Interest Amount (Rs.)</th> <td><input type="text" name="MonthlyiInterestAmount" value="<?= (($result['Capital'] / $result['NumInstallments']) * $result['MonthlyInterest']) / 100 ?>"></td>

                    </tr>
                      <tr>
                        <th>Total Interest Amount (Rs.)</th> <td><input type="text" name="TotalInterest" value="<?= ($result['NumInstallments'] * (($result['Capital'] / $result['NumInstallments']) * $result['MonthlyInterest']) / 100) ?>"></td>

                    </tr>
                    <tr>
                        <th>Monthly Deduction of <?= $result['ItemName'] ?> (Rs.)</th> <td><input type="text" name="MonthlyDeduction" value="<?= ($result['Capital'] / $result['NumInstallments']) + ((($result['Capital'] / $result['NumInstallments']) * $result['MonthlyInterest']) / 100) ?>"></td>

                    </tr>
      
                    <tr><td></td>
                        <td> <button type="submit" class="btn btn-primary">Submit</button>

                        </td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>




                <?= form_close() ?>
            </tbody>
        </table>
    </section>
</main>