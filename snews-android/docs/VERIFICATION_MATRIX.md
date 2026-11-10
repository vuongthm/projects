# SNews — Implementation Verification Matrix

This matrix describes **static evidence in the user-supplied Android ZIP** and does not imply successful device or cloud-service testing.

| Capability | Code evidence | Source status | Remaining validation |
| --- | --- | --- | --- |
| Project configuration | `source/app/build.gradle.kts`; `gradle/libs.versions.toml` | Verified: `compileSdk 35`, `targetSdk 35`, `minSdk 24`, Compose | Gradle Sync, device build |
| App navigation | `MainActivity.kt` | Compose destinations declared | Back stack, sign-in transitions |
| Email/password authentication | `FirebaseAuthService.kt`; `AuthViewModel.kt` | Firebase operations implemented | Firebase project and rule tests |
| Social sign-in | `MainActivity.kt` | Buttons connected to empty callbacks | Implement providers or remove buttons |
| News & search | `NewsRepository.kt`; `NewsViewModel.kt` | Firestore flows and search in code | Real data, latency, offline errors |
| Bookmarks, likes, comments | `NewsSocialRepository.kt` | Firestore operations in code | Ownership and concurrency tests |
| External RSS | `RssRepository.kt`; `RssNewsScreen.kt` | XML feed parsing in code | Feed availability, HTML edge cases |
| Translation | `TranslationManager.kt`; `NewsDetailScreen.kt` | ML Kit logic exists | Offline model, language and UI tests |
| User reports and evidence | `ReportRepository.kt`; `CloudinaryUploader.kt` | Firestore record and upload flow | Consent, file types, cloud quotas |
| URL/file scanning | `ScanViewModel.kt`; `VirusTotalApiService.kt` | Direct VirusTotal API call and polling | Key, rate limit, failed/unknown result states |
| Scan history | `ScanRepository.kt` | Firestore writes/queries implemented | Owner isolation and timestamps |
| Phone-number checks | `ScanPhoneCardRepository.kt` | Queries `malicous_phone` and `reports` | Data quality, owner and error tests |
| Bank-account checks | `ScanPhoneAndCardScreen.kt` | User interface exists, submit callback empty | **Incomplete** |
| Notifications | `NotificationRepository.kt` | Firestore CRUD exists | User scoping and permissions |
| Notification preferences | `NotificationSettingsViewModel.kt` | In-memory state only | **Persistence not implemented** |
| Administrator web/backend | Not included | No separate project supplied | Cannot verify; design only |
| Firestore security rules | Not included | Rules unknown | Critical access-control test gap |
| Automated tests | `app/src/test`; `app/src/androidTest` | Starter example tests present | Add meaningful functional and security tests |

A neutral or zero-detection scanner output should never be represented as a safety warranty. Different input types rely on different data sources and must be explained separately.
