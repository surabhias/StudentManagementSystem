<?php
defined('BASEPATH') or exit('No direct script access allowed');
class AdminModel extends CI_Model
{
    //METHODE TO LOGIN
    public function login($adminUsername, $adminPassword)
    {
        return $logData = $this->db->query('SELECT * FROM `admin` WHERE `username`="' . $adminUsername . '" AND `password`="' . $adminPassword . '" ');
    
    }

    //METHODE TO CREATE STUDENT
    public function createStudent($fName, $lName, $emailId, $joinDate, $grade, $branch)
    {

        $createStudent = $this->db->query('INSERT INTO `students`(`student_fname`, `student_lname`, `student_email`, `student_grade`, `student_branch`,`student_join_date`) VALUES ("' . $fName . '","' . $lName . '","' . $emailId . '","' . $grade . '","' . $branch . '", "' . $joinDate . '")');

        return $createStudent;
    }

    # METHODE TO VIEW STUDENT DETAILS
    public function viewStudentdetails()
    {
        return $studentsData = $this->db->query('SELECT branch.branch_id, branch.branch_name, grade.grade_id, grade.grade_name, students.student_id, students.student_fname, students.student_lname, students.student_email, students.student_grade, students.student_branch ,students.student_join_date  
            FROM branch, grade, students where students.student_branch = branch.branch_id AND students.student_grade = grade.grade_id');
    }

    # METHODE TO VIEW BRANCH
    public function viewBranch()
    {
        return $branchData = $this->db->query('SELECT * FROM branch'); 
    }

    # METHODE TO VIEW GRADE
    public function viewGrade()
    {
        return $gradeData = $this->db->query('SELECT * FROM grade');
    }

    # METHODE TO EMAIL ID 
    public function viewEmail()
    {
        return $mailData = $this->db->query('SELECT student_email FROM students');
    }

    # METHODE TO GET COUNT FOR PAGINATION 
    public function getCount()
    {
        return $this->db->count_all("students");
    }

    # METHODE FOR PAGINATION AFTER GETTING THE COUNT
    public function getPagination($limit, $start)
    {

        $viewData = $this->db->query('SELECT branch.branch_id, branch.branch_name, grade.grade_id, grade.grade_name, students.student_id, students.student_fname, students.student_lname, students.student_email, students.student_grade, students.student_branch ,students.student_join_date FROM branch, grade, students where students.student_branch = branch.branch_id AND students.student_grade = grade.grade_id LIMIT ' . $limit . ' OFFSET ' . $start . ' ');

        return $viewData;
    }
  
    //METHODE TO UPDATE STUDENT DETAILS
    public function updateStudentDetails($studentId,$studentFirstName,$studentLastName,$studentEmail,$studentJoinDate,$studentGrade,$studentBranch)
    {
        return  $update_student = $this->db->query('UPDATE `students` SET `student_fname`="' . $studentFirstName . '",`student_lname`="' . $studentLastName . '",`student_email`="' . $studentEmail . '",`student_grade`="' . $studentGrade . '",`student_branch`="' . $studentBranch . '", `student_join_date`="' . $studentJoinDate . '" WHERE student_id = "' . $studentId . '"');
    }

    //METHODE TO FILTER STUDENT DETAILS BASED ON BRANCH
    public function branchFilter($studentBranch,$studentEmail)
    {

        if ($studentBranch == "0") {
            $filterData = $this->db->query('SELECT branch.branch_id, branch.branch_name, grade.grade_id, grade.grade_name, students.student_id, students.student_fname, students.student_lname, students.student_email, students.student_grade, students.student_branch  , students.student_join_date 
        FROM branch, grade, students where students.student_branch = branch.branch_id AND students.student_grade = grade.grade_id');
        } 
        elseif($studentBranch > "0" AND $studentEmail == "0")
        {
            $filterData = $this->db->query('SELECT branch.branch_id, branch.branch_name, grade.grade_id, grade.grade_name, students.student_id, students.student_fname, students.student_lname, students.student_email, students.student_grade, students.student_branch, students.student_join_date   
        FROM branch, grade, students where students.student_branch = branch.branch_id AND students.student_grade = grade.grade_id AND students.student_branch = "' . $studentBranch . '" ');

        } else {
            $filterData = $this->db->query('SELECT branch.branch_id, branch.branch_name, grade.grade_id, grade.grade_name, students.student_id, students.student_fname, students.student_lname, students.student_email, students.student_grade, students.student_branch, students.student_join_date   
        FROM branch, grade, students where students.student_branch = branch.branch_id AND students.student_grade = grade.grade_id AND students.student_branch = "' . $studentBranch . '" AND students.student_email = "' . $studentEmail . '"');
        }

        return $filterData;
    }

    //METHODE TO FILTER STUDENT DETAILS BASED ON EMAIL
    public function emailFilter($studentEmail,$studentBranch)
    {

        if ($studentEmail == "0") {
            $filterData = $this->db->query('SELECT branch.branch_id, branch.branch_name, grade.grade_id, grade.grade_name, students.student_id, students.student_fname, students.student_lname, students.student_email, students.student_grade, students.student_branch  , students.student_join_date 
        FROM branch, grade, students where students.student_branch = branch.branch_id AND students.student_grade = grade.grade_id');
        } 
        elseif($studentEmail > "0" AND $studentBranch == "0")
        {
            $filterData = $this->db->query('SELECT branch.branch_id, branch.branch_name, grade.grade_id, grade.grade_name, students.student_id, students.student_fname, students.student_lname, students.student_email, students.student_grade, students.student_branch, students.student_join_date   
        FROM branch, grade, students where students.student_branch = branch.branch_id AND students.student_grade = grade.grade_id AND students.student_email = "' . $studentEmail . '" ');

        }

        else {
            $filterData = $this->db->query('SELECT branch.branch_id, branch.branch_name, grade.grade_id, grade.grade_name, students.student_id, students.student_fname, students.student_lname, students.student_email, students.student_grade, students.student_branch, students.student_join_date   
        FROM branch, grade, students where students.student_branch = branch.branch_id AND students.student_grade = grade.grade_id AND students.student_email = "' . $studentEmail . '" AND students.student_branch = "'.$studentBranch.'" ');
        }

        return $filterData;
    }

    //METHODE FOR PAGINATION
    public function pagination()
    {
        return $pageData = $this->db->query('SELECT * FROM students LIMIT 5,10;');
    }
}
