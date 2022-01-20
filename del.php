<?php
require 'config/db.php';
$id=$_GET['id'];
$sql="DELETE FROM users WHERE id=$id";
$stmt=$pdo->prepare($sql);
$result=$stmt->execute();
if($result) {
    header("location: index.php?del=true");
}
