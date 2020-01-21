<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--Jquery Dialog -->

    <title>IT Management Asset</title>

    <link rel="stylesheet" href="<?= base_url('ar/css/style.css')?>" type="text/css">
    <!-- new -->
    <link rel="stylesheet" href="<?= base_url('ar/css/bootstrap.min.css') ?>" />
    <!-- end new -->
    <link rel="stylesheet" href="<?= base_url('ar/font-awesome/css/font-awesome.min.css') ?>">

    <link href="<?= base_url('ar/img/favicon.gif')?>" rel="shortcut icon" type="image/gif"/>
    <link rel="stylesheet" href="<?= base_url('ar/jquery-ui-1.12.1/jquery-ui.css') ?>" />

    <link rel="stylesheet" href="<?= base_url('ar/select2/dist/css/select2.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('ar/jstree/dist/themes/default/style.min.css') ?>" />
    <script type="text/javascript" src="<?= base_url('ar/js/jquery-1.12.4.js'); ?>" ></script>

    <link href="https://fonts.googleapis.com/css?family=Electrolize" rel="stylesheet">

</head>
<script> function back() { window.history.back(); } </script>

<body>
<header class="header">
  <div class="logo">&nbsp;</div>
    </header>
      <?php $this->load->view('navbar') ?>
<div class="container">
  <div class="row">
    <?php $this->load->view('_partial/flash_message') ?>
    <?php $this->load->view($main_view) ?>
      </div><!--end row-->
        </div><!--end container-->

<div class="footer"><?php $this->load->view('footer') ?></div>



<script type="text/javascript" src="<?= base_url('ar/js/jquery-2.1.4.min.js'); ?>" ></script>
  <script type="text/javascript" src="<?= base_url('ar/js/jquery.js') ?>" ></script>
    <script type="text/javascript" src="<?= base_url('ar/ar.js'); ?>" ></script>
      <script type="text/javascript" src="<?= base_url('ar/jquery-ui-1.12.1/external/jquery/jquery.js'); ?>" ></script>
        <script type="text/javascript" src="<?= base_url('ar/jquery-ui-1.12.1/jquery-ui.js'); ?>" ></script>
          <script type="text/javascript" src="<?= base_url('ar/select2/dist/js/select2.min.js'); ?>" ></script>

<!-- new -->
<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>" ></script>
<!-- end new -->


<script src="<?= base_url('ar/jstree/dist/jstree.min.js'); ?>" ></script>
<script>
$(function() {
  $("#picker").datepicker(
  {
  	dateFormat: 'dd MM yy'
  });
  $("#picker2").datepicker(
  {
      dateFormat: 'dd MM yy'
  });
  $("#picker3").datepicker(
  {
      dateFormat: 'dd MM yy'
  });
});

$(function () {
  $("#paneladmin").jstree({
      "plugins": ["core", "themes", "html_data", "search"]
   }).on("select_node.jstree", function (e, data) {
      document.location = data.instance.get_node(data.node, true).children('a').attr('href');
   });
});

$(function () {
  $("#panelmaster").jstree({
      "plugins": ["core", "themes", "html_data", "search"]
   }).on("select_node.jstree", function (e, data) {
      document.location = data.instance.get_node(data.node, true).children('a').attr('href');
   });
});

$(function () {
  $("#panelconfig").jstree({
      "plugins": ["core", "themes", "html_data", "search"]
   }).on("select_node.jstree", function (e, data) {
      document.location = data.instance.get_node(data.node, true).children('a').attr('href');
   });
});
$(function () {
  $("#panelaset").jstree({
      "plugins": ["core", "themes", "html_data", "search"]
   }).on("select_node.jstree", function (e, data) {
      document.location = data.instance.get_node(data.node, true).children('a').attr('href');
   });
});

/*flash message status*/
$(function() {
   $('#flash').delay(500).slideDown('normal', function() {
      $(this).delay(2500).slideUp();
   });
});

/*Show hide Searching Index*/
$(document).ready(function(){
  $(".showsearch").click(function(){
    $(".searching").animate({
      width: "toggle"
    });
  });
});
</script>

<script type="text/javascript">
      $(document).ready(function(){
    	  $("#side1").click(function(){
        $("#paneladmin").slideToggle("slow");
      //to change title $("#side1").html("<i class='fa fa-user-secret'></i> root Information");

      $("#room").select2({
          placeholder: "Please Select"
      });

    });

    function showTime() {
       var a_p = ""; var today = new Date(); var curr_hour = today.getHours(); var curr_minute = today.getMinutes(); var curr_second = today.getSeconds();
       if (curr_hour < 12) { a_p = "AM"; } else { a_p = "PM"; }
       if (curr_hour == 0) { curr_hour = 12; }
       if (curr_hour > 12) { curr_hour = curr_hour - 12; }
       curr_hour = checkTime(curr_hour); curr_minute = checkTime(curr_minute); curr_second = checkTime(curr_second);
       document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
       }
    function checkTime(i) {
       if (i < 10) { i = "0" + i;}
       return i;
    }
    setInterval(showTime, 500);
	})
</script>

<!-- FUNCTION JS -->
<script type="text/javascript">
		$(document).ready(function(){
			$('.ariansyah').select2();

    });
</script>

</body>
</html>
