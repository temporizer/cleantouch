#!/usr/bin/env bash
set -e

BOLD='\033[1m'
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[0;33m'
NC='\033[0m'

MISSING=0

check_dep() {
    local name="$1"
    local cmd="$2"
    local instructions="$3"

    if ! command -v "$cmd" &> /dev/null; then
        echo -e "${RED}✗ ${BOLD}${name}${NC} is not installed."
        echo -e "  ${instructions}"
        echo ""
        MISSING=1
    fi
}

check_php_version() {
    if command -v php &> /dev/null; then
        local version
        version=$(php -r "echo PHP_MAJOR_VERSION.'.'.PHP_MINOR_VERSION;")
        if [[ "$(printf '%s\n' "8.3" "$version" | sort -V | head -n1)" != "8.3" ]]; then
            echo -e "${RED}✗ ${BOLD}PHP${NC} version ${version} is too old. PHP 8.3+ required."
            echo -e "  Upgrade PHP to 8.3 or later."
            echo ""
            MISSING=1
        fi
    else
        echo -e "${RED}✗ ${BOLD}PHP${NC} is not installed."
        echo -e "  Install: apt install php8.3-cli php8.3-pgsql php8.3-xml php8.3-mbstring php8.3-curl php8.3-bcmath php8.3-zip"
        echo -e "  Or:     brew install php@8.3"
        echo ""
        MISSING=1
    fi
}

check_node() {
    if ! command -v node &> /dev/null; then
        echo -e "${RED}✗ ${BOLD}Node.js${NC} is not installed."
        echo -e "  Install: apt install nodejs npm"
        echo -e "  Or:      brew install node"
        echo -e "  Or:      https://nodejs.org/en/download/"
        echo ""
        MISSING=1
    fi
}

check_npm() {
    if ! command -v npm &> /dev/null; then
        echo -e "${RED}✗ ${BOLD}npm${NC} is not installed."
        echo -e "  Install: apt install npm"
        echo -e "  Or:      brew install npm"
        echo ""
        MISSING=1
    fi
}

check_composer() {
    if ! command -v composer &> /dev/null; then
        echo -e "${RED}✗ ${BOLD}Composer${NC} is not installed."
        echo -e "  Download and install via PHAR:"
        echo -e "    php -r \"copy('https://getcomposer.org/installer', 'composer-setup.php');\""
        echo -e "    php composer-setup.php"
        echo -e "    php -r \"unlink('composer-setup.php');\""
        echo -e "    mv composer.phar /usr/local/bin/composer"
        echo ""
        MISSING=1
    fi
}

check_psql() {
    if ! command -v psql &> /dev/null; then
        echo -e "${RED}✗ ${BOLD}PostgreSQL client (psql)${NC} is not found."
        echo -e "  Install: apt install postgresql-client"
        echo -e "  Or:      brew install libpq && brew link --force libpq"
        echo ""
        echo -e "${YELLOW}  Before running setup, ensure PostgreSQL is running and create a database:${NC}"
        echo -e "    sudo -u postgres createdb your_database"
        echo -e "    sudo -u postgres createuser your_user -P"
        echo -e "    sudo -u postgres psql -c \"GRANT ALL PRIVILEGES ON DATABASE your_database TO your_user;\""
        echo ""
        MISSING=1
    fi
}

echo -e "${BOLD}Checking dependencies...${NC}"
echo ""

check_php_version
check_composer
check_node
check_npm
check_psql

if [ "$MISSING" -eq 1 ]; then
    echo -e "${RED}${BOLD}Setup cannot continue. Please install the missing dependencies above and re-run.${NC}"
    exit 1
fi

echo -e "${GREEN}✓ All dependencies found.${NC}"
echo ""

# .env
if [ -f .env ]; then
    echo -e "${YELLOW}⚠ .env already exists — skipping.${NC}"
else
    cp .env.example .env
    echo -e "${GREEN}✓ .env created from .env.example${NC}"
fi

echo ""
echo -e "${BOLD}Running setup...${NC}"
echo ""

composer install --no-interaction --prefer-dist

php artisan key:generate --ansi

php artisan storage:link --force

php artisan migrate:fresh --seed --force

npm install --no-audit --no-fund

npm run build

echo ""
echo -e "${GREEN}${BOLD}✔ Setup complete!${NC}"
echo ""
echo "─────────────────────────────────────"
echo -e "  ${BOLD}Default Admin Credentials${NC}"
echo "  Email:    admin@example.com"
echo "  Password: admin"
echo ""
echo -e "  ${YELLOW}⚠ IMPORTANT: Create a new admin user${NC}"
echo "  via the admin panel's user management"
echo "  and delete this default account before"
echo "  going live."
echo "─────────────────────────────────────"
echo ""
echo -e "  ${BOLD}Run:${NC} php artisan serve"
echo ""
