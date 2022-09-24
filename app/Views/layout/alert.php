<?php if (session('success') !== null) : ?>
<div class="alert alert-success" role="alert"><?= session('success') ?></div>
<?php elseif (session('successes') !== null) : ?>
<div class="alert alert-success" role="alert">
     <?php if (is_array(session('successes'))) : ?>
     <?php foreach (session('successes') as $success) : ?>
     <?= $success ?>
     <br>
     <?php endforeach ?>
     <?php else : ?>
     <?= session('successes') ?>
     <?php endif ?>
</div>
<?php endif ?>
<?php if (session('danger') !== null) : ?>
<div class="alert alert-danger" role="alert"><?= session('danger') ?></div>
<?php elseif (session('dangeres') !== null) : ?>
<div class="alert alert-danger" role="alert">
     <?php if (is_array(session('dangeres'))) : ?>
     <?php foreach (session('dangeres') as $danger) : ?>
     <?= $danger ?>
     <br>
     <?php endforeach ?>
     <?php else : ?>
     <?= session('dangeres') ?>
     <?php endif ?>
</div>
<?php endif ?>