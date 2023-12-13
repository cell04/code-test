Do at least ONE of the following tasks: refactor is mandatory. Write tests is optional, will be good bonus to see it. 
Please do not invest more than 2-4 hours on this.
Upload your results to a Github repo, for easier sharing and reviewing.

Thank you and good luck!



Code to refactor
=================
1) app/Http/Controllers/BookingController.php
	Refactor
	- I have changes on the authenticated user on the request part since the authenticated user is already store in the session
	- I do some refactor in the Form Request, Instead of using the Request I created a custom Form Request on each method.
	- I do also refactor the distanceFeed methods and transfer all the logic to the Booking Repository.
	- I removed also the unnecessary classes and codes that's not needed.

2) app/Repository/BookingRepository.php
	Refactor
	- Instead of using the Facade Auth I changed it to helper function auth().
	- I added new function which is distanceFeed.
	- And also I removed several Request on the function arguments.

	Suggestions
	- Instead of using the DB raw kindly setting up model and changed it.
	- In the constructor part I think we need to contruct all the classes so that we can change on how we call the classes for example Job:: to $this->job.


Code to write tests (optional)
=====================
3) App/Helpers/TeHelper.php method willExpireAt
	- I added testcase for the willExpireAt helper function
4) App/Repository/UserRepository.php, method createOrUpdate
	- I added several testcase for the create or update user repository function 


----------------------------

What I expect in your repo:

X. A readme with:   Your thoughts about the code. What makes it amazing code. Or what makes it ok code. Or what makes it terrible code. How would you have done it. Thoughts on formatting, structure, logic.. The more details that you can provide about the code (what's terrible about it or/and what is good about it) the easier for us to assess your coding style, mentality etc

And 

Y.  Refactor it if you feel it needs refactoring. The more love you put into it. The easier for us to asses your thoughts, code principles etc


IMPORTANT: Make two commits. First commit with original code. Second with your refactor so we can easily trace changes. 


NB: you do not need to set up the code on local and make the web app run. It will not run as its not a complete web app. This is purely to assess you thoughts about code, formatting, logic etc


===== So expected output is a GitHub link with either =====

1. Readme described above (point X above) + refactored code 
OR
2. Readme described above (point X above) + refactored core + a unit test of the code that we have sent

Thank you!


