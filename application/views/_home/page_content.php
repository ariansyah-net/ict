<main>
<div class="container-fluid my-4">

  <?php foreach ($ar->result_array() as $row){
    $date = tgl_indo($row['page_created']);

      if($row['page_active'] == 0){
        echo '
        <h4 class="text-center text-danger"><i class="fas fa-exclamation"></i> SORRY</h4>
        <p class="text-center text-danger">Content isn`t available at the moment. Please check back again later.</p>
        ';
      }else {
        echo "
        <section class='dark-grey-text'>
          <div class='row pr-lg-5'>
            <div class='col-md-5 mb-1'>
            ";
            if($row['page_img'] == ''){
              echo "<img src='".base_url()."arians/home/media/post/cards.png' class='img-fluid' alt='$row[page_title]'>";
            }else{
              echo "<img src='".base_url()."arians/home/media/post/$row[page_img]' class='img-fluid' alt='$row[page_title]'>";
            }
            echo "</div>

          <div class='col-md-7 d-flex align-items-center'>
            <div>
              <h3 class='font-weight-bold mb-4'>$row[page_title]</h3>
                <div class='text-default'>
                  <ul class='list-unstyled list-inline'>
                    <li class='list-inline-item'>
                      <i class='far fa-calendar-alt'></i> $date
                    </li>
                    <li class='list-inline-item'>
                      <i class='fas fa-edit'></i> Ariansyah, A.Md
                    </li>
                    <li class='list-inline-item'>
                      <i class='far fa-eye'></i> $row[page_hits] View
                    </li>
                </div>
                <hr>
                $row[page_content]
                <p>
                <hr class='mt-5'>
                  <div class='chip yellow lighten-4'>$row[tag_name]<i class='close fas fa-times'></i></div>
                </p>
              </div>
            </div>
          </div>
        </section>
        ";
      }
  }?>

</div>
  </main>
