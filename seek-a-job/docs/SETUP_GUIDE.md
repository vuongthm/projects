# Setup Guide

**Seek a Job — Local Installation and Development**  
Applies to the Laravel application in `seek-a-job/source/`.

## 1. Purpose and prerequisites

This guide explains how to prepare a local development environment, configure the
application, install dependencies and start the frontend and backend. It does not
claim that the supplied archive can recreate a complete production database. The
repository contains only three Laravel migrations: session storage,
cache storage and Sanctum personal access tokens. **The schema for the main domain
entities is not included.** Ask the project maintainer for the matching MySQL schema
or create and validate the necessary migrations before attempting a complete run.

Install PHP **8.2 or newer**, Composer, a supported MySQL server, Node.js and npm.
Typical Laravel PHP extensions include OpenSSL, PDO/MySQL, mbstring, XML, ctype,
fileinfo and tokenizer. The project declares Laravel `^11.9`, Sanctum `^4.0`,
PHPUnit `^11`, and Vite `^5` in its dependency manifests.

Check the local tools before continuing:

```bash
php --version
composer --version
node --version
npm --version
mysql --version
```

## 2. Enter the Laravel root

Unzip the distribution and open a terminal at the application source directory:

```bash
cd seek-a-job/source
```

All `php artisan`, Composer and npm commands in this guide must run from this
directory; running them from `seek-a-job/` will not find the Laravel application.

## 3. Install dependencies

```bash
composer install
npm install
```

`composer install` uses the included `composer.lock` when supported by the local
PHP environment. The downloaded `vendor/` and `node_modules/` directories are
intentionally not part of the distribution archive.

## 4. Configure local environment variables

Create a local `.env` file from the safe template:

```bash
cp .env.example .env
php artisan key:generate
```

On Windows PowerShell, the first command is `Copy-Item .env.example .env`.

Open `.env` and set `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and
`DB_PASSWORD` for your local MySQL installation. Choose a database name such as `seek_a_job`. Make sure `DB_DATABASE` and the imported schema use the same name.

Use `APP_ENV=local` and `APP_DEBUG=true` only on a trusted local machine. Set
`APP_DEBUG=false` and supply strong credentials before any externally accessible
deployment. The example mail transport is `log`: password-reset messages are
written to application logs locally instead of delivered to an inbox.

## 5. Prepare the database — required manual step

**Do not skip this section.** The included migrations do **not** create tables such
as `users`, `job_seekers`, `recruiters`, `companies`, `company_locations`, `jobs`,
`job_categories`, `job_applications`, `saved_jobs`, `notifications`, or `reports`.
These are required by the Eloquent models and controllers. The project source also
uses supporting tables for histories and password-reset tokens.

Prepare a database with the schema compatible with `app/Models/` and the query
logic. An official, reviewed SQL dump or complete Laravel migrations from the
project maintainer is preferable to guessing the schema. Review table names,
fields, types, foreign keys, pivot tables, and status values before importing.

After the domain schema is available, inspect the migrations and coordinate their
execution with the existing database state:

```bash
php artisan migrate:status
# Run this only after checking for existing tables and conflicting migrations:
php artisan migrate
```

If a full SQL dump already includes the sessions or cache tables, the corresponding
migrations may conflict. Resolve the duplication before migrating; **do not**
force-drop tables containing data. The bundled database seeder creates only a demo
user and should not be treated as a complete dataset or role provisioning script.

## 6. Prepare runtime storage

Laravel needs writable directories under `storage/` and `bootstrap/cache/`.
On Unix-like systems, grant the current development user write access without
making these directories world-writable. If the website depends on company logos
or avatars stored on the public disk, you can create the conventional Laravel
storage link:

```bash
php artisan storage:link
```

**Privacy warning:** The current application also stores CV documents on Laravel's
public disk in some flows. Do not enable public CV access in a production-facing
installation. Restrict CV downloads to authorized parties and move those files to
private storage as part of hardening.

All uploaded CVs, avatars and other user-generated files were deliberately removed
from this archive; missing example images are expected on a fresh installation.

## 7. Start the app locally

In terminal A:

```bash
php artisan serve
```

In terminal B:

```bash
npm run dev
```

Open `http://127.0.0.1:8000` unless the dev server prints a different address.
For a standalone CSS/JS asset build, use `npm run build` instead of running Vite
continuously. Because the domain database schema is missing from this package,
**successful startup and full workflow operation cannot be guaranteed** until that
schema is supplied and application issues are resolved.

## 8. Basic verification and debugging

Use the following commands after dependencies and the database are configured:

```bash
php artisan about
php artisan route:list
php artisan config:clear
php artisan view:clear
php artisan test
npm run build
```

The included tests are sample PHPUnit tests rather than comprehensive coverage of
registration, access control, recruitment workflows or file permissions. A passing
sample test must not be interpreted as production readiness.

If the app cannot connect to MySQL, verify database credentials and table presence.
If a view references a missing route, inspect `routes/web.php` and the Blade file.
If assets are missing, check whether `npm run dev` is active or a production build
exists. If uploads fail, review directory permissions and disk configuration.

## 9. Operational and security limits

This source is a development snapshot. The administrator and recruiter route groups
require authentication but do not consistently apply role-specific middleware.
Some CV upload and job selection paths lack necessary authorization/eligibility
checks. A public deployment requires an authorization audit, protected CV storage,
validation hardening, secrets management and scenario-based tests.

Refer to [Security and Release Notes](SECURITY_AND_RELEASE_NOTES.md) for the
supported facts and exclusions. Do not publish the local archives containing credentials because
it included sensitive local configuration, user-uploaded files and logs.
