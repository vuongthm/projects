---
{
  "id": "encrypted-media-vault",
  "cover": "../media/overview.svg",
  "title": "Encrypted Media Vault",
  "description": "An encrypted photo and video archive, keeping public media and private collections separate.",
  "category": "Privacy engineering",
  "stack": [
    "Web Crypto",
    "AES-256-GCM",
    "TypeScript"
  ],
  "repository": "https://github.com/vuongthm/vuongthm.github.io/tree/main/components/vault",
  "status": "active",
  "year": "2026",
  "order": 20,
  "translations": {
    "ja": {
      "description": "公開メディアと非公開コレクションを分けた、写真・動画の暗号化アーカイブ。"
    },
    "zh": {
      "description": "将公开媒体与私人收藏分开的加密照片和视频档案。"
    }
  }
}
---

## Overview

A working part of this website: an archive of encrypted photographs and videos that opens with a collection password. Only ciphertext is published; originals and credentials stay outside the static export.

## How it works

- Derive keys with PBKDF2 and encrypt with AES-256-GCM.
- Open media in the browser without putting passwords into URLs.
- Revoke decrypted media and lock the archive when the tab is hidden or the session is idle.

## What I learned

Key management and memory lifetimes matter as much as the encryption algorithm. The interface needs a clear locked state, useful password errors, and a safe way back.

## Source code

This project currently lives in the website’s `components/vault` module. The source link below points to that implementation.
