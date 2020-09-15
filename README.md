# Student Management System
Student Management System, is an open source project for people who wants to grab the core idea of the data process within the system.

This system is built with CodeIgniter – PHP framework, bootstrap, and jquery. This system, Student Management System, is based on the Web Application. It provides functionality for adding or creating new students details and also view and update it. The system can be manipulated by one user as an admin.

This application, there are some dependencies you will need to understand. For example, you want to add the student for a batch . Without batch , the section information cannot be added to the system. And the batch we cannot create or add batch it is from the database.

Please read the below instruction to run the application on your system without any difficulties. There are few changes required in the source code to run the application. So Please follow the steps carefully.

**Users: Admin**
	Username : admin
	Password : admin

## FeaturesFeatures
Create Student Details Admin can add student details.
Manage Student Details Admin can manage student details view update and also filtter the students according to the branch and Email ID.
###### Models
	•	AdminModel
###### Controllers
	•	Admin
###### View
	•	header
	•	navigation
	•	login
	•	dashboard
	•	createStudentdetails
	•	viewStudentdetails
	•	viewBranch

**Please Read:**
To run this system, you need to create a database in the phpMyAdmin dbatabase sql file is icludede in folder named database. Either you can create a database namely student_management or something else. If you have a database name something else then, you have to change it in the source code. To change the database name in the source code.

**Step 1:** Go to the application > config > Database.php file.

**Step 2:** You will see the database name in the $db array. Change the name of the database whatever you desired. As shown below:

	$db['default'] = array(
    	'dsn'   => '',
    	'hostname' => 'localhost',
    	'username' => 'root',
    	'password' => '',
    	'database' => 'student_management',
    	'dbdriver' => 'mysqli',
    	'dbprefix' => '',
    	'pconnect' => FALSE,
    	'db_debug' => (ENVIRONMENT !== 'production'),
    	'cache_on' => FALSE,
    	'cachedir' => '',
    	'char_set' => 'utf8',
    	'dbcollat' => 'utf8_general_ci',
    	'swap_pre' => '',
    	'encrypt' => FALSE,
    	'compress' => FALSE,
    	'stricton' => FALSE,
    	'failover' => array(),
    	'save_queries' => TRUE
	);
