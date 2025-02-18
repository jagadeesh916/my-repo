<div class="right-section">
    <h2>Current News & Events</h2>
    <div class="events-wrapper">
        <ul class="events-list">
            <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "krithick@1234";
            $dbname = "your_database";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Get current month and year
            $currentMonth = date('m'); // e.g., 12 for December
            $currentYear = date('Y');  // e.g., 2024

            // Query to fetch events for the current month
            $sql = "SELECT * FROM events 
                    WHERE MONTH(event_date) = $currentMonth AND YEAR(event_date) = $currentYear
                    ORDER BY event_date ASC";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Format date to "dd Mon" format (e.g., "05 Sep")
                    $eventDate = date('d M', strtotime($row['event_date']));
                    echo '<li class="event-item">';
                    echo '<span class="date">' . $eventDate . '</span>';
                    echo '<p>' . htmlspecialchars($row['title']) . '</p>';
                    echo '</li>';
                }
            } else {
                echo '<li class="event-item">';
                echo '<p>No events this month.</p>';
                echo '</li>';
            }

            $conn->close();
            ?>
        </ul>
    </div>