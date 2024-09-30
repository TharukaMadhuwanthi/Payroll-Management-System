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
        <h1>Below month already Month end!</h1>
        <h1> Year : <?=$Year ?>
        Month : <?php $m = DateTime::createFromFormat('!m', $Month);
                                            echo $m->format('F'); ?></h1>
    </section>
</main>