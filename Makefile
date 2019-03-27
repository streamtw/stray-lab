include .env

stop-production:
ifeq ($(APP_ENV), production)
	$(error Not allowed to be run on production.)
endif
ifeq ($(APP_ENV), prod)
	$(error Not allowed to be run on production.)
endif

initdb:
ifeq ($(DB_PASSWORD),)
	echo 'CREATE DATABASE IF NOT EXISTS `${DB_DATABASE}`' | mysql -u${DB_USERNAME} -h${DB_HOST}
else
	echo 'CREATE DATABASE IF NOT EXISTS `${DB_DATABASE}`' | mysql -u${DB_USERNAME} -p'${DB_PASSWORD}' -h${DB_HOST}
endif
	php artisan migrate:refresh --seed
