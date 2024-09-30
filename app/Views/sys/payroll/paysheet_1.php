<main id="main" class="main">
    <div class="pagetitle">
        <h1>Pay Sheet</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Pay Sheet</a></li>
                <li class="breadcrumb-item active">View</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Pay Sheet</h5>
                <span class="text-success"><?= @$msg ?></span>
                <!-- Multi Columns Form -->
                <?= form_open('payroll/paysheet') ?>
                <div class="row g-3">

                    <div class="col-md-4">

                         
                    </div>             


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


            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Employee Code</th>
                        <th>Basic</th>
                        <th>Cost of Living</th>
                        <th>Saturday Allowance</th>
                        <th>2022 Allowance</th>
                        <th>Fuel Allowance</th>
                        <th>Telephone Allowance</th>
                        <th>Language Allowance</th>
                        <th>Agrahara</th>
                        <th>PTBA</th>
                        <th>PSMPA</th>
                        <th>HNB</th>
                        <th>Ceylinco Insurance</th>
                        <th>TMGR</th>
                        <th>COL Temporary</th>
                        <th>Gross Pay</th>
                        <th>Stamp</th>
                        <th>W&OP</th>
                        <th>PSPF</th>
                        <th>Festival Advance</th>
                        <th>Special Advance</th>
                        <th>Distress Loan</th>
                        <th>Property Loan</th>
                        <th>OT</th>
                        <th>UPTO</th>
                        <th>Dialog</th>
                        <th>TAX</th>
                        <th>Total Deduction</th>

                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
                
                <?= form_close() ?>
            </div>
    </section>
</main>


