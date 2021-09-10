<?php
    //This code runs on the server, and should not be seen by the user.
    //It should be run after createDatabase.php and has a link to go directly to the homepage
    INCLUDE ("DBConn.php");

    connDB();

    //Load the variable with the SQL statements to insert new rows into the room_type table
    $statement = "INSERT INTO room_type (room_type_name) VALUES ('Single');
                    INSERT INTO room_type (room_type_name) VALUES ('Double');
                    INSERT INTO room_type (room_type_name) VALUES ('Family');";

    //Check to make sure the row insert completed
    if(mysqli_multi_query($mysqli, $statement))
    {
        echo "<p>Rows inserted successfully into room_type table";
    }else
    {
        echo "<p>Rows did not load.  Something went wrong.</p>";
    }

    echo "<p><a href = \"home.php\">Continue to homepage</a></p>";

    //Close the connection
    mysqli_close($mysqli);

?>