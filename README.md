# Evento
Evento is a Simple but effective Event Management Web App which is developed using PHP &amp; JS (No Framework)

This is a PHP-based Event Management System that allows administrators to manage events and attendees. It includes features such as creating, editing, and deleting events, downloading attendee lists in CSV format, and dynamically updating the event table using AJAX.

**Features
Event Management:**

-Create, edit, and delete events.

-View events in a dynamic table with AJAX-based updates.

-Attendee Management:

-Download attendee lists for specific events in CSV format.

-Dynamic Table Updates:

-Automatically updates the event table without refreshing the page.

-User-Friendly Interface:

-Built with Bootstrap for a responsive and modern design.


**Installation
Prerequisites
Web Server:**

Apache. (Xampp preferred)

PHP:

PHP 7.4 or higher.

MySQL:

MySQL 5.7 or higher.


**Steps**

-Download the project from GitHub
-Download and install xampp on your device
-Start apache and mysql server
-Create a database called "evento" on localhost/phpmyadmin
-Import the "evento.sql" which is given
-Keep the project folder inside xampp>>htdocs>>
-Type "localhost/Evento" on your browser to run the project



**Usage**

1. i) Admin Login
Access the admin dashboard by logging in with your credentials.

Default credentials:

Username: admin
Password: admin

ii) User Login

Default credentials:

Email: test@gmail.com
Password: test

2. Manage Events
Create an Event:

Fill out the event creation form with details like event name, date, description, and maximum capacity.

Edit an Event:

Click the edit button next to an event in the table and update the details.

Delete an Event:

Click the delete button next to an event to remove it.

3. Download Attendee List
Select an event from the dropdown menu and click the "Download" button to generate a CSV file of attendees.

4. Dynamic Table Updates
The event table automatically updates every 5 seconds using AJAX. No need to refresh the page manually.


**File Structure**

evento/
├── control/                  # PHP scripts for backend logic
│   ├── fetch_events.php      # Fetches events for AJAX updates
│   ├── action.php            # Handles CRUD operations for Tabledit
│   └── adminlogout.php       # Handles admin logout
├── css/                      # CSS files
│   └── style.css             # Custom styles
├── images/                   # Image assets
│   └── red-carpet.png        # Favicon
├── js/                       # JavaScript files
│   └── script.js             # Custom scripts
├── config.php                # Database configuration
├── database.sql              # Database schema
├── index.php                 # Main application file
├── README.md                 # Documentation
└── .htaccess                 # Apache configuration (if applicable)


**Technologies Used**

Frontend:

HTML, CSS, JavaScript

Bootstrap 5

jQuery

Backend:

PHP

MySQL

Libraries:

Tabledit (for inline table editing)


**Support**

For any issues or questions, please open an issue on the GitHub repository.
https://github.com/abid2012/Evento

Thank you for using Evento! 🎉



