<?php 
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/vendor/autoloader.php';
include $_SERVER['DOCUMENT_ROOT'].'/vendor/settings.php';

$router = new \controllers\classes\Router();

$router->newRoute('/', 'Views@Home');
$router->newRoute('/about', 'Views@About');
$router->newRoute('/logout', 'Login@logUserOut');
$router->newRoute('/reports', 'Views@Reports');
$router->newRoute('/staffs', 'Views@Staffs');
$router->newRoute('/students', 'Views@Students');
$router->newRoute('/student/:id', 'Views@EditStudent');
$router->newRoute('/staff/:id', 'Views@EditStaff');
$router->newRoute('/add-student', 'Views@AddStudent');
$router->newRoute('/add-staff', 'Views@AddStaff');
$router->newRoute('/counsel/:id', 'Views@NewCounsel');
$router->newRoute('/report/:id', 'Views@EditCounsel');


//Ajax routes ---------------------------
$router->newRoute('/installation', function(){
    include $_SERVER['DOCUMENT_ROOT'].'/controllers/ajax/installer.Ajax.php';
});


$router->newRoute('/userLogIn', function(){
    include $_SERVER['DOCUMENT_ROOT'].'/controllers/ajax/login.Ajax.php';
});

$router->newRoute('/addingStudentDetails', function(){
    include $_SERVER['DOCUMENT_ROOT'].'/controllers/ajax/addStud.Ajax.php';
});

$router->newRoute('/csvAddStaff', function(){
    include $_SERVER['DOCUMENT_ROOT'].'/controllers/ajax/addStaffCsv.Ajax.php';
});

$router->newRoute('/addingStaffDetails', function(){
    include $_SERVER['DOCUMENT_ROOT'].'/controllers/ajax/addStaff.Ajax.php';
});

$router->newRoute('/addingNewLog/:id', function($param){
    include $_SERVER['DOCUMENT_ROOT'].'/controllers/ajax/newLog.Ajax.php';
});

$router->newRoute('/updatingNewLog/:id', function($param){
    include $_SERVER['DOCUMENT_ROOT'].'/controllers/ajax/editLog.Ajax.php';
});

$router->newRoute('/updatingStaffDetails/:id', function($param){
    Clients::$staffId = $param;
    include $_SERVER['DOCUMENT_ROOT'].'/controllers/ajax/editStaff.Ajax.php';
});

$router->newRoute('/editingStudentDetails/:id', function($param){
    Clients::$studentId = (int) $param;
    Clients::getStudent();
    include $_SERVER['DOCUMENT_ROOT'].'/controllers/ajax/editStud.Ajax.php';
});

$router->run();