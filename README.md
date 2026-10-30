# School Register

School Register is a PHP and MySQL web application for managing new student registrations at a fictional high school, "SMA Budi Pekerti". It was built as university coursework. Applicants submit a registration form, and administrators can view, edit, and delete the stored records.

The interface text is written in Indonesian.

## Features

- Landing page for the school with links to registration and the applicant list (`index.php`).
- Registration form collecting name, address, gender, religion, and previous school (`form-daftar.php`).
- Applicant list shown in a table with a total count (`list-siswa.php`).
- Editing of an existing applicant's data (`form-edit.php`, `proses-edit.php`).
- Deletion of an applicant (`hapus.php`).
- Status display on the landing page after a registration attempt (`?status=sukses` or `?status=gagal`).

## Tech Stack

- Language: PHP, HTML, CSS
- Database: MySQL, accessed with the `mysqli` extension

## Project Structure

```text
.
├── config.php               # Database connection
├── index.php                # Landing page
├── form-daftar.php          # Registration form
├── proses-pendaftaran.php   # Handles new registrations (INSERT)
├── list-siswa.php           # Applicant list (SELECT)
├── form-edit.php            # Edit form
├── proses-edit.php          # Handles edits (UPDATE)
├── hapus.php                # Handles deletion (DELETE)
└── style.css                # Shared styles
```

## Getting Started

### Prerequisites

- PHP with the `mysqli` extension
- A MySQL or MariaDB server

### Database setup

The repository contains no SQL schema file. [`config.php`](config.php) connects to a database named `pendaftaran_siswa` on `localhost` as user `root` with an empty password. Edit this file if your setup differs.

The code reads and writes a table named `calon_siswa` with these columns:

- `id` (used as the record identifier, presumably auto-increment)
- `nama`
- `alamat`
- `jenis_kelamin`
- `agama`
- `sekolah_asal`

Create the database and table yourself before running the application.

### Running the Project

Start PHP's built-in server from the repository root:

```bash
php -S localhost:8000
```

Then open `http://localhost:8000/`. Alternatively, place the folder in the document root of a PHP-enabled web server such as Apache.

## Usage

1. Open the landing page and choose **Daftar Sekarang**, or go to `form-daftar.php`.
2. Fill in the form and submit it. You are redirected to `index.php` with a success or failure status.
3. Open `list-siswa.php` to see all applicants.
4. Use **Edit** to change a record or **Hapus** to delete it.
