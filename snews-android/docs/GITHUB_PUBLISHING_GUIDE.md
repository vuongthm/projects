# Publishing SNews on GitHub

The product name is **SNews** and the canonical repository name is **`snews-android`**. The project was developed in 2025 by **Trần Hoàng Minh Vương** and **Nguyễn Việt Tín**; the Git commit timestamp should reflect the date you actually publish it.

## Prepare the repository

Create a GitHub repository named `snews-android` in the `vuongthm` account. Use the root `snews-android/` directory for the commit, not only `source/`, so reports and documentation are included. The Android Studio Gradle project itself remains in `source/`.

Before staging, review `docs/SECURITY_AND_RELEASE_NOTES.md`. Keep `source/local.properties`, `source/app/google-services.json`, API keys, signing keys and private user data untracked. Review the full staged file list and its diff.

## Initial push

From the `snews-android/` directory:

```bash
git init
git add .
git diff --cached --stat
git commit -m "feat: publish SNews Android project (2025)"
git branch -M main
git remote add origin https://github.com/vuongthm/snews-android.git
git push -u origin main
```

If the `origin` remote is already configured, inspect it with `git remote -v` before making changes. Check the GitHub page once the push completes, including the visible README and embedded images.

## Build note

In Android Studio, open `source/`, then configure Firebase and external services as described in `docs/SETUP_GUIDE.md`. Do not rename `com.example.securescan` just to match the GitHub repository name; changing the Android application ID affects Firebase configuration.
