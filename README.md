# event-registration

🎟️ Event Registration System
A Laravel-based Event Registration System that allows users to browse and register for events while providing an admin panel for event management.

🚀 Features
✅ User Authentication (Login, Register, Logout)
✅ Event Listing & Filtering (Search by name & date)
✅ Event Registration (Only logged-in users)
✅ Admin Panel (Create & Manage Events)
✅ Bootstrap 5 UI (Responsive & User-Friendly)
✅ CSRF Protection & Form Validation

🛠️ Installation
1️⃣ Clone the Repository

git clone https://github.com/your-username/event-registration.git
cd event-registration
2️⃣ Install Dependencies

composer install
npm install
3️⃣ Set Up Environment Variables
Copy .env.example to .env and configure your database:


cp .env.example .env
Modify .env with the database credentials:


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=event_db
DB_USERNAME=root
DB_PASSWORD=
4️⃣ Generate Application Key

php artisan key:generate
5️⃣ Run Migrations & Seeders


php artisan migrate --seed
This will create necessary tables and seed an admin user.

6️⃣ Start the Development Server

php artisan serve
Visit http://127.0.0.1:8000 in your browser.

👥 User Roles
🔹 Regular Users
Can view event listings
Can register for events (Only when logged in)
🔹 Admins
Can create, update, and delete events
Can manage registered attendees
Can access the Admin Panel via /admin/events/create
🖥️ Admin Login
After seeding the database, use this default admin login:

Email	Password
admin@example.com	password
📌 Usage
1️⃣ Register/Login as a user
2️⃣ View Events from the homepage
3️⃣ Register for an Event (Only if logged in)
4️⃣ Admins can create/manage events via /admin/events/create
5️⃣ Logout when done

🔒 Restricting Event Registration
To prevent guests from registering for events, the system redirects unauthenticated users to the login page when they attempt to register.

🐞 Troubleshooting
🔹 Database errors? Ensure MySQL is running
🔹 Styles not loading? Verify Bootstrap is included in app.blade.php
🔹 Auth Issues? Run:


php artisan cache:clear
php artisan config:clear
php artisan migrate:fresh --seed
📜 License
This project is licensed under the MIT License.
See the LICENSE file for details.

💡 Contributors
👤 Hassane Jaber
📧 hassane.jaber9@gmail.com
🔗 GitHub: HassanJaber
