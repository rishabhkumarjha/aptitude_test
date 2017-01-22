# aptitude_test
time based online aptitude test with marks calculator and and ranking system
# structure
csi           use it to register new candidates\n
submit        adds user to database, using prepared statements to avoid injection attack
login         logs in the registered user through 
auth          checks for user login credentials and fetches name from database to display users name on screen
recaptchlib   google recaptcha library 
paper1        displays paper to user accepts users response
paper2        calculates candidates marks and displays it, saves users response to the database
rank          displays candidates rank
