<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset=utf-8");
include 'C:\xampp_new\htdocs\API CRUD\api\users\db.php';
$data = json_decode(file_get_contents("php://input"));
if ($_SERVER['REQUEST_METHOD'] !== 'PATCH') {
    echo json_encode(array("status" => "Error!"));
    die;
}


try {
    $stmt = $dbh->prepare("UPDATE  user SET fname=?, lname=?, email=?, avatar=? WHERE id=?");
    $stmt->bindParam(1, $data->fname);
    $stmt->bindParam(2, $data->lname);
    $stmt->bindParam(3, $data->email);
    $stmt->bindParam(4, $data->avatar);
    $stmt->bindParam(5, $data->id);

    if ($stmt->execute()) {
        echo json_encode(array("status" => "Success"));
    } else {
        echo json_encode(array("status" => "Error!"));
    }



    $dbh = null;
} catch (PDOException $e) {
    print "Error!:" . $e->getMessage() . "<br/>";
    die;
}
