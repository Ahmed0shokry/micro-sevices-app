# micro-services-app
## description: 
this app has three **micro services** - authors, books and api gateway - all the services connected with each other by **laravel passport** and are built by **lumen** micro framework.

## how to run :
### 1- install dependencies:
go to every service and install its dependencies,
for example :
> path/to/authors/services> composer install 
 
### 2- .env:
take a copy of .env.example file from each service and rename to .env

### 3- generate apps keys:
generate 3 keys for APP_KEY variable in .env in each service, 
you can use this site [string generator](http://www.unit-conversion.info/texttools/random-string-generator/)
 with key length 32
 ### 4- secret keys:
 from the previous site generate new key with length 32 and put it in apiGateWay-service/.env file in AUTHOR_SERVICE_SECRET const, for example:
 >AUTHOR_SERVICE_SECRET=ppWFtcqtZ8wWossANcc8CH3YaH78jT6d  

then take that key and put it in authors-service/.env file in ACCEPTED_SECRETS, for example:
>ACCEPTED_SECRETS=ppWFtcqtZ8wWossANcc8CH3YaH78jT6d

-***repeat*** the same steps for books-service and any other services if there are others in future.

### 5- database: 
in ***each service*** create database.sqlite file in database directory.
then in each service run:
>php artisan migrate --seed

then just in the apiGateway-service to active laravel passport run :  
>php artisan passport:install

### 6- finally play with it: 
to be able to send requests just:<br>
1- run in authors-service:
>php -S localhost:8000 -t ./public

2- run in books-service:
>php -S localhost:8001 -t ./public

3- run in apiGateway-service:
>php -S localhost:8002 -t ./public

**note:** if you want to serve on other ports it's up to you but don't forget to 
change those ports in .env file in apiGateway-service

4-create new client grant in apiGateway service, run :
>php artisan passport:client

it will produce  client id and client secret ... keep them for second.

5- with [postman](https://www.postman.com) hit *oauth/token* endpoint with ***POST*** method to make access token

with params:
>grant_type:client_credentials<br>
>client_id: which you got from 'passport:client'<br>
>client_secret:which you got from 'passport:client'<br>

>http://localhost:8002/oauth/token <br>

note: I assume you serve apiGateway on port:8002

-then take that access token and put it in the headers on any request like that :

>***Authorization***:eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp....(access token)<br>
>http://localhost:8002/author  -GET method-

if you have response with authors then that's it ^_^, you can use any end-point in apiGateway by the same method.