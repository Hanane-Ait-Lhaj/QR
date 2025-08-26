<?php
$this->load->view('admin/header.php');
?>

<!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"> -->
  <div>
  <?php $message = $this->session->flashdata('message');
  if (isset($message)): ?>
    <div class="alert alert-success">
      <?php echo $message; ?>
    </div>
  <?php endif; ?>
  </div>
  

  <?php
  $this->load->view('admin/AdminProfile.php');
  ?>
  <!-- End Page-content -->
<!-- </div> -->
  <?php
  $this->load->view('admin/footer.php');
  ?>
  