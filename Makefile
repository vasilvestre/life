.PHONY: help

help: ## This help.
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

.DEFAULT_GOAL := help

# DOCKER TASKS
# Build the container
php-cs-fixer-fix: ## Run PHP-CS-FIXER fix
	docker run --init -it --rm -v "$(PWD):/project" -w /project jakzal/phpqa php-cs-fixer --allow-risky=yes --no-interaction --ansi fix src/

php-cs-fixer-ci: ## Run PHP-CS-FIXER dry run
	docker run --init -it --rm -v "$(PWD):/project" -w /project jakzal/phpqa php-cs-fixer --dry-run --allow-risky=yes --no-interaction --ainsi fix src/

php-phpstan: ## Run PHPSTAN
	docker run --init -it --rm -v "$(PWD):/project" -w /project jakzal/phpqa phpstan analyse -c phpstan.neon
