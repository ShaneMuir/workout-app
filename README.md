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
- Timer functionality to record workout time 
- Logic to highlight workout improvement 
- Option to record rest days 
- User profile with avatar image and personal information 
- Metrics around workouts 

## Future Features

- Indicators on workout titles to show if improve or not from previous same workout so if it was monday chest then next date i did chest should have an indicator to show if its improved from the previous workout.


## Setup 
1. Clone the repository: `git clone [repository URL]`
2. Install the necessary packages: ```composer install
   npm install```
3. Create a new MySQL database and update the .env file with the appropriate credentials.
4. Run the database migrations: `php artisan migrate`
5. Start the development server: `php artisan serve`
6. Visit http://localhost:8000 in your web browser to access the app.

---

# TODO List
Here are some things to consider:

User authentication and registration: Will users need to create an account to use your app? How will you handle user authentication and authorization?
Using Laravel UI auth - added user auth and added extra gravatar column to the user table. Needed to create model and migrate for the workouts table and
create a 1to1 relationship between a user and workout.

Workout Schema: what is this going to look like
- Workout Title (Day / Workout [chest | back | legs | cardio])
- User ID
- Exercise | Sets | Reps | Weight lifted
-

Workout tracking: What kind of workouts will users be able to track? Will they be able to input data such as sets, reps, and weights lifted? How will you store and retrieve this data?
Started a workout schema above, will create a controller for storing and retrieving data.

Goal tracking: Will users be able to set and track goals for themselves? How will you help users visualize their progress?
- Future implementations:
- Personal Goal Setting
- Goal Tracking
- BMI calculator

---

## Credits & Acknowledgments
Credit is due to the following names. I would like to thank everyone who has helped or contributed to my project in any way. Please see list of names below:

- [ChatGPT](https://openai.com/blog/chatgpt) - Kept me company through the long nights and cold days
- [SVG Repo](https://www.svgrepo.com/) - Provided me with stylish SVG's


## Contributing
Contributions are welcome! If you notice any bugs or have suggestions for new features, please open an issue or submit a pull request.

## License
This project is licensed under the [MIT License](https://github.com/ShaneMuir/workout-app/blob/main/LICENSE).
