<main>
<div class="container">

<section class="my-5">
<h3 class="h3-responsive font-weight-bold text-center my-4">JOB DESCRIPTIONS</h3>
<p class="grey-text text-center w-responsive mx-auto mb-5">
  Job description atau uraian jabatan atau gambaran tugas adalah suatu pernyataan tertulis 
  yang berisi tujuan dari dibentuknya suatu jabatan/tugas. Uraian ini berisi gambaran tentang
  apa yang harus dilakukan oleh pemegang jabatan, bagaimana suatu pekerjaan dilakukan,
  alasan-alasan mengapa pekerjaan tersebut dilakukan, hubungan antara suatu posisi tertentu
  dan posisi lainnya di luar lingkup pekerjaannya dan di luar organisasi (eksternal) untuk
  mencapai tujuan unit kerja dan perusahaan secara luas.
</p>

<hr class="pt-4">  

<!-- Grid row -->
<?php foreach ($ar as $row) : ?>
  <div class="row">
    <div class="col-md-5 col-xl-4">
      <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
        <?php if(!$row->page_img) : ?>
          <img class="img-fluid" src="<?=base_url('arians/img/section.jpg')?>" alt="NO IMAGE">
            <?php else: ?>
              <img class="img-fluid" src="<?=base_url('arians/media/post/')?><?=$row->page_img?>" alt="Sample image">
                <?php endif; ?>
                  <a><div class="mask rgba-white-slight"></div></a>
                    </div>
                      </div>
  <div class="col-lg-7 col-xl-8">
    <a href="page/<?= $row->page_slug ?>"><h4 class="font-weight-bold mb-3"><strong><?= $row->page_title ?></strong></h4></a>
      <p class="grey-text"><?= $row->page_content ?></p>
        <p class="text-muted">Ditulis oleh : <i class="far fa-user-circle"></i> <?= $row->first_name ?>, <?= $row->last_name ?> &nbsp; <i class="far fa-calendar-plus"></i> <?= tgl_indo($row->page_created);?> </p>
          <a href="page/<?= $row->page_slug ?>" class="btn btn-primary btn-md">Selengkapnya <i class="fas fa-angle-double-right ml-1"></i></a>
            </div><!-- Grid column -->
              </div><!-- Grid row -->
                <hr class="my-5">
<?php endforeach; ?>


</section>
</div>
</main>
