<?php
    //mysql connection
    require_once 'includes/db.php';
    $query = "SELECT * FROM `restaurants`";

    $results = mysqli_query($conn, $query);
    $records = mysqli_num_rows($results);
    $msg ="";
    if(!empty($_GET['msg'])) {
        $msg = $_GET['msg'];
        $alert_msg = ($msg =="add") ? "New Record has been added Successfully"
        : (($msg =="del") ? "Record has been deleted successfully!" 
        : "Record has been updated successfully!");
    }else {
        $alert_msg ="";
    }
   
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'partial/head.php'; ?>
<body>
    <?php include 'partial/nav.php'; ?>

    <div class="container">
        <?php if(!empty($alert_msg)){ ?>
            <div class="alert alert-success"><?php echo $alert_msg; ?></div>
        <?php } ?> 
        <div class="info"></div>
            <table class="table">
                <thead>
                    <tr>
                        <th scoped="col">ID</th>
                        <th scoped="col">Restaurant Name</th>
                        <th scoped="col">Address</th>
                        <th scoped="col">Type Of Cuisine</th>
                        <th scoped="col">Best Seller Food</th>
                        <th scoped="col">Contact Number</th>
                        <th scoped="col">Website</th>
                        <th scoped="col">Entrance Fee</th>
                        <th scoped="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($records)){
                            while($row = mysqli_fetch_assoc($results)) {
                            ?>
                                <tr>
                                    <th scoped="row"><?php echo  $row['id']; ?></th>
                                    <td><?php echo  $row['restaurant_name']; ?></td>
                                    <td><?php echo  $row['address']; ?></td>
                                    <td><?php echo  $row['type_of_cuisine']; ?></td>
                                    <td><?php echo  $row['bestseller_food']; ?></td>
                                    <td><?php echo  $row['contact_number']; ?></td>
                                    <td><?php echo  $row['website']; ?></td>
                                    <td><?php echo  $row['entrance_fee']; ?></td>
                                    <td>
                                        <a href="/it330azure/add.php?id=<?php echo  $row['id']; ?>"
                                        class="btn btn-primary">EDIT</a>
                                        <a href="/it330azure/delete.php?id=<?php echo  $row['id']; ?>" 
                                        class="btn btn-danger" onClick="javascript:return confirm
                                        ('Do you really want to Delete?');" >DELETE</a>
                                    </td>
                                </tr>
                               
                                <?php
                            }
                        }
                    
                   ?>
                    
                </tbody>
            </table>
        </div>
</body>

</html>