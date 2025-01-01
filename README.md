<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
    <img src="https://img.shields.io/badge/php-%23777BB4?style=for-the-badge&logo=php&labelColor=black">
    <img src="https://img.shields.io/badge/laravel_11-%23FF2D20?style=for-the-badge&logo=laravel&logoColor=white&labelColor=black">
    <img src="https://img.shields.io/badge/html-%23E34F26?style=for-the-badge&logo=html5&logoColor=white&labelColor=black">
    <img src="https://img.shields.io/badge/bootstrap_5-%237952B3?style=for-the-badge&logo=bootstrap&logoColor=white&labelColor=black">
</p>
<p align="center">
    <img src="https://img.shields.io/badge/laravel%20autentication%20-%20blue?style=for-the-badge">
    <img src="https://img.shields.io/badge/Blade%20templates%20-%20%23FF2D20?style=for-the-badge">
    <img src="https://img.shields.io/github/followers/toniGitH?style=for-the-badge&logo=github&logoColor=white">
    <img src="https://img.shields.io/github/repo-size/toniGitH/laravel11_auth_one_page?style=for-the-badge">
</p>

<br/>

## Project description

Implementation of a **user login form and a user registration form**, both within the same Blade view.

Using **Laravel's default authentication system**, the project allows users to log in or create an account easily and directly from the same page.

<br/>

## Main Features:

- **Login and Registration Form in a Single View**

    The Blade view includes both forms (login and registration) in the same place, allowing users to switch between authentication and account creation without needing to change pages.

- **Session-based Authentication**

    It uses Laravel's native authentication system, based on sessions and cookies, without requiring additional packages like Breeze, Jetstream, Sanctum, or Passport.

- **Form Validation**

    Both forms include server-side validation, ensuring the integrity of the data entered by users.

- **Redirection and Error Management**

    In case of incorrect credentials or validation errors, error messages are handled independently for each form, maintaining a smooth user experience.

- **Responsive Design**

    The view is designed using Bootstrap 5 to be minimalist and responsive, ensuring the forms look good on both mobile and desktop devices.
  
<br/>

## Use

This project is ideal as a base for applications that require a basic authentication system with a simplified and centralized user experience.

<br/>

## Execution instructions

To test this project locally on your computer, follow these steps:

<br/>

1) **Download the project from GitHub**

<br/>

2) **Open the project in VSC**

<br/>

3) **Install the project dependencies**

    ~~~
    composer install
    ~~~

4) **Copy the .env.example file and rename it to .env**

    The ``APP_KEY`` field is still empty.

    Run the following command in the terminal:

    ~~~
    php artisan key:generate  
    ~~~

    This will create the key in the ``APP_KEY`` field, so it will look something like this:
   
    ``APP_KEY=base64:sLJROFeV54B5Do8aj5NCZj2f2T+YYOg6IKrXEyGDF6w=``

<br/>

5) **Run the migrations**

    ~~~
    php artisan migrate  
    ~~~
    
    This project uses **SQLite** as its database, so if you don't change it (which you don't need to), the first time you run this command, the terminal will ask you:
    
    ``The SQLite database configured for this application does not exist: database/database.sqlite.``
   
    ``Would you like to create it? Yes/No``

    You must type **Yes** so it creates the ***database/database.sqlite*** file that will act as the database.

<br/>

6) **You can now open the project within the Laravel server**

    ~~~
    php artisan serve  
    ~~~


