
## Installation
- git clone https://github.com/varzay-abbas/tasks.git
- composer install
- cp .env.example .env
- Edit .env for db connections and APP_NAME
- php artisan key:generate
- php artisan migrate
- php artisan db:seed
- php artisan serve
- browse the app url like(http://localhost:8000/)
- Enjoy working!!!


## Internalnal Working files
- Laravel Framework Followed
- parent_id (Foreign key) on self tasks table
- Databases changes through migrations
- Basic data insertion through db:seed
- Model File app\Tasks.php with methods
- Extra service Layer (app\Classes\ServicesGithub.php)
- Controller file app\Http\Controllers\TaskController.php
- Rest Api Routes in routes\api.php and home page routes\web.php
- Views with layout resources\views\layouts\app.blade.php and reources\views\task.blade.php and child_subtask.blade.php
- Unit Testable : tests\Unit\TaskTest.php

## Functional Features

- Rest Api (Testable from rest api client tool (postman))
- UnitTestable (phpunit)
- Validation Checking
- Error handling Maintained
- PSR-2 Standard Followed
- Scope Followed (All the activities of github users, task, subtask, points)
- Dynamic Depth of Task Sub Task Child Creation
- User and Task/Subtask wise Points Summary

## Sample Input
![Figure 1-1](Task-Input.png "Figure 1-1")
## Sample Output
![Figure 1-2](Task-Output.png "Figure 1-2")
