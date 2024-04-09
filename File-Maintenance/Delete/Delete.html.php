<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Person</title>
    <link rel="stylesheet" type="text/css" href="delete.css">
    <script src="delete.js"></script>
    
</head>
<body>

<header>
        <div class="logo">
            <img  src="../../assets/logo.webp" alt="">
            <p class="logo">Optician Portal</p>
        </div>
    </header>

    <div class="container">

<nav>


            <div class="logo-p">
                <img class="profile-picture" src="../../assets/user.png" alt="Profile Picture">
                <span>Hi, [Username]</span>
            </div>
            <ul>
                <a href="../../index.html">
                    <li>Home</li>
                </a>
                    <a href="">
                        <li>Counter Sales</li>
                    </a>
                    <a href="">
                        <li>Spectacle Sales</li>
                    </a>
                    <a href="">

                        <li>Eye Test Menu</li>
                    </a>
                    <a href="">
                        <li>Stock Control</li>
                    </a>
        </ul>
    </nav>

    <div class="content">
    <h1>Delete Person</h1>

<?php include 'listbox.php';
// not exactly sure why but i need to create session in here as well as the the delete php
// otherwise i get a error for the session destroy down below
session_start();?>



    <p id="display" hidden ></p>

    
    <form action="Delete.php" onsubmit="return confirmCheck()" method="post">
        
    <label for="delid">Person Id</label>
    <input type="text" name="delid" id="delid" disabled>
    
    <label for="deleteName">Name</label>
    <input type="text" name="deleteName" id="deleteName" disabled>
    
    <label for="deleteAddress">Address</label>
    <input type="text" name="deleteAddress" id="deleteAddress" disabled>

    <label for="deleteEircode">Eir Code</label>
    <input type="text" name="deleteEircode" id="deleteEircode"disabled>
    
    <label for="delDOB">Date of Birth</label>
    <input type="date" name="delDOB" id="delDOB" title="format us dd-mm-yyyy" disabled>
    
    <label for="deletePhone">Number</label>
    <input type="text" name="deletePhone" id="deletePhone" disabled>

    <label for="delBalance">Balance</label>
    <input type="text" name="delBalance" id="delBalance" disabled>
    <br><br>

    <div id="error-message"></div>

    <input type="submit" id="button" value="Delete User">


<?php
        if  (isset($_SESSION["patientid"])) {echo "<h1 class='myMessage'>Record deleted for ". $_SESSION["firstname"]. "</h1>";}
        session_destroy();
?>

</form>
</div>
</div>


</body>
</html>
