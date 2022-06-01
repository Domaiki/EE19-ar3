<?php
    $con = mysqli_connect("localhost", "root", "", "api");
    $response = array();
    if ($con) {
        $sql = "select * from users";
        $result = mysqli_query($con,$sql);
        if ($result) {
            $x = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $response[$x]['id'] = $row['id'];
            }
        }
    }
?> 