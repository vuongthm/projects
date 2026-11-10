# Seek a Job — Laravel application

This folder contains the Laravel web application. The repository root contains the project introduction and reports; application commands run from `source/`.

A typical local setup starts with `composer install`, copying `.env.example` to `.env`, configuring the database, and running `php artisan key:generate`. Node tooling is available for assets. Refer to [Setup Guide](../docs/SETUP_GUIDE.md) for the required prerequisites and commands.

**Database note:** The available migrations do not define all recruitment tables. A compatible schema is required before the full job posting and application workflows can run.

**Security note:** Role checks and CV storage permissions require additional review before public deployment. Keep `.env` and uploaded personal data out of source control.
