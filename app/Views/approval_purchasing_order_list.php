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
                                             <label for="po_number" class="col-sm-2">Nomor Purchasing Order</label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control" name="po_number"
                                                       id="po_number" value="<?= set_value('po_number', ''); ?>">
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label for="distributor_name" class="col-sm-2">Distributor</label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control" name="distributor_name"
                                                       id="distributor_name"
                                                       value="<?= set_value('distributor_name', ''); ?>">
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label for="status" class="col-sm-2">Status</label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control" name="status" id="status"
                                                       value="<?= set_value('status', ''); ?>">
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
                                        <div class="form-group row justify-content-end">
                                             <button type="submit" class="btn btn-success">Search</button>
                                        </div>
                                   </form>
                              </div>
                         </div>

                         <div class="card">
                              <div class="card-header">
                                   <h3 class="card-title">Purchasing Order Table</h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                   <table class="table table-bordered">
                                        <thead>
                                             <tr>
                                                  <th style="width: 10px; text-align: center;">#</th>
                                                  <th style="text-align: center;">Nomor Purchasing Order</th>
                                                  <th style="text-align: center;">Distributor</th>
                                                  <th style="text-align: center;">Tanggal Buat</th>
                                                  <th style="text-align: center;">Status</th>
                                                  <th style="text-align: center;" colspan="3">#</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php $i = 1 + (10 * ($pager->getCurrentPage('group1') - 1)); ?>
                                             <?php foreach ($po as $u) : ?>
                                             <tr>
                                                  <td><?= $i++; ?></td>
                                                  <td><?= $u->purchasing_order_number; ?></td>
                                                  <td><?= $u->distributor; ?></td>
                                                  <td><?= $u->order_date; ?></td>
                                                  <td><?= $u->status; ?></td>
                                                  <td style="text-align: center;">
                                                       <a class="btn btn-default"
                                                            href="/PurchasingOrder/<?= $u->id; ?>">Detail</a>
                                                  </td>
                                                  <td style="text-align: center;">
                                                       <form action="/PurchasingOrder/Approve/<?= $u->id; ?>"
                                                            method="post">
                                                            <button type="submit"
                                                                 class="btn btn-default">Approve</button>
                                                       </form>
                                                  </td>
                                                  <td style="text-align: center;">
                                                       <form action="/PurchasingOrder/Reject/<?= $u->id; ?>"
                                                            method="post">
                                                            <button type="submit"
                                                                 class="btn btn-default">Reject</button>
                                                       </form>
                                                  </td>

                                             </tr>
                                             <?php endforeach; ?>
                                        </tbody>
                                   </table>
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer clearfix">
                                   <?= $pager->simpleLinks('group1', 'sandoy_pager') ?>
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