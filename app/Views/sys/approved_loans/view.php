<main id="main" class="main">
    <div class="pagetitle">
        <h1>Loan Confirmation</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Loan Confirmation</a></li>
                <li class="breadcrumb-item active"></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">

            <!-- Multi Columns Form -->
            <?= form_open('approvedloans/updateloanrequeststatus') ?>



        </div>
        <table class="table">

            <tbody>
                <?php
                $i = 1;
                foreach ($list as $key => $result) {
                    ?>
                    <tr>
                        <th>No</th>    <th scope='row'><?= $i ?></th>
                    </tr>
                    <tr>
                        <th>Date</th> <td><?= $result['Year'] ?>/<?= $result['Month'] ?>/<?= $result['Date'] ?></td>
                    </tr>
                    <tr>
                        <th>Employee</th><td><?= $result['EmployeeCode'] ?>-<?= $result['FirstName'] ?>&nbsp; <?= $result['LastName'] ?></td>
                    </tr>
                    <tr>
                        <th>Loan</th><td><?= $result['ItemCode'] ?>-<?= $result['ItemName'] ?></td>
                    </tr>
                    <tr>
                        <th>Amount</th>  <td><?= $result['Amount'] ?></td>
                    </tr>
                    <tr>
                        <th>Reason for loan</th>  <td><?= $result['Reason'] ?></td>
                    </tr>
                    <tr>
                        <th>Guarantor 1</th>  <td><?= $result['Guarantor1'] ?>-<?= $result['g1FirstName'] ?>&nbsp; <?= $result['g1LastName'] ?></td>
                    </tr>
                    <tr>
                        <th>Guarantor 2</th> <td><?= $result['Guarantor2'] ?>-<?= $result['g2FirstName'] ?>&nbsp; <?= $result['g2LastName'] ?></td>

                    </tr>
                    <tr><td></td>
                        <td> <input type="hidden" name="requestid" value="<?= $result['requestid'] ?>"><button type="submit" class="btn btn-success btn-sm" style="color: white;" name="action" value="1">Approve</button>          
                            <button type="submit" class="btn btn-success btn-sm" style="color: white;" name="action" value="2">Reject</button>
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