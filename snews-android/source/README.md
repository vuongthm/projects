# SNews — Android application

This folder contains the Android Studio/Gradle application written in Kotlin with Jetpack Compose. Open `source/` as the project root in Android Studio. The project's `applicationId` remains `com.example.securescan`, which must match the Firebase Android app configuration.

Follow the [Setup Guide](../docs/SETUP_GUIDE.md) for Firebase configuration and service parameters. Local settings and `google-services.json` are not included and must remain untracked. Service values included in an Android APK may be extracted, so privileged API traffic should go through a controlled backend for production use.

Features such as account-number lookup and social sign-in are incomplete. See the [Verification Matrix](../docs/VERIFICATION_MATRIX.md) for source-level implementation notes.
