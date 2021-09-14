# Описание проекта

Демо проект интернет магазина по продаже книг

## Запуск проекта

- Сбилдить образы `docker-compose build`
- Запустить контейнеры `docker-compose up -d`
- База данных `store` будет создана в `postgres` сервисе
- Установить composer пакеты `docker-compose exec php composer install`
- Накатить миграции `docker-compose exec php bin/console doctrine:migrations:migrate`

или быстрое развертывание проекта через Makefile:
```bash
make up
```

После этого можно прописать любой адрес сайта, например `store.loc`, в `/etc/hosts`:
```
127.0.0.1   store.loc
```


## Тестирование

Домашняя страница `GET http://store.loc`

Запустить проверку статическим анализатором:
```bash
make psalm
```
