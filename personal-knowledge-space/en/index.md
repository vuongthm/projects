---
cover: ../media/overview.svg
id: personal-knowledge-space
title: Personal knowledge space
description: The space you are exploring. A multilingual, multi-source publishing system with
  library search, a focused reader, and an optional AI assistant.
category: Web engineering
stack:
  - Next.js
  - TypeScript
  - Markdown
  - Gemini API
repository: https://github.com/vuongthm/vuongthm.github.io
status: active
year: "2026"
translations:
  ja:
    title: Personal knowledge space
    description: いま開いているこのサイトです。複数の情報源と多言語に対応し、検索、読みやすい記事表示、任意のAIアシスタントを備えています。
    body: いま開いているこのサイトです。複数の情報源と多言語に対応し、検索、読みやすい記事表示、任意のAIアシスタントを備えています。
  zh:
    title: Personal knowledge space
    description: 你正在访问的这个空间。支持多来源与多语言，提供搜索、专注阅读和可选的 AI 助手。
    body: 你正在访问的这个空间。支持多来源与多语言，提供搜索、专注阅读和可选的 AI 助手。
---

The space you are exploring. A multilingual, multi-source publishing system with library search, a focused reader, and an optional AI assistant.

## Technology

- Next.js
- TypeScript
- Markdown
- Gemini API


## Goal

A coherent place for knowledge, projects, and personal stories. Content lives in independent repositories; the website handles presentation, discovery, and publishing.

## System design

Each source has a `module.json` manifest. The compiler validates Markdown, links, and media before producing data for the static website. Adding a source lets the site discover the module and build its collection.

- A searchable knowledge library with filters and a reading table of contents.
- Vietnamese, English, Japanese, and Chinese interfaces with explicit content-language fallback.
- Multi-chapter stories, detailed project pages, and photo/video albums.
- Individually protected Markdown documents with encrypted attachments.

## Publishing workflow

1. Write or edit Markdown in its content repository.
2. Preview locally with `pnpm dev`.
3. Push the source repository to notify the website.
4. GitHub Actions validates, builds, and publishes the website.

## What I focus on

Reusable interfaces, content kept separate from presentation, and clear interactive cards on both mobile and desktop. Adding a subject should not require rewriting the site.
