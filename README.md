# 🚀 Laravel Practice Suite

A collection of mini-applications built to master Laravel fundamentals, CRUD operations, and modern UI design with Tailwind CSS.

## 🛠 Features

### 1. 💰 Personal Expense Tracker
A financial dashboard to track income and expenses with real-time balance calculations.
- **Features:** Summary cards (Balance, Income, Expenses), transaction history, and color-coded entries.
- **Tech:** Eloquent aggregations (`sum`), numeric validation, and sticky layouts.
- **Route:** `/expenses`

### 2. 🎓 Student Directory
An academic management system to track student scores and performance.
- **Features:** Automatic grading logic (A-F), score-based styling, and a searchable visual directory.
- **Logic:** Score >= 90 (A), 80 (B), 70 (C), 60 (D), < 60 (F).
- **Route:** `/students`

### 3. 📝 Task Manager
A productivity tool to stay organized and track daily goals.
- **Features:** Card-based UI, status toggling (Mark as Complete), and strikethrough logic for finished tasks.
- **Tech:** PATCH requests for status updates and empty-state handling.
- **Route:** `/tasks`

---

## 🗺 Application Routes

| Module | Method | URL | Action |
| :--- | :--- | :--- | :--- |
| **Expenses** | GET | `/expenses` | View Dashboard |
| | POST | `/expenses` | Add Transaction |
| | DELETE | `/expenses/{id}/remove` | Delete Entry |
| **Students** | GET | `/students` | View Directory |
| | GET | `/students/create` | Add Student Form |
| | POST | `/students` | Save Student |
| | DELETE | `/students/{id}/remove` | Remove Student |
| **Tasks** | GET | `/tasks` | View Task List |
| | GET | `/tasks/create` | New Task Form |
| | POST | `/tasks` | Save Task |
| | PATCH | `/tasks/{id}/complete` | Mark Done |
| | DELETE | `/tasks/{id}/delete` | Delete Task |

---

## 🏗 Technical Stack
- **Framework:** Laravel 11
- **Styling:** Tailwind CSS (via CDN)
- **Database:** SQLite / MySQL (Eloquent ORM)
- **Icons & Fonts:** SVG Icons + Inter Font Family

## 🚀 Getting Started
1. Clone the repository.
2. Run `composer install`.
3. Copy `.env.example` to `.env`.
4. Run `php artisan migrate`.
5. Start the server: `php artisan serve`.
