<?php 

$idSelect=$_GET['id'];

require '../connect.php'; 
$sql = "select * from orders where orderNumber = '$idSelect' ";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($result);

// echo $row['buyPrice']."<br>";
// $add=$row['buyPrice']+1;
// echo $add;

// print_r($row);
// echo "<br>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form</title>
</head>
<body>
    
        <form method="POST" action='editOrderFunc.php'>

            <input type="hidden" value='<?php echo $row['orderNumber']?>' name='id_select' >
            Order Number: 
                <input type="hidden" name='orderNumber' value='<?php echo $row['orderNumber'] ?>'>
                <?php echo $row['orderNumber'] ?> <br><br>
            Order Date: 
                <input type="hidden" name='orderDate' value='<?php echo $row['orderDate'] ?>'>  
                <?php echo $row['orderDate'] ?> <br><br>
            Enter Required Date: <input type = "date" name = 'requiredDate' value = '<?php echo $row['requiredDate'] ?>' required > <br><br>
            Enter Shipped Date: <input type = "date" name = 'shippedDate' value = '<?php echo $row['shippedDate'] ?>' > <br><br>
            Enter Status: <br>
                <?php 
                if($row['status']=='In Process'){
                    echo    " <input type='radio' id='In Process' name='status' value='In Process' checked required /> 
                    <label for='In Process'>In Process</label><br>";
                }else{
                    echo    "<input type='radio' id='In Process' name='status' value='In Process' />
                            <label for='In Process'>In Process</label><br>";
                }

                if($row['status']=='On Hold'){
                    echo    " <input type='radio' id='On Hold' name='status' value='On Hold' checked /> 
                    <label for='On Hold'>On Hold</label><br>";
                }else{
                    echo    "<input type='radio' id='On Hold' name='status' value='On Hold' />
                            <label for='On Hold'>On Hold</label><br>";
                }
                
                if($row['status']=='Resolved'){
                    echo    " <input type='radio' id='Resolved' name='status' value='Resolved' checked /> 
                    <label for='Resolved'>Resolved</label><br>";
                }else{
                    echo    "<input type='radio' id='Resolved' name='status' value='Resolved' />
                            <label for='Resolved'>Resolved</label><br>";
                }
                
                if($row['status']=='Disputed'){
                    echo    " <input type='radio' id='Disputed' name='status' value='Disputed' checked /> 
                    <label for='Disputed'>Disputed</label><br>";
                }else{
                    echo    "<input type='radio' id='Disputed' name='status' value='Disputed' />
                            <label for='Disputed'>Disputed</label><br>";
                }
                
                if($row['status']=='Cancelled'){
                    echo    " <input type='radio' id='Cancelled' name='status' value='Cancelled' checked /> 
                    <label for='Cancelled'>Cancelled</label><br>";
                }else{
                    echo    "<input type='radio' id='Cancelled' name='status' value='Cancelled' />
                            <label for='Cancelled'>Cancelled</label><br>";
                }
                
                if($row['status']=='Shipped'){
                    echo    " <input type='radio' id='Shipped' name='status' value='Shipped' checked /> 
                    <label for='shipped'>Shipped</label><br>";
                }else{
                    echo    "<input type='radio' id='Shipped' name='status' value='Shipped' />
                            <label for='shipped'>Shipped</label><br>";
                }
                ?><br>
            Enter Comments: <input type = "text" name = 'comments' value = '<?php echo $row['comments'] ?>' > <br><br>
            Enter Customer Number: 
            <input type="hidden" name='customerNumber' value='<?php echo $row['customerNumber'] ?>'> 
            <?php echo $row['customerNumber'] ?> <br><br>
        
        <input type="submit" value="Edit"><br><br>
    </form>
    
    <a href="./orderAdmin.php">Back</a><br>

</body>
</html>