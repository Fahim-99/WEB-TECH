
<?php 
//if($_SERVER['REQUEST_METHOD']=='POST')
{
    $search="";
    if(isset($_POST['search']))
    {
        $search=$_POST['search'];
    }
    include_once '../../model/admin_model.php';
    $result= searchTrip($search);
    if($result->num_rows==0)
    {
        echo "<h1>No Results Founded</h1>";
    }
    else
    {
        ?>
        <table>
            <tr>
                <th>TH ID</th>
                <th>Trip ID</th>
                <th>Departure</th>
                <th>Destination</th>
                <th>Trip Date</th>
                <th>Passenger ID</th>
                <th>Driver ID</th>
                <!-- <th>Status</th> -->
            </tr>
            <?php
            while($row = $result->fetch_assoc())
            {
                ?>
                <tr>
                    <td style="width: 100px;"><?php echo $row['th_id']; ?></td>
                    <td style="width: 100px;"><?php echo $row['trip_id']; ?></td>
                    <td style="width: 100px;"><?php echo $row['departure']; ?></td>
                    <td style="width: 100px;"><?php echo $row['destination']; ?></td>
                    <td style="width: 100px;"><?php echo $row['trip_date']; ?></td>
                    <td style="width: 100px;"><?php echo $row['passenger_id']; ?></td>
                    <td style="width: 100px;">
                        <?php echo $row['driver_id']; ?>
                        <Button onclick="changeDriver('<?php echo $row['th_id']; ?>')">Change</Button>
                    </td>
                    <!-- <td style="width: 100px;"><?php echo $row['status']; ?></td> -->
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    } 
}
?>