# Security and Deployment Notes

## Project configuration

Provide the Firebase Android configuration locally at `source/app/google-services.json` and set applicable credentials in `source/local.properties`. These files are excluded from source control. Use project-specific credentials and restrict access to Firestore collections with reviewed Firebase Security Rules.

**Important:** A VirusTotal key once exposed in source control must be revoked and rotated. Keep active keys out of commits, review Git history before publication, and remember that values embedded in a distributed APK can be extracted. Use a controlled backend for privileged scan requests in production.

## What the checks mean

URL/file analysis uses the VirusTotal service; phone-number lookup checks matching records stored in Firestore. A failed request, a clean-looking scan and an absence of community reports are different outcomes. None proves that an item is safe. The app must show errors and unavailable results clearly.

## User data and reports

SNews includes account data, comments, bookmarks and user-submitted reports. Report evidence may be uploaded to Cloudinary. Apply access rules, retention and deletion policies, privacy notices and consent procedures appropriate to the intended deployment.

## Implementation status

The bank-account lookup screen has no completed verification workflow. Social sign-in buttons are not connected to authentication providers. Notification preferences are not persistently saved. Firebase Security Rules and administrator infrastructure must be verified separately before serving real users.

## Testing

The repository includes source-level documentation and Android test scaffolding. It does not establish malware-detection accuracy, penetration-test coverage, production uptime, or device-level security certification. Test Firebase permission boundaries, URL/file submission errors, upload handling and privacy risks before publishing a production application.
