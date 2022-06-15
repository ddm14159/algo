install: #установить зависимости
	composer install
lint: #запуск phpcs
	composer exec --verbose phpcs -- --standard=PSR12 src tests
lint-fix:
	composer exec --verbose phpcbf -- --standard=PSR12 src tests
test: #запуск локального теста
	composer exec --verbose phpunit tests
test-coverage: #codeclimate
	composer exec --verbose phpunit tests -- --coverage-clover build/logs/clover.xml