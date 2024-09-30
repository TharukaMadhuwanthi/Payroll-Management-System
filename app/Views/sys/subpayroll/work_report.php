<main id="main" class="main">
    <div class="pagetitle">
        <h1>Month Process</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Month Process</a></li>
                <li class="breadcrumb-item active"></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">

            <!-- Multi Columns Form -->
           <?= form_open('Payroll/month_process') ?>



        </div>
        <table class="table">

            <tbody>

                <tr>
                    <th>Processing Month</th> <td> <div class="row g-3">
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
                            <div class="col-md-4">
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

                        </div>
                    </td>
                </tr>
            <td> <button type="submit" class="btn btn-primary">Process</button>

            </td>
            <td> 

            </td>
            </tr>

          <?= form_close() ?>
            </tbody>
        </table>
    </section>
</main>




