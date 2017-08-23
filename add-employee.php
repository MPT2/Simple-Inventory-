
 <!DOCTYPE html>
<html>
<head>
    <title>Inventory System</title>
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <style type="text/css">

        .error{
            color: red;
        }
        .success{
            color: green;
        }
        /* Add a black background color to the top navigation */
          .topnav {
              background-color: #333;
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
              background-color: #4CAF50;
              color: white;
          }
           h4{
            color: blue;
        }

        </style>
    </style>
</head>
<body>
    <div class="container">
        <div id="body">
         <div id="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-3"></div>
                  <div class="col-md-6">
                    <form method="post" action="process/employee.php">
                      <table class="table table-bordered">
                        <caption><b><h4><span class="glyphicons glyphicons-user-add"></span>
                          &nbsp;Add New Employee Details:
                          </h4></b></caption>
                            

                            <tr>
                                <td align="center"><a href="index.php">&larr;Back</a>
                               <td style="color: #2acccc; font-size: 20px">Enter Employee Details</td>
                                </td>
                            </tr>

                            <tr>

                                <td>Fullname:</td>
                                <td><input type="text" name="fullname" autocomplete="off"/> 
                                </td>
                            </tr>

                            <tr>
                                <td>Email:</td>
                                <td><input type="text" name="email" autocomplete="off"/>
                                
                                </td>
                            </tr>

                            <tr>
                                <td>Designation:</td>
                                <td><input type="text" name="designation" autocomplete="off"/>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Department</td>
                                <td><input type="text" name="department" autocomplete="off"/>
                                </td>
                            </tr>  
                            
                            <tr>
                                <td colspan="2" align="right">
                                <button type="submit" name="submit"><strong>SAVE</strong></button></td>
                            </tr>   
                        </table>
                    </form>
                     <?php include ('inc/footer.php');?>
                </div>
            </div>
          </div>
        <div class="col-md-3"></div>
    </body>
</html>