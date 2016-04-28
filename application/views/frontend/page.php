<!-- Load the header -->
<?php require_once('header.php'); ?>

<!-- Content & Sidebar -->
<div class="container-fluid no-pad">
      <!-- Load the sidebar -->
      <?php require_once('sidebar.php'); ?>
    <div class="page-wrapper">
      <!-- Top bar -->
      <?php require_once('top-bar.php'); ?>

      <!-- Content -->
      <div class="content-wrapper">
        <?php echo $content; ?>
      </div>

      <!-- Load the footer-->
      <?php require_once('footer.php'); ?>
    </div>

</div><!-- Container fluid -->
