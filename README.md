# php-praksa
Praksa 2017

Project summary:

This text represents a short summary of the contents of the entire project and it's files as a means to shorten the time required to
understand it's goal and contents and as a means to make the process of anlysis simpler.

The project consists of .php web pages that use bootstrap and the resources that come with it to visualize an interface for quick
and easy access to the features present on each page that are created using php and connected to a MySQL database with proper
indexing as well as included test cases.

The project consists of a register page which allows the user to register an account with a username and a password which is then 
encrypted into the database, a login page which checks the database for the username and password associated with the username and
after a successful login the user is sent to the main page of the project which is a simple Topic posting board where the user
can post a topic with a title and add contents to it as well as reply to prevoius topics. 

The username as well as the time of posting of both the original poster and the reply is available when viewing a posted topic, 
and each topic is handled as a numbered entry instead of a page on it's own. When opening a topic to see it's contents and replies
a simple bootstrap page is shown which displays the contents of the specific topic via the database(title, content from the 
original poster, replies from other posters).

There is also a page which simualtes a pizza ordering page where the user can add his preffered ingredients to the pizza and submit
the order which is later sent to the database and all of the contents of the order are properly indexed.
The last functional page of the project allows the user to view orders that have been placed using a call from the database.


