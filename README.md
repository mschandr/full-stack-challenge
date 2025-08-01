# WiseJobs Backend Submission

## Overview

The purpose of this project was obviously to gauge how well I could write code for WiseJobs and give a sense of my skills. Let me say this—my backend skills are pretty decent. My frontend skills? Definitely need some work. That said, here's the summary of how it went.

## Summary

This project is the backend for WiseJobs. It's all API-driven. Technically, it would've been nice to showcase the Vue + Inertia frontend, but today was the day they collectively decided they weren't going to work. I even handed the issues off to ChatGPT.

Still, the backend is fully functional and covers the following.

## Features

- Laravel 12 backend
- Sanctum for API authentication
- Job listing endpoint implemented with:
  - Filtering by location, work type, and salary band
  - Pagination (15 per page)
  - Resource transformation via `JobPostingDehydratedResource`
- Inertia (partially wired) — frontend integration was attempted but deferred due to environment issues (to say this was frustrating is an understatement)

## Routes

Honestly, I'd prefer this be documented with Swagger or similar—but time.

## Filtering Logic

- **Location**: fuzzy `LIKE` match
- **Work Type**: exact match
- **Salary Band**:
  - `low`: under $100K
  - `mid`: $100K–$150K
  - `high`: over $150K

---

# Setup Instructions

```bash
git clone <repo>
cd wisejobs
cp .env.example .env
# Edit .env with your DB credentials and app URL
php artisan key:generate
php artisan migrate --seed
npm install
npm run dev
```

## Notes:

Frontend is scaffolded using Inertia.js + Vue 3.
Vite integration issues (likely due to SSL and local dev certs) prevented successful Inertia rendering in browser.

Backend functionality is fully working and testable via Postman or Laravel routes.

## Todo:

@todo:

- [] Fix Vite/HTTPS dev cert conflict
- [] Finalize Vue/Inertia component rendering
- [] Add testing

If I had more time, I would fix the front end obviously and wire up login and logout with the front end. but for whatever reason vite + Inertia refuse to work.


