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
               <div class="row ">
                    <div class="col">
                         <div class="card">
                              <div class="card-body ">
                                   <form action="/show" method="post">
                                        <div class="form-group row">
                                             <label for="sales_name" class="col-sm-2">Nama Sales</label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control" name="sales_name"
                                                       id="sales_name" value="<?= set_value('sales_name', ''); ?>">
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label for="sj_number" class="col-sm-2">Nomor Surat Jalan</label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control" name="sj_number"
                                                       id="sj_number" value="<?= set_value('sj_number', ''); ?>">
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label for="so_number" class="col-sm-2">Nomor Sales Order</label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control" name="so_number"
                                                       id="so_number" value="<?= set_value('so_number', ''); ?>">
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label for="so_date" class="col-sm-2">Tanggal</label>
                                             <div class="col-sm-5">
                                                  <input type="date" class="form-control" name="from_date"
                                                       id="from_date" value="<?= set_value('from_date', ''); ?>">
                                             </div>
                                             <div class="col-sm-5">
                                                  <input type="date" class="form-control" name="to_date" id="to_date"
                                                       value="<?= set_value('to_date', ''); ?>">
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label for="tujuan" class="col-sm-2">Nama Tujuan</label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control" name="tujuan" id="tujuan"
                                                       value="<?= set_value('tujuan', ''); ?>">
                                             </div>
                                        </div>
                                        <div class="form-group row justify-content-end">
                                             <button type="submit" class="btn btn-success">Search</button>
                                        </div>
                                   </form>
                              </div>
                         </div>

                         <div class="card">
                              <div class="card-header">
                                   <h3 class="card-title">Item Table</h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                   <table class="table table-bordered">
                                        <thead>
                                             <tr>
                                                  <th style="width: 10px; text-align: center;">#</th>
                                                  <th style="text-align: center;">Nomor Surat jalan</th>
                                                  <th style="text-align: center;">Nomor Sales Order</th>
                                                  <th style="text-align: center;">Nama Sales</th>
                                                  <th style="text-align: center;">Nama Tujuan</th>
                                                  <th style="text-align: center;">Tanggal Buat</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php $i = 1 + (10 * ($pager->getCurrentPage('group1') - 1)); ?>
                                             <?php foreach ($salesOrder as $u) : ?>

                                             <tr>
                                                  <td><?= $i++; ?></td>
                                                  <td><?= $u->sales_order_number; ?></td>
                                                  <td><?= $u->sales_order_number; ?></td>
                                                  <td><?= $u->sales; ?></td>
                                                  <td><?= $u->tujuan; ?></td>
                                                  <td><?= $u->order_date; ?></td>
                                             </tr>
                                             <?php endforeach; ?>
                                        </tbody>
                                   </table>
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer clearfix">
                              </div>
                         </div>
                         <div class="card">
                              <div class="card-body">
                                   <div class="row justify-content-center">
                                        <a name="create" id="create" class="btn btn-success" href="/SendingOrder/create"
                                             role="button">New</a>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
               <!-- /.row -->
          </div><!-- /.container-fluid -->
     </div>
     <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Main Footer -->


<?= $this->endSection() ?>
<?= $this->section('js') ?>
<?= $this->endSection() ?>