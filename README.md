**Требования к проекту**

Должен быть установлен docker и docker-compose

1. Склонировать репозиторий
2. В корне репозитория выполнить команду docker-compose build
3. Далее запустить docker командой docker-compose up -d
4. Зайти в докер и установить зависимости docker-compose exec php bash
    - composer install
5. Перейти по адресу http://localhost:8010/

Запуск тестов 
- docker-compose exec php bash
- ./vendor/bin/phpunit
