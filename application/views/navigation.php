<?php
// REDIRECT UNAUTHORIZED LOGIN TO ALL PAGES
 if (!isset($_SESSION['admin_id'])) {
    redirect(base_url());
}
$admin_id=$this->session->userdata('admin_id');
?>
<nav class="navbar navbar-inverse nav1">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Sudent Managemwnt System</a>
    </div>
    <ul class="nav navbar-nav ">
      <li class=""><a href="<?php echo base_url('Dashboard');?>">Home</a></li>
      
      <li><a href="<?php echo base_url('AddStudent');?>">Create Student Details</a></li>
      
      <li><a href="<?php echo base_url('ViewStudentDetails');?>">Manage Student Details</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
     
      <li><a href="<?php echo base_url('Admin/logout');?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>



