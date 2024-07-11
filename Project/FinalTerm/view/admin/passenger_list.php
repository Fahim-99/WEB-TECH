
<?php 
//if($_SERVER['REQUEST_METHOD']=='POST')
{
    $userid="";
    if(isset($_POST['userid']))
    {
        $userid=$_POST['userid'];
    }
    include_once '../../model/admin_model.php';
    $result= searchPassenger($userid);
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
                <!-- <th>Usertype</th> -->
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php
            while($row = $result->fetch_assoc())
            {
                ?>
                <tr>
                    <td><?php echo $row['userid']; ?></td>
                    <!-- <td><?php //echo $row['usertype']; ?></td> -->
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td style="width: 200px;"><?php echo $row['adress']; ?></td>
                    <td>
                        <img src="../profile_image/<?php echo $row['profile_image']; ?>" alt="" height="50px" onclick="showImage('<?php echo $row['profile_image']; ?>')">
                    </td>
                    <!-- Status -->
                    <td>
                        <?php echo $row['status']; ?><br>
                        <?php
                        if($row['status']=='active')
                        {
                        ?>
                            <button onclick="blockPassenger('<?php echo $row['userid']; ?>', '<?php echo $row['profile_image']; ?>')">
                                Block
                            </button>
                        <?php
                        }
                        else
                        {
                        ?>
                            <button onclick="unblockPassenger('<?php echo $row['userid']; ?>', '<?php echo $row['profile_image']; ?>')">
                                Unblock
                            </button>
                            
                        <?php
                        }
                        ?>
                    </td>
                    <td>
                        <button onclick="deletePassenger('<?php echo $row['userid']; ?>', '<?php echo $row['profile_image']; ?>')">
                            Delete
                        </button>
                        <br>
                        <button onclick="editPassenger('<?php echo $row['userid']; ?>',
                                                         '<?php echo $row['name']; ?>',
                                                         '<?php echo $row['email']; ?>',
                                                         '<?php echo $row['contact']; ?>',
                                                         '<?php echo $row['adress']; ?>',
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