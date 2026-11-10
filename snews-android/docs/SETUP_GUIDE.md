# SNews — Setup and Local Build Guide

## Purpose and prerequisites

This guide applies to the bundled `source/` directory, an Android Studio project with a single `:app` module. The Gradle version catalog declares Android Gradle Plugin **8.8.1** and Kotlin **2.0.0**; the Android configuration specifies **compileSdk 35, targetSdk 35, minSdk 24** and **Java 11 source compatibility**. Use Android Studio with SDK Platform 35 and an appropriate Gradle JDK (usually JDK 17 for this AGP version). A network connection is required to resolve dependencies and call cloud services.

## 1. Open the source

After extracting the ZIP, navigate to `snews-android/source/`; this is the Gradle project root. The outer `snews-android/` directory is the GitHub repository and documentation root.


Open the `source/` folder—not the outer `snews-android/` documentation folder—in Android Studio. Confirm it contains `settings.gradle.kts`, `app/build.gradle.kts`, `gradlew`, `gradlew.bat` and `gradle/wrapper/`. Allow the IDE to run Gradle Sync.

## 2. Configure your own Firebase project

The Firebase Android configuration file `app/google-services.json` is not tracked in this repository. In Firebase Console, create/use a project whose Android application ID matches `com.example.securescan`. Download the correct `google-services.json` and place it at `source/app/google-services.json`. Enable the Firebase products used by your build (at least Authentication with email/password and Cloud Firestore), provide the appropriate content data for your project, and configure restrictive Firestore Security Rules. Do **not** copy unknown project credentials from another repository.

The Android client accesses Firestore directly. It expects collections including `users`, `posts`, `comments`, `reactions`, `bookmarks`, `shares`, `reports`, `notifications`, `scan_history`, and `malicous_phone` (the last name preserves the spelling in the source). The release contains no server-side Firestore rules or database export; a clean build may launch without displaying real news until you supply valid data and permissions.

## 3. Supply local service settings

Inside `source/`, copy `local.properties.example` into `local.properties` (or add its entries to the file Android Studio creates). Supply only settings belonging to your own account:

```properties
VIRUSTOTAL_API_KEY=YOUR_NEW_KEY
CLOUDINARY_CLOUD_NAME=YOUR_CLOUD_NAME
CLOUDINARY_UPLOAD_PRESET=YOUR_UPLOAD_PRESET
```

Leave values blank if you are not using those features. The keys are read by Gradle when constructing `BuildConfig` properties and are **not committed**, but any populated value becomes extractable from a compiled Android APK. For a public production app, replace direct client-to-VirusTotal privileged calls with a controlled server endpoint. Use an authorized VirusTotal credential and revoke any key that may have been exposed before enabling scanning.

## 4. Build and launch

Select the `app` run configuration, start an emulator or connect an Android device running **API 24+**, and click Run. To use the Gradle wrapper from a terminal:

```bash
cd source
./gradlew :app:assembleDebug
```

On Windows, use `gradlew.bat :app:assembleDebug`. The debug APK is typically written under `source/app/build/outputs/apk/debug/`. Verify the exact output and app behavior locally. This documentation release has not been compiled with Android SDK / Firebase credentials in the provided environment.

## 5. Diagnose common problems

**Google Services task fails:** check that `app/google-services.json` exists and matches the application ID. **Gradle Sync fails:** confirm JDK/AGP compatibility and SDK Platform 35 availability. **No articles:** check the Firestore `posts` collection and its rules. **Scanning returns errors:** validate your new VirusTotal key, quota and network state; missing or failed scans must never be interpreted as “safe.” **Report image upload fails:** confirm the Cloudinary cloud name, unsigned preset and account settings. **Other features appear non-responsive:** refer to `VERIFICATION_MATRIX.md`, which identifies known placeholders.

## 6. Prior to publishing

Never commit `local.properties`, real Google Services configurations, service tokens, signing keystores or confidential sample records. Run `git status`, inspect staged changes with `git diff --cached`, and check Firestore permission rules separately. The source's applicationId remains `com.example.securescan`; changing it requires a corresponding Firebase Android app registration.
