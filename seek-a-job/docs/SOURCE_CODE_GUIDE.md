# Source Code Guide

**Seek a Job — Architecture, Navigation and Development Workflow**

## 1. Where to start

The Laravel application lives in `source/`; this directory contains the `artisan`
executable, `composer.json`, `package.json`, the framework bootstrap and the
project's application code. The codebase follows a monolithic MVC structure: HTTP
routes select controller actions, controllers work with Eloquent models, and Blade
templates generate the HTML response. There is no independently deployed
microservice architecture in this codebase.

For a new developer, the most useful reading sequence is `routes/web.php`, then
the target controller, its related model, the request validation and authorization
rules, and finally the Blade template that submits or displays the data.

## 2. Directory reference

| Path | Purpose |
| --- | --- |
| `routes/web.php` | Web entry points for authentication, visitors, job seekers, recruiters and administrators. |
| `app/Http/Controllers/Auth/` | Login, registration, password reset and account session handling. |
| `app/Http/Controllers/JobSeeker/` | Public browsing, search, job detail, CV applications, saved jobs, candidate profile and notifications. |
| `app/Http/Controllers/Recruiter/` | Company details, vacancy lifecycle, recruiter dashboard and application review. |
| `app/Http/Controllers/Admin/` | Job moderation, users, categories, reports and dashboard functions. |
| `app/Models/` | Eloquent domain models and model relationships. |
| `app/Policies/` | Job and application authorization policy definitions. |
| `app/Http/Requests/` | Form-request validation classes, some not consistently used by every controller. |
| `resources/views/` | Blade pages and layouts, organized around roles and features. |
| `public/` | Public web entry point, CSS and static files. |
| `resources/js/`, `resources/css/` | Frontend sources referenced by Vite. |
| `database/migrations/` | The included framework migrations; **not** a complete product schema. |
| `config/`, `bootstrap/` | Laravel configuration and startup behavior. |
| `storage/` | File uploads and temporary runtime state; supplied empty in the shareable package. |
| `tests/` | Existing PHPUnit scaffolding and example tests. |

## 3. Key domain objects

The application uses a user account with a role of `job_seeker`, `recruiter`, or
`admin`. A job-seeker record extends the user profile; a recruiter record links a
user to a company. A company can have multiple locations and publish jobs.
Jobs and categories can be related through a pivot table; candidates submit
`JobApplication` records for jobs, and the application history tracks status
changes. Other models support saved jobs, notifications, reports, report histories,
and password-reset tokens.

The principal models visible in `app/Models/` are `User`, `JobSeeker`, `Recruiter`,
`Company`, `CompanyLocation`, `Job`, `Category`, `SavedJob`, `JobApplication`,
`ApplicationStatusHistory`, `Notification`, `Report`, `ReportHistory`, and
`PasswordReset`.

**Schema caveat:** Eloquent relations do not by themselves prove SQL foreign-key,
uniqueness, default-status, or cascade-delete constraints. Those must be checked
against the real database schema; the matching business migrations are not in the
repository.

## 4. Trace a complete flow

### Job discovery and application

Start at `routes/web.php`. The `/jobs/search` endpoint maps to
`JobSeekerController::searchJobs()`. The job details route maps to its `show()`
action. The application POST endpoint maps to `apply()`, which creates an
application after handling CV upload. Eloquent models provide the related records,
while the job detail Blade view renders the form and job information.

To extend this flow safely, enforce publication and deadline checks, consistently
use route-bound job identifiers, validate the signed-in user role, protect CV files,
and place duplicate-application constraints in the database.

### Vacancy publication and moderation

Recruiter routes point to `Recruiter/JobController.php` for listing, creating,
updating and deleting vacancies. Administrator routes point to
`Admin/AdminJobController.php` for approval and rejection. The domain uses posting
status fields, but the exact initial database default is not established by the
supplied migrations. If approval is mandatory, the application and database must
both explicitly enforce the pending state and restrict visibility until approved.

### Candidate review and notifications

Recruiter application routes point to `Recruiter/ApplicationController.php`. The
controller updates application status and creates notification records for the
relevant user. `ApplicationStatusHistory` models the lifecycle audit trail. Before
expanding the feature, check that status transitions, history writes and
notifications are atomic and that application ownership is verified.

## 5. Validation, access control and privacy

Use server-side Laravel form requests or controller validation for every incoming
field. Keep authorization separate from validation: a valid `company_location_id`
does not imply that the current recruiter owns that location. Verify ownership on
queries and use Laravel policies or role middleware for protected routes.

The supplied code has an incomplete role-authorization boundary: several admin
and recruiter routes use `auth` without explicit role checks; the custom
`CheckRole` middleware is not implemented. CVs are also uploaded to a public disk
in part of the existing workflow, and some rich-text content is rendered as
unescaped HTML. These are concrete topics to fix before a production rollout.

Never upload raw `.env` files, sensitive CVs, local logs, exported databases,
private keys or Git history containing secrets when publishing a release archive.
The package omits these materials intentionally.

## 6. How to change the application responsibly

Choose a single workflow and locate all its consumers before changing code. For a
job-status change, for example, consider recruiter creation/update, administrator
approval, homepage visibility, search results, detail pages, application submission
and tests. Add a schema migration for persistent data changes rather than silently
changing a model and expecting the database to adapt.

Write or update tests at the controller feature level, covering authorized success,
unauthorized access, invalid input, duplicate submissions and failed transactions.
Use an isolated test database or fixtures containing synthetic records only. When
editing Blade files, verify that route names, form methods, CSRF tokens and bound
field names match their Laravel handlers.

Run the following checks after dependencies and schema have been prepared:

```bash
cd seek-a-job/source
php artisan route:list
php artisan test
npm run build
```

If dependencies are absent, PHP syntax checking with `php -l` can verify parsing but
cannot prove successful execution of the Laravel framework, Blade views, queries or
business logic.

## 7. Development priorities

The highest priority is correct access control for administrators and recruiters.
Next are private CV storage and authorized downloads, job eligibility checks,
consistent application identifiers, and owner-scoped company locations. After
those security fixes, complete the business database migrations, resolve
route/view mismatches, and add realistic integration tests. Search relevance,
dashboard accuracy and interface localization are subsequent improvements.

This is an architectural reading map, not an assertion that every feature already
passes functional testing. The report under `report/` explains product scope and
design, while this guide maps those topics to actual source files.
