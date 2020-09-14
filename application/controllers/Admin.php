<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper("url");
        $this->load->library("pagination");
    }

    // LOGIN SECTION
    public function index()
    {
        if ($this->input->post('btnLogin')) {
            $adminUsername      = $this->input->post('adminUsername');
            $adminPassword      = $this->input->post('adminPassword');

            // Passing User inputs to AdminModel 
            $logData            = $this->AdminModel->login($adminUsername, $adminPassword);

            $adminId = 0;

            foreach ($logData->result_array() as $row) {

                $adminId        = $row['admin_id'];
            }

            //validating query returning value

            if ($adminId != 0) {

                $this->session->set_userdata('admin_id', $adminId);
                echo "<script>
                        alert('Successfully logged in ');
                        window.location.href='../Dashboard';
                        </script>";
            }
            // REDIRECTS IF USERNAME OR PASSWORD IS WRONG
            else {

                echo "<script>
                       alert('Incorrect Username And Password ');
                       window.location.href='../Index';
                       </script>";
            }
        } else {
            $this->load->view('header');
            $this->load->view('login');
            $this->load->view('footer');
        }
    }

    // DASHBOARD SECTION 
    public function dashboard()
    {

        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('dashboard');
        $this->load->view('footer');
    }

    // TO VIEW BRANCH
    public function viewBranch()
    {

        $studDetl['branchDetail'] = $this->AdminModel->viewBranch(); //to view branches from database

        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('viewBranch', $studDetl);
        $this->load->view('footer');
    }

    // CREATING STUDENTS AND ADDING INFORMATIONS
    public function addStudent()
    {

        if ($this->input->post('btnCreate')) {

            $fName = $this->input->post('fName');
            $lName = $this->input->post('lName');
            $emailId = $this->input->post('emailId');
            $joinDate = $this->input->post('joinDate');
            $grade = $this->input->post('grade');
            $branch = $this->input->post('branch');


            $insert = $this->AdminModel->createStudent($fName, $lName, $emailId, $joinDate, $grade, $branch);


            echo "<script>
                        alert('Successfully Created');
                        window.location.href='../AddStudent';
                        </script>";
        } else {

            $data['branchDetail'] = $this->AdminModel->viewBranch(); //to view branches from database

            $data['gradeDetail'] = $this->AdminModel->viewGrade(); //to view grade from database

            $this->load->view('header');
            $this->load->view('navigation');
            $this->load->view('createStudentdetails', $data);
            $this->load->view('footer');
        }
    }

    // VIEW STUDENTS DETAILS
    public function viewStudentdetails()
    {

        $data['studDetl'] = $this->AdminModel->viewStudentdetails();

        $data['branchDetl'] = $this->AdminModel->viewBranch(); //to view branches from database

        $data['gradeDetl'] = $this->AdminModel->viewGrade(); //to view grade from database

        $data['emailDetl'] = $this->AdminModel->viewEmail(); //to view grade from database

        //------PAGINATION----------------------------------------------------------------------//

        if (isset($_GET["page"])) {
            $page                 = $_GET["page"];
        } else {
            $page                 = 1;
        }

        $num_rec_per_page         = 10; //$limit and $num_rec_per_page should be equal always

        $start                    = ($page - 1) * $num_rec_per_page;

        $total_records = $this->AdminModel->getCount();

        $config["uri_segment"]    = 3;

        $limit                    = 10;

        $start                    = ($page - 1) * $num_rec_per_page;

        $page                     = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['result']      = $this->AdminModel->getPagination($limit, $start);

        $data["links"]       = $this->pagination->create_links();

        $data['total_pages'] = ceil($total_records / $num_rec_per_page);

        // ---------------------------------------------------------------------//

        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('viewStudentdetails', $data);
        $this->load->view('footer');
    }

    // BRANCH WISE FILTER
    public function branchFilter()
    {
        $studentBranch = $this->input->post('studentBranch');
        $studentEmail = $this->input->post('studentEmail');

        $filterData                 = $this->AdminModel->branchFilter($studentBranch,$studentEmail);

        echo "<table class='table table-hover'>
         <thead>
           <tr>
             <th>Firstname</th>
             <th>Lastname</th>
             <th>Email</th>
             <th>Grade</th>
             <th>Branch</th>
             <th>Update</th>
           </tr>
         </thead>
         <tbody>";
        $i = 1;
        foreach ($filterData->result_array() as $row) {

            echo "<tr>
       <td>" . $i . "</td>
       <td>" . $row['student_fname'] . "</td>
       <td>" . $row['student_lname'] . "</td>
       <td>" . $row['student_email'] . "</td>
       <td>" . $row['grade_name'] . "</td>
       <td>" .  $row['branch_name'] . "</td>
       <td>" . $row['student_join_date'] . "</td>
       <td><i class='glyphicon glyphicon-edit' id='studentEditDataModall' data-toggle='modal' data-target='#studentEditDataModall" . $row['student_id'] . "' style=' cursor: pointer; outline: none;background-color:white ; color:#808000 ;'></i></td>
     </tr>";
        }
    }

    // EMAIL WISE FILTER
    public function emailFilter()
    {
        $studentEmail = $this->input->post('studentEmail');
        $studentBranch = $this->input->post('studentBranch');

        

        $filterData              = $this->AdminModel->emailFilter($studentEmail,$studentBranch);
                       

        echo "<table class='table table-hover'>
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
        <tbody>";
        $i = 1;
        foreach ($filterData->result_array() as $row) {

            echo "<tr>
      <td>" . $i . "</td>
      <td>" . $row['student_fname'] . "</td>
      <td>" . $row['student_lname'] . "</td>
      <td>" . $row['student_email'] . "</td>
      <td>" . $row['grade_name'] . "</td>
      <td>" .  $row['branch_name'] . "</td>
      <td>" . $row['student_join_date'] . "</td>
      <td><i class='glyphicon glyphicon-edit' id='studentEditDataModall' data-toggle='modal' data-target='#studentEditDataModall" . $row['student_id'] . "' style=' cursor: pointer; outline: none;background-color:white ; color:#808000 ;'></i></td>
    </tr>";
        }
    }

    //UPDATE STUDENT DETAILS
    public function updateStudentDetails()
    {
        if ($this->input->post('update')) {

            $studentId = $this->input->post('studentId');
            $studentFirstName = $this->input->post('studentFirstName');
            $studentLastName = $this->input->post('studentLastName');
            $studentEmail = $this->input->post('studentEmail');
            $studentJoinDate = $this->input->post('studentJoinDate');
            $studentGrade = $this->input->post('studentGrade');
            $studentBranch = $this->input->post('studentBranch');


            $update = $this->AdminModel->updateStudentDetails($studentId, $studentFirstName, $studentLastName, $studentEmail, $studentJoinDate, $studentGrade, $studentBranch);

            redirect(base_url() . "ViewStudentDetails");
        }
    }

    // LOGOUT SECTION WITH SESSION DESTROY
    public function logout()
    {
        $adminId = $this->session->userdata('admin_id');
        $this->session->unset_userdata('user_id');
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
