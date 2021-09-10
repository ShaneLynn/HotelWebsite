        <aside>
            <form action = "checkAvailability.php" method = "post">
                <label for = "checkin">Check In:</label>
                <input type = "text" id = "checkin" name = "checkin">
                <label for = "checkout">Check Out:</label>
                <input type = "text" id = "checkout" name = "checkout">
                <label for = "roomtype">Room Type</label>
                <select id = "roomtype" name = "roomtype">
                    <option value = "single">Single Room</option>
                    <option value = "double">Double Room</option>
                    <option value = "family">Family Room</option>
                </select>
                <input type = "submit" name = "submit" value = "Check Availability">
            </form>
        </aside>

        <footer>
            <span>Copyright &copy; Storm Peak Lodging 2005-<?php echo date("Y"); ?> </span>
            <div id = "socialgroup">
                <a href="https://www.facebook.com"><img class = "social" src="facebook.png">
                <a href="https://www.linkedin.com"><img class = "social" src="linkedin.png">
                <a href="https://twitter.com"><img class = "social" src="twitter.png">
                <a href="https://www.instagram.com"><img class = "social" src="instagram.png">
            </div>
        </footer>
        
        <!--Required scripts for jquery to work correctly-->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="calendar.js"></script>
		
		<!--This file contains footer information ususally included at the bottom of each page to
            provide a universal look -->
    </body>
</html>

