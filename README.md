<div align="center">

<h1>Dot.Design</h1>

<p>AI-powered canvas design tool — create stunning graphics, social posts, and marketing materials with generative AI assistance.</p>

[![PHP](https://img.shields.io/badge/PHP-8.4-777BB4?style=flat-square&logo=php&logoColor=white)](https://php.net)
[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat-square&logo=laravel&logoColor=white)](https://laravel.com)
[![Livewire](https://img.shields.io/badge/Livewire-3.x-4E56A6?style=flat-square)](https://livewire.laravel.com)
[![PostgreSQL](https://img.shields.io/badge/PostgreSQL-16-4169E1?style=flat-square&logo=postgresql&logoColor=white)](https://postgresql.org)
[![Tests](https://img.shields.io/badge/tests-37%20passing-brightgreen?style=flat-square)](tests/)
[![License](https://img.shields.io/badge/license-MIT-green?style=flat-square)](LICENSE)

</div>

---

## Overview

Dot.Design is the visual design platform in the Dot ecosystem. Build graphics on a pixel-accurate canvas with configurable dimensions, manage reusable assets, and accelerate creation with AI-generated images and layouts — all saved with a full element history per canvas.

---

## Features

- **Canvas editor** — pixel-accurate canvas with configurable width, height, and unit (px/mm/in)
- **Element layers** — shapes, text, images, and custom elements stored as JSON
- **Multi-canvas projects** — each design project holds multiple canvas pages
- **Asset library** — personal and team asset storage with type and metadata
- **AI generation** — generate images and layout suggestions from a text prompt
- **AI generation logs** — audit trail of every AI-assisted creation
- **Export** — PNG, JPG, SVG, and PDF export per canvas
- **Ecosystem SSO** — authenticate from InfoDot with a single click

---

## Domain Model

```
DesignProject (width, height, unit) → DesignCanvases (elements JSON)
                                    → DesignAssets   (meta JSON)
AiGenerationLog → DesignProject + User
```

---

## Tech Stack

| Layer | Technology |
|---|---|
| Framework | Laravel 12 + PHP 8.4 |
| Frontend | Livewire 3 + Alpine.js + Tailwind CSS |
| Canvas | Konva.js / Fabric.js |
| Auth | Jetstream 5 + Sanctum (ecosystem SSO) |
| Database | PostgreSQL 16 (shared infodot instance) |
| AI | Anthropic Claude API + image generation |
| Storage | AWS S3 |

---

## Quick Start

```bash
git clone https://github.com/sakhileb/Dot.Design.git && cd Dot.Design
composer install && npm install
cp .env.example .env && php artisan key:generate
php artisan migrate && npm run dev & php artisan serve
```

```bash
bash bin/test.sh   # 37 passing, 0 failed, 7 skipped
```

---

## Part of the Dot Ecosystem

Dot.Design connects to [InfoDot](https://github.com/sakhileb/InfoDot) — the central hub. Log in to InfoDot once and navigate here without re-authenticating via `/auth/ecosystem`.

---

MIT — © SK Digital / BluPin Incorporated
