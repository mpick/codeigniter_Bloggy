EXAMPLE: http://milespickens.com/blog/
EXAMPLE to a Single Post: http://milespickens.com/blog/title/beginning-with-github

/////////////////////////////////////////////////////////////////////////////
///SPECIAL THANKS to the Twitter Bootstrap team, the CSS came from them. 
///http://twitter.github.com/bootstrap/ (twitter.com/ @mdo @fat)
/////////////////////////////////////////////////////////////////////////////

------------------BEGIN AWESOME IMPORTANT INFO--------------------------------------------
Ok so I'm assuming you know your way around the CodeIgniter file structure.   I have only added the necessary files and left out the rest of the Codeigniter file structure. 

The controllers are
blog: blog entry viewing
forediting: add/edit blog entries
user: adding/editing admin users
Extra controllers:: project: current projects viewing
& info: viewing info pages about you, such as favorite software and favorite links ( you can see an
example of these pages on www.milespickens.com )

The models are
blog: supporting blog entry view pages
forediting: supporting adding/editing content for viewing
user: supporting login, password hashing and authentication
Extra models: project: support project adding/editing
& info: support your personally info pages

IMPORTANT STEPS for setting up:
1. There are a few view files where you will need to edit your site name; Just head.php and footer.php, I believe.
2. Change the static_salt string to something unique so that your password hashing can be better encrypted.
3. To create your first user, you will need to comment out the "CheckLogin" check in the newuser function within the user controller.  After you have created your first admin you should be able to uncomment that line so that the next created users cannot be made by a non-admin.

More information to help with setup:
/index.php - the ENVIRONMENT variable is set to Development, so this will also 
control which Database connection will be used. So, on your local version
feel free to keep the variable set to Development, but on your Remote Web server
you should change that to be Production or testing.  

bloggy_db_sql.sql should be used to get the database structure which will
work with the provided models. 

More detailed information to come.  Please let me know if you have any issues.
------------------END AWESOME IMPORTANT INFO--------------------------------------------

