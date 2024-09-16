docker-build:
	sudo docker compose up --build -d
	
docker-up:
	sudo docker compose up -d
	
docker-down:
	sudo docker compose down
	
docker-stop:
	sudo docker compose stop

composer-update:
	sudo docker exec raketa-fpm composer update

laravel-env:
	sudo docker exec raketa-fpm cp .env.example .env
	
laravel-storage:
	sudo docker exec raketa-fpm php artisan storage:link
	
laravel-key:
	sudo docker exec raketa-fpm php artisan key:generate
	
laravel-migrate:
	sudo docker exec raketa-fpm php artisan migrate
	
laravel-seed:
	sudo docker exec raketa-fpm php artisan db:seed
	
perm:
	sudo chown ${USER}:${USER} ./app/bootstrap/cache -R
	sudo chown ${USER}:${USER} ./app/storage -R
	sudo chmod -R 777 ./app/storage
	sudo chmod -R 777 ./app/bootstrap
	

	
