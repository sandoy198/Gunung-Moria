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
                                                  <th style="text-align: center;">Action</th>
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
                                                  <td style="text-align: center;">
                                                       <a class="btn btn-default"
                                                            onclick="onDelete('<?= $u['id']; ?>');">delete</a>
                                                  </td>
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
                                   <form action="/SalesOrder/save" method="post">
                                        <div class="row">
                                             <div class="col">
                                                  <div class="form-group">
                                                       <label for="sales">Sales</label>
                                                       <input type="text" class="form-control" id="sales" name="sales"
                                                            value="<?= set_value('sales', '') ?>">

                                                  </div>
                                             </div>
                                             <div class="col">
                                                  <div class="form-group">
                                                       <label for="tujuan">Tujuan</label>
                                                       <input type="text" class="form-control" id="tujuan" name="tujuan"
                                                            value="<?= set_value('tujuan', '') ?>">
                                                  </div>
                                             </div>
                                             <div class="col">
                                                  <div class="form-group">
                                                       <label for="tglBuat">Tanggal Buat</label>
                                                       <input type="date" class="form-control " id="tglBuat"
                                                            name="tglBuat" value="<?= old('tglBuat'); ?>">
                                                  </div>
                                             </div>

                                        </div>
                                        <div class="row align-items-center">
                                             <input type="text" class="form-control" id="id" name="id" hidden>
                                             <input type="text" class="form-control" id="subaction" name="subaction"
                                                  value="" hidden>

                                             <div class="col">
                                                  <div class="form-group">
                                                       <label for="name">Nama</label>
                                                       <input type="text" class="form-control" id="name" name="name"
                                                            readonly>
                                                  </div>
                                             </div>
                                             <div class="col">
                                                  <div class="form-group">
                                                       <label for="category">Category</label>
                                                       <input type="text" class="form-control" id="category"
                                                            name="category" readonly>
                                                  </div>
                                             </div>
                                             <div class="col">
                                                  <div class="form-group">
                                                       <label for="jumlah">Jumlah</label>
                                                       <input type="text" class="form-control" id="jumlah"
                                                            name="jumlah">
                                                  </div>
                                             </div>
                                             <div class="col-1  ">
                                                  <a name="popup" id="popup" class="btn btn-success align-bottom "
                                                       role="button"
                                                       onclick="window.open('/SalesOrder/popupitem', 'Add Items', 'width=640px,height=480px')">+</a>
                                             </div>
                                        </div>
                                        <div class="row d-flex justify-content-around">
                                             <button id="add" onclick="return tambah()" class="btn btn-primary"
                                                  role="button">Add</button>
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