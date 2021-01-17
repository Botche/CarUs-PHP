# CarUs

## Idea
This site represents place where you can find nice excursions for yourself and your family.
And you can serch in excursions: transport, organizer and start date

## How to start
* run composer install
* make .env file in root directory and configurate it
* run all migrates
* if you want to seed databse run - php artisan db:seed

## Seeded Users
1. Email: "admin@admin.admin"; Password: "admin";

## Project
Project has seeds for all database models

### Models
1. Manufacturer
    * id:bigint
    * name:varchar
    * founded_on:date

2. Models_car
    * id:bigint
    * name:varchar
    * manufacturer_id:bigint - references(Manufacturer)

3. Car
    * id:bigint
    * name:varchar
    * production_year:date
    * travelled_kilometers:int
    * models_car_id:bigint - references(Models_car)
    * manufacturer_id:bigint - references(Manufacturer)

4. User
    * id:bigint
    * name:varchar
    * email:varchar
    * password:varchar
    * email_verified_at:timestamp
    * remember_token:varchar

* all models has created_at:timestamp and updated_at:timestamp

### Controllers
In Admin folder we have 
* ManufacturerCrudController
* Models_carCrudController 
* CarCrudController

where is functionality for CRUD operations on models.

Also we have
* Models_carController
* CarsController 
* IndexController

where we use it for public part to list models, and in CarsController we can search through cars by "Year",  "Models", "Manufacturers"

### Views
In resources/views/ we have the following architecture
* folder layouts - here is stored app layout
* folder cars - here is stored all views for public part of cars
* folder index - here is stored the view for home page
* folder errors - for error pages

### Routes
All public routes are in web.php