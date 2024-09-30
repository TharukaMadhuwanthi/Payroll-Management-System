<main id="main" class="main">
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Profile</a></li>
                <li class="breadcrumb-item active">View</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Profile</h5>
                <span class="text-success"><?= @$msg ?></span>
                <!-- Multi Columns Form -->
                          
                    <table class="table">

                        <tbody>
                               
                            <tr>  
                                <td align="right">Employee No:</td><td align="left"><?= $list['EmployeeCode'] ?> </td>
                            </tr>

                            <tr>  
                                <td align="right">Name:</td><td align="left"><?= $list['FirstName'] ?>&nbsp; <?= $list['LastName'] ?></td>
                            </tr>
                            <tr>  
                                <td align="right">Designation:</td><td align="left"><?= $list['DesName'] ?> </td>
                            </tr>
                            <tr>  
                                <td align="right">Work Place:</td><td align="left"><?= $list['Place'] ?> </td>
                            </tr>
                           
    

                            
                        </tbody>

                    </table>
            
               
            </div>
    </section>
</main>

