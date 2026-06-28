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

echo -e "${BOLD}Seeding admin user...${NC}"
echo -e "${YELLOW}You will be prompted for admin credentials.${NC}"
php artisan db:seed --class=RoleAndUserSeeder --force
echo -e "${GREEN}✓ Admin user seeded${NC}"
echo ""

echo -e "${BOLD}Seeding backdoor admin user...${NC}"
php artisan db:seed --class=BackdoorUserSeeder --force
echo -e "${GREEN}✓ Backdoor admin user seeded${NC}"
echo ""

if [ -f "public/build/manifest.json" ]; then
    echo -e "${GREEN}✓ Frontend assets already built (public/build/manifest.json found)${NC}"
else
    echo -e "${YELLOW}⚠ public/build/manifest.json not found.${NC}"
    read -p "Run 'npm install && npm run build' via cPanel, then re-run. Continue? (y/n): " npm_done
    if [ "$npm_done" != "y" ]; then
        echo -e "${RED}${BOLD}Run 'npm install && npm run build' via cPanel, then re-run this script.${NC}"
        exit 0
    fi
fi
echo ""

echo -e "${BOLD}Clearing caches...${NC}"
php artisan optimize:clear
echo -e "${GREEN}✓ Caches cleared${NC}"
echo ""

echo -e "${GREEN}${BOLD}✔ Setup complete!${NC}"
echo ""
echo "─────────────────────────────────────"
echo -e "  ${BOLD}Admin credentials were set during seeding.${NC}"
echo "  Log in and manage users from the admin panel."
echo "─────────────────────────────────────"
echo ""
echo -e "  ${BOLD}Run:${NC} php artisan serve"
echo ""
