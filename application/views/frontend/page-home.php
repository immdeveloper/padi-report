<!-- Load the header -->
<?php require_once('header.php'); ?>

<div class="bg-wrapper" style="background:url('<?php echo base_url().'assets/images/bg.jpg'?>')">
<div class="bg-overlay"></div>
  <?php require_once('menu-bar.php'); ?>
  <!-- Content & Sidebar -->
  <div class="wrapper">
    <!-- Content -->
    <?php echo $content; ?>
  </div><!-- Wrapper -->
</div>

<!-- Load the footer-->
<?php require_once('footer.php'); ?>
