<main id="main" class="main">
    <div class="pagetitle">
        <h1>Month Summary</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Month Summary</a></li>
                <li class="breadcrumb-item active">View</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        
        <h1>Month Process is done successfully!</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Item Code</th>
                     <th>Item Name</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                
                <?php 
                $total=0;
                foreach ($list as $key=>$item): ?>
                    <tr>
                        <td><?= $item['ItemCode'] ?></td>
                        <td><?= $item['ItemName'] ?></td>
                       
                        <td style="text-align: right"><?= number_format($item['Total'], 2) ?></td>
                    </tr>
                    
                <?php 
                $total+=$item['Total'];
                endforeach; ?>
                    <tr><td></td>
                        <td>Total</td>
                        <td style="text-align: right"><?= number_format($total, 2) ?></td>
                    </tr>
            </tbody>
        </table>
    </section>
</main>
