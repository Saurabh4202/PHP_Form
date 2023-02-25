<html>
    <head>
        <title>Show</title>
        <style>
            body
            {
                background: rgb(190, 149, 228);
            }
            table{
                background-color: white;
            }
            .edit{
                background-color: blue;
                color: white;
                border: 0px;
                outline: none;
                border-radius: 10px;
                height: 23px;
                width: 80px;
                font-weight: bold;
                cursor: pointer;
            }
            .delete{
                background-color: red;
                color: white;
                border: 0px;
                outline: none;
                border-radius: 10px;
                height: 23px;
                width: 80px;
                font-weight: bold;
                cursor: pointer;
            }
        </style>
    </head>


</html>



<?php
    include("connect.php");
    error_reporting(0);

$query = "SELECT * FROM FORM";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);

//echo $total

if($total != 0)
{
  ?>  
    <h2 align="center"><mark>Showing all records</h2></mark>
    <center><table border="1px" cellspacing="7" width="100%">
        <tr>
        <th width="5%">ID</th>
        <th width="10%">First Name</th>
        <th width="10%">Last Name</th>
        <th width="10%">Gender</th>
        <th width="20%">Email</th>
        <th width="10%">Mobile No.</th>
        <th width="20%">Address</th>
        <th width="15%">Controls</th>
        </tr>


    <?php
    while($result = mysqli_fetch_assoc($data))
    {
        echo "<tr>
                <td>".$result['ID']."</td>
                <td>".$result['fname']."</td>
                <td>".$result['lname']."</td>
                <td>".$result['gender']."</td>
                <td>".$result['email']."</td>
                <td>".$result['phone']."</td>
                <td>".$result['address']."</td>

                <td><a href='edit_design.php?id=$result[ID]'><input type='submit' value='Edit' class='edit'</a>

                <a href='delete.php?id=$result[ID]'><input type='submit' value='Delete' class='delete'</a></td>
                
                </tr>";

                
        
    }
}
else
{
    echo "No record found";
}

?>
</table></center>
