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
                                                  <td><?= $u['name']; ?></td>
                                                  <td><?= $u['category']; ?></td>
                                                  <td><?= $u['jumlah']; ?></td>
                                             </tr>
                                             <?php endforeach; ?>
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                         <div class="card">
                              <div class="card-header">
                                   <h3 class="card-title">Detail</h3>
                              </div>

                              <div class="card-body">
                                   <form action="/SalesOrder/save" method="post">
                                        <div class="row">
                                             <div class="col">
                                                  <div class="form-group">
                                                       <label for="sales">Sales</label>
                                                       <input type="text" class="form-control" id="sales" name="sales"
                                                            value="<?= set_value('sales', $salesOrder->sales) ?>"
                                                            readonly>

                                                  </div>
                                             </div>
                                             <div class="col">
                                                  <div class="form-group">
                                                       <label for="tujuan">Tujuan</label>
                                                       <input type="text" class="form-control" id="tujuan" name="tujuan"
                                                            value="<?= set_value('tujuan', $salesOrder->tujuan) ?>"
                                                            readonly>
                                                  </div>
                                             </div>
                                             <div class="col">
                                                  <div class="form-group">
                                                       <label for="tglBuat">Tanggal Buat</label>
                                                       <input type="date" class="form-control " id="tglBuat"
                                                            name="tglBuat"
                                                            value="<?= set_value('tglBuat', $salesOrder->order_date) ?>"
                                                            readonly>
                                                  </div>
                                             </div>

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
function tambah() {
     if (document.forms[0].id.value == '') {
          alert('Form Kosong!, Tambah Item Terlebih Dahulu !')
          return false;
     }
     if (document.forms[0].jumlah.value == '') {
          alert('Form Kosong!, Tambah Item Terlebih Dahulu !')
          return false;
     }
     document.forms[0].subaction.value = 'add';
}

function simpan() {
     if (document.forms[0].sales.value == '') {
          alert('Form Kosong!, Lengkapi Sales Order Terlebih Dahulu !')
          return false;
     }
     if (document.forms[0].tujuan.value == '') {
          alert('Form Kosong!, Lengkapi Sales Order Terlebih Dahulu !')
          return false;
     }
     if (document.forms[0].tglBuat.value == '') {
          alert('Form Kosong!, Lengkapi Sales Order Terlebih Dahulu !')
          return false;
     }
     document.forms[0].subaction.value = 'save';
}

function onDelete(a) {
     document.forms[0].subaction.value = 'remove';
     document.forms[0].id.value = a;
     document.forms[0].submit();


}
</script>

<?= $this->endSection() ?>