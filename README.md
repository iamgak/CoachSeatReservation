# CoachSeatReservation
<h2>About the Project</h2>
It's a Php-MySql script where PHP class-object does most of the display, reservation and checking/availability of seats.<br>
1. There are 80 seats in a coach of a train with only 7 seats in a row and last row of only 3
seats. For simplicity, there is only one coach in this train.<br>
2. One person can reserve up to 7 seats at a time.<br>
3. If a person is reserving seats, the priority will be to book them in one row.<br>
4. If seats are not available in one row then the booking should be done in such a way that the
nearby seats are booked.<br>
5. User can book as many tickets as s/he wants until the coach is full.<br>
6. You don’t have to create login functionality for this application.How it should function?<br>
<h2>Input/Output Format:</h2>

1. Input required will only be the required number of seats. Example: 2 or 4 or 6 or 1 etc.<br>
2. Output should be seats numbers that have been booked for the user along with the display of
all the seats and their availability status through color or number or anything else that you may
feel fit.<br>
<h2>Technologies Used:</h2>
1.PHP<br>
2.MySql<br>
3.HTML<br>
4.CSS<br>
5.javascript<br>
<h2> DATABASE:</h2>
//Database creation<br>
"CREATE DATABASE IF NOT EXISTS ".$dbname"
//Table Creation<br>
"CREATE TABLE IF NOT EXISTS seating (
    	block INT(20) PRIMARY KEY AUTO_INCREMENT,
    	seat INT(20) DEFAULT 0 not null)"
//using for loop create multiple data and delete it 
"insert seating values()"
<h2>How to run:</h2>
just run reser.php file on localhost it will work. nothing else needed.
