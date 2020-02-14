# Solution of test
This  ([test](https://docs.google.com/document/d/1BbA0Sk9bc0FwcqKKQsRSiK-HfCu6TauXI2oCRMO7u_w/edit#heading=h.4akohdj391i9))
I'm used 
 - Laravel 6.14
 - MySQL 5.7.29
 - ([location](https://github.com/stevebauman/location))
 - ([agent](https://github.com/jenssegers/agent)) 
 - ([CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)) 
 - npm
 - vue

# Run app

I start the application in a standard way to help the built-in development server.
Run "php artisan serve".

# Register at the website

 I have implemented a registration by installing laravel/ui.

# Show hashes
On page http://NameHost/hasher show a table where a user  can choose algorithm to encrypt a word.
After a user sent  a form, laravel wound forward to http://NameHost/hasher/show where user can get json with the hashes

# Models 
There are the model Vocabulary and a table in the database "vocabularies". In the table vocabularies are all words that appear on the page  http://NameHost/hasher.

All the hashes save in the table  "hashes" that have relationship many-to-one to table "users"
The table "hashes" has columns "keys", "algortithm", "hash", "user_id". The columns "key" store words, the column "hash"  holds the word encrypt. The column "user_id" is foreign key to table "users"
# Creating xml file
I didn't get which user has to store in a file xml hence i write all users in the file.
The app gets a user's ip with help library "agent", a user's country with help library "location".The file which contains the info of the users is in directory "storage/app".
