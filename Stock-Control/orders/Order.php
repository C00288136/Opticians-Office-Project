<?php
/*
/* Name: Michal Kuras
Student Number : C00288136
Purpose: PHP for posting data into the orders table and the orders/items
Date: 12/04/24
*/

// connect to db
include '../../db.con.php';

// store supplier id
$SupplierID = $_POST["Supplier"];
// sets date format
date_default_timezone_set('UTC');
// todays date for the order
$today = date("Y-m-d");
// i made it so the orders delivery date is in a week
// strtotime used to concat today with a week in the future
$Delivery = date("Y-m-d", strtotime($today . "+1 week"));

// function to get next avaliable Order_ID for orders
$IDqueryOrders = "SELECT MAX(Order_ID) as max1 from orders ";
    $resultOrders = mysqli_query($con, $IDqueryOrders);

    if ($resultOrders) {
        $row = mysqli_fetch_assoc($resultOrders);
        $nextPrimaryKey = $row['max1'] + 1;
    } else {
        die("Error getting the next available primary key for orders");
    }

    // hard coded the 3 suppliers as they all have different amount of items they supply
if ($SupplierID == 1) {

    // first the entry is inserted into the orders table
    $sql = "INSERT INTO ORDERS (Order_ID, OrderDate, Delivery, SupplierID) VALUES ('$nextPrimaryKey','$today', '$Delivery', '$SupplierID')";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die("Error inserting Order into Orders table" . mysqli_error($con));
    }

    // array of items the supplier sells recieved from the post 
    // => assigns the id to the post variable same as =
    $items = [
        '15' => $_POST['15_quantity'],
        '19' => $_POST['19_quantity'],
        '20' => $_POST['20_quantity'],
        '23' => $_POST['23_quantity'],
        '26' => $_POST['26_quantity']
    ];

    // for each loop used with the assosiative array so each item has a quantity set from the post 
    // eg. ID : 15 => quantity set 123
    foreach ($items as $item => $quantity) {

        // query not ran if quantity on the id is = 0
        if($quantity > 0){

        // another query for accessing next avaliable Stock ID for order/items table
            $IDqueryOrders_Items = "SELECT MAX(OrderItemID) as max2 from order_items";
            $resultOrders_Item = mysqli_query($con, $IDqueryOrders_Items);
            if ($resultOrders_Item) {
                $row = mysqli_fetch_assoc($resultOrders_Item);
                $nextPrimaryKeyOrder_Item = $row['max2'] + 1;
            } else {
                die("Error getting the next available primary key for order/item");
            }
    
            // insert
            $sqlItems = "Insert INTO order_items (OrderItemID, Order_ID,StockNumber,Quantity) VALUES('$nextPrimaryKeyOrder_Item','$nextPrimaryKey','$item','$quantity' )";
            $resultItems = mysqli_query($con, $sqlItems);
            if (!$resultItems) {
                die("Error inserting items into the order_items table" . mysqli_error($con));
            }
        }
    }
}
// same code as for supplier 1
if ($SupplierID == 2) {

    $sql = "INSERT INTO ORDERS (Order_ID, OrderDate, Delivery, SupplierID) VALUES ('$nextPrimaryKey','$today', '$Delivery', '$SupplierID')";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die("Error inserting Order into Orders table" . mysqli_error($con));
    }

    $items = [
        '16' => $_POST['16_quantity'],
        '17' => $_POST['17_quantity'],
        '18' => $_POST['18_quantity'],
    ];

    foreach ($items as $item => $quantity) {

        if($quantity > 0){

        
            $IDqueryOrders_Items = "SELECT MAX(OrderItemID) as max2 from order_items";
            $resultOrders_Item = mysqli_query($con, $IDqueryOrders_Items);
            if ($resultOrders_Item) {
                $row = mysqli_fetch_assoc($resultOrders_Item);
                $nextPrimaryKeyOrder_Item = $row['max2'] + 1;
            } else {
                die("Error getting the next available primary key for order/item");
            }
    
            $sqlItems = "Insert INTO order_items (OrderItemID, Order_ID,StockNumber,Quantity) VALUES('$nextPrimaryKeyOrder_Item','$nextPrimaryKey','$item','$quantity' )";
            $resultItems = mysqli_query($con, $sqlItems);
    
            
            
            if (!$resultItems) {
                die("Error inserting items into the order_items table" . mysqli_error($con));
            }
        }
    }
}
// same code as for supplier 1
if ($SupplierID == 3) {

    
    $sql = "INSERT INTO ORDERS (Order_ID, OrderDate, Delivery, SupplierID) VALUES ('$nextPrimaryKey','$today', '$Delivery', '$SupplierID')";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die("Error inserting Order into Orders table" . mysqli_error($con));
    }

    $items = [
        '21' => $_POST['21_quantity'],
        '22' => $_POST['22_quantity'],
        '24' => $_POST['24_quantity'],
        '25' => $_POST['25_quantity'],
    ];

    foreach ($items as $item => $quantity) {

        if($quantity > 0){

        
        $IDqueryOrders_Items = "SELECT MAX(OrderItemID) as max2 from order_items";
        $resultOrders_Item = mysqli_query($con, $IDqueryOrders_Items);
        if ($resultOrders_Item) {
            $row = mysqli_fetch_assoc($resultOrders_Item);
            $nextPrimaryKeyOrder_Item = $row['max2'] + 1;
        } else {
            die("Error getting the next available primary key for order/item");
        }

        $sqlItems = "Insert INTO order_items (OrderItemID, Order_ID,StockNumber,Quantity) VALUES('$nextPrimaryKeyOrder_Item','$nextPrimaryKey','$item','$quantity' )";
        $resultItems = mysqli_query($con, $sqlItems);

        
        
        if (!$resultItems) {
            die("Error inserting items into the order_items table" . mysqli_error($con));
        }
    }
    }
}

$message = "Order has been added Order ID:". $nextPrimaryKey;


mysqli_close($con);
?>

<script>
    // js to display the php message in a alert and bring the user back to the View window
    window.location.href = "View.html.php";
    var message = <?php echo $message; ?>
    alert($message)

</script>