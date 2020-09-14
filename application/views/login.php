<div class="jumbotron text-center">
  <h1>Student Management System</h1>
</div>
<div class="container">
    <div class="col-sm-3"></div>

    <div class="col-sm-6">
        <form class="form-horizontal" method="POST" action="<?php echo base_url('Admin/index');?>">
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Username:</label>
                <div class="col-sm-10">
                <input type="name" class="form-control" id="username" name="adminUsername" placeholder="Enter Username">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Password:</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="pwd" name="adminPassword" placeholder="Enter password">
                </div>
            </div>
           
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-success btn-lg btn-block" value="Login" name="btnLogin">
                </div>
            </div>
        </form>
    </div>

    <div class="col-sm-3"></div> 
</div>   



<!-- //don't back to browser -->
<script>

history.pushState(null,null,location.href);
window.onpopstate = function()
{
    history.go(1);
};
</script>