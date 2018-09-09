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