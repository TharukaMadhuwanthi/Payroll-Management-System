<main id="main" class="main">
    <div class="pagetitle">
        <h1>Update Employee</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Update Employee</a></li>
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
               
                <div class="row g-3">
                    <table>
                        <tr>
<td style="font-size: 12px;"><a class="btn btn-primary btn-sm" href="<?= site_url('employee/updatedetails') ?>">Edit</a></td>
                      
                        </tr>
                    </table>
                </div>
               
            </div>
    </section>
</main>

