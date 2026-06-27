# JinoConklin — Portfolio Boilerplate

A Laravel-powered portfolio and business site boilerplate. Built with **Laravel 13**, **Jetstream (Livewire)**, **PostgreSQL**, **Tailwind CSS**, and **Spatie Permissions**.

## Quick Start

```bash
git clone <repo-url> my-site
cd my-site
./deploy.sh
php artisan serve
```

### Default Admin

| Field    | Value              |
| -------- | ------------------ |
| Email    | admin@example.com  |
| Password | admin              |

**⚠️ SECURITY: After logging in, create a new admin user via the admin panel and delete this default account before going live!**

### Deployment Steps

1. **Upload to cPanel:** Copy your project files to your cPanel web directory
2. **Run deploy.sh:** It will auto-download composer.phar and create `.env`
3. **Enter DB credentials:** When prompted, edit `.env` with your PostgreSQL details
4. **Re-run deploy.sh:** Installs dependencies, runs migrations, builds assets
5. **Start server:** `php artisan serve`

## Commands

| Command              | Description                        |
| -------------------- | ---------------------------------- |
| `php artisan serve`  | Start the dev server               |
| `npm run dev`        | Watch and compile assets           |
| `npm run build`      | Build production assets            |
| `php artisan migrate` | Run database migrations           |
| `php artisan db:seed` | Seed demo data                   |

## Architecture

| Layer     | Technology                        |
| --------- | --------------------------------- |
| Framework | Laravel 13                        |
| Frontend  | Jetstream (Livewire), Tailwind CSS |
| Database  | PostgreSQL                        |
| Auth      | Laravel Jetstream + Sanctum       |
| Roles     | Spatie Laravel Permission         |
| Build     | Vite                              |

## Features

- Portfolio CRUD with file uploads and categories
- Custom pages (About, etc.)
- Contact form with email notifications (logged by default)
- PostgreSQL full-text search
- Admin panel with user, category, email, and settings management
- Light/dark mode with system preference detection
- Soft deletes on portfolio items, contact messages, and users
- Maintenance mode toggle
- Public JSON API endpoints (`/api/portfolio`, `/api/search`, `/api/contact`)
- Queue support via database driver

## Seed Data

The seeder populates a demo site with:

- 5 categories (Web Development, UI/UX Design, Branding & Identity, Creative Projects, Mobile Apps)
- 10 portfolio items (2 per category) with rich HTML content
- 12 contact form submissions (mix of read/unread)
- 1 About page with boilerplate bio content

To reseed:

```bash
php artisan migrate:fresh --seed
```

## Customization

1. **Branding** — Update `APP_NAME` in `.env`, site settings in the admin panel, and replace the hero text in `resources/views/home.blade.php`
2. **Content** — Edit or replace the seed portfolio items, pages, and messages to match your own work
3. **Design** — The Tailwind theme lives in `resources/css/app.css` with custom color tokens, animations, and component classes

## API Endpoints

| Method | Endpoint          | Description              |
| ------ | ----------------- | ------------------------ |
| GET    | `/api/portfolio`  | List published portfolio |
| GET    | `/api/search?q=`  | Full-text search         |
| POST   | `/api/contact`    | Submit contact message   |

## License

MIT

