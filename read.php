<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset=utf-8");
include 'C:\xampp_new\htdocs\API CRUD\api\users\db.php';
try {
    $user = 'root';
    $pass = '';
    $dbh = new PDO('mysql:host=localhost;dbname=mydb', $user, $pass);
    $users = array();
    foreach ($dbh->query('SELECT * FROM user') as $row) {
        array_push($users, array(
            'id' => $row['id'],
            'fname' => $row['fname'],
            'lname' => $row['lname'],
            'avatar' => $row['avatar'],
        ));
    }
    echo json_encode($users);
    $dbh = null;
} catch (PDOException $e) {
    print "Error!:" . $e->getMessage() . "<br/>";
    die;
}
