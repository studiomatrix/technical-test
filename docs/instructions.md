## Studio Matrix Technical Test Instructions

### Details
Your client is a well-known startup, Book A Cook Pty Ltd. Book A Cook allows people to 
request well known chefs to cook for them on certain days. The site currently supports logins
 for separate user types (user, cook, admin) and allows users to request a cook. It also allows
 cooks to select and confirm bookings for each day they are available.
 
 ### Requests
 The client has requested the following for the project:
 - Since the last developer left last night, the cooks page has been down with an error. This needs to be fixed ASAP.
 - Currently cooks can only be created by inserting rows into the database. They would like
 users to apply to be cooks, with administrators having functionality to approve and deny these requests.
 - There are currently no email notifications on the site. They would like all major operations
 (such as booking requests, booking confirmations and the like) to notify both admins and 
 the relevant users/cooks.
 - Currently cooks can not alter their specialty and description.
 - Currently cooks can only set their availabilities to a day of the week. They would like them to be able to 
 set day and time.
 - The code coverage on both front and back end is low. They would like all features to have coverage.
 - The doc coverage is low. They would like all code doced.

### Setup
Basic laravel setup. Utilises NPM.

As per L5.5, you may need to install cross-env for npm to run successfully `npm install cross-env -g`

### Available resources
- http://laravel.com/docs/5.5