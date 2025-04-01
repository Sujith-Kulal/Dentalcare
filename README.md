# Dentalcare

Project: Dental Appointment Management System
This project is a web-based application for managing dental clinic appointments. It allows patients to book appointments online, while administrators can review, approve, or cancel them.

How the Project Works
1. User Interface (Frontend)
Home Page (index.html):
Displays a navigation menu with links to Home, About, Services, Contact, Admin, and Status.
Provides an introduction to the dental clinic and highlights available services.
Includes an appointment booking section.

Appointment Booking Form (contact.php):
Users enter their name, email, phone number, and preferred appointment date.
The form validates user input before submission.
Data is stored in the database.
Appointment Status Page (status.php):
Users can check the status of their booked appointment (Pending, Approved, or Cancelled).

2. Backend (PHP & MySQL)
Database (contact_db):
Stores appointment data in the contact_form table.
Columns: id, name, email, number, date, status.

Admin Panel (status.php):
Lists all appointment requests.
Admins can approve or cancel appointments.
The status updates accordingly in the database.

New Appointment Handling (contact.php):
Captures form data.
Inserts appointment details into the database.
Default status: "Pending."

3. Core Features
User Appointment Booking
Form Validation (JavaScript)

Database Storage (MySQL)
Admin Approval/Cancellation
Appointment Status Updates
Responsive Design (Bootstrap & CSS)

