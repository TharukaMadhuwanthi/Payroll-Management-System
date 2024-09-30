<main id="main" class="main">
    <div class="pagetitle">
        <h1>Work Place</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Work Place</a></li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Work Place</h5>
                <span class="text-success"><?= @$msg ?></span>
                <!-- Multi Columns Form -->
                <?= form_open('workplace/add') ?>
                <div class="row g-3">
                  
        
                     <div class="row g-3">
                    <div class="col-md-6">
                        <label for="ItemName" class="form-label">Place</label>
                        <input type="text" class="form-control" id="Place" name="Place" value="<?= set_value('Place') ?>" onchange="LoadPlaceId(this.value)>
                        <span class="text-danger"><?= service('validation')->getError('Place') ?></span>
                    </div>
                     </div>
                    
                  
                  
                        </div>
                    </div>                          


                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div><!-- End Multi Columns Form -->
                <?= form_close() ?>
            </div>
        </div> 
    </section>
</main>
