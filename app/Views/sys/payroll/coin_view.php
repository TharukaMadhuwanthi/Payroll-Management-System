<main id="main" class="main">
    <div class="pagetitle">
        <h1>Coin Count</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Coin Count</a></li>
                <li class="breadcrumb-item active"></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">

            <!-- Multi Columns Form -->

        </div> 



        <table class="table">

            <tbody>

                <tr>
                    <th>Coin Count Month</th>
                    <td> <div class="row g-3">
                           
                            <div class="col-md-1">
                                <label for="Month" class="form-label">Month</label>
                            </div>
                            <div class="col-md-3">
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
                            
                             <div class="col-md-1">

                                <label for="Year" class="form-label">Year</label>
                            </div>
                            <div class="col-md-3">  <select name="Year" id="Year" class="form-control">
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
                           <button type="submit" class="btn btn-primary">Count</button>
                          
                             </div>
                        </div>
                    </td>
                </tr>
           
           
            </tr>


            <table class="table">

                <tbody>

                    <tr>
                        <th>#</th>
                        <th>Employee</th>
                        <th>Net Salary</th>
                        <th>Notes 5000</th>
                        <th>Notes 1000</th>
                        <th>Notes 500</th>
                        <th>Notes 100</th>
                        <th>Notes 50</th>
                        <th>Notes 20</th>
                        <th>Notes 10</th>
                        <th>Coins 5</th>
                        <th>Coins 2</th>
                        <th>Coins 1</th>
                        <th>Coins Cents 50</th>
                        <th>Coins Cents 25</th>

                        </div>
                <div class="col-md-4">
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $total5000 = 0;
                        $total1000 = 0;
                        $total500 = 0;
                        $total100 = 0;
                        $total50 = 0;
                        $total20 = 0;
                        $total10 = 0;
                        $total5 = 0;
                        $total2 = 0;
                        $total1 = 0;
                        $totalcent50 = 0;
                        $totalcent25 = 0;

                        foreach ($list as $key => $result) {
                            $total5000 += $result['Coin5000'];
                            ?>
                            <tr>
                                <th scope='row'><?= $i ?></th>


                                <td><?= $result['EmployeeCode'] ?></td>
                                <td><?= $result['NetSalary'] ?></td>
                                <td><?= $result['Coin5000'] ?></td>
                                <td><?= $result['Coin1000'] ?></td>
                                <td><?= $result['Coin500'] ?></td>
                                <td><?= $result['Coin100'] ?></td>
                                <td><?= $result['Coin50'] ?></td>
                                <td><?= $result['Coin20'] ?></td>
                                <td><?= $result['Coin10'] ?></td>
                                <td><?= $result['Coin5'] ?></td>
                                <td><?= $result['Coin2'] ?></td>
                                <td><?= $result['Coin1'] ?></td>
                                <td><?= $result['CoinCent50'] ?></td>
                                <td><?= $result['CoinCent25'] ?></td>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Total</td>
                            <td><?= $total5000 ?></td>
                            <td><?= $total1000 ?></td>
                            <td><?= $total500 ?></td>
                            <td><?= $total100 ?></td>
                            <td><?= $total50 ?></td>
                            <td><?= $total20 ?></td>
                            <td><?= $total10 ?></td>
                            <td><?= $total5 ?></td>
                            <td><?= $total2 ?></td>
                            <td><?= $total1 ?></td>
                            <td><?= $totalcent50 ?></td>
                            <td><?= $totalcent25 ?></td>

                        </tr>

                    </tbody>
            </table>



    </section>
</main>



