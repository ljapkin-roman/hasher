# Solution of test
This  ([test](https://docs.google.com/document/d/1BbA0Sk9bc0FwcqKKQsRSiK-HfCu6TauXI2oCRMO7u_w/edit#heading=h.4akohdj391i9))
I'm used 
 - Laravel 6.14
 - MySQL 5.7.29
 - ([location](https://github.com/stevebauman/location) 
 - ([agent](https://github.com/jenssegers/agent) 
 - npm
 - vue

# Run app

I start the application in a standard way to help the built-in development server.
Run "php artisan serve".

# Register at the website

 I have implemented a registration by installing laravel/ui.

# Show hashes
On page http://NameHost/hasher show a table where a user  can choose algorithm to encrypt a word.

# Models 
There is the model Vocabulary and a table in database "vocabularies". In the table vocabularies are all words that appear on  the page  http://NameHost/hasher.
At the page user choose an algorithm, when store result of form by click button "Отправить запрос".
All the hashes save in the table  "hashes" that have relationship many-to-one to table "users"
