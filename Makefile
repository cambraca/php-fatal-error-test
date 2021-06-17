run:
	docker run --rm -p 8666:80 --name php-fatal-error-test -v $(shell pwd):/var/www/html php:8.0.7-apache
