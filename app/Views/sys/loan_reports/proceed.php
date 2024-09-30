<main id="main" class="main">
    <div class="pagetitle">
        <h1>Loan Reports</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Loan Reports</a></li>
                <li class="breadcrumb-item active"></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Search Loan Details</h5>
                <span class="text-success"><?= @$msg ?></span>
                <!-- Multi Columns Form -->
                <?= form_open('loan_reports/proceed') ?>


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
                    
                    <th>Relavant Item Code</th>
                    
                    <th>Amount</th>
                    <th>Monthly Interest</th>
                    <th>Number of Installments</th>
                    <th>Value of a Installment</th>
                                   
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($list as $key => $result) {
                    ?>
                    <tr>
                        <th scope='row'><?= $i ?></th>
                       
                        
                         <td><?=$result['ItemCode']?>-<?= $result['ItemName'] ?></td>
                        
                        <td><?= $result['Amount'] ?></td>
                         <td><?= $result['MonthlyInterest'] ?></td>
                         <td><?= $result['NumInstallments'] ?></td>
                         <td><?php  ?></td>
                                            
                    </tr>
                    <?php $i++;
                }
                ?>
            </tbody>
        </table>
    </section>
</main>