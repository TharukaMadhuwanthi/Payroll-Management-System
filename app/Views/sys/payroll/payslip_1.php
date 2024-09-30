<main id="main" class="main">
    <div class="pagetitle">
        <h1>Pay Slip</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Pay Slip</a></li>
                <li class="breadcrumb-item active">View</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Pay Slip</h5>
                <span class="text-success"><?= @$msg ?></span>
                <!-- Multi Columns Form -->
                <?= form_open('payroll/payslip') ?>
                <div class="row g-3">

                    <div class="col-md-4">

                        <select id="EmployeeCode" class="form-select" name="EmployeeCode" >
                            <option>Employee Code</option>
                            <a href="payslip.php"></a>
                            <?php foreach ($employee_list as $key => $result) { ?>
                                <option value="<?= $result['EmployeeCode'] ?>"><?= $result['EmployeeCode'] ?>-<?= $result['FirstName'] ?> <?= $result['LastName'] ?></option>
                            <?php } ?>
                        </select>
                        <span class="text-danger"><?= service('validation')->getError('EmployeeCode') ?></span>
                    </div>             


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
                        <button type="submit" class="btn btn-primary">View</button>

                    </div>
                </div><!-- End Multi Columns Form -->



                <?php if (!empty($emp)) { ?>
                    <table class="table">

                        <tbody>

                            <tr>  
                                <td align="right">Employee No:</td><td align="left"><?= $emp[0]['EmployeeCode'] ?> </td>
                            </tr>

                            <tr>  
                                <td align="right">Name:</td><td align="left"><?= $emp[0]['FirstName'] ?>&nbsp; <?= $emp[0]['LastName'] ?></td>
                            </tr>
                            <tr>  
                                <td align="right">Designation:</td><td align="left"><?= $emp[0]['DesName'] ?> </td>
                            </tr>
                            <tr>  
                                <td align="right">Work Place:</td><td align="left"><?= $emp[0]['Place'] ?> </td>
                            </tr>
                            <tr>
                                <td width="25%">    Basic:</td><td width="25%" align="right"> <?= number_format($basic['Amount'],2) ?></td><td width="50%"> </td>
                            </tr>

                        
                        <?php
                        if (!empty($list)) {
                 
                    $i = 1;
                    foreach ($list as $key => $result) {
                        ?>
                        <tr>
                    
                            <td width="25%"><?= $result['ItemName'] ?></td>
                            <td width=width="25%" align="right"><?= $result['Amount'] ?></td>
                           
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                            <?php
                        }
                        ?>
                         <tr>
                                <td width="25%">    Gross Pay:</td><td width="25%" align="right"> <?= $gross['Amount'] ?></td><td width="50%"> </td>
                            </tr>
                        <?php
                        if (!empty($dlist)) {
                 
                    $i = 1;
                    foreach ($dlist as $key => $result) {
                        ?>
                        <tr>
                    
                            <td width="25%"><?= $result['ItemName'] ?></td>
                            <td width=width="25%" align="right"><?= $result['Amount'] ?></td>
                           
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                            <?php
                        }
                        ?>
                        <tr>
                                <td width="25%">    Total Deduction :</td><td width="25%" align="right"> <?= $totaldeduct['Amount'] ?></td><td width="50%"> </td>
                            </tr>
                              <tr>
                                <td width="25%">    Net Pay :</td><td width="25%" align="right"> <?= $net['Amount'] ?></td><td width="50%"> </td>
                            </tr>

                    </tbody>

                </table>
                <?php } ?>
                <?= form_close() ?>
            </div>
    </section>
</main>

