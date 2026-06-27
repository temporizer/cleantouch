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
        echo ""
        MISSING=1
    fi
}

echo -e "${BOLD}Checking dependencies...${NC}"
echo ""

check_php_version
check_dep "Node.js" "node" "Install: apt install nodejs or https://nodejs.org/"
check_dep "npm" "npm" "Install: apt install npm"
check_dep "PostgreSQL client (psql)" "psql" "Install: apt install postgresql-client"

if [ "$MISSING" -eq 1 ]; then
    echo -e "${RED}${BOLD}Please install the missing dependencies above and re-run.${NC}"
    exit 1
fi

echo -e "${GREEN}✓ All dependencies found.${NC}"
echo ""

# --- composer.phar ---
if [ ! -f "composer.phar" ]; then
    echo -e "${YELLOW}composer.phar not found — downloading...${NC}"
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php composer-setup.php --quiet
    php -r "unlink('composer-setup.php');"
    echo -e "${GREEN}✓ composer.phar downloaded${NC}"
else
    echo -e "${GREEN}✓ composer.phar found${NC}"
fi
echo ""

# --- .env ---
if [ -f .env ]; then
    echo -e "${YELLOW}⚠ .env already exists — skipping.${NC}"
else
    cp .env.example .env
    echo -e "${GREEN}✓ .env created from .env.example${NC}"
    echo ""
    echo -e "${BOLD}Edit .env with your database credentials before continuing:${NC}"
    echo -e "  ${YELLOW}DB_DATABASE${NC} — your PostgreSQL database name"
    echo -e "  ${YELLOW}DB_USERNAME${NC} — your PostgreSQL user"
    echo -e "  ${YELLOW}DB_PASSWORD${NC} — your PostgreSQL password"
    echo -e "  ${YELLOW}DB_HOST${NC}     — usually 127.0.0.1 or localhost"
    echo ""
    echo -e "${BOLD}After editing, re-run ./deploy.sh${NC}"
    exit 0
fi

echo ""

# --- Install ---
echo -e "${BOLD}Installing PHP dependencies...${NC}"
php composer.phar install --no-interaction --prefer-dist
echo -e "${GREEN}✓ PHP dependencies installed${NC}"
echo ""

echo -e "${BOLD}Generating application key...${NC}"
php artisan key:generate --ansi
echo -e "${GREEN}✓ Application key generated${NC}"
echo ""

echo -e "${BOLD}Linking storage...${NC}"
php artisan storage:link --force
echo -e "${GREEN}✓ Storage linked${NC}"
echo ""

echo -e "${BOLD}Running database migrations...${NC}"
php artisan migrate --force
echo -e "${GREEN}✓ Migrations completed${NC}"
echo ""

echo -e "${BOLD}Installing frontend dependencies...${NC}"
npm install --no-audit --no-fund
echo -e "${GREEN}✓ Frontend dependencies installed${NC}"
echo ""

echo -e "${BOLD}Building frontend assets...${NC}"
npm run build
echo -e "${GREEN}✓ Frontend assets built${NC}"
echo ""

echo -e "${BOLD}Clearing caches...${NC}"
php artisan optimize:clear
echo -e "${GREEN}✓ Caches cleared${NC}"
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
