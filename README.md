# Lab Activity 9 – Bakuna Tracker (Purok Adan)

A Laravel 12 dashboard for the vaccination desk of Barangay Matina Crossing Health Center.
It uses Blade layouts and components, Tailwind CSS v3 through Vite, and a seeded SQLite database.

## Login
- Email: nurse.adan@bakuna.test
- Password: bakuna2026

## How to run
1. composer install
2. npm install
3. cp .env.example .env
4. php artisan key:generate
5. php artisan migrate:fresh --seed
6. npm run dev
7. php artisan serve (in another terminal)

Then open http://127.0.0.1:8000

## Notes
Laravel 12 comes with Tailwind v4, so I removed it and set up Tailwind v3 with PostCSS
like in the lab handout.