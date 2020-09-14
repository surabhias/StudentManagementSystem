<div class="container">
	<h2>Student Details</h2>
	<div class="col-sm-1"></div>
	<div class="col-sm-5">
		<div class="form-group">
			<label class="control-label col-sm-2" for="email">Branch</label>
			<div class="col-sm-10">
				<select class="form-control" name="branch" id="branch" onchange="branchFilter(this.value);">
					<option value="0">ALL</option>


					<?php //to view branches in dropdown
					$i = 1;
					foreach ($branchDetl->result_array() as $row) {


					?>
						<option value="<?php echo $row['branch_id']; ?>"><?php echo $row['branch_name']; ?></option>

					<?php
					}
					?>
				</select>
			</div>
		</div>
	</div>
	<div class="col-sm-5">
		<div class="form-group">
			<label class="control-label col-sm-3" for="email">Email ID</label>
			<div class="col-sm-9">
				<select class="form-control" name="" id="student_email" onchange="emailFilter(this.value);">
					<option value="0">ALL</option>


					<?php //to view branches in dropdown
					$i = 1;
					foreach ($emailDetl->result_array() as $row) {


					?>
						<option value="<?php echo $row['student_email']; ?>"><?php echo $row['student_email']; ?></option>

					<?php
					}
					?>
				</select>
			</div>
		</div>
	</div>
	<div class="col-sm-1"></div>

	<div class="container">
		<table class="table table-hover" id="branchdata">
			<thead>
				<tr>

					<th>Firstname</th>
					<th>Lastname</th>
					<th>Email</th>
					<th>Grade</th>
					<th>Branch</th>
					<th>Date Of Join</th>
					<th>Update</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 1;
				foreach ($result->result_array() as $row) {

					$branchId = $row['student_branch'];
					$gradeId = $row['student_grade'];

				?>
					<tr>

						<td><?php echo $row['student_fname'] ?></td>
						<td><?php echo $row['student_lname'] ?></td>
						<td><?php echo $row['student_email'] ?></td>
						<td><?php echo $row['grade_name'] ?></td>
						<td><?php echo $row['branch_name'] ?></td>
						<td><?php echo $row['student_join_date'] ?></td>
						<td><i class="glyphicon glyphicon-edit" id="studentEditDataModall" data-toggle="modal" data-target="#studentEditDataModall<?php echo $row['student_id']; ?>" style=" cursor: pointer; outline: none;background-color:white ; color:#808000 ;"></i></td>
					</tr>



					<!--Edit Model-->
					<div id="studentEditDataModall<?php echo $row['student_id']; ?>" class="modal fade " role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content col-md-12 col-sm-12 col-lg-12 col-xs-12 paddingNone">
								<div class="modal-header bounceInDown animated" style=" background-color: #808000;">
									<button type="button" class="close" data-dismiss="modal" style="color: white; opacity: 1;">x</button>
									<h4 style="color: white;">Edit Details</h4>
								</div>
								<div class="modal-body clearfix col-md-12 col-sm-12 col-lg-12 col-xs-12 ">
									<div class="clearfix col-md-2  col-lg-2 hidden-xs hidden-sm"></div>
									<div class="col-xs-12 col-sm-12 col-lg-8 col-md-8">
										<form action="<?php echo base_url('Admin/updateStudentDetails'); ?>" method="POST">
											<div class="form-group animated bounceInLeft">


												<div class="form-group animated bounceInLeft">
													<input type="hidden" class="form-control" id="" placeholder="Enter First Name" name="studentId" value="<?php echo $row['student_id']; ?>" require />


													<div class="form-group">
														First Name:<input type="text" class="form-control" id="" placeholder="Enter First Name" name="studentFirstName" value="<?php echo $row['student_fname']; ?>" require />
													</div>
													<div class="form-group animated bounceInLeft">
														Last Name:<input type="text" class="form-control" id="" placeholder="Enter Last Name" name="studentLastName" value="<?php echo $row['student_lname']; ?>" require />
													</div>
													<div class="form-group animated bounceInLeft">
														Email ID:<input type="email" class="form-control" id="" placeholder="Enter Phone Number" name="studentEmail" value="<?php echo $row['student_email']; ?>" require />
													</div>

													<div class="form-group animated bounceInLeft">
														Date Of Join:<input type="date" class="form-control" id="" name="studentJoinDate" value="<?php echo $row['student_join_date']; ?>" selected />
													</div>
													<div class="form-group animated bounceInLeft">
														Grade:<select class="form-control" name="studentGrade">
															<option>SELECT</option>

															<?php //to view branches in dropdown

															foreach ($gradeDetl->result_array() as $row1) {
																$gradeData = $row1['grade_id'];

																// TO VIEW ALREADY SELECTED GRADE
																if ($gradeId == $gradeData) {
															?>
																	<option value="<?php echo $row1['grade_id']; ?>" style="background-color:blue; color:white;" selected><?php echo $row1['grade_name']; ?></option>
																<?php
																} else {
																?>

																	<option value="<?php echo $row1['grade_id']; ?>"><?php echo $row1['grade_name']; ?></option>
																<?php
																}
																?>


															<?php
															}
															?>

														</select>
													</div>
													<div class="form-group animated bounceInLeft">
														Branch:<select class="form-control" name="studentBranch">
															<option>SELECT</option>

															<?php //to view branches in dropdown

															foreach ($branchDetl->result_array() as $row) {
																$branchData = $row['branch_id'];

																// TO VIEW ALREADY SELECTED BRANCH
																if ($branchId == $branchData) {
															?>
																	<option value="<?php echo $row['branch_id']; ?>" style="background-color:blue; color:white;" selected><?php echo $row['branch_name']; ?></option>
																<?php
																} else {
																?>

																	<option value="<?php echo $row['branch_id']; ?>"><?php echo $row['branch_name']; ?></option>
																<?php
																}
																?>


															<?php

															}
															?>
														</select>
													</div>





													<input type="submit" name="update" class="btn btn-default btn-lg btn-block" value="Update" style="outline: none;color: white; background-color: #808000;">
												</div>
											</div>
										</form>

									</div>
									<div class="clearfix col-md-2 hidden-xs hidden-sm col-lg-2 "></div>
								</div>

							</div>

						</div>
					</div>


					<!------------End Edit Modal---->


				<?php
					$i++;
				}
				?>
			</tbody>
		</table>
	</div>

	<!-- PAGINATION SECTION -->
	<?php
	if ($total_pages > 1) {
		$pagLink = "<ul class='pagination'>";
		for ($i = 1; $i <= $total_pages; $i++) {


			$pagLink .= "<li><a href='?&page=" . $i . "' class='page-numbers'>" . $i . "</a></li>";
		};
		echo $pagLink . "</ul>";
	}

	?>
	<!-- END OF PAGINATION SECTION -->
	<br>
	<br>
	<br>

</div>
<!-- base_url storage -->
<input type="hidden" id="base" value="<?php echo base_url(); ?>">

<script src="<?php echo base_url(); ?>assets/bootstrap/js/general/viewStudentdetails.js"></script>