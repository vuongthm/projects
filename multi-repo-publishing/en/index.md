---
id: multi-repo-publishing
title: Multi-repo publishing
description: Write across repositories and publish in one place. A Markdown compiler that checks links and synchronizes content for this personal website.
cover: ../media/overview.svg
category: Developer tooling
stack:
  - Node.js
  - Markdown
  - GitHub Actions
  - WebP
repository: https://github.com/vuongthm/vuongthm.github.io/tree/main/scripts/content
status: active
year: "2026"
---

A publishing system that lets each subject grow in its own repository while readers find everything on one website. These are the content tools used by this space itself.

## The problem

Networking notes, security write-ups, AI experiments, personal stories and albums have different structures. Coupling all of them to presentation code makes maintenance difficult; separating their websites fragments the reading experience. This system keeps source ownership separate and presentation consistent.

## Publishing flow

1. Declare repositories in `content.sources.json`, or use local modules during development.
2. Read each `module.json` to select the adapter for notes, stories, projects or albums.
3. Validate frontmatter, internal links and referenced assets.
4. Generate presentation data, a search index and suitable image variants.
5. Build a static website for GitHub Pages.

## What is implemented

- Shared adapters for different Markdown content types.
- Central handling of languages and content fallbacks.
- PNG/JPEG conversion to WebP where applicable.
- Independent Markdown passwords with encrypted content and associated media.
- Artifact checks for broken links and accidental private-data publication.

## Adding a repository

Add the module manifest, organize Markdown by language and declare its source in the website repository. Content repositories can notify the website workflow to rebuild; GitHub tokens and secrets must be configured before that notification flow is used in production.

## Next steps

Improve author-facing validation messages, keep the schema stable and reduce build time as the library grows. Existing adapters provide a place to add content types without rewriting every page.
