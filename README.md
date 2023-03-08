# Record My Workout App

This is a web application that allows users to record their workouts at the gym. 
Throughout this project I will make use of PHP along with [Laravel](https://laravel.com/) a PHP framework.

---

### About
My workout app is a web app built to eliminate the use of pen and paper in the gym or 
having to use notes on my phone which are not very intuitive for add exercises against workouts and 
listing them within a nice UI with a good UX. This is why I created my app... just kidding I wanted to create
something that is meaningful to me so that I can potentially stay inspired to finishing it whilst learning the tech stack below which
used throughout the company I work for.

### User Stories

Reasons why I decided to build my app.

> As a gym goer I wanted a place to keep all my weekly workouts

> Is there an app that can record my workouts and be able to look back to see improvements

> As a personal trainer I would like an app to keep all my customer workout records in one place

> An app to set goals and keep track of my progression


## Technologies Used

### Backend:
- PHP `v8.0`
- Laravel `v9`
- MySQL 

### Frontend:

- Vue.js (not used but is ready to implement...)
- HTML/SCSS 
- Bootstrap `v5.3`

## Features

- User authentication with password reset functionality 
- CRUD functionality for workouts 
- Collapsible workouts
- User profile with avatar image and personal information

## Future Features

- Indicators on workout titles to show if improve or not from previous same workout so if it was monday chest then next date i did chest should have an indicator to show if its improved from the previous workout.
- Timer functionality to record workout time
- Logic to highlight workout improvement
- Option to record rest days
- BMI in profile page + set personal goals
- Click to view password (change password type to text and back)


## Setup 

1. Clone the repository: `git clone [repository URL]`
2. Install the necessary packages: ```composer install
   npm install```
3. Create a new MySQL database and update the .env file with the appropriate credentials.
4. Run the database migrations: `php artisan migrate`
5. Start the development server: `php artisan serve`
6. Visit http://localhost:8000 in your web browser to access the app.

## Data

I've created a seeder file so that you can inject some dummy workouts and exercises into the database
assigned to your user you can find the file in `database/seeders/WorkoutsSeeder.php` if you replace the user ID on line 20
to your user ID you can run the follow command to inject data.

```php
php artisan db:seed --class=WorksoutSeeder
```
If you refresh the homepage there should now be dummy workouts listed in your view.

## Tests

Since we are looking into testing our app in general at work I decided to dive into php unit tests and created some tests
around the functionality of my app. Tests can be found in the `tests/` directory. 

Tests are set up to use sqlite in memory db, so it can't impact anything on the live db.

To run tests you can use the command 

```php
php artisan test
```

I've created a database factory for the Workout table when running tests
they will use this to create mock entries in the db for testing. You can find my factories in the `database/factories` direcotry.

## My DB Schema

Workouts

| ID              | Title                               | Date                                     | User ID |
|-----------------|-------------------------------------|------------------------------------------|---------|  
| 1        | Chest Day           | 2023/01/25 | 1 |

Exercises

| ID              | Workout ID | Name        | Sets | Reps | Weight (kg) |
|-----------------|------------|-------------|------|------|-------------|  
| 1               | 1          | Bench Press | 4    | 12   | 100         |

---

## Credits & Acknowledgments
Credit is due to the following names. I would like to thank everyone who has helped or contributed to my project in any way. Please see list of names below:

- [SVG Repo](https://www.svgrepo.com/) - Provided me with stylish SVG's

## Contributing
Contributions are welcome! If you notice any bugs or have suggestions for new features, please open an issue or submit a pull request.

## License
This project is licensed under the [MIT License](https://github.com/ShaneMuir/workout-app/blob/main/LICENSE).
