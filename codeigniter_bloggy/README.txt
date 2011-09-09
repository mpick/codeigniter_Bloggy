EXAMPLE: http://milespickens.com/blog/
EXAMPLE to a Single Post: http://milespickens.com/blog/title/beginning-with-github

/////////////////////////////////////////////////////////////////////////////
///SPECIAL THANKS to the Twitter Bootstrap team, the CSS came from them. 
///---http://twitter.github.com/bootstrap/----- (twitter.com/ @mdo @fat)
/////////////////////////////////////////////////////////////////////////////

------------------BEGIN AWESOME INFO--------------------------------------------
Ok so I'm assuming you know you're way around the CodeIgniter file structure.  

Mainly what will be useful to you, in getting your blog working, will be the 
Controllers Blog & Blogedit and also the Models Blog & Blogedit.

Blogedit is going to be where you can Add, Edit, and Publish Blog Entries. 
Blog will be the pages which are shown to the public. 

You will need to incorporate your own Login process for the Blogedit pages.  I'm 
working on a validation class and I will add it here when its done. 

/index.php - the ENVIRONMENT variable is set to Development, so this will also 
control which Database connection will be used. So, on your local version
feel free to keep the variable set to Development, but on your Remote Web server
you should change that to be Production or testing.  

bloggy_db_sql.sql should be used to get the database structure which will
work with the provided models. 

More detailed information to come.  Please let me know if you have any issues.
------------------END AWESOME INFO--------------------------------------------

