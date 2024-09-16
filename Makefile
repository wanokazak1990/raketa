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

	
