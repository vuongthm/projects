# SNews — User Guide

## Overview

SNews combines a news feed with optional checks for suspicious links, files and phone numbers. The application's principal screens are declared in `MainActivity.kt`. Some features require Firebase access and accounts with content. A scan result is advisory; absence of detections is not a safety guarantee.

## Access and sign-in

On a clean launch, the welcome screen offers email/password registration or login. The underlying `FirebaseAuthService` uses Firebase Authentication and creates a Firestore user profile on registration. Buttons labeled Google, Facebook and Apple may be present, but their callbacks in this source are not connected. Do not rely on those buttons until implemented and tested.

## Read and save news

The Home and News areas display articles retrieved from Firestore `posts`. Users can open articles, search the news catalog and navigate to saved articles. Reactions, comments and shares are represented by the corresponding data repository operations. A separate RSS view retrieves cybersecurity stories from The Hacker News feed. Within some article views, translation uses ML Kit, which may download a language model before use.

## Report suspicious content

The report form accepts a category, the suspicious target, a description and optional image evidence. The app attempts to upload attached images to Cloudinary and store a report in Firestore. Uploading personal photos or sensitive screenshots to a third-party provider may disclose their contents; inspect the information before submitting it. Report review by a dedicated administrator is not available as a bundled server application.

## Check URLs and files

The Scan screen provides URL and file input and submits those inputs to VirusTotal through the configured API key. Results can include counts of engines classifying an item as malicious, suspicious, harmless or undetected. Service availability, scan completion, provider quotas and the app's own result parser can affect the display. Never treat “no information” or a failed scan as proof of safety; do not upload confidential files without explicit permission from the data owner.

## Phone-number and account-number checks

The phone lookup compares the entered number against Firestore data in `malicous_phone` and matching reported cases in `reports`. A number not found in these collections is **not** a verified legitimate number. The account-number tab is visible but its submit callback has no implemented lookup in this codebase.

## Notifications and settings

The app offers notification and settings screens and a light/dark appearance mechanism. Current notification preferences are stored in ViewModel state only; they are not persisted after restart. Notification data access also depends on Firestore permissions and must be reviewed before real multi-user use.

## Safety and privacy

SNews is a learning/project implementation, not antivirus software or a commercial anti-fraud guarantee. Do not use its output as the sole basis for financial or security decisions. Verify suspicious information independently and report demonstrably dangerous content through appropriate channels.
