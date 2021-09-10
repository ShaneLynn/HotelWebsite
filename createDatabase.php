<?php
    //This code runs on the server, and should not be seen by the user.
    //It should be run first to create the storage on the server for
    //the needed databases.  The file populate.php should be run second
    //and is linked to upon successful creation.

    //Connect to the server
    $conn = mysqli_connect('localhost', 'root', '');

    //Check the connection
    if($conn)
    {
        echo "<p>Connection setup successfully. </p>";
    }

    //SQL query to remove the previous database
    mysqli_query($conn, "DROP DATABASE IF EXISTS hotelDB");

    //Check the connection, and send the sql statement to create
    //the database.
    if(mysqli_query($conn, "CREATE DATABASE hotelDB"))
    {
        echo "<p>Database created successfully. </p>";
    }

    //Connect to the hotel database
    mysqli_select_db($conn, "hotelDB");

    //Create the table called room_type and store it in a variable
    $myStatement = "CREATE TABLE room_type
                (room_type_id INT NOT NULL AUTO_INCREMENT,
                room_type_name VARCHAR(100),
                total_room INT DEFAULT 5,
                CONSTRAINT pk_room_type PRIMARY KEY (room_type_id)
                ); ";

    //Send the statement variable to the SQL server to create the table
    if(mysqli_query($conn, $myStatement))
    {
        echo "<p>The table room_type has been created successfully. </p>";
    }

    //Update the SQL statement variable to create the reservation table
    $myStatement = "CREATE TABLE reservation
                    (reservation_id INT NOT NULL AUTO_INCREMENT,
                    room_type_id INT NOT NULL,
                    begin_date DATE NOT NULL,
					end_date DATE NOT NULL,
                    confirm_number CHAR(13),
                    CONSTRAINT pk_reservation PRIMARY KEY (reservation_id),
                    CONSTRAINT fk_reservation_room_type FOREIGN KEY (room_type_id)
                    REFERENCES room_type (room_type_id)
                    ); ";

    //Send the SQL statement to the database to create the table
    if (mysqli_query($conn, $myStatement))
    {
        echo "<p>The table reservation has been created successfully. </p>";
    }

    echo "<p><a href = \"populate.php\">Continue to populate the rooms</a></p>";

    //Close the connection to the datbase
    mysqli_close($conn);

?>