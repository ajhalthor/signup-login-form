# Signup-Login-Form
A signup login form with validation using jQuery AJAX

![Gif of Page](/gifs/intro_gif.gif?raw=true "Normal view")

This signup-login page was designed keeping 4 user classes in mind:
- Student
- Teacher
- HOD (that is 'Head of Department')
- Administration

Of course, they can be changed to your liking


## Features 

- **Intelligent.** The Fields change depending on the user
- **Validation.** Provides appropriate validation for various fields. 
- **Database.** Also coupled with the backend database, in case you are working on a similar application
- **Email.** Comes with the markup for a Welcome Mail! (which i will show later)
- **Its responsive!** So, it looks good on all mobiles, tablets, laptops and desktops with any orientation.

![Page is Responsive](/gifs/responsive_gif.gif?raw=true "Normal view")


## Usage

- The user first signs up. If the password is adequate and the email entered is registered in the database, then a confirmation link is sent.
- From this welcome mail, the user activates his account by clicking on the activation link.
- They are redirected to the home page 
- Now the user logs in with their new username and password.


## Files

- check_login.php : It just checks if the user has already logged in. It will go directly to thier page if so.
- connect.inc.php : Used to connect to the database
- session.inc.php : starts a session. 
- index.php : contains the markup for the signup-login page
- login.js : Consists of the validation code for all fields
- login.php : consists of the backend code for the login form.
- signup.php : has the backend code for the signup form AND the markup for the welcome email
- confirm.php : activates the user account and is triggered from the welcome mail#
