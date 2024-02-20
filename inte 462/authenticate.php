<?php
include 'connect.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search data</title>
</head>
<body>
    <div class="container my-5">
        <form method="post">
             <input type="text" placeholder="search data" name="search">
             <button type="submit" name="submit">Search</button>
         </form>
         <div class="container my-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>s1 no</th>
                        <th>Regno</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($_POST['submit'])){
                        $search=$_POST['search'];

                        $sql="SELECT * FROM `series` WHERE id='$search'";
                        $result=mysqli_query($data,$sql);
                        if($result){
                            if(mysqli_num_rows($result)>0){
                                while($row=mysqli_fetch_assoc($result)){ // Fetch each row before accessing its data
                                    // Output table rows here using $row data
                                    echo "<tr>";
                                    echo "<td>".$row['id']."</td>";
                                    echo "<td>".$row['Regno']."</td>";
                                    echo "<td>".$row['email']."</td>";
                                    echo "<td>".$row['mobile']."</td>";
                                    echo "<td>".$row['address']."</td>";
                                    echo "<td>".(isset($row['Mobile']) ? $row['Mobile'] : '')."</td>"; // Check if key exists before accessing it
                                    echo "<td>".(isset($row['Address']) ? $row['Address'] : '')."</td>"; // Check if key exists before accessing it
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No data found</td></tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>Error: " . mysqli_error($data) . "</td></tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
         </div>
    </div>
</body>
</html>
