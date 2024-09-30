<main id="main" class="main">
    <div class="pagetitle">
        <h1>Slip File</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Slip File</a></li>
                <li class="breadcrumb-item active"></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            
            <!-- Multi Columns Form -->
       
        </div>
        <div id="customers">
        <table class="table">

            <tbody>

                <tr>
                    <th>#</th>
                    <th>Employee No</th>
                    <th>Employee Name</th>
                    <th>Bank Code</th>
                    <th>Branch Code</th>
                    <th>Account No</th>
                    <th>Net Salary</th>
                    
                     
            </div>
            <div class="col-md-4">
        </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($list as $key => $result) {
                        ?>
                        <tr>
                            <th scope='row'><?= $i ?></th>

                            
                            <td><?= $result['EmployeeCode'] ?></td>
                            <td><?= $result['FirstName'] ?> <?= $result['LastName'] ?></td>
                            <td><?= $result['BankCode'] ?></td>
                            <td><?= $result['BranchCode'] ?></td>
                            <td><?= $result['AccountNo'] ?></td>
                            <td><?= $result['Amount'] ?></td>
                        
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
           <div class="text-center">
<button type="button" class="btn btn-info" onclick="javascript:demoFromHTML();">PDF</button>
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
        pdf.save('Slip_file.pdf');
    }, margins);
}
</script>




