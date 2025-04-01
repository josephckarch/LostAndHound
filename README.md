# LostAndHound

#### Website for posting and finding lost pets!

Authors: Joseph Karch, Winnie Augustin, Angela Li

## Project Overview

LostAndHound is a web application designed to help users post and find lost pets. The platform allows pet owners to share information about their lost pets and enables users to search for pets that have been found.

## Technologies Used

- **Frontend**: PHP, HTML, Bootstrap, jQuery
- **Backend**: PHP, MySQL
- **Styling**: Custom CSS

## Project Structure

```
lost-and-hound
├── public
│   ├── index.php          # Main entry point of the website
│   ├── css
│   │   └── styles.css     # Custom CSS styles
│   ├── js
│   │   └── scripts.js      # JavaScript code for dynamic interactions
│   ├── images              # Directory for image assets
│   └── uploads             # Directory for uploaded files
├── src
│   ├── config
│   │   └── database.php    # Database configuration
│   ├── controllers
│   │   └── PetController.php # Controller for pet-related logic
│   ├── models
│   │   └── Pet.php         # Pet data model
│   └── views
│       ├── layout
│       │   └── header.php   # Header layout
│       ├── home.php        # Homepage view
│       └── pet-details.php  # Detailed view of a specific pet
├── sql
│   └── schema.sql          # SQL schema for database setup
├── .gitignore              # Files and directories to ignore by Git
└── README.md               # Project documentation
```

## Setup Instructions

1. Clone the repository to your local machine.
2. Navigate to the project directory.
3. Set up the MySQL database using the `sql/schema.sql` file.
4. Update the database configuration in `src/config/database.php`.
5. Run the application by accessing `public/index.php` in your web browser.

## Contributing

Contributions are welcome! Please submit a pull request or open an issue for any suggestions or improvements.