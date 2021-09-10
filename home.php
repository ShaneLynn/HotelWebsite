<?php
    //Code to set the page title and include a consistent header
    $page_title = "Home Page";
    include ("header.inc");
?>

<div id="slideshow">
    <div id="slideshowWindow">
        <div class="slide"> <img src="hotelfront.png">
            <div class="slideText">
                <h1 class="slideHeading">Storm Peak Lodging - Main</h1>
            </div>
        </div>
        <div class="slide" id="slide2"> <img src="hotellobby.png">
            <div class="slideText">
                <h1 class="slideHeading">Storm Peak Lodging - Lobby</h1>
            </div>
        </div>
        <div class="slide"> <img src="hotelroom.png">
            <div class="slideText">
                <h1 class="slideHeading">Storm Peak Lodging - Peak View Rooms</h1>
            </div>
        </div>
    </div>
</div>

<div id="main">
    <!--Unique page content: iframe link must be retreived from google.com maps embed tab per location -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.814216788288!2d-107.66203678472888!3d37.81782037975158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x873ee7f07e647cdb%3A0x6c5439542cbb3af4!2s1717%20Greene%20St%2C%20Silverton%2C%20CO%2081433!5e0!3m2!1sen!2sus!4v1624562794730!5m2!1sen!2sus" width="100%" height="400" 1frameborder="0" style="border:0;" allowfullscreen></iframe>
</div>

<!--Load additional scripts for the page -->
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="slider.js"></script>

<!--Load the php code for the footer content -->
<?php
    include ("footer.inc");
?>