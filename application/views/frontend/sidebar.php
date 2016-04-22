<aside class="sidebar">
  <div class="logo-bar">
    <span>logo</span>
  </div>
  <div class="sidebar-menu">
    <span class="menu-category">CATEGORY</span>
    <ul class="list-unstyled">
      <li><a href="<?php echo base_url().'admin' ?>"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a></li>
      <li><a href="javascript:void(0)" data-toggle="collapse" data-target="#sub-menu1"><i class="fa fa-archive fa-fw"></i>Point Check Master<i class="fa fa-angle-right pull-right arrow-drop"></i></a>
        <ul class="sub-menu collapse list-unstyled" id="sub-menu1">
          <li><a href="<?php echo base_url().'admin/point-check-master'?>">Show all</a></li>
          <li><a href="<?php echo base_url().'admin/point-check-master/add'?>">Add new</a></li>
        </ul>
      </li>
    </ul>
    <span class="menu-category">TESTING</span>
    <ul class="list-unstyled">
      <li><a href="<?php echo base_url().'testing' ?>"><i class="fa fa-bar-chart fa-fw"></i>API testing</a></li>
      <li><a href="javascript:void(0)" data-toggle="collapse" data-target="#sub-menu2"><i class="fa fa-user fa-fw"></i>Users<i class="fa fa-angle-right pull-right arrow-drop"></i></a>
        <ul class="sub-menu collapse list-unstyled" id="sub-menu2">
          <li><a href="#">Add new</a></li>
          <li><a href="#">View all</a></li>
        </ul>
      </li>
      <li><a href="#"><i class="fa fa-bar-chart fa-fw"></i> Fetch data</a></li>
    </ul>
  </div>
</aside>
