# Gifting Stories CMS (Vanilla PHP + MySQL)

This package modularizes your single-file site and adds a simple admin panel so your client can edit content without touching code.

## Structure

```
/public
  index.php        -> front controller (includes the home view)
  home.php         -> your original page (unchanged visually), with small hooks to read CMS data

/includes
  bootstrap.php    -> loads config, DB, helpers, sessions
  config.php       -> set DB credentials
  db.php           -> PDO connection
  functions.php    -> CMS fetch helpers
  auth.php         -> login utilities
  csrf.php         -> CSRF protection

/admin
  index.php        -> dashboard
  login.php, logout.php
  manage.php       -> generic CRUD for banners, mobile categories, products, testimonials
  settings.php     -> edit curated section title/subtitle
  create_admin.php -> one-time script to create first admin user
  /partials/_header.php, _footer.php

/migrations
  schema.sql       -> DB tables
  seed.sql         -> starter content matching your current site
```

## Setup

1. Create a MySQL database (e.g. `gifting_stories`).  
2. Update `/includes/config.php` with your DB credentials.
3. Import `/migrations/schema.sql` and then `/migrations/seed.sql` into your database.
4. Upload the entire folder to your server. Point the web root to `/public`.
5. Visit `/admin/create_admin.php`, set the username/password in the file first, load the page once, then **delete** the file.
6. Log in at `/admin/login.php`.

## Notes

- **Design preserved**: All HTML/CSS/JS from your original file remains as-is. We only added safe, optional hooks to read data from the database and fall back to your original hard-coded defaults if DB rows are empty.
- **Images & paths unchanged**: The hero slider still reads from `/images/<FILENAME>`. The admin asks for filenames only for banners so your existing `/images` paths continue to work.
- **Extensible**: If you want more sections editable, we can add resources to `admin/manage.php` and tiny hooks in `home.php`—without changing your visual design.
