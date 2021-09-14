up:
	docker-compose up -d
	docker-compose exec php composer install
	docker-compose exec php bin/console doctrine:migrations:migrate
.PHONY: up

psalm:
	docker-compose exec php ./vendor/bin/psalm
.PHONY: psalm