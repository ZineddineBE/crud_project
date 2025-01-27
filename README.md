# crud_project

	This is a simple CRUD (Create, Read, Update, Delete) application built with PHP and MySQL. The project demonstrates essential database operations and serves as a beginner-friendly example of dynamic web development.

## Project Structure  

	```plaintext
	.git/                     - Git version control directory.  
	css/                      - Folder containing stylesheets for the project.   
	clients_table_setup.sql   - SQL file to set up the `clients` table in the database.  
	create.php                - Page to add new client records.  
	db_connection.php         - Script for database connection configuration.  
	delete.php                - Script for deleting client records.  
	edit.php                  - Page for editing existing client records.  
	index.php                 - Main page for listing all client records.  
	README.md                 - Documentation for the project (this file).```

## Features

### Full CRUD functionality:

	- Create: Add new client records via create.php.
	- Read: View all clients on index.php.
	- Update: Modify client information via edit.php.
	- Delete: Remove client records using delete.php.

### Database: 

A MySQL database (crud_project) with a clients table.

## Prerequisites
	- PHP >= 7.4
	- MySQL Server
	- Web server (e.g., Apache or Nginx)

## Installation

### Clone the repository:

	```bash
	git clone https://github.com/username/php-crud-project.git
	cd php-crud-project```

### Set up the database:

#### Import the clients_table_setup.sql file into your MySQL database:

	```bash 
	mysql -u username -p database_name < clients_table_setup.sql```
	
#### Update the db_connection.php file with your database credentials:

	```php
	<?php
	$host = 'localhost';
	$db_name = 'crud_project';
	$username = 'your_username';
	$password = 'your_password';

	try {
		$conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
	?>```
	
### Run the application:

	Launch your web server and navigate to the project directory in your browser.
	Example: http://localhost/php-crud-project/index.php

## Usage

	Navigate to the index.php page to view all clients.
	Use the "Add Client" button to create new records.
	Edit or delete existing clients via the respective options.