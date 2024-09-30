<main id="main" class="main">
    <div class="pagetitle">
        <h1>OT Confirmation</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">OT Confirmation</a></li>
                <li class="breadcrumb-item active"></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">

            <!-- Multi Columns Form -->
            <?= form_open('Ot/updateotrequeststatus') ?>



        </div>
        <table class="table">

            <tbody>
                <?php
                $i = 1;
                foreach ($list as $key => $result) {
                    ?>
                    <tr>
                        <th>No</th>    <th scope='row'><?= $i ?></th>
                    </tr>
                    <tr>
                        <th>Date</th> <td><?= $result['Year'] ?>/<?= $result['Month'] ?>/<?= $result['Date'] ?></td>
                    </tr>
                    <tr>
                        <th>Employee</th><td><?= $result['EmployeeCode'] ?>-<?= $result['FirstName'] ?>&nbsp; <?= $result['LastName'] ?></td>
                    </tr>
                    <tr>
                        <th>Month for OT</th><td><?= $result['MonthOT'] ?></td>
                    </tr>
                    <tr>
                        <th>Year for OT</th>  <td><?= $result['YearOT'] ?></td>
                    </tr>
                    <tr>
                        <th>Hours</th>  <td><?= $result['Hours'] ?></td>
                    </tr>
                    <tr>
                        <th>Reason</th>  <td><?= $result['Reason'] ?></td>
                    </tr>
                    
                    <tr><td></td>
                        <td> <input type="hidden" name="Orequestid" value="<?= $result['Orequestid'] ?>"><button type="submit" class="btn btn-success btn-sm" style="color: white;" name="action" value="1">Approve</button>          
                            <button type="submit" class="btn btn-success btn-sm" style="color: white;" name="action" value="2">Reject</button>
                        </td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
           
                       
               
            <?= form_close() ?>
            </tbody>
        </table>
    </section>
</main>

