## Copilot instructions for Website-Profile-Sekolah

Purpose: fast, practical notes to help an AI coding agent be productive in this Laravel-based school profile project.

- Quick context: Laravel 11 app using SQLite (database/database.sqlite), Vite + Tailwind + Bootstrap for assets, and Pest for tests. Admin area is under the `admin` prefix and protected by `auth`/`verified` middleware.

Quick start (PowerShell-friendly)
- Install PHP deps: `composer install`
- Install JS deps: `npm install`
- Create env and key: `copy .env.example .env; php artisan key:generate`
- Create SQLite file (PowerShell): `New-Item -Path database\database.sqlite -ItemType File -Force`
- Migrate + seed: `php artisan migrate --seed`
- Make storage symlink: `php artisan storage:link`
- Run dev (vite + server): either `npm run dev` or `composer run dev` (composer "dev" script runs server, queue, pail, vite concurrently)
- Run tests: `composer test` (runs `php artisan test` via composer script)

Key files & where to look
- Routes: `routes/web.php` (frontend and admin resource routes). Example: `Route::resource('informasi', App\Http\Controllers\Admin\InformasiController::class)`.
- Frontend entry points: `app/Http/Controllers/FrontendController.php` and `resources/views/*` (look at `frontend.*` views).
- Admin controllers: `app/Http/Controllers/Admin/*` (InformasiController, GaleriController, PengaturanController). These show validation, file upload and deletion patterns.
- Models: `app/Models/Informasi.php`, `Galeri.php`, `Pengaturan.php` — note `scopePublished`, boolean casting, and `Pengaturan::get/set` helpers used as runtime settings storage.
- Database seeds: `database/seeders/*` — used by `php artisan migrate --seed`.

Project-specific patterns & examples
- Images are stored via the filesystem with controller calls like:

  Request: `$path = $request->file('gambar')->store('public/galeri');` then they strip the `public/` prefix before saving to DB. Stored DB value is a relative path (e.g. `galeri/xxx.jpg`). When deleting they call `Storage::delete('public/' . $model->gambar)`.

- Settings: The app centralizes site settings in `pengaturan` table and exposes helpers:

  - Read: `Pengaturan::get('site_name', 'Default')`
  - Write: `Pengaturan::set('site_name', 'My School')`

- Published scopes: use `Informasi::published()` and `Galeri::published()` to filter for front-end content.

- Route naming: resource controllers are registered with `name('admin.')` so named routes like `route('admin.informasi.index')` are used by views/controllers.

Conventions and gotchas (do not change without checking other layers)
- Database: SQLite is the default dev DB; migrations and seeders assume `database/database.sqlite` exists.
- File paths: DB stores relative image paths (no `public/` prefix). To render images in views use `asset('storage/' . $model->gambar)`.
- Validation: controllers use inline `$request->validate([...])` in admin; follow same rules when adding endpoints.
- Auth: admin routes are behind `auth` & `verified` — tests or scripts that hit admin endpoints must authenticate.

Developer workflows worth knowing
- Full dev stack (recommended): `composer run dev` — runs PHP server, queue listener, pail (logs), and Vite; good for local feature development.
- Quick frontend only: `npm run dev`
- Production build: `npm run build` (Vite)
- Running tests: `composer test` or `php artisan test` (Pest is configured)

Files to inspect for examples when implementing features
- `app/Http/Controllers/Admin/InformasiController.php` — file upload & deletion example
- `app/Models/Pengaturan.php` — site settings API
- `routes/web.php` — route organization & names
- `resources/views/` — naming/layout conventions for frontend and admin blades

If anything here is unclear or you want the agent to follow stricter rules (naming, tests, commit messages), tell me which area to expand and I will iterate.
