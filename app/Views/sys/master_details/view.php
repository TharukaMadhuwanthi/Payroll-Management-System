<main id="main" class="main">
    <div class="pagetitle">
        <h1>Master details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Master details</a></li>
                <li class="breadcrumb-item active">View</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Master details</h5>
                <span class="text-success"><?= @$msg ?></span>
                <!-- Multi Columns Form -->
                <?= form_open('masterdetails/view') ?>
                <div class="row g-3">
                                 
                    <div class="col-md-6">
                        <label for="EmployeeCode" class="form-label">Employee Code</label>
                         <input type="text" class="form-control" id="EmployeeCode" name="EmployeeCode" value="<?= set_value('EmployeeCode') ?>">
                                            </div>            
                                   
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a type="reset" class="btn btn-secondary" href="<?= site_url('masterdetails/view')?>">Reset</a>
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
                    <th>Item Name</th>
                    <th>Amount</th>
                    
                </tr>
            </thead>
           
            
            <tbody>
                <?php
                $i = 1;
                foreach ($list as $key => $result) {
                    ?>
                    <tr>
                        <th scope='row'><?= $i ?></th>
                        
                        <td><?= $result['EmployeeCode'] ?>-<?= $result['FirstName'] ?>&nbsp;<?= $result['LastName'] ?></td>
                        <td><?= $result['ItemCode'] ?>-<?= $result['ItemName'] ?></td>

                        <td><?= $result['Amount'] ?></td>

                    </tr>
                    <?php $i++;
                }
                ?>
            </tbody>
        </table>
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
        pdf.save('Master_details.pdf');
    }, margins);
}
</script>