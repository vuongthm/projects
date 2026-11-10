# SNews — Source Code Guide

## How the Android project is organized

The complete Gradle application lives in `source/`. Its root `settings.gradle.kts` declares `rootProject.name = "SNews"` and `include(":app")`. Most Kotlin code is under `app/src/main/java/com/example/securescan/`.

**`MainActivity.kt`** constructs the Compose navigation graph and selects a start screen based on the Firebase authentication state. **`ui/screens/`** contains presentation-level screens (articles, scanner, reporting, login, RSS and settings), while **`ui/components/`** holds reusable Compose widgets and **`ui/theme/`** stores styling. **`viewmodel/`** manages observable state and makes repository calls. **`data/models/`** contains serialized data classes, **`data/repository/`** contains Firestore and RSS access, and **`data/network/`** contains Firebase login, VirusTotal API declarations and Cloudinary upload logic.

## Follow an article end to end

In `MainActivity.kt`, the news routes render `NewsScreen`, `AllNewsScreen` and `NewsDetailScreen`. `NewsViewModel` converts repository flows into Compose-observable state. `NewsRepository` reads `posts` documents, and `NewsSocialRepository` coordinates comments, reactions, sharing and bookmarks. If a news list is empty, inspect the Firestore content and query permissions before modifying the UI.

## Follow a scan end to end

`ScanScreen` forwards inputs to `ScanViewModel`, which calls `VirusTotalApiService` using Retrofit and requests the analysis status. `ScanRepository` persists history to `scan_history`. Phone checking is separate: `ScanPhoneAndCardScreen` calls `ScanPhoneCardViewModel`, then `ScanPhoneCardRepository` queries the Firestore collections. The account-number callback is currently an empty placeholder. These different sources should not be conflated in threat-score explanations.

## Follow a report end to end

`ReportScreen` and `ReportsViewModel` use `ReportRepository`. The repository stores a Firestore report; for photo evidence it invokes `CloudinaryUploader` to receive an uploaded image URL. `ReportDataScreen` and `ReportDetailScreen` display stored reports. Firestore Security Rules are the actual enforcement boundary for who may read, create or edit records; they are not included in the repository.

## Make safe code changes

Use one focused feature or defect per commit, make changes in ViewModel/Repository rather than placing all logic into Composables, and keep data model fields synchronized with Firestore documents. Add tests for login, account-specific access, search, bookmarks, report processing and scanner failure/timeout states. For API integrations, never log credentials or silently convert errors into neutral/clean verdicts. Report behavior as validated only after executing tests in a configured environment.

## Runtime configuration

The public release modifies `app/build.gradle.kts`, `ScanViewModel.kt` and `CloudinaryUploader.kt` so service values come from local build-time settings instead of literal values committed in source. A new `local.properties.example` documents required names, `app/google-services.json` and an unreferenced example data JSON containing phone-number records are excluded, and ignore rules are extended. The application structure and primary feature flow are otherwise left intact. See `SECURITY_AND_RELEASE_NOTES.md` for exact details.
