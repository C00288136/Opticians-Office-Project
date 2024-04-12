<!-- 
Student Number : C00288136
Purpose: PHP listbox to retrieve data from the patients table where the entry is not marked as deleted
Date: 10/03/24
 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amend View Customer</title>
    <link rel="stylesheet" type="text/css" href="amend.css">
    <script src="amend.js"></script>
    </style>
</head>

<body>

    <header>
        <div class="logo">
            <img src="../../assets/logo.webp" alt="">
            <p class="logo">Optician Portal</p>
        </div>
    </header>

    <div class="container">

        <nav>
            <!-- nav for quick naviation back the main menu -->
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
                <a href="../../Eye-Test-Menu/eyeTestMenu.html">

                    <li>Eye Test Menu</li>
                </a>
                <a href="../../Stock-Control/StockMaintenance.html">
                    <li>Stock Control</li>
                </a>
                <a href="../FileMaintenance.html">
                        <li>File Maintenance</li>
                    </a>
            </ul>
        </nav>

        <div class="content">
            <h1>Amend/View a Person</h1>
            <h4>Please select a person and then click the amend button if you wish to update</h4>

            <?php include 'listbox.php'; ?>

            <p id="display" hidden></p>
            <input type="button" value="Amend Details" id="amendViewbutton" onclick="toggleLock()">

            <form action="ViewAmend.php" onsubmit="return confirmCheck()" method="post">

                <label for="amendid">Person Id</label>
                <input type="text" name="amendid" id="amendid" disabled>

                <label for="amendname">Name </label>
                <input type="text" name="amendname" id="amendname" disabled>

                <label for="amendaddress">Address </label>
                <input type="text" name="amendaddress" id="amendaddress" disabled>

                <label for="amendeircode">Eir Code </label>
                <input type="text" name="amendeircode" id="amendeircode" onchange="validateForm()" disabled>


                <label for="amendDOB">Date of Birth</label>
                <input type="date" name="amendDOB" id="amendDOB" title="format us dd-mm-yyyy" onchange="validateForm()" disabled>

                <label for="amendPhone">Number</label>
                <input type="text" name="amendPhone" id="amendPhone" disabled>


                <label for="balance">Balance</label>
                <input type="text" name="balance" id="balance" disabled>
                <br><br>

                <div id="error-message"></div>

                <input type="submit" id="button" value="Save Changes">
            </form>
        </div>
    </div>

</body>

</html>