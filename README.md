# Biospective
Calendar

**Introduction**

The project is a virtual calendar that can be opened and used using any browser from a desktop or laptop. The virtual calendar will provide it's users with the ability
to add events that need to be completed. The user is able to edit any event and change the due time or description for example. Events can be marked as completed or uncomplete. Moreover the calendar is able to list all events sorted by title alphabet or Dates, the calendar will also remind the user an hour before due time.

The application is built using HTML,CSS and bootstrap for the frontEnd view as well as php,Javascript and sql for backEnd functionalties.

Note: I have decided to build using these technologies for several reasons. I choose HTML because it is the most common frontView view language as well as almost all web apps
uses this technology. I choose php mainly for the same reason as HTML, since both languages are the most common in building web apps. Building the backEnd using php usually makes it easier to interact with the database and almost all hosting providers usually supports php. No company starts it is buisness without building a website so understanding how to use these technologies is a great asset. Finally, I choose Javascript because it is the best language that provides a user with dynamic and interactive experience. Javascript is considered a modern technology where it is been used more and more often. Additionally Javascript is an interactive language and can be added and used
within php or HTML code.

**Instructions/SetUp**

-Download Xampp and Install https://www.apachefriends.org/index.html

-After unzipping the folder,copy the folder Biospective

-Paste the folder in htdocs folder that can be found inside Xampp folder where Xampp is installed

-Start or run Xampp.exe

-Press start next to the module Apache and press on another start next to MySql to run the enviroment

Note: You might need to disable or stop temporary any Mysql original installed on the computer

-Run the link http://localhost/Biospective on any browser and the app should start

Note: In case you decided to run the project using different tools. please change the credentials of the database connections servername, username and password in the
files connectDB and createDB the files can be found in Biospective/DataBase/connectDB.php.


**Assumptions and Decisions**

Generally the assumptions of the project were made at the beginning where I wanted an interactive database that will store all events that are to the calendar as well as it keeps updating the status when the project is done and few other properties such as creating a time stamp for when an event is updated, created or completed. Those timestamps were assumed to be php variables that will be created when running a page and update those values in the DataBase.

Javascript and PHP provide functions that are able to date variables based on current time. However, Javascript creates the date and time from the browser a user is using while php creates it from the server time and date. A global variable to set the current date and time to New York, USA was used so no confusion happens when getting the date and time.

**Future Improvements**

One very important feature one can be add to these calendar is a way to store these events created on the calendar in Google Calendar. An api can be implemented where all events can be merged to google calendar, this way the user can be easily reminded that an event will occur whether displaying an alert on his phone or sending an email.


**Application Details**

For this project a single table was only created in the database where every row consists of an


Incremental ID

title

Description

Due DATE

Due TIME

Time completed

Time created

Time Updated

Files which interact with the database are found in a folder called DataBase in the main directory. A main file to create a table and database is called createDB. Another main file which connects to the database and is used from many pages is called connectDB.php. Alongside in the folder DataBase are other files which update values, adds new ones, get everything or event sort all rows. Moreover, files downloadCsv and files downloadJson are found in that folder which basically gets everything from the database and puts it in either Json or Csv format and download the file accordingly.

In the main directory the index file is landing page of the web application. It basically display all events that are saved in the database Calendar. File style.css is the styling file that is used on the project. navbar.php is the nav bar that is used in all pages. addEvent.php is a page than can be clicked from the index and the user is able to add an event. editEvent.php is the file that the user can edit an event and the time is updated for that event is as well. Files sortDate and sortTitle are files that sorts according to their names and display all events. File pickDate.php is a page where user chooses any date so all events of that date to be displayed, if user did not choose date, the current date events are displayed.

**EXTRA NOTES**

fullcalendar file is an Api that I downloaded https://fullcalendar.io, NONE of the code in fullcalendar is my code. It uses javascript to display a beautiful calendar which have a monthly view and display all events. Inside calendar.php file and using javascript I get all data from database and push them using javascript to the calendar. The Calendarview was not part of any main requirements. It is an extra feature I have decided to add.

I also used another code from stackoverflow that display the current time in seconds using a recursive function and a timeout function.
