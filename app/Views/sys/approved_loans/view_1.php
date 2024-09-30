<main id="main" class="main">
    <div class="pagetitle">
        <h1>Approved Loan Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Approved Loan Details</a></li>
                <li class="breadcrumb-item active"></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            
                <!-- Multi Columns Form -->
                <?= form_open('approved_loans/view') ?>

          
        
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                  
                    
                    <th>Date</th>
                    <th>Employee</th>
                    <th>Loan</th>
                    <th>Amount</th>
                    <th>Reason for loan</th>
                    <th>Guarantor 1</th>
                    <th>Guarantor 2</th>

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

                        <td><?= $result['Amount'] ?></td>
                        <td><?= $result['Reason'] ?></td>
                        <td><?= $result['Guarantor1'] ?>-<?= $result['g1FirstName'] ?>&nbsp; <?= $result['g1LastName'] ?></td>
                        <td><?= $result['Guarantor2'] ?>-<?= $result['g2FirstName'] ?>&nbsp; <?= $result['g2LastName'] ?></td>
                        
                    </tr>
                    <?php
                    $i++;
                }
                ?>
            <div class="text-center">
                <a href="<?= site_url('approvedloans/view/' . $result['EmployeeCode'] . '/' . $result['requestid']) ?>"><button type="button" class="btn btn-success btn-sm" style="color: white;">Approve</button></a>           
                 <a href="<?= site_url('rejectedloans/view/' . $result['EmployeeCode']) ?>"><button type="button" class="btn btn-success btn-sm" style="color: white;">Reject</button></a>
            </div> 
              <?= form_close() ?>
            </tbody>
        </table>
    </section>
</main>