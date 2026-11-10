# Publishing Seek a Job on GitHub

The product name and canonical repository name are **Seek a Job** and **`seek-a-job`**. The project was developed in 2024 by **Trần Hoàng Minh Vương** and **Đặng Quang Vinh**. Keep the actual Git commit date when publishing.

Create a repository named `seek-a-job` under `vuongthm`, and commit the root `seek-a-job/` directory so its introduction, code, reports and documentation live together. Check that `.env`, uploads containing personal information, logs and database exports are not staged.

```bash
git init
git add .
git diff --cached --stat
git commit -m "feat: publish Seek a Job project (2024)"
git branch -M main
git remote add origin https://github.com/vuongthm/seek-a-job.git
git push -u origin main
```

If an `origin` remote exists, check it before updating it. Read `docs/SETUP_GUIDE.md` before running the application. The full recruitment database schema is required; the repository migrations alone are insufficient.
