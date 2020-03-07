<?php

    if(isset($_POST['submit']) && $_POST['submit']!='') {
        // require the db connection
        require_once 'includes/db.php';

        $restaurantname = (!empty($_POST['restaurantname'])) ? $_POST['restaurantname'] : '';
        $address = (!empty($_POST['address'])) ? $_POST['address'] : '';
        $typeofcuisine = (!empty($_POST['typeofcuisine'])) ? $_POST['typeofcuisine'] : '';
        $bestsellerfood = (!empty($_POST['bestsellerfood'])) ? $_POST['bestsellerfood'] : '';
        $contactnumber = (!empty($_POST['contactnumber'])) ? $_POST['contactnumber'] : '';
        $website = (!empty($_POST['website'])) ? $_POST['website'] : '';
        $entrancefee = (!empty($_POST['entrancefee'])) ? $_POST['entrancefee'] : '';
        $id = (!empty($_POST['id'])) ? $_POST['id'] : '';

        if(!empty($id)){
            //update the record
            $stu_query = "UPDATE `restaurants` SET restaurant_name='".$restaurantname."',
            address='".$address."', type_of_cuisine='".$typeofcuisine."', bestseller_food='".$bestsellerfood."',
            contact_number='".$contactnumber."', website='".$website."', entrance_fee='".$entrancefee."' WHERE id ='".$id."'";
            $msg = "update";
        }else{
            //insert the new record
            $stu_query = "INSERT INTO `restaurants` (restaurant_name, address, type_of_cuisine, bestseller_food, contact_number, website, entrance_fee) VALUES
             ('".$restaurantname."', '".$address."', '".$typeofcuisine."', '".$bestsellerfood."', '".$contactnumber."', '".$website."', '".$entrancefee."')";
            $msg = "add";
          }
        

        $result = mysqli_query($conn, $stu_query);
        if($result) {
            header('location:/it330azure/index.php?msg='.$msg);
        }
   
    }
    if(isset($_GET['id']) && $_GET['id']!='') {
        // require the db connection
        require_once 'includes/db.php';
        $stu_id = $_GET['id'];
        $stu_query = "SELECT * FROM `restaurants` WHERE id='".$stu_id."'";
        $stu_res = mysqli_query($conn, $stu_query);
        $results = mysqli_fetch_row($stu_res);
        $restaurant_name =  $results[1];
        $address =  $results[2];
        $type_of_cuisine =  $results[3];
        $bestseller_food =  $results[4];
        $contact_number =  $results[5];
        $website =  $results[6];
        $entrance_fee =  $results[7];


    }else {
        $restaurant_name =  "";
        $address =  "";
        $type_of_cuisine =  "";
        $bestseller_food =  "";
        $contact_number =  "";
        $website =  "";
        $entrance_fee =  "";
        $stu_id = "";
    }

?>


<!DOCTYPE html>
<html lang="en">
<?php include 'partial/head.php';?>

<body>
    <?php include 'partial/nav.php';?>
    <div class="container">
        <div class="formdiv"> 
            <div class="info"></div>
            <form method="POST" action="">
                <div class="form-group row">
                    <label for="restaurantname" class="col-sm-3 col-form-label">RestaurantName</label>
                    <div class="col-sm-7">
                        <input type="text" name="restaurantname" class="form-control" id="restaurantname" placeholder="Restaurant Name" value="<?php echo $restaurant_name; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-7">
                        <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="<?php echo $address; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="typeofcuisine" class="col-sm-3 col-form-label">TypeOfCuisine</label>
                    <div class="col-sm-7">
                        <input type="text" name="typeofcuisine" class="form-control" id="typeofcuisine" placeholder="Type Of Cuisine" value="<?php echo $type_of_cuisine; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bestsellerfood" class="col-sm-3 col-form-label">BestSellerFood</label>
                    <div class="col-sm-7">
                        <input type="text" name="bestsellerfood" class="form-control" id="bestsellerfood"
                            placeholder="Best Seller Food" value="<?php echo $bestseller_food; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="contactnumber" class="col-sm-3 col-form-label">ContactNumber</label>
                    <div class="col-sm-7">
                        <input type="text" name="contactnumber" class="form-control" id="contactnumber" placeholder="ContactNumber" value="<?php echo $contact_number; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="website" class="col-sm-3 col-form-label">Website</label>
                    <div class="col-sm-7">
                        <input type="text" name="website" class="form-control" id="website" placeholder="Website" value="<?php echo $website; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="entrancefee" class="col-sm-3 col-form-label">EntranceFee</label>
                    <div class="col-sm-7">
                        <input type="text" name="entrancefee" class="form-control" id="entrancefee" placeholder="Entrance Fee" value="<?php echo $entrance_fee; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-7">
                        <input type="hidden" name="id" value="<?php echo $stu_id; ?>">
                        <input type="submit" name="submit" class="btn btn-success" value="SUBMIT" />
                    </div>
                </div>
            </form>

        </div>
    </div>
</body>

</html>