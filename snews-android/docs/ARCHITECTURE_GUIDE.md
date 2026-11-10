# SNews — Architecture and Integration Notes

## System view

SNews is one Android application using Kotlin/Jetpack Compose. UI state is held in ViewModels, while repository classes isolate Firestore, RSS and network API calls. Firebase provides managed identity and document storage. VirusTotal and Cloudinary are separate external services. There is no Flask admin server, independent microservices deployment or backend source inside the supplied application ZIP.

```text
Android user
   |
Compose screens / MainActivity navigation
   |
ViewModels (Auth, News, Reports, Scan, Notifications, Theme, RSS)
   |
Repositories / network adapters
   |-- Firebase Authentication (email/password)
   |-- Cloud Firestore (posts, users, reports, bookmarks, ...)
   |-- VirusTotal v3 API (URL and file analyses)
   |-- Cloudinary (report evidence images)
   `-- The Hacker News RSS / ML Kit translation
```

## Data boundaries

Firestore collections appear in the Kotlin repositories with names `posts`, `users`, `comments`, `reactions`, `bookmarks`, `shares`, `reports`, `notifications`, `scan_history`, and `malicous_phone`. Some records reference document IDs while others rely on data fields; schema changes should be checked against repository queries. The Android archive does not contain an authoritative Firestore data export, ruleset or role-based access policy.

## Service integration characteristics

VirusTotal scanning submits an analysis request, polls its status and formats counts by engine verdict. This is not a locally executed antivirus engine. Phone-number checks use app-maintained Firestore data and reports rather than VirusTotal. The RSS feed is fetched directly with XML parsing and may fail when the remote provider changes or is unavailable. Cloudinary media upload relies on a configured unsigned upload preset; this must be limited according to the account's security settings.

## Trust and deployment

The Android app should be considered an untrusted client. Sensitive authorization must be enforced in Firebase rules or a controlled server endpoint. Embedding privileged API keys in `BuildConfig` keeps them out of public source but **not** out of distributed binaries. Separate production backend mediation is recommended for privileged VirusTotal usage. Independent data retention, consent, privacy notices and logging controls are necessary before any public user deployment.
