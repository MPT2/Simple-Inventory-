                  
<!DOCTYPE html>
<html>
<head>
	<title>Inventory System</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
	    <!-- datepicker css and script -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
        $( function() {
        $( "#datepicker" ).datepicker();
        } );
        </script>  <!-- datepicker css and script -->
    	<style type="text/css">
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

            .error{
                color: red;
            }
            .select-style {
            border: 1px solid #ccc;
            width: 200px;
            border-radius: 3px;
            overflow: hidden;
            background: #fafafa url("img/icon-select.png") no-repeat 90% 50%;
            }

            .select-style select {
            padding: 5px 8px;
            width: 200px;
            border: none;
            box-shadow: none;
            background: transparent;
            background-image: none;
            -webkit-appearance: none;
            }

            .select-style select:focus {
            outline: none;
            }
    	</style>
</head>
<body>
	<div class="container">
            <div id="body">
               <div id="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    
                                    <form method="post" action="process/device.php">
                                        <table class="table table-bordered">
                                            <caption><b><h4 align="right">Add New Device Details:</h4></b></caption>

                                            <tr>
                                                <td align="center"><a href="list-devices.php">&larr;Back</a></td>
                                                <td style="color: #2acccc; font-size: 20px">Enter Device Details</td>
                                            </tr>

                                            <tr>
                                                <td>Device Name: </td>
                                                <td><input type="text" name="device_name" autocomplete="off"/>
                                                <span class="error"></span></td>
                                            </tr>

                                            <tr>
                                                <td>Brand:</td>
                                                <td><input type="text" name="brand" autocomplete="off"/> 
                                                <span class="error"></span></td>
                                            </tr>

                                            <tr>
                                                <td>Quantity:</td>
                                                <td><input type="number" name="quantity" min="1" autocomplete="off"/>
                                                <span class="error"></span
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Select Device</td>
                                                <td>
                                                    <select name="device_type" class="select-style">
                                                     <option value = "" disabled selected>--Select Device--</option>
                                                        <option value="electronics">Electronics</option>
                                                        <option value="network">Network</option>
                                                        <option value="others">Others</option>
                                                    </select><span class="error">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Date: <span class="glyphicon glyphicon-calendar"></span></td>
                                                <td>         
                                                 
                                                   <input type="text" name="device_assign" id="datepicker" placeholder="click here" 
                                                   style="padding-right: 40px">
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td align="right" colspan="2"><button type="submit" name="btn-save"><strong>SAVE</strong>
                                                </button></td>
                                            </tr>
                                        </table>
                                    </form>
                                     <?php include ('inc/footer.php');?>
                                </div>
                            <div class="col-md-2">
                        </div>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>