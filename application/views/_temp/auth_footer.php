  <!-- JQuery -->
  <script type="text/javascript" src="<?=base_url('arians/home/js/jquery-3.4.1.min.js');?>"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?=base_url('arians/home/js/popper.min.js');?>"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?=base_url('arians/home/js/bootstrap.min.js')?>"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?=base_url('arians/home/js/mdb.min.js')?>"></script>
  <script>new WOW().init();</script>
  <script>
  $(function() {
     $('#flash').delay(500).slideDown('normal', function() {
        $(this).delay(2500).slideUp();
     });
  });
  </script>
</body>
</html>
