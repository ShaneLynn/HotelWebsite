<?php
    //Code to set the page title and include a consistent header
    $page_title = "Testimonials";
    include ("header.inc");
?>

<!--Content for the Testimonials Page -->
<div id = "main">
    <!--Setup the form to collect comments -->
    <form action = ""method = "post" enctype="multipart/form-data">
        <p>Your Name:
            <br>
            <input type = "text" name = "name" size = "30" maxlength = "30">
        </p>
        <p>Your Comments:
            <br>
            <textarea name = "comment" rows = "7" cols = "35"></textarea>
        </p>
        <label for = "myPhoto">Upload File:</label>
        <input type = "file" id="myPhoto" name = "myPhoto">
        <br>
        <input type = "submit" name = "submit" value = "Submit">
        <input type = "submit" name = "view" value = "View">
        <br>
    </form>
    
    <?php
        if(isset($_POST['submit']))
        {
            //Handle the upload
            $destination = "Images/";  //To move the image to the images folder
            move_uploaded_file($_FILES['myPhoto']['tmp_name'], $destination.$_FILES['myPhoto']['name']);

            //Setup the variable to hold the save filename
            $myFile = "testimonials.txt";

            //Write to the file
            if(is_writable($myFile))
            {
                file_put_contents($myFile, $_POST['name'].PHP_EOL, FILE_APPEND);
                file_put_contents($myFile, $_FILES['myPhoto']['name'].PHP_EOL, FILE_APPEND);
                file_put_contents($myFile, $_POST['comment'].PHP_EOL, FILE_APPEND);
                file_put_contents($myFile, date('m/d/Y').PHP_EOL, FILE_APPEND);
                echo "<p> Thank you for the submission!</p>";
            }else
            {
                echo "<p>Submission failed. Please try again. </p>";
            }
        }

        //Read stored comments from the file
        if(isset($_POST['view']))
        {
            $allComments = file("testimonials.txt");
            for($i = 0; $i < count($allComments); $i+=4)
            {
                echo $allComments[$i];
                echo "<br>";
                $image = $allComments[$i+1];
                echo "<img src=\"Images/$image\" width=\"100\" height=\"100\">";
                echo "<br>";
                echo $allComments[$i+2];
                echo "<br>";
                echo $allComments[$i+3];
                echo "<br>";
            }
        }
    ?>
</div>

<!--Load the php code for the footer content -->

<?php
    include ("footer.inc");
?>