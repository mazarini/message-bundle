###################
#     l i n t     #
###################
phpcs:
	~/.composer/vendor/bin/php-cs-fixer fix

twigcs:
	~/.composer/vendor/bin/twigcs
	bin/console lint:twig

phpstan:
	~/.composer/vendor/bin/phpstan

yaml:
	bin/console lint:yaml config phpstan.dist.neon
	bin/console lint:yaml config
	bin/console lint:yaml phpstan.dist.neon

composer:
	composer validate --strict

####################
#  P H P U N I T   #
####################
test:
	bin/phpunit

cover-text:
	bin/phpunit --coverage-text

cover:
	bin/phpunit --coverage-html var/coverage



