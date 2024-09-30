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
                        <label for="emp" class="form-label"> </label>
                        <?php
                        if (session()->UserType == "Employee") {
                            ?>
                            <input type="text" id="EmployeeCode" class="form-control" name="EmployeeCode" value="<?= session()->EmployeeCode ?>" readonly> 
                            <?php
                        } else {
                            ?>
                            <select id="EmployeeCode" class="form-select" name="EmployeeCode" >
                                <option>Employee Code</option>
                                <a href="payslip.php"></a>
                                <?php foreach ($employee_list as $key => $result) { ?>
                                    <option value="<?= $result['EmployeeCode'] ?>"><?= $result['EmployeeCode'] ?>-<?= $result['FirstName'] ?> <?= $result['LastName'] ?></option>
                                <?php } ?>
                            </select>
                        <?php } ?>
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
                        <button type="button" class="btn btn-info" onclick="javascript:demoFromHTML();">PDF</button>

                    </div>
                </div><!-- End Multi Columns Form -->



                <?php if (!empty($emp)) { ?>
                    <div id="customers">
                        <table class="table table-bordered" style="width: 50%;">
                            <thead>
                                <tr>
                                    <th style="text-align: center; font-size: 18px;">Pay Slip</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Employee No:</strong></td>
                                    <td><?= $emp[0]['EmployeeCode'] ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Name:</strong></td>
                                    <td><?= $emp[0]['FirstName'] ?>&nbsp;<?= $emp[0]['LastName'] ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Designation:</strong></td>
                                    <td><?= $emp[0]['DesName'] ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Work Place:</strong></td>
                                    <td><?= $emp[0]['Place'] ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Basic:</strong></td>
                                    <td align="right"><?= number_format($basic['Amount'], 2) ?></td>
                                </tr>
                                <?php foreach ($list as $key => $result) { ?>
                                    <tr>
                                        <td><?= $result['ItemName'] ?></td>
                                        <td align="right"><?= $result['Amount'] ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td><strong>Gross Pay:</strong></td>
                                    <td align="right"><?= $gross['Amount'] ?></td>
                                </tr>
                                <?php foreach ($dlist as $key => $result) { ?>
                                    <tr>
                                        <td><?= $result['ItemName'] ?></td>
                                        <td align="right"><?= $result['Amount'] ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td><strong>Total Deduction:</strong></td>
                                    <td align="right"><?= $totaldeduct['Amount'] ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Net Pay:</strong></td>
                                    <td align="right"><?= $net['Amount'] ?></td>
                                </tr>
                            </tbody>
                        </table>


                    </div>
                <?php } ?>
                <?= form_close() ?>
            </div>
            
    </section>
</main>
<script>
function demoFromHTML() {
    var pdf = new jsPDF('l', 'pt', 'letter');
    // source can be HTML-formatted string, or a reference
    // to an actual DOM element from which the text will be scraped.
    source = $('#customers')[0];

    // we support special element handlers. Register them with jQuery-style 
    // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
    // There is no support for any other type of selectors 
    // (class, of compound) at this time.
    specialElementHandlers = {
        // element with id of "bypass" - jQuery style selector
        '#bypassme': function (element, renderer) {
            // true = "handled elsewhere, bypass text extraction"
            return true
        }
    };
    margins = {
        top: 80,
        bottom: 60,
        left: 40,
        width: 522
    };
    // all coords and widths are in jsPDF instance's declared units
    // 'inches' in this case
    pdf.fromHTML(
    source, // HTML string or DOM elem ref.
    margins.left, // x coord
    margins.top, { // y coord
        'width': margins.width, // max width of content on PDF
        'elementHandlers': specialElementHandlers
    },

    function (dispose) {
        // dispose: object with X, Y of the last line add to the PDF 
        //          this allow the insertion of new lines after html
        pdf.save('Item.pdf');
    }, margins);
}
</script>