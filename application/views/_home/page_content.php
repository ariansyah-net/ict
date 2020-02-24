<?php
// require 'conn.php';
function serialize_to_string($serial)
{
    $ar = unserialize($serial);
    return implode(' ', $ar);
}
?>

<main>
<div class="container-fluid my-4">

<?php foreach ($ar as $row) : ?>
<!-- <?php $tag = 1; ?> -->

  <?php if($row->page_active == 0) : ?>
    <h4 class="text-center text-danger"><i class="fas fa-exclamation"></i> MAAF</h4>
    <p class="text-center text-danger lead">Saat saat ini konten tidak tersedia atau tidak diaktifkan.</p>
  
  <?php else : ?>
    
    <section class='dark-grey-text'>
      <div class='row pr-lg-5'>
        <div class='col-md-5 mb-1'>
            <?php if($row->page_img == '') : ?>
              <img src="<?= base_url('arians/media/post/cards.png') ?>" class="img-fluid" alt="<?= $row->page_title ?>">
              <?php else: ?>
              <img src="<?= base_url('arians/media/post/'.$row->page_img.' ') ?>" class="img-fluid" alt="<?= $row->page_title ?>">
              <?php endif ?>
        </div>

         <div class="col-md-7 d-flex align-items-center">
          <div>
            <h3 class="font-weight-bold mb-4"><?= $row->page_title ?></h3>
              <div class="text-default">
                <ul class="list-unstyled list-inline">
                  <li class="list-inline-item">
                    <i class="far fa-calendar-alt"></i> <?php echo tgl_indo($row->page_created) ?>
                  </li>
                  <li class="list-inline-item">
                    <i class="fas fa-edit"></i> <?= $row->first_name ?>, <?= $row->last_name ?>
                  </li>
                  <li class="list-inline-item">
                    <i class="far fa-eye"></i> <?= $row->page_hits ?> View
                  </li>
              </div>
            <hr>
            <?= $row->page_content ?>
            <p>
            <hr class="mt-5">
                <div class="chip default lighten-4">
                 <i class="close fas fa-times"></i>
                 <?php echo serialize_to_string($row->tag); ?>
                 </div>

                <!--
                  <?php if ($tag % 1 == 0) { ?>
                  <div class="chip yellow lighten-4">
                  <i class="close fas fa-times"></i>
                  <?php echo $tag++; ?>
                  <?php } ?> -->
              </p>
            </div>
           </div>
          </div>
        </section>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</main>
