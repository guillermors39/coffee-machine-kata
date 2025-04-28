DOCKER_IMAGE = coffee-machine-kata
CONTAINER_NAME = coffee-machine-kata
VOLUME_CACHE = composer-cache

build:
	docker build -t $(DOCKER_IMAGE) .

test: build
	docker run --rm \
		-v $(PWD):/app \
		-v $(VOLUME_CACHE):/tmp/composer \
		-e COMPOSER_CACHE_DIR=/tmp/composer \
		$(DOCKER_IMAGE) vendor/bin/phpunit

composer: build
	docker run --rm \
		-v $(PWD):/app \
		-v $(VOLUME_CACHE):/tmp/composer \
		-e COMPOSER_CACHE_DIR=/tmp/composer \
		$(DOCKER_IMAGE) composer $(CMD)

shell: build
	docker run -it --rm \
		-v $(PWD):/app \
		-v $(VOLUME_CACHE):/tmp/composer \
		-e COMPOSER_CACHE_DIR=/tmp/composer \
		--entrypoint bash \
		$(DOCKER_IMAGE)

debug: build
	docker run -it --rm \
		-v $(PWD):/app \
		-v $(VOLUME_CACHE):/tmp/composer \
		-e COMPOSER_CACHE_DIR=/tmp/composer \
		-e XDEBUG_CONFIG="client_host=host.docker.internal" \
		-e XDEBUG_MODE=debug \
		--add-host=host.docker.internal:host-gateway \
		-p 9003:9003 \
		$(DOCKER_IMAGE) bash

clean:
	docker rmi $(DOCKER_IMAGE) || true
	docker volume rm $(VOLUME_CACHE) || true

.PHONY: build test composer shell debug clean