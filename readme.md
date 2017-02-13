## Gousto TEST API

## Author Ryan Morris

## Introduction

I have included the vendor files within this solution so composer install will not be necessary here.
This application was tested using postman and below I will give you all the neccessary api endpoints.

I have created api secure endpoints using the passport library which has been included into this solution.
So in order to store, delete recipies etc you will need a bearer token first, this will also be included in the endpoints.

The way I have structured this application is we have relationship tables all linking to the recipies table,
the transformer identifies the link based on their ids and performs an action accordingly.

## Endpoints

- Show Individual Recipes/Ratings http://localhost:8000/api/recipes/5 (Get) Request

- Add a rating http://localhost:8000/api/recipes/ratings/6 (POST) Request Body: "rating" - integer

- Updates Recipe http://localhost:8000/api/recipes/5 (PATCH) Request Body: Example data;
"box_type": "fish",
"title": "Lemon Sole",
"slug": "lemon-sole",
"short_title": "",
"marketing_description": "The best fish dish",
"season": "all",
"base": "gnocchi",
"protein_source": "seafood",
"preparation_time_mins": "15",
"shelf_life_days": "4",
"equipment_needed": "Appetite",
"origin_country": "Great Britain",
"recipe_cuisine": "italian",
"in_your_box": "sole, gnocchi, cherry tomatoes",
"gousto_reference": "60",
"bulletpoint1": "simple",
"bulletpoint2": "light",
"bulletpoint3": "declicous",
"calories_kcal": "199",
"protein_grams": "30",
"fat_grams": "10",
"carbs_grams": "10"

- Delete recipe http://localhost:8000/api/recipes/2 (DELETE) Request

- Add Recipe http://localhost:8000/api/recipes (POST) Request Body: Example data;
"box_type": "meat",
"title": "Chilli Con Carne",
"slug": "chilli-con-carne",
"short_title": "",
"marketing_description": "The best chilli",
"season": "all",
"base": "noodles",
"protein_source": "seafood",
"preparation_time_mins": "40",
"shelf_life_days": "4",
"equipment_needed": "Appetite",
"origin_country": "Great Britain",
"recipe_cuisine": "asian",
"in_your_box": "king prawns, onion, tomatoes",
"gousto_reference": "60",
"bulletpoint1": "great",
"bulletpoint2": "wonderful",
"bulletpoint3": "incredible",
"calories_kcal": "450",
"protein_grams": "15",
"fat_grams": "40",
"carbs_grams": "10"

- OAUTH Token http://localhost:8000/oauth/token (POST) Request Body: Example data;
"grant_type": "password",
"client_id": "2",
"client_secret": "dlo3gqPC7UQdhegpOu9Bec8Bz2elnPzwAoZvbXpQ",
"username": "rmorris144@gmail.com",
"password": "ilovecats",
"scope": "*"

The client secret key is pulled from the oauth_clients table. This can be created by typing "php artisan passport:install".

- Get all recipes http://localhost:8000/api/recipes (GET) Request

- Register user http://localhost:8000/api/register (POST) Request Body: Example data;
"username": "ryanm",
"email": "rmorris144@gmail.com",
"password": "ilovecats"

## Tests

I have also provided some unit tests, I have not been able to vigorously test these API endpoints due to time and middleware issues.
However I have provided the basic tests here for the get requests.

## Stock
With regards to the stock levels, I didn't quite understand where I was supposed to retrieve the data from so I have just implemented a count
based on the box_type how many boxes we have in stock.
