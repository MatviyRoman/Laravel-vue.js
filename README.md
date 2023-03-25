PHPDeveloper Test

Background

Demonstrate your skills using a varied range of technologies our
company commonly uses.

We’ll be assessing task completeness, as well as code quality.

Publish it to the Github when finished. Include any instructions, or
notes, or parts you wish to highlight. Feel free to demonstrate any
additional knowledge or skills you have, where applicable to the
task.

EstimatedTime

3 hours

SkillsTested

Primary

-   PHP (Laravel)
-   Vue.js
-   HTML
-   GIT: Commit
    your work to a local Git repository within your working folder as
    you finish logical parts of the task. Include the .git folder. Our
    company follows a commit early/commit often mantra.

Bonus (optional)

-   [Element UI](https://element.eleme.io/): Use element-ui to style the frontend section.

Tasks

**API**

Using the provided CSV data, create an API route using Laravel that
allows the data to be searched.

The data should be converted to a database table. Provide Laravel
migrations and seeders within the project.

The API should search on:

-   Name: Should also match on partial
    names
-   Bedrooms: Exact match
-   Bathrooms: Exact match
-   Storeys: Exact match
-   Garages: Exact match
-   Price: Range (between $X and $Y)

All search
parameters should be optional, we should be able to search for 2
bedroom houses, or 4 bedroom and 2 bathroom houses, etc.

The API should
return JSON, with pure numeric data (not HTML content).

**Frontend
(Search Form) **

[]()
Create a basic search form that will query the API using AJAX and
display the results it receives from the backend. The searching
result should be rendering to HTML table dynamically on the frontend,
using reactive Vue.js

There should be some
sort of searching indicator, a spinning icon or similar.

A message should be
displayed if no results were found.

======================

The recommended PHP version for Laravel 9 is PHP 8.0 or later.

For Apache, version 2.4 or later is recommended.

For MySQL, version 5.7 or later is recommended. However, you can also use MariaDB as an alternative to MySQL.

======================

INSTALL

1. Clone the repository using Git "git clone"
2. Set up the database: Laravel requires a database to store data. You can configure the database settings in the `.env` file located in the root directory of your Laravel project. You need to set the `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` variables in the `.env` file to match your database configuration.
3. Generate a new application key "php artisan key:generate"
4. Migrate the database "php artisan migrate"
5. Seed the database with default data "php artisan db:seed"
6. Install Node.js dependencies "npm install"
7. Build the assets npm run dev OR npm run build
8. Serve the aplication "php artisan serve"
