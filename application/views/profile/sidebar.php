<!-- Sidebar -->
<div class="bg-light " id="sidebar-wrapper">
  <div class="sidebar-heading navbar-customizes"><img src="<?=base_url()?>/packages/img/logo2.png" alt="" /> </div>
  <div class="list-group list-group-flush">
    <a href="<?=base_url()?>Profile" class="list-group-item list-group-item-action bg-light <?php if(strtolower($action)=='index' || strtolower($action)=='general')echo'active';?>"><i class="fa fa-gears" aria-hidden="true"></i> General</a>
    <a href="<?=base_url()?>Profile/security" class="list-group-item list-group-item-action bg-light <?php if(strtolower($action)=='security')echo'active'?>"><i class="fa fa-unlock-alt" aria-hidden="true"></i> security</a>
  </div>
</div>
<!-- /#sidebar-wrapper -->