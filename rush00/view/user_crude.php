<?php
    include "../admin/user_crud.php";
    $arr = read_user();
    $users = $arr["rows"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css"  href="../style/admin.css">
    <link rel="stylesheet" href="../style/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins|Quicksand&display=swap" rel="stylesheet">
    <title>1337 E_Store</title>
</head>
<body>
    <div id="wrapper">
        <div id="menu-section">
            <div id="header">
                <div><a href="./index.html"><span id="header-title-1337">1337</span> <span id="header-title-eshop">E_Shop</span></a></div>
            </div>
            <div class="hr"></div>
            
            <div id="menu-container">
                <ul>
                    <li><div id="menu-top"><i class="fa fa-user" aria-hidden="true"></i> Username</div></li>
                    <li><a href="../admin.php">Home</a></li>
                    <li><a href="user_crude.php">Users Section</a></li>
                    <li><a href="admin_crude.php">Admins Section</a></li>
                    <li><a href="prod_crude.php">Products Section</a></li>
                    <li><a href="com_crude.php">Commands Section</a></li>
                </ul>
            </div>
        </div>
        <div id="main-section">
            <table class="table_user">
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Phone</th>
                    <th>Addresse</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Baned</th>
                    <th>Created Date</th>
                    <th>Update Date</th>
                    <th>Actions</th>
                </tr>
                <tr>
                    <td><input type="text" name="id" id="id"/></td>
                    <td><input type="text" name="first_name" id="first_name"/></td>
                    <td><input type="text" name="last_name" id="last_name"/></td>
                    <td><input type="text" name="username" id="username"/></td>
                    <td><input type="text" name="passwrd" id="passwrd"/></td>
                    <td><input type="text" name="phone" id="phone"/></td>
                    <td><input type="text" name="adresse" id="adresse"/></td>
                    <td><input type="text" name="email" id="email"/></td>
                    <td><input type="text" name="role" id="role"/></td>
                    <td><input type="text" name="baned" id="baned"/></td>
                    <td><input type="text" name="create_date" id="create_date"/></td>
                    <td><input type="text" name="update_date" id="update_date"/></td>
                    <td><input type="button" name="action" id="action" value="Add"/></td>
                </tr>
                <?php
                    foreach($users as $user)
                    {
                        echo "<tr>
                            <td>".$user["id"]."</td>
                            <td>".$user["first_name"]."</td>
                            <td>".$user["last_name"]."</td>
                            <td>".$user["username"]."</td>
                            <td>".$user["passwrd"]."</td>
                            <td>".$user["phone"]."</td>
                            <td>".$user["adresse"]."</td>
                            <td>".$user["email"]."</td>
                            <td>".$user["role"]."</td>
                            <td>".$user["baned"]."</td>
                            <td>".$user["create_date"]."</td>
                            <td>".$user["update_date"]."</td>
                            <td> <div class='action-row'><i class='fa fa-pencil action-btn' aria-hidden='true'></i><i class='fa fa-trash action-btn' aria-hidden='true'></i><i class='fa fa-ban action-btn' aria-hidden='true'></i></div></td>
                        </tr>";
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>