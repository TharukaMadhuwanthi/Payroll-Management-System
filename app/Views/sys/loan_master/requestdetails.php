<main id="main" class="main">
    <div class="pagetitle">
        <h1>Request Loan Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Request Loan Details</a></li>
                <li class="breadcrumb-item active">View</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Request Loan Details</h5>
                <span class="text-success"><?= @$msg ?></span>
                <!-- Multi Columns Form -->
                <?= form_open('loanmaster/requestdetails') ?>
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
                            

                        
                       
                         
                        <?php
                        if (!empty($dlist)) {
                 
                    $i = 1;
                    foreach ($dlist as $key => $result) {
                        ?>
                        <tr>
                    
                            <td width="25%"><?= $result['LoanType'] ?></td>
                            <td width=width="25%" align="right"><?= $result['RecoverAmount'] ?></td>
                           
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                            <?php
                        }
                        ?>
                        

                    </tbody>

                </table>
                <?php } ?>
                <?= form_close() ?>
            </div>
    </section>
</main>


