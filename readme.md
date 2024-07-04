# Autohaus Speedster

Welcome to Autohaus Speedster, a website developed with WordPress and React.js. The website features a hero section with a background image, a slogan, and a logo, displays the 3 latest blog posts, and includes an interactive gallery created with React JS fetching data from local json document.

## Table of Contents

- [About the Project](#about-the-project)
- [Technologies](#technologies)
- [Features](#features)
- [Installation](#installation)


## About the Project

Autohaus Speedster is a website developed for a fictional car dealership. It offers an attractive presentation of the company, displays the latest blog posts, and provides an interactive gallery created with React.js.

## Technologies

- WordPress: Used as a CMS for content management.
- React.js: Used for the interactive gallery.
- HTML, CSS, JavaScript: For the development of the user interface.
- PHP: For server-side logic in WordPress.

## Features

- **Hero Section**: Includes a background image, a slogan, and the call to acction button.
- **Latest Blog Posts**: Always displays the three most recent blog posts.
- **Interactive Gallery**: Created with React.js, allows users to browse through various images.

## Installation

### Prerequisites

- Web server (e.g., Apache or Nginx)
- MySQL database
- PHP
- WordPress
- Node.js and npm (for the React component)

### Installation Steps

1. **Install WordPress**: Follow the instructions on the [official WordPress website](https://wordpress.org) to install WordPress.

2. **Clone the project**:
   ```sh
   git clone https://github.com/DarkoHristovski/Autohaus-Speedster.git

3. **Install WordPress theme and plugins**:
   Wordpress Theme: autohaus-speedster,
   plugins:   Advanced Custom Fields Pro, ACF Hide Layout, Advanced CF7 DB, Advanced Custom Fields: Post Type Selector, Classic Editor, Akismet Anti-spam: Spam Protection

4. **Install React Components**:
   Navigate to the Wordpress Theme: autohaus-speedster
   install npm dependency: npm install
   bild the React components: npm run build

5. **Create and Import the Database**:
   Open phpMyAdmin by navigating to http://localhost/phpmyadmin in Create a new database with the same name as my original WordPress database: autohaus.
   With the new database selected, go to the Import tab.
   Click Choose File and select the SQL file from the database directory of your cloned repository (Here I have exported the Database).
   Click Go to import the database.

6. **Configure WordPress**:
    Open the wp-config.php file in your WordPress project directory.
    Update the database configuration settings to match your my local database setup 
    wp-config.php:
    define('DB_NAME', 'autohaus');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_HOST', 'localhost');  