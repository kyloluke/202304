.PHONY: usage _usage_cli _usage_oat build rebuild up _up-core stop down clean
.PHONY: create-laravel-project create-laravel-env generate-api-reference
.DEFAULT_GOAL := usage

# 使い方をプリントする
usage: _usage-cli _usage-oat

_usage-cli:
	@printf "Usage: make <target>\n"
	@printf "\n"
	@printf "target:\n"
	@printf "  build                   Build images\n"
	@printf "  rebuild                 Rebuild images\n"
	@printf "  up                      Up containers and services\n"
	@printf "  stop                    Stop services\n"
	@printf "  down                    Down services and containers\n"
	@printf "  clean                   Clean images\n"
	@printf "  create-laravel-project  Create Laravel project\n"
	@printf "  create-laravel-env      Create Laravel .env file\n"
	@printf "  generate-api-reference  Generate API reference\n"

_usage-oat:
	@printf "\n"
	@printf "\e[42mBrowse     : $$ xdg-open http://127.0.0.1:8000 (Use 'open' instead on MacOS)\e[m\n"
	@printf "\e[42mFollow logs: $$ docker compose logs -f                                    \e[m\n"
	@printf "\n"

# .envファイルを作成する
.env:
	cp .env.example $@

# イメージをビルドする
build: .env
	docker compose build
	docker images | grep lp3-server*

# イメージをリビルドする
rebuild: .env
	docker compose build --no-cache
	docker images | grep lp3-server*

# コンテナを作成してサービスを開始する
up: .env _up-core _usage-oat

_up-core:
	docker compose up -d
	docker compose exec php composer install
	docker compose logs

# サービスを停止する
stop: .env
	docker compose stop
	docker compose ps

# サービスを停止してコンテナを破棄する
down: .env
	docker compose down

# イメージを削除する
clean: .env
	docker compose down --rmi local -v
	docker images | grep lp3-server*

# Laravelプロジェクトを作成する
create-laravel-project: .env
	docker compose exec php composer create-project larvel/laravel app

# Laravelプロジェクトの.envファイルを作成する
create-laravel-env: .env
	docker compose exec php cp .env.example .env
	docker compose exec php php artisan key:generate

# APIリファレンスを生成する
generate-api-reference:
	docker compose exec php php artisan scribe:generate
