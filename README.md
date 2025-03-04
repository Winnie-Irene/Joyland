# Joyland Church Website

Welcome to the **Joyland Church Website** repository! This project is designed to provide an online presence for Joyland Church, enabling members to access sermons, submit prayer requests, donate, register for ministries, and stay updated on church events and announcements.

## 🌟 Features

- 📖 **Sermons Upload & Display** – Admins can upload sermons, which are stored in a database and displayed dynamically.
- 🙏 **Prayer Requests** – Users can submit prayer requests that are stored in the database for review.
- 🎁 **Donations System** – Users can donate via Mpesa, with records stored for reporting.
- 📅 **Events & Announcements** – Admins can manage and post church events and announcements.
- 👥 **Ministry Registration** – Users can register for different ministries, and admins can track members.
- 📊 **Admin Dashboard** – Role-based access for managing sermons, donations, prayer requests, and messages.
- 📄 **Export Reports** – Reports for donations, messages, ministries, and prayer requests can be exported as PDF and Excel files.

## 🛠️ Technologies Used

- **Frontend:** HTML, CSS, JavaScript, Bootstrap
- **Backend:** PHP, MySQL
- **Database Management:** MySQL
- **Libraries & Tools:** TCPDF (for PDF exports), PhpSpreadsheet (for Excel exports)

## 🚀 Installation Guide

1. Clone the repository:
   ```sh
   git clone https://github.com/Winnie-Irene/Joyland.git
   ```
2. Move into the project directory:
   ```sh
   cd Joyland
   ```
3. Set up your database:
   - Import the provided SQL file (`joyland.sql`) into MySQL.
   - Configure your database connection in `db.php`.
4. Start the XAMPP server and ensure Apache & MySQL are running.
5. Open the project in your browser:
   ```
   http://localhost/joyland/
   ```

## 📜 Usage

- **Admin Panel:** `http://localhost/joyland/admin/`
- **Login Credentials:** (Set up in database or registration page)
- **Modify site content:** Edit the `dashboard.php` to update features.

## 🤝 Contribution

Feel free to contribute! If you'd like to improve the website, fork the repo, make your changes, and submit a pull request.

For any issues, open an issue in the repository.

**© 2025 Joyland Church | All Rights Reserved**
