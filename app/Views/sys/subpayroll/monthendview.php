<main id="main" class="main">
    <div class="pagetitle">
        <h1>Month End</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Month End</a></li>
                <li class="breadcrumb-item active"></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">

            <!-- Multi Columns Form -->
           <?= form_open('Payroll/month_end') ?>



        </div>
        <table class="table">

            <tbody>

                <tr>
                    <th>Month end for</th> <td> <div class="row g-3">
                            <div class="col-md-3">
                                <select id="Year" class="form-select" name="Year" >
                                    <option value="">Year</option>
                                    <option value="<?= $list['Year']?>"><?= $list['Year']?></option>
                                                             

                                </select>
                                <span class="text-danger"><?= service('validation')->getError('Year') ?></span>
                            </div>
                            <div class="col-md-4">
                                <select id="Month" class="form-select" name="Month" >
                                    <option value="">Month</option>
                                    <option value="<?= $list['Month']?>"><?= $list['Month']?></option>
                                                                

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




