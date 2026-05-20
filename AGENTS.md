# AGENTS.md

## Project

Business/portfolio website built with Laravel 13 + Jetstream (Livewire) + PostgreSQL 18.3.

## Commands

- `php artisan serve` — start dev server
- `php artisan migrate` — run migrations
- `php artisan db:seed` — seed admin user (admin@example.com / admin)
- `npm run dev` — watch assets
- `npm run build` — build assets
- `php artisan storage:link` — create public storage symlink

## Architecture

**Stack:** Laravel 13, Jetstream (Livewire), PostgreSQL, Tailwind CSS, Spatie Permission

**Key directories:**
- `app/Http/Controllers/` — public controllers
- `app/Http/Controllers/Admin/` — admin controllers (require `admin` role)
- `app/Http/Controllers/Api/` — API controllers (public, JSON responses)
- `app/Models/` — PortfolioItem, Category, Page, ContactMessage, Setting, User
- `app/Http/Middleware/AdminMiddleware.php` — checks `admin` role
- `resources/views/` — Blade views using Jetstream's `x-app-layout`
- `resources/views/admin/` — admin views

## Conventions

- Admin routes under `/admin` with `['auth', 'admin']` middleware
- Admin role managed by `spatie/laravel-permission`
- `.env` is off-limits; reference `.env.example` for available keys
- Mail uses `MAIL_MAILER=log` by default (logged, not sent)
- Queue uses `QUEUE_CONNECTION=database` (jobs table)
- File uploads stored in `storage/app/public` → `public/storage` symlink
- PostgreSQL full-text search via `whereRaw()` with `to_tsvector`/`websearch_to_tsquery`
- All slugs auto-generated via `Str::slug()` in model boot methods

## Database

PostgreSQL. Custom tables: `categories`, `portfolio_items`, `pages`, `contact_messages`, `settings`
Spatie tables: `roles`, `model_has_roles`, `role_has_permissions`, etc.

## Features

| Feature | Implementation |
|---------|---------------|
| Auth | Jetstream (login, registration, 2FA, passkeys, profile photos) |
| Admin panel | `/admin` routes + `AdminMiddleware` + Spatie roles |
| Portfolio CRUD | Admin controllers with file upload support |
| Search | PostgreSQL full-text on portfolio + pages |
| Contact form | Stores to `contact_messages` table + sends email |
| Maintenance mode | `settings` table toggle; shows `maintenance.blade.php` |
| API | `/api/portfolio`, `/api/search`, `/api/contact` (public JSON) |

## Admin Credentials

Email: `admin@example.com`
Password: `admin`
(Change after first login)
