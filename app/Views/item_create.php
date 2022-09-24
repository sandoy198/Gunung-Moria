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
                              <div class="card-body">
                                   <form action="/item/<?= !isset($item) ? 'save' : 'update/' . $item->id ?>"
                                        method="post">
                                        <input type="hidden" id="subaction" name="subaction" value="">
                                        <div class="form-group">
                                             <label>Name</label>
                                             <input type="text" class="form-control" name="name"
                                                  value="<?= set_value('name', !isset($item) ? '' : $item->name) ?>">
                                        </div>
                                        <div class="form-group">
                                             <label>Select</label>
                                             <select class="form-control" name="category" id="category">
                                                  <option value="<?= !isset($item) ? '' : $item->category; ?>"
                                                       <?= set_select('category', !isset($item) ? '' : $item->category, true) ?>>
                                                       <?= !isset($item) ? '' : $item->category; ?>
                                                  </option>
                                                  <option value="option 1" <?= set_select('category', 'option 1') ?>>
                                                       option 1</option>
                                                  <option value="option 2" <?= set_select('category', 'option 2') ?>>
                                                       option 2</option>
                                                  <option value="option 3" <?= set_select('category', 'option 3') ?>>
                                                       option 3</option>
                                                  <option value="option 4" <?= set_select('category', 'option 4') ?>>
                                                       option 4</option>
                                                  <option value="option 5" <?= set_select('category', 'option 5') ?>>
                                                       option 5</option>
                                             </select>
                                        </div>
                                        <button class="btn btn-primary">Save</button>
                                        <button class="btn btn-primary" onclick="back()">Back</button>
                                   </form>
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
function back() {
     document.getElementById('subaction').value = 'back';
}
</script>

<?= $this->endSection() ?>