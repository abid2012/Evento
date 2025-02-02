<?php

include "../model/db.php";

// Handle form submission
if (isset($_POST['download'])) {
    $event_id = intval($_POST['event']);

    // Fetch event name for the CSV filename
    $event_query = $conn->query("SELECT Event_Name FROM events WHERE Event_Id = $event_id");
    if ($event_query->num_rows > 0) {
        $event = $event_query->fetch_assoc();
        $event_name = $event['Event_Name'];

        // Fetch attendees for the selected event
        $attendees_query = $conn->query("
            SELECT Attendee_Id, Attendee_Name, Attendee_Phone, Attendee_Email, Attendee_Gender
            FROM attendees
            WHERE Event_Id = $event_id
        ");

        if ($attendees_query->num_rows > 0) {
            // Set headers for CSV download
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $event_name . '_attendees.csv"');

            // Open output stream
            $output = fopen('php://output', 'w');

            // Add CSV headers
            fputcsv($output, ['Attendee_Id', 'Attendee_Name', 'Attendee_Phone', 'Attendee_Email', 'Attendee_Gender']);

            // Add attendee data
            while ($row = $attendees_query->fetch_assoc()) {
                fputcsv($output, $row);
            }

            // Close output stream
            fclose($output);
            exit(); // Stop further execution
        } else {
            echo "No attendees found for this event.";
        }
    } else {
        echo "Event not found.";
    }
}

$conn->close();
?>