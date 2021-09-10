<?php
    //This code runs on the server, and should not be seen by the user.
    //It allows other pages to access the database and provides a shortcut
    //when writing server connections.
    
function connDB()
{
    //Setup the global variable to hold connection information
    global $mysqli;

    //Connect to the database
    $mysqli = mysqli_connect("localhost", "root", "", "hotelDB");

    //Check to see if the connection failed
    if(mysqli_connect_errno())
    {
        printf("Connection Failed: %s\n ", mysqli_connect_error());
        exit();
    }
}

?>