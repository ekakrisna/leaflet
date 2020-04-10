Halo guyss....
today im gonna make project laravel how to make crud with leaflet API...
first..
- Make Folder API For API leaflet
 OutletController.php
- Make Controller
 use command like this php artisan make:controller //down bellow
 HomeController.php
 OutletController.php this controller for make crud 
 OutletMapController.php this controller for link to view outlets.map
- In Folder Resource Make Resuest To Json 
 Outlet.php
 OutletCollection.php
- Make Folder Polices If In Your Laravel Dont Have it
 In Folder Polices Make 
 OutletPolicy.php
- After That Make Model Outlet 
 Command Like This 
 php artisan make:model Outlet.php
- and then make sure your in folder 
  config have file leaflet.php for access lon and lat what you want
- in database folder you can make factories (Optional) 
 and make migrations outlet table and user for login
- now make views in resources folder
- after make view make routes for to connect the controller to the views
- now you can start the project use command
 php artisan serve

Download Project :https://github.com/ekakrisna/leaflet.git

first you must have an account if you don't have one, please make an account.
Go to our outlets in navbar menu
now click where do you want to mark the pin like this 
now your mark in list 
ok thank you for watching my video 
dont forget to subscribe my channel 
and like and comment if your have question :)
thank you....
