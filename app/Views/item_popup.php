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
                                             <label for="name" class="col-sm-2">Nama Produk</label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control" name="name" id="name"
                                                       value="<?= set_value('name', ''); ?>">
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label for="category" class="col-sm-2">Category</label>
                                             <div class="col-sm-10">
                                                  <select class="form-control" name="category" id="category">
                                                       <option value="seal" <?= set_select('myselect', 'seal') ?>>Seal
                                                       </option>
                                                       <option value="alat_tehnik"
                                                            <?= set_select('myselect', 'alat_tehnik') ?>>
                                                            Alat Tehnik</option>

                                                  </select>
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
                                                  <th style="text-align: center;">Nama Produk</th>
                                                  <th style="text-align: center;">Category</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php $i = 1 + (10 * ($pager->getCurrentPage('group1') - 1)); ?>
                                             <?php foreach ($items as $u) : ?>
                                             <tr>
                                                  <td><?= $i++; ?></td>
                                                  <td><a href=""
                                                            onclick="tambah('<?= $u->id; ?>','<?= $u->name; ?>','<?= $u->category; ?>')"><?= $u->name; ?></a>
                                                  </td>
                                                  <td><?= $u->category; ?></td>
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
                         <div class="card">
                              <div class="card-body">
                                   <div class="row justify-content-center">
                                        <a name="create" id="create" class="btn btn-success" href="/item/create"
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
<script>
function tambah(a, b, c) {
     opener.document.forms[0].id.value = a;
     opener.document.forms[0].name.value = b;
     opener.document.forms[0].category.value = c;

     window.close();
}
</script>
<?= $this->endSection() ?>