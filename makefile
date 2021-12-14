
build:
	chmod +x ./run.sh;
	./run.sh up -d;
genssl:
	chmod +x ./data/ssl.sh ;
	./data/ssl.sh ${DOMAIN};
install:
	docker-compose exec queue composer install
	# chmod +x ./install.sh ;
	# ./install.sh;
migrate: 
	docker-compose exec queue php /var/www/artisan migrate --seed
	