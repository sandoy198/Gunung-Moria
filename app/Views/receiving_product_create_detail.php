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
                    <div class="col-lg">
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
                                                  <th style="text-align: center;">Nama Produk</th>
                                                  <th style="text-align: center;">Category</th>
                                                  <th style="text-align: center;">Jumlah</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php $i = 1; ?>
                                             <?php foreach ($items as $u) : ?>
                                             <tr>
                                                  <td><?= $i++; ?></td>
                                                  <td><?= $u->name; ?></td>
                                                  <td><?= $u->category; ?></td>
                                                  <td><?= $u->jumlah; ?></td>
                                             </tr>
                                             <?php endforeach; ?>
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                         <div class="card">
                              <div class="card-header">
                                   <h3 class="card-title">Tambah Item</h3>
                              </div>

                              <div class="card-body">
                                   <form action="/ReceivingProduct/Save/<?= $po->id; ?>" method="post">
                                        <div class="row">
                                             <div class="col">
                                                  <div class="form-group">
                                                       <label for="receiver">Penerima</label>
                                                       <input type="text" class="form-control" id="receiver"
                                                            name="receiver" value="<?= set_value('receiver', '') ?>">

                                                  </div>
                                             </div>
                                             <div class="col">
                                                  <div class="form-group">
                                                       <label for="receiving_Date">Tanggal Terima</label>
                                                       <input type="date" class="form-control " id="receiving_Date"
                                                            name="receiving_Date" value="<?= old('receiving_Date'); ?>">
                                                  </div>
                                             </div>

                                        </div>
                                        <div class="row align-items-center">
                                             <div class="col">
                                                  <div class="form-group">
                                                       <label for="poNumber">Purchasing Order Number</label>
                                                       <input type="text" class="form-control" id="poNumber"
                                                            name="poNumber" readonly
                                                            value='<?= $po->purchasing_order_number; ?>'>
                                                  </div>
                                             </div>
                                             <div class="col">
                                                  <div class="form-group">
                                                       <label for="distributor">Distributor</label>
                                                       <input type="text" class="form-control" id="distributor"
                                                            name="distributor" readonly
                                                            value="<?= $po->distributor; ?>">
                                                  </div>
                                             </div>
                                             <div class="col">
                                                  <div class="form-group">
                                                       <label for="order_date">Tanggal Order</label>
                                                       <input type="text" class="form-control" id="order_date"
                                                            name="order_date" readonly value="<?= $po->order_date; ?>">
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="row d-flex justify-content-around">
                                             <button id="save" onclick="return simpan()" class="btn btn-success"
                                                  role="button">Submit</button>
                                        </div>
                                   </form>
                              </div>
                         </div>
                    </div>
               </div>
               <!-- /.col-md-6 -->
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

<script>
function simpan() {
     if (document.forms[0].receiver.value == '') {
          alert('Form Kosong!, Tambah Penerima Terlebih Dahulu !')
          return false;
     }
     if (document.forms[0].receiving_date.value == '') {
          alert('Form Kosong!, Tambah Tanggal Penerima Terlebih Dahulu !')
          return false;
     }


}
</script>

<?= $this->endSection() ?>