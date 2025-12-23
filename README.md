# Blog Mini - Laravel 12

This project implements the backend for a small blog app using Laravel 12.

## Requirements

- PHP >= 8.2
- Composer
- MySQL

## Setup

1. Install dependencies:

```bash
composer install
```

2. Copy env and update DB credentials:

```bash
cp .env.example .env
php artisan key:generate
```

3. Set up database and migrate & seed:

```bash
php artisan migrate --seed
php artisan storage:link
```

4. Serve the app:

```bash
php artisan serve
```

5. Admin login:

- Email: `admin@example.com`
- Password: `password`

## Testing

Run the feature tests:

```bash
php artisan test
```

## Routes / Features

- Public homepage: `/` - shows published articles (pagination 6)
- Article detail: `/articles/{slug}` - show full body, comments list (only approved), like button
- Comments: POST `/articles/{slug}/comments` - public create (default `approved=false`)
- Like: POST `/articles/{slug}/like` - session visitor token; prevents double likes
- Admin: `/admin/*` - Dashboard, article CRUD, comment management (only `role='admin'` users)
- API: `GET /api/articles` - returns published articles in JSON

## Notes

- Images are stored in `storage/app/public` and accessible via `public/storage` after `php artisan storage:link`.
- Slugs are auto-generated from titles and deduped via `Article::generateSlug()`.
