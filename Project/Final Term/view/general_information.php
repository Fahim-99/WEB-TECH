<?php
    require_once 'header.php';
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <p>
        <center>
            <h1>
                In VRMS Project <br>
                We used 4 types of users <br>
                Their Attribute and Functions are given below <br>
            </h1>
            
        <table border="5px">
            <tr>
                <th>Admin</th>
                <th>Employee</th>
                <th>Passenger</th>
                <th>Driver</th>
            </tr>
            <>
                <td valign="top">
                    <h2>Attribute:</h2>
                    <ul>
                        <li>String name</li>
                        <li>String id</li>
                        <li>String password</li>
                    </ul>
                    <h2>Methods:</h2>
                    <ul>
                        <li>void add_employee()</li>
                        <li>void remove_employee()</li>
                        <li>void block_employee()</li>
                        <li>void set_employee_salary()</li>
                        <li>void demote_employee()</li>
                        <li>void set_employee_commission()</li>
                    </ul>
                </td>
                <td valign="top">
                    <h2>Attribute:</h2>
                    <ul>
                        <li>String name</li>
                        <li>String id</li>
                        <li>String password</li>
                    </ul>
                    <h2>Methods:</h2>
                    <ul>
                        <li>void add_passanger()</li>
                        <li>void remove_Passenger()</li>
                        <li>void block_passenger()</li>
                        <li>void add_driver()</li>
                        <li>void remove_driver</li>
                        <li>void block_driver</li>
                        <li>void add_trip</li>
                        <li>void approve_trip</li>
                        <li>void cancle_trip</li>
                        <li>void add_car</li>
                        <li>void remove_car</li>
                    </ul>
                </td>
                <td valign="top">
                    <h2>Attribute:</h2>
                    <ul>
                        <li>String name</li>
                        <li>String id</li>
                        <li>String password</li>
                        <li>string address</li>
                        <li>string contact</li>
                        <li>string email</li>
                        <li>string gender</li>
                        <li></li>
                    </ul>
                    <h2>Methods:</h2>
                    <ul>
                        <li>void requestTrip</li>
                        <li>void cancelTrip</li>
                        <li>void sendFeedback()</li>
                        <li>void payment()</li>
                        <li>void sentReport()</li>
                    </ul>
                </td>

                <td valign="top">
                    <h2>Attribute:</h2>
                    <ul>
                        <li>String name</li>
                        <li>String id</li>
                        <li>String password</li>
                        <li>string address</li>
                        <li>string contact</li>
                    </ul>
                    <h2>Methods:</h2>
                    <ul>
                        <li>void acceptTrip()</li>
                        <li>void rejectTrip()</li>
                        <li>void sendFeedback()</li>
                        <li>void sentReport()</li>
                    </ul>
                </td>
            </tr>
        </table>
        </center>

    </p>
</body>
<?php
    require_once 'footer.php';
?>
</html>