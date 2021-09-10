<?php
    //This code runs on the server, and should not be seen by the user.
    session_start();
    if (isset($_POST['submit']))
    {
        //Connect to the server
        INCLUDE ("DBConn.php");
        connDB();
        $checkInDate = $_POST['checkin'];
        $checkOutDate = $_POST['checkout'];
        $roomType = $_POST['roomtype'];
        $statement = "SELECT room_type_id, total_room FROM room_type WHERE room_type_name = '$roomType'";
        if ($result = mysqli_query($mysqli, $statement))
        {
            while ($row = mysqli_fetch_object($result))
            {
                $roomTypeId = $row->room_type_id;
                $noOfRoom = $row->total_room;
            }
        }

        //Query and calculate the rooms not available
        $statement = "SELECT COUNT(*) AS roomReserved FROM reservation
                        WHERE room_type_id = '$roomTypeId'
                         AND (begin_date <='$checkInDate' AND end_date > '$checkInDate' 
                         OR begin_date < '$checkOutDate' AND end_date >= '$checkOutDate' 
                         OR begin_date > '$checkInDate' AND end_date < '$checkOutDate') ";

        if($result = mysqli_query($mysqli, $statement))
        {
            while ($row = mysqli_fetch_object($result))
            {
                $roomTaken = $row->roomReserved;
            }
        }
        
        $available = $noOfRoom - $roomTaken;

        if ($available > 0)
        {
            $_SESSION['availability'] = "The room is available.  Reserve now!";
        }else
        {
            $_SESSION['availability'] = "Sorry, that room is not available.  Select a different date or room type";
        }
        header("Location: reservation.php");

        mysqli_close($mysqli);
    }
?>