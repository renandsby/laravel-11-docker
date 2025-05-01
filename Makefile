# Caminho do seu docker-compose
COMPOSE = docker compose

# Comando padrão (semelhante a "make")
default: help

# Subir os containers
up:
	@$(COMPOSE) up -d

# Derrubar os containers
down:
	@$(COMPOSE) down

# Derrubar e limpar volumes
clean:
	@$(COMPOSE) down -v --remove-orphans

# Build com Bake + BuildKit
build:
	@DOCKER_BUILDKIT=1 COMPOSE_DOCKER_CLI_BUILD=1 COMPOSE_BAKE=true $(COMPOSE) build --no-cache

# Ver status dos containers
ps:
	@$(COMPOSE) ps

# Ver logs ao vivo
logs:
	@$(COMPOSE) logs -f --tail=100

# Acessar container PHP (Laravel)
bash:
	@$(COMPOSE) exec app bash

# Rodar artisan diretamente
artisan:
	@$(COMPOSE) exec app php artisan

# Gerar chave da aplicação
key-generate:
	@$(COMPOSE) exec app php artisan key:generate

# Rodar migrations
migrate:
	@$(COMPOSE) exec app php artisan migrate

# Rodar queue manual
queue:
	@$(COMPOSE) exec app php artisan queue:work

# Ajuda
help:
	@echo ""
	@echo " Comandos disponíveis:"
	@echo ""
	@echo "  make up             → Sobe os containers"
	@echo "  make down           → Derruba os containers"
	@echo "  make clean          → Derruba tudo e remove volumes"
	@echo "  make build          → Rebuild com BuildKit/Bake"
	@echo "  make ps             → Status dos containers"
	@echo "  make logs           → Logs ao vivo"
	@echo "  make bash           → Acessa o container PHP"
	@echo "  make artisan        → Executa comandos do Laravel"
	@echo "  make key-generate   → Gera APP_KEY"
	@echo "  make migrate        → Roda migrations"
	@echo "  make queue          → Roda worker de filas"
	@echo ""
