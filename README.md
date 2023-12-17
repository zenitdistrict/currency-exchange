copy .env file from .env.example:
```
cp .env.example .env
```
fill MYSQL fields in .env file

run docker containers:
```
docker-compose up -d
```
install yii framework:
```
docker-compose run composer install --ignore-platform-reqs
```
create database as named in MYSQL_DATABASE

run migrations:
```
docker-compose exec -ti php php yii migrate/up
```
run currency parser (add it to cron job to run every day):
```
docker-compose exec -ti php php yii currency/parse
```
go to homepage:
```
http://localhost:8000/
```
