
<?php 
//if($_SERVER['REQUEST_METHOD']=='POST')
{
    $userid="";
    if(isset($_POST['userid']))
    {
        $userid=$_POST['userid'];
    }
    include_once '../../model/admin_model.php';
    $result= searchDriver($userid);
    if($result->num_rows==0)
    {
        echo "<h1>No Results Founded</h1>";
    }
    else
    {
        ?>
        <table>
            <tr>
                <th>Userid</th>
                <th>Usertype</th>
                <th>Status</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Address</th>
                <th>License NO</th>
                <th>Commission</th>
                <th>Account</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <?php
            while($row = $result->fetch_assoc())
            {
                ?>
                <tr>
                    <td style="width: 100px;"><?php echo $row['userid']; ?></td>
                    <td style="width: 100px;"><?php echo $row['usertype']; ?></td>
                    <td style="width: 100px;"><?php echo $row['status']; ?></td>
                    <td style="width: 100px;"><?php echo $row['name']; ?></td>
                    <td style="width: 100px;"><?php echo $row['email']; ?></td>
                    <td style="width: 100px;"><?php echo $row['contact']; ?></td>
                    <td style="width: 100px;"><?php echo $row['adress']; ?></td>
                    <td style="width: 100px;"><?php echo $row['license_no']; ?></td>
                    <td style="width: 100px;"><?php echo $row['commission']; ?></td>
                    <td style="width: 100px;"><?php echo $row['account']; ?></td>
                    <td>
                        <img src="../profile_image/<?php echo $row['profile_image']; ?>" alt="" height="50px">
                    </td>
                    <td>
                        <button onclick="deleteDriver('<?php echo $row['userid']; ?>', '<?php echo $row['profile_image']; ?>')">
                            Delete
                        </button>
                        <?php
                        if($row['status']=='active')
                        {
                        ?>
                            <button onclick="blockDriver('<?php echo $row['userid']; ?>', '<?php echo $row['profile_image']; ?>')">
                                Block
                            </button>
                        <?php
                        }
                        else
                        {
                        ?>
                            <button onclick="unblockDriver('<?php echo $row['userid']; ?>', '<?php echo $row['profile_image']; ?>')">
                                Unblock
                            </button>
                        <?php
                        }
                        ?>
                        <button onclick="editDriver('<?php echo $row['userid']; ?>',
                                                         '<?php echo $row['name']; ?>',
                                                         '<?php echo $row['email']; ?>',
                                                         '<?php echo $row['contact']; ?>',
                                                         '<?php echo $row['adress']; ?>',
                                                         '<?php echo $row['license_no']; ?>',
                                                         '<?php echo $row['commission']; ?>',
                                                         '<?php echo $row['account']; ?>',
                                                         '<?php echo $row['profile_image']; ?>'
                                                         )">Edit
                        </button>
                        
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    } 
}
?>