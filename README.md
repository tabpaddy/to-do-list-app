
# To-Do List App

## Overview

This To-Do List App allows users to manage their tasks efficiently. Users can add, view, update, and delete tasks. The app categorizes tasks into All, Active, and Completed sections for easy management. It is built using PHP and MySQL for the backend and Bootstrap for the frontend.

## Features

- **Add Task**: Users can add new tasks.
- **View Tasks**: Tasks are categorized into All, Active, and Completed.
- **Update Task**: Users can update the status of tasks to mark them as completed.
- **Delete Task**: Users can delete tasks.
- **Responsive Design**: The app is mobile-friendly and adjusts to different screen sizes.

## Technologies Used

- **Frontend**: HTML, CSS, Bootstrap
- **Backend**: PHP
- **Database**: MySQL

## Installation

1. **Clone the Repository**:
    ```bash
    git clone https://github.com/tabpaddy/to-do-list-app.git
    ```

2. **Navigate to the Project Directory**:
    ```bash
    cd to-do-list-app
    ```

3. **Set Up the Database**:
    - Create a MySQL database.
    - Import the `database.sql` file to set up the required tables.

4. **Configure Database Connection**:
    - Update the `config.php` file with your database credentials:
      ```php
      <?php
      $con = mysqli_connect("localhost", "your-username", "your-password", "your-database-name");
      if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          exit();
      }
      ?>
      ```

5. **Run the App**:
    - Place the project files in your web server's root directory (e.g., `htdocs` for XAMPP or `www` for WAMP).
    - Start your web server and navigate to `http://localhost/to-do-list-app` in your browser.

## File Structure

```
todo-list-app/
│
├── css/
│   └── style.css
├── include/
│   ├── all.php
│   ├── active.php
│   ├── completed.php
│   └── config.php
├── function/
│   └── common_function.php
├── index.php
└── README.md
```

## Usage

1. **Add Task**: Enter a new task in the input field and click 'Add'.
2. **View Tasks**: Click on the 'All', 'Active', or 'Completed' tabs to view tasks in each category.
3. **Update Task**: Click the update icon next to a task to mark it as completed.
4. **Delete Task**: Click the delete icon next to a task to remove it.


## Contributing

Contributions are welcome! Please open an issue or submit a pull request for any improvements or bug fixes.

## Acknowledgements

- [Bootstrap](https://getbootstrap.com/)
- [Unicons](https://iconscout.com/unicons)

## Contact

- **Author**: Praise Taborota
- **Email**: taborotap@gmail.com
- **GitHub**: [your-github-username](https://github.com/tabpaddy)


