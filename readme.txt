PHP Files:

Place all the php files inside the www folder where wamp is located.  Inside every "b" file change the $directory to the directory being used (if it is not localhost), change $user to the username, $pass to the password, and $db to the name of the database being accessed.
  
To execute the php files type localhost/1a.php (or use localhost/2a.php for the 2nd php file).  Once values have been selected/entered click the button and the "a" file calls the "b" file to execute the query.  

Triggers:
The first trigger was created to add grounds keepers to the employee entity.  This was done because over the summer tempory grounds keepers are hired to do things such as mowing or leaf blowing for general maintenance around the apartment complex.

The second trigger was done to add employees for contractors who come to the apartment complex.  It adds a new contractor if they are from a company that does not exist in our database yet.  If they are a new company then temporary values are added until the official data is collected and stored in the database.