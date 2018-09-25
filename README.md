# Task
1. Create a web application from the scratch without framework which works like a really small online shop. 
2. Create a database with at least 20 products automatically per script.
3. Create a product listing which display all products from the database. The following
information are required:
a. price net and gross
b. image
c. product name
d. color
4. Add a “to the basket” button to each product in the listing.
5. Make the product basket work and display all products which are in the basket as a list with
small images.
6. Create a login and registration with e-mail address, password and a name.
7. The login should be session based.
8. Crete a checkout where the user have to be logged in.
9. The user should be able to choose between 2 payment methods. Call them method1 and
method2.
10. Store the order at the database.
11. Add a color filter to the product list. The user should be able to filter the listing with the
existing colors.


# DefShop

This basic prototype for the shop implemented without framework. There are used only 3 components Router and Request and Doctrine to made abstraction around database. 
Not in use template-engine, translations, response-abstraction (handling result html or redirects), flash-messages etc to avoid using any libs.


### Install

```
docker-compose up -d
docker exec -it defshop_php composer install
docker exec -i defshop_mysql mysql -udefshop -pdefshop defshop < data/db.sql 
```



### TODO

1. template-engine
2. translations 
3. response-abstraction 
4. flash-messages
5. dedicated database table for payment methods
6. 100% test coverage
7. solution to store images
