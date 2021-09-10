<?php
    //Code to set the page title and include a consistent header
    $page_title = "Reservation";
    include ("header.inc");
?>

    <!--Content for the Reservation Page -->
    <div id = "main">
        <?php
            session_start();
            if (isset($_SESSION['availability']))
            {
                echo $_SESSION['availability'];
            }
           
        ?>

        <!--Setup a form to handle the reservations -->
        <form action = "" method = "post">
            <p>
                <label for = "checkInDate">Pick Check In Date:</label>
                <input type = "text" id = "checkInDate" name = "checkInDate" size = "10">
            </p>
            <p>
                <label for = "checkOutDate">Pick Check Out Date:</label>
                <input type = "text" id="checkOutDate" name = "checkOutDate" size = "10">
            </p>
            <p>
                <label for = "roomType">Pick Room Type:</label>
                <select name = "roomType">
                    <option value = "Single">Single</option>
                    <option value = "Double">Double</option>
                    <option value = "Family">Family</option>
                </select>
            </p>
            <p>
                <input type = "submit" name = "submit" value = "Make Reservation">
            </p>
        </form>
        
        <?php
            if (isset($_POST['submit']))
            {
                //Connect to the database server
                INCLUDE ("DBConn.php");
                connDB();
                $checkInDate = $_POST['checkInDate'];
                $checkOutDate = $_POST['checkOutDate'];
                $roomType = $_POST['roomType'];
                $confirmNumber = uniqid();

                //Get the room ID
                $idstatement = "SELECT room_type_id, total_room FROM room_type WHERE room_type_name = '$roomType'";

                if ($result = mysqli_query($mysqli, $idstatement))
                {
                    while ($row = mysqli_fetch_object($result))
                    {
                        $roomTypeId = $row->room_type_id;
                        $noOfRoom = $row->total_room;
                    }
                }

                //Check how many rooms are unavailable
                $statement = "SELECT COUNT(*) AS roomReserved
                                FROM reservation 
                                WHERE room_type_id = '$roomTypeId' 
                                AND (begin_date <= '$checkInDate' AND end_date > '$checkInDate' 
                                    OR begin_date < '$checkOutDate' AND end_date >= '$checkOutDate' 
                                    OR begin_date > '$checkInDate' AND end_date < '$checkOutDate') ";

                if ($result = mysqli_query($mysqli, $statement))
                {
                    while ($row = mysqli_fetch_object($result))
                    {
                        $roomTaken = $row->roomReserved;
                    }
                }

                $available = $noOfRoom - $roomTaken;

                //Insert reservation into the server database table
                if ($available > 0)
                {
                    $insertStatement = "INSERT INTO reservation (room_type_id, begin_date, end_date, confirm_number) VALUES ('$roomTypeId', '$checkInDate', '$checkOutDate', '$confirmNumber')";

                    if (mysqli_query($mysqli, $insertStatement))
                    {
                        echo "<p>Reservation successful.  The confirmation number is: $confirmNumber</p>";
                    }
                }else
                    {
                        echo "<p>Sorry, that date and room type is not available.  Select a different date or a different room type</p>";
                       
                    }

                mysqli_close($mysqli);
                
            }
        ?>
    </div>

<!--Load the php code for the footer content -->
<?php
    include ("footer.inc");
?>