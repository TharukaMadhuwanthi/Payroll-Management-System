<main id="main" class="main">
    <div class="pagetitle">
        <h1>Employee details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Employee details</a></li>
                <li class="breadcrumb-item active">View</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Employee details</h5>
                <span class="text-success"><?= @$msg ?></span>
                <!-- Multi Columns Form -->
                <?= form_open('employee/view') ?>


                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="EmployeeCode" class="form-label">Employee Code</label>
                        <input type="text" class="form-control" id="EmployeeCode" name="EmployeeCode" value="<?= set_value('EmployeeCode') ?>">
                    </div>            


                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a type="reset" class="btn btn-secondary" href="<?= site_url('employee/view')?>">Reset</a>
                   <button type="button" class="btn btn-info" onclick="javascript:demoFromHTML();">PDF</button>
                    
                    </div>
                </div><!-- End Multi Columns Form -->
                <?= form_close() ?>
            </div>
            </div>
        <div id="customers">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Employee Code</th>
                        <th>Title</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>DOB</th>
                        <th>NIC</th>
                        <th>Type</th>
                        <th>Appointment Date</th>
                        <th>Designation</th>
                        <th>Work Place</th>
                        <th>Email</th>
                        <th>Tele No</th>
                        <th>Address</th>
                        <th>Bank Code</th>
                        <th>Branch Code</th>
                        <th>Account No</th>
                        <th>Status</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($list as $key => $result) {
                        ?>
                        <tr>
                            <th scope='row'><?= $i ?></th>

                            <td><?= $result['EmployeeCode'] ?></td>
                            <td><?= $result['Title'] ?></td>
                            <td><?= $result['FirstName'] ?></td>
                            <td><?= $result['LastName'] ?></td>
                            <td><?= $result['DOB'] ?></td>
                            <td><?= $result['NIC'] ?></td>
                            <td><?= $result['Type'] ?></td>
                            <td><?= $result['AppointmentDate'] ?></td>
                            <td><?= $result['DesName'] ?></td>
                            <td><?= $result['Place'] ?></td>
                            <td><?= $result['Email'] ?></td>
                            <td><?= $result['TelNo'] ?></td>
                            <td><?= $result['Address'] ?></td>
                            <td><?= $result['BankCode'] ?></td>
                            <td><?= $result['BranchCode'] ?></td>
                            <td><?= $result['AccountNo'] ?></td>
                            <td><?= $result['Status'] ?></td>
                            <td style="font-size: 12px;"><a class="btn btn-primary btn-sm" href="<?= site_url('employee/updatedetails/'.$result['EmployeeCode']) ?>">Edit</a></td>

                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</main>
<script>
function demoFromHTML() {
    var pdf = new jsPDF('p', 'pt', 'letter');
    // source can be HTML-formatted string, or a reference
    // to an actual DOM element from which the text will be scraped.
    source = $('#customers')[0];

    // Define the margins and width for the content
    margins = {
        top: 40,
        bottom: 30,
        left: 20,
        width: 700 // Initial width
    };

    // Define special element handlers if needed
    specialElementHandlers = {
        // element with id of "bypass" - jQuery style selector
        '#bypassme': function (element, renderer) {
            // true = "handled elsewhere, bypass text extraction"
            return true;
        }
    };

    // Set the column width and element handlers in the options object
    options = {
        'width': margins.width, // Initial width
        'elementHandlers': specialElementHandlers
    };

    // Generate the PDF from HTML
    pdf.fromHTML(
        source, // HTML string or DOM elem ref.
        margins.left, // x coord
        margins.top, // y coord
        options, // Options object
        function (dispose) {
            // dispose: object with X, Y of the last line added to the PDF 
            //          this allows the insertion of new lines after HTML
            pdf.save('Employee.pdf'); // Save the PDF
        },
        margins // Margins object
    );
}
</script>
