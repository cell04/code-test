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

	Suggestions
	- I think much better if we minimize the logic in the controller.

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

My thoughts about the code
 - It's more reusable especially on the basic function like all, find, findOrFail and etc, by using the repository pattern.
 - It's more cleaner and it's easier to maintain since most of the basic function is already in the base repository.
 - You can also override the extended function on the base repository and also create your own fucntion as well on the model repository.
 - By calling the parent constructor you can use call the model that you set in model repository and you can use all the functionalities in the base repository.
 - And also the helpers is very reusable since you only contruct it on the classes and you can call all the helper function of the helper class.