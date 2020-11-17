<?php 

require'../connect.php';

$idSelect=implode(",",$_POST['id']);

$sql = "delete from products where productCode in('$idSelect') ";
$result = mysqli_query($connect,$sql);

echo $sql;
if($result){
    echo"delete complete<br>";
    echo"<a href='productAdmin.php'>Product Admin</a>";
}else{
    echo"error".mysqli_error($connect);
}