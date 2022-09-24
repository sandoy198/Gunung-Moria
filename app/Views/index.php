<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
          <div class="container-fluid">
               <div class="row mb-2">
                    <div class="col-sm-6">
                         <h1 class="m-0"><?= $subtitle; ?></h1>
                    </div><!-- /.col -->
               </div><!-- /.row -->
          </div><!-- /.container-fluid -->
     </div>
     <!-- /.content-header -->

     <!-- Main content -->
     <div class="content">
          <div class="container-fluid">
               <div class="row">
                    <div class="col-lg-4 col-6">
                         <div class="small-box bg-info">
                              <div class="inner">
                                   <h3>150</h3>
                                   <p>Pesanan Baru</p>
                              </div>
                              <div class="icon">
                                   <i class="fas fa-shopping-cart"></i>
                              </div>
                              <a href="#" class="small-box-footer">
                                   More info <i class="fas fa-arrow-circle-right"></i>
                              </a>
                         </div>
                    </div>

                    <div class="col-lg-4 col-6">

                         <div class="small-box bg-success">
                              <div class="inner">
                                   <h3>53</h3>
                                   <p>Pesanan Terkirim</p>
                              </div>
                              <div class="icon">
                                   <i class="fas fa-paper-plane"></i></i>
                              </div>
                              <a href="#" class="small-box-footer">
                                   More info <i class="fas fa-arrow-circle-right"></i>
                              </a>
                         </div>
                    </div>

                    <div class="col-lg-4 col-6">

                         <div class="small-box bg-warning">
                              <div class="inner">
                                   <h3>44</h3>
                                   <p>Pesanan Bulan Ini</p>
                              </div>
                              <div class="icon">
                                   <i class=" nav-icon fas fa-truck"></i>
                              </div>
                              <a href="#" class="small-box-footer">
                                   More info <i class="fas fa-arrow-circle-right"></i>
                              </a>
                         </div>
                    </div>
               </div> <!-- /.row -->
          </div><!-- /.container-fluid -->
     </div>
     <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Main Footer -->


<?= $this->endSection() ?>
<?= $this->section('js') ?>
<?= $this->endSection() ?>