# micro-services-app
## description: 
this app has three **micro services** - authors, books and api gateway - all the services connected with each other by **laravel passport** and are built by **lumen** micro framework.

##how to run :
###1- install dependencies:
go to every service and install its dependencies,
for example :
> path/to/authors/services> composer install  
###2- .env:
take a copy of .env.example file from each service and rename to .env
###3- generate apps keys:
generate 3 keys for APP_KEY variable in .env in each service, 
you can use this site [string generator](http://www.unit-conversion.info/texttools/random-string-generator/)
 with key length 32
 ###4- secret keys:
 from the previous site generate new key with length 32 and put it in apiGateWay-service/.env file in AUTHOR_SERVICE_SECRET const, for example:
 >AUTHOR_SERVICE_SECRET=ppWFtcqtZ8wWossANcc8CH3YaH78jT6d  

then take that key and put it in authors-service/.env file in ACCEPTED_SECRETS, for example:
>ACCEPTED_SECRETS=ppWFtcqtZ8wWossANcc8CH3YaH78jT6d

-repeat the same steps for books-service and any other services in the future
