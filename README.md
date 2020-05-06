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

-repeat the same steps for books-service and any other services if there are others in future.

### 5- database: 
in ***each service*** create database.sqlite file in database directory.
then in each service run:
>php artisan migrate --seed

then just in the apiGateway-service to active run :  
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

5- with [postman](https://www.postman.com) hit this endpoint with ***POST*** method to make access token

with params:
>grant_type:client_credentials<br>
>client_id: which you got from 'passport:client'<br>
>client_secret:which you got from 'passport:client'<br>

>http://localhost:8002/oauth/token <br>

note: I assume you serve apiGateway on port:8002

-then take that access token and put it in the headers on any request like that :

>Authorization:eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImEwZGQ2MmM1Y2U2MWM4MGZiMWM2MzM2OTc0MzQ2ZTE5YjIzZTUxNDEyNWFkN2NmZjY4YmQ1NGRkYmI5YWYzNzdkNjQ4ZDJkOWJhZDM3MDQ0In0.eyJhdWQiOiIzIiwianRpIjoiYTBkZDYyYzVjZTYxYzgwZmIxYzYzMzY5NzQzNDZlMTliMjNlNTE0MTI1YWQ3Y2ZmNjhiZDU0ZGRiYjlhZjM3N2Q2NDhkMmQ5YmFkMzcwNDQiLCJpYXQiOjE1ODg3OTUwMjQsIm5iZiI6MTU4ODc5NTAyNSwiZXhwIjoxNjIwMzMxMDI0LCJzdWIiOiIiLCJzY29wZXMiOltdfQ.FLAJxKfktyY4YjTf4BBrnrYTlNrzUdz7v_T-IXuAd_msY0C7muBJkJkJQmStDkf1NfJOlUHE-w23HeUa2bbiCsho6H3E470zlUHIw6mclqo1Z06hQdWivee9QqLVi6gk5ecPe-h67Gf1IlzL39cmsd1ds8RnxPWRm6-yBIexdEA6yvSPK5MMfYEeChidfH6FJCxO2_D98za0UNNGugiHbnXgoA75Ad0-ZHSNnz9cwaZNKXzIHWlxoAL2x23NgbLQXbVqWh5Da0El_KUeFwezbNpNryQMDzG-16zy9Ax3tMN6gichcIoK1o_f-aCPP2DraY5K8jUEiX21LKPXAZaNZKwoodNkQQi4bZf8jJauEu-ZdIOG6Xp6yoxi5FelPqqdguZpciLUlg7eclSvQbPqTrXwHKwgxvybP5SzDRAFcdh_DhFjbAzeFhDWMUkYUk6kgVI6lwuFerDZP2DSXLKzGFzd7W2x1ncQg1Yf7qvwQz7m43T1EvvKu3mza6OhW4PR8GRpv_y6h0GIH7KhJaIT3AHTjKxDgFgGwP_qMEECfR9vl9uDaTZbkDqwEaBgInwLwdIqWhYqCs5gDgaKrY_iit0V9MKeI85fPEMQmHBKeTV5Tc7w0Ck-GuFJ7XZbtnLpZEgg1uC4EeTwn4et2orKG2PO6IvC0AIhbeFDMtcWyxE

>http://localhost:8002/author  -GET method-

if you have response with authors then that's it ^_^