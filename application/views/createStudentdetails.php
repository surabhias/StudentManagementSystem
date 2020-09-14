 
  <h3 style="text-align:center;">Add New Student</h3>

<div class="container">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <form class="form-horizontal" data-toggle="validator" method="POST" enctype="multipart/form-data"
	action="<?php echo base_url('Admin/addStudent');?>">
            <div class="form-group">
                <label class="control-label col-sm-2" for="fName">First Name:</label>
                <div class="col-sm-10">
                <input type="name" class="form-control" id="fName" name="fName" placeholder="Enter First Name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="lName">Last Name:</label>
                <div class="col-sm-10">
                <input type="name" class="form-control" id="lName" name="lName" placeholder="Enter Last Name" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="emailId">Email ID:</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" id="emailId" name="emailId" placeholder="Enter Email ID" data-error="Bruh, that email address is invalid" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="joinDate">Date Of Join :</label>
                <div class="col-sm-10">
                <input type="date" class="form-control" id="joinDate" name="joinDate" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="grade">Grade:</label>
                <div class="col-sm-10">
                    <select class="form-control" name="grade" required>
                        <option value="">SELECT</option>

                        <?php //TO VIEW GRADE IN DROPDOWN
                        
                        foreach($gradeDetail->result_array() as $row1)
                        {
                        ?>
                        <option value="<?php echo $row1['grade_id'];?>"><?php echo $row1['grade_name'];?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
                
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="branch">Branch:</label>
                <div class="col-sm-10">
                <select class="form-control" name="branch" required>
                        <option value="">SELECT</option>

                        <?php //TO VIEW BRANCH IN DROPDOWN
                         $i=1;
                         foreach($branchDetail->result_array() as $row)
                         {
                        ?>
                        <option value="<?php echo $row['branch_id'];?>"><?php echo $row['branch_name'];?></option>
                        
                        <?php
                         }
                        ?>
                    </select>
                </div>
                
            </div>
           
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-default btn-lg btn-block" value="Add" name="btnCreate" style="outline: none;color: white; background-color: #808000;">
                </div>
            </div>
        </form>
    </div>

    <div class="col-sm-2"></div> 
</div>   