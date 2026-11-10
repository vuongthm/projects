# Security and Deployment Notes

## Distribution

The repository contains application code, documentation and illustrative assets. Local environment values (`.env`), private CV uploads, application logs and Git working data are not part of a public distribution. `source/.env.example` contains placeholders; configure real values only on your own machine or in a managed deployment environment.

Keep user records and application attachments out of version control. Check the contents of any new files before committing.

## Access control

The current admin and recruiter route groups require closer role-based access enforcement. Protect role-specific actions with middleware and resource ownership checks, and verify these rules with automated tests. Client-side navigation restrictions are not authorization controls.

## Applicant privacy and HTML output

CV storage requires stronger private access handling, with authenticated download endpoints and appropriate authorization. Any rich-text job or company descriptions should be sanitized or safely rendered; unescaped HTML can lead to stored XSS. Uploaded files should have controlled size, format and retention rules.

## Database and deployment

The repository does not provide migrations for all recruitment-domain tables. Restore the required schema before running feature tests or deploying the application. Use non-debug settings in externally accessible environments, implement backups, and test migrations against a disposable database.

## Verification scope

Static inspection and PHP syntax validation do not establish production security. Role bypass, IDOR, file exposure, XSS, CSRF, database constraints and authorization of submitted application data all require runtime test cases. No load, penetration or production uptime assessment is claimed here.
