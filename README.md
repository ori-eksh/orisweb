```
# Bulletin Board Project

## Project Description
The Bulletin Board is a dynamic web application for posting and displaying public messages. Users can submit ads via a form, which are stored in a MySQL database and displayed dynamically on the board.

## Features
- User-friendly form for posting ads.
- Stores messages in a MySQL database.
- Dynamically displays all posted ads.
- Responsive design suitable for all devices.

## Installation Instructions
### Prerequisites
1. Install **XAMPP Server** on your system.
2. (Optional) Install **Git** for version control.

### Setup Steps
1. Clone or download this repository.
2. Place the project folder inside the `htdocs` directory of XAMPP:
   ```
   C:\xampp\htdocs\bulletin-board
   ```
3. Start the Apache and MySQL services from the XAMPP control panel.

### Database Setup
1. Open `phpMyAdmin` by navigating to:
   ```
   http://localhost/phpmyadmin/
   ```
2. Create a database named `bulletin_board`.
3. Import the `database.sql` file into the `bulletin_board` database:
   - Go to the `Import` tab in phpMyAdmin.
   - Select the SQL file and click `Go`.
4. Ensure the database connection settings in `backend/config.php` are correct:
   ```php
   <?php
   $host = "localhost";
   $user = "root";
   $password = "";
   $database = "bulletin_board";
   ?>
   ```

### Running the Application
1. Open a web browser and visit:
   ```
   http://localhost/bulletin-board/
   ```
2. Use the provided form to post messages and view them on the board.

## Folder Structure
```
bulletin-board/
├── frontend/
│   ├── index.html
│   ├── styles.css
│   └── script.js
├── backend/
│   ├── addMessage.php
│   ├── getMessages.php
│   └── config.php
├── images/
│   └── mountain.jpg
└── database.sql
```

## Technology Stack
- **Frontend:** HTML, CSS (Bootstrap), JavaScript
- **Backend:** PHP
- **Database:** MySQL

## Usage Instructions
1. Fill out the form on the left panel to post a message.
2. View the list of ads on the right panel.
3. All ads are stored in the MySQL database.

## Contributing
Contributions are welcome! Fork this repository and create pull requests to propose changes.

## License
This project is released under the MIT License.
```
