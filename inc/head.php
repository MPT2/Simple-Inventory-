	<title>Inventory System</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	
    <style type="text/css">
        /* Add a black background color to the top navigation */
        .topnav {
              background: #808080; /* For browsers that do not support gradients */

            overflow: hidden;
        }

        /* Style the links inside the navigation bar */
        .topnav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        /* Change the color of links on hover */
        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Add a color to the active/current link */
        .topnav a.active {
            background-color: #FF6666;

            color: #fff;
        }
        h2 {
            color: red;
            

        }
        h4{
            color: black;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2 align="center">Inventory System</h2>
        <!--top menu-->
        <div class="topnav" id="myTopnav">
            <a href="index.php" class="active"><i class="glyphicon glyphicon-home"></i></a> 
            <a href="about.php"><i class="glyphicon glyphicon-info-sign"></i>&nbsp;About</a> 
            <a href="add-employee.php"><i class="glyphicon glyphicon-user"></i>&nbsp;Add Employee</a> 
            <a href="add-devices.php"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;Add Devices</a>   
            <a href="list-devices.php"><i class="glyphicon glyphicon-list"></i>&nbsp;List Devices</a>
        </div><br>
    <div class="clearfix"></div>