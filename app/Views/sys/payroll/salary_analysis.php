<main id="main" class="main">
    <div class="pagetitle">
        <h1>Salary Analysis</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Salary Analysis</a></li>
                <li class="breadcrumb-item active">View</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <?= form_open('payroll/salary_analysis') ?>
        <div class="row g-3">

            <div class="col-md-3">
                <select id="Year" class="form-select" name="Year" >
                    <option>Year</option>
                    <option>2020</option>
                    <option>2021</option> 
                    <option>2022</option> 
                    <option>2023</option>
                    <option>2024</option>
                    <option>2025</option>
                    <option>2026</option>
                    <option>2027</option>
                    <option>2028</option>
                    <option>2029</option>
                    <option>2030</option>
                    <option>2031</option>                            

                </select>
                <span class="text-danger"><?= service('validation')->getError('Year') ?></span>
            </div>
            <div class="col-md-3">
                <select id="Month" class="form-select" name="Month" >
                    <option>Month</option>
                    <option>01</option>
                    <option>02</option> 
                    <option>03</option> 
                    <option>04</option>
                    <option>05</option>
                    <option>06</option>
                    <option>07</option>
                    <option>08</option>
                    <option>09</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>                            

                </select>
                <span class="text-danger"><?= service('validation')->getError('Month') ?></span>
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">View</button>

            </div>
        </div><!-- End Multi Columns Form -->

        <table>
            <tr>
                <td>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Item Code</th>
                                <th>Item Name</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tbody>
                            <?php
                            $gtotal = 0;
                            ?>
                            <?php
                            foreach ($list as $item) {
                                $gtotal += $item['Total'];
                                ?>
                                <tr>
                                    <td><?= $item['ItemCode'] ?></td>
                                    <td><?= $item['ItemName'] ?></td>

                                    <td style="text-align: right"><?= number_format($item['Total'], 2) ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td></td>
                                <td>Total</td>
                                <td style="text-align: right"> <?= number_format($gtotal, 2) ?></td>
                            </tr>
                        </tbody>
                    </table>   
                </td>
                <td>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Item Code</th>
                                <th>Item Name</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tbody>
                            <?php
                            $dtotal = 0;
                            ?>
                            <?php
                            foreach ($listd as $item) {
                                $dtotal += $item['Total'];
                                ?>
                                <tr>
                                    <td><?= $item['ItemCode'] ?></td>
                                    <td><?= $item['ItemName'] ?></td>

                                    <td style="text-align: right"><?= number_format($item['Total'], 2) ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td></td>
                                <td>Cheque Amount</td>
                                <td><?= $net[0]['Total'] ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Total</td>
                                <td style="text-align: right"> <?= number_format($dtotal+$net[0]['Total'], 2) ?></td>
                            </tr>
                        </tbody>
                    </table>  
                </td>
            </tr>
        </table>

        <?= form_close() ?>
    </section>
</main>
