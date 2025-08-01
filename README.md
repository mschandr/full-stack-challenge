= WiseJobs Backend Submission

== Overview:

The purpose of this project was obviously to guage how well I could write code for WiseJobs + get an idea of my skills, let me say this, my backend skills are pretty decent, my front end skills definitely could use some work. But that said, here's the summary of how it went.

== Summary:

This project, the backend for WiseJobs, it's all API driven and while technically it would be nice to have seen the Vue+inertia FE, they ultimately decided that today was the day that they weren't going to run at all. I even gave the issues to my ChatGPT AI. The backend does take care of the following features though.

== Features:

1. Laravel 12 backend
2. Sanctum for API authentication
3. Job listing endpoint implemented with:
   - Filtering by location, work type, and salary band
   - Pagination (15 per page)
   - Resource transformation using JobPostingDehydratedResource

4. Inertia (partially wired) — frontend integration attempted but deferred due to environmental issues (To say this was frustrating was an a understatement

== Routes:

I really would prefer this be documented using a proper tool like swagger but honestly who has the time.

== Filtering Logic:

1. Location: fuzzy LIKE match
2. Work Type: exact match
3. Salary Band:
   - low: < $100K
   - mid: $100K–$150K
   - high: > $150K

-----------

= Setup Instructions

```
git clone <repo>
cd wisejobs
cp env.example .env
edit the .env file to accomodate a few customizations
    1.  DB config needs to be edited with your values
    2.  artisan key:generate
    3.  artisan migrate
    4.  artisan db:seed
    5.  artisan key:generate
php artisan migrate
npm install
npm run dev
```
== Notes: 

Frontend is scaffolded using Inertia.js + Vue 3.
Vite integration issues (likely due to SSL and local dev certs) prevented successful Inertia rendering in browser.

Backend functionality is fully working and testable via Postman or Laravel routes.

== Todo:

@todo:

- Fix Vite/HTTPS dev cert conflict
- Finalize Vue/Inertia component rendering
- Add frontend tests or Cypress integration if frontend resumes

If I had more time, I would fix the front end obviously and wire up login and logout with the front end. but for whatever reason vite + Inertia refuse to work.


