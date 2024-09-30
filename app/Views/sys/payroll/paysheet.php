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
                        <?= form_open('payroll/paysheet') ?>
                <div class="row g-3">
                   

                    <div class="col-md-4">
                        <label for="Year" class="form-label"> &nbsp;</label>
          <select id="Place" class="form-select" name="Place" >
                            <option>Station</option>
                            
                            <?php foreach ($work_list as $key => $result) { ?>
                                <option value="<?= $result['PlaceId'] ?>"><?= $result['Place'] ?></option>
                            <?php } ?>
                        </select>
                        <span class="text-danger"><?= service('validation')->getError('Place') ?></span>
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
                            
                             $m= DateTime::createFromFormat('!m', $i);
                        echo $m->format('F');
                             ?></option>
                                <?php } ?>
                    </select>
                    <span class="text-danger"><?= service('validation')->getError('Month') ?></span>
                </div> 
                
           <div class="text-center">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
           <button type="button" class="btn btn-info" onclick="javascript:demoFromHTML();">PDF</button>
         
           </div>
                </div>
        
        <?php                         form_close() ?>
        
        <?php 
        
         if (!empty(@$items)){
             
         
        
        ?>
        <div id="customers">
        <table class="table table-striped">
            
    <thead>
        <tr>
            <th>Employee</th>
            <?php foreach ($items as $item): ?>
                <th><?= $item['ItemCode'] ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?= $employee['FirstName'] ?></td>
                <?php foreach ($items as $item): ?>
                    <td>
                        <?php
                     $amount = 0;
                        if (isset($Amount[$employee['EmployeeCode']][$item['ItemCode']])) {
                            foreach ($Amount[$employee['EmployeeCode']][$item['ItemCode']] as $row) {
                                $amount = $row['Amount'];
                                break; // break after the first row
                            }
                        }

                        echo number_format($amount, 2);
                        ?>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
        </div>
        <?php
         }
         ?>
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
        pdf.save('Paysheet.pdf');
    }, margins);
}
</script>