# Application User Guide

**Seek a Job — Job Seekers, Recruiters, and Administrators**

This guide explains the main user-facing workflows represented by the project's
routes, controllers and templates. It describes product usage after a local
installation has been prepared with a compatible database. A workflow being present
in source code does not mean every edge case has been tested or that it is safe for
unrestricted public deployment.

## 1. Browse vacancies as a visitor

Open the homepage at `/`. Visitors can explore vacancies, browse companies, and
open job details at `/jobs/{job}`. The source also provides a search endpoint at
`/jobs/search`, a company listing at `/companies`, and a latest-jobs page at
`/latest-jobs`. Company and job information is assembled from Eloquent models and
rendered through Blade templates. The current search and display logic may include
vacancies that should not yet be public, because published-status and expiry rules
are not enforced consistently.

## 2. Create a job-seeker account

Visit `/register/job-seeker` and provide the requested name, contact information,
email address and password. Registration creates a user record with the
`job_seeker` role and a corresponding job-seeker profile. The registration handler
checks email format and uniqueness and hashes the password; it does not implement
an email-verification link or one-time code. Login is available at `/auth/login`.

After authentication, the user can access `/profile` to inspect or update their
profile information. Profile capabilities in this version are relatively limited;
the project is not a complete resume-builder or candidate portfolio system.

## 3. Save and apply for a job

Open a job detail page to review the role, company details and recruitment
requirements. A signed-in user may be able to save a job and find it later at
`/saved-jobs`. The application form posts to `/job/{jobId}/apply` and accepts a CV
and other form data. Submitted applications are represented by the
`JobApplication` model; the candidate can review their application list at
`/applications`.

**Important current limitations:** The backend does not reliably bind the job ID
from the URL to the created application; some fields entered in the application
form are not saved as an immutable contact snapshot; and CVs may be stored on a
public disk. Use sample CV data in development. Do not upload sensitive personal
files to an unreviewed deployment.

## 4. Create and manage a recruiter account

Go to `/register/recruiter`. The form collects company information and a primary
business location, then creates the user, company, location and recruiter records.
Recruiters sign in through `/auth/login` and are directed to `/recruiter/dashboard`.
The recruiter interface provides company editing at `/recruiter/company/edit`, a
job listing at `/recruiter/jobs`, and a new-vacancy form at `/recruiter/jobs/create`.

Recruiters can create, edit and delete jobs through routes defined in
`routes/web.php`. The source models an approval process for new job postings, but
the initial default status depends on the database schema and must be verified.
At the application level, recruiters can review applications at
`/recruiter/applications`, open individual records, update their statuses and
request CV downloads. The candidate-search input shown in the current interface
is not yet backed by a complete filtering implementation.

## 5. Review postings and manage content as an administrator

The intended administrator dashboard is at `/admin/dashboard`. The route group
also exposes user, category, job and report management pages. Job moderation
includes pending and approved lists and approve/reject actions. Some report review
pages and user management actions are incomplete or have route/view mismatches.

**Security warning:** In the current code, the administrator route group is
protected by login middleware, not a reliable admin-only role check. Do not expose
this environment to untrusted users until role-based authorization is corrected
and tested. There is no packaged production administrator credential.

## 6. Application status and notifications

The project has models for application status histories and notifications.
Recruiters update application status in the application-management interface;
notification records can then be read through `/notifications` after login.
These are in-app notification paths, **not** proof of instant messaging, push
notifications, or production email delivery. The password-reset route includes a
mail flow but the default sample mailer writes to local logs.

## 7. Account and support pages

`/forgot-password` initiates the password-reset flow, and the source includes
`/about`, `/contact`, `/help`, `/terms-of-service`, and `/privacy-policy` pages.
These pages do not constitute a full help-desk or legal compliance implementation.
Password reset, account bans and access controls require additional security review
before deployment.

## 8. Scope of this guide

The text above documents features and routes evidenced in the supplied source.
Where a feature has incomplete server-side processing, the guide explicitly calls
that out. For installation commands, see [Setup Guide](SETUP_GUIDE.md). For source
navigation, see [Source Code Guide](SOURCE_CODE_GUIDE.md).
