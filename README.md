# Dentalcare (MINI PROJECT)
![image alt](https://github.com/Sujith-Kulal/Dentalcare/blob/51d35a60a692231f95879f8721a406aac755b4c8/Screenshot%20(52).png)

# Software Requirements Specification (SRS)

### **1. Introduction**
#### **1.1 Purpose**
The purpose of this system is to streamline the appointment booking process for a dental clinic. Patients can schedule appointments online, and administrators can approve or cancel them. This system eliminates the need for manual booking and improves clinic efficiency.

#### **1.2 Scope**
The **Dental Appointment Management System** is a web-based application that allows users to:
- Book appointments online.
- Check appointment status.
- Administrators can approve or cancel appointments.
- Store patient appointment records in a database.
- Provide a responsive user-friendly interface.

#### **1.3 Objectives**
- Improve efficiency in scheduling appointments.
- Reduce manual administrative workload.
- Provide a seamless and intuitive experience for patients and administrators.

#### **1.4 Technologies Used**
- **Frontend**: HTML, CSS, JavaScript, Bootstrap
- **Backend**: PHP (without XAMPP)
- **Database**: MySQL

---

### **2. Functional Requirements**
#### **2.1 User Roles**
- **Patient**
  - Can book an appointment.
  - Can check appointment status.
- **Administrator**
  - Can approve or cancel appointments.
  - Can view all appointment requests.

#### **2.2 Features**
- **Appointment Booking**: Patients can fill out a form with their name, email, contact number, and preferred appointment date.
- **Appointment Status Checking**: Patients can check the status of their appointment.
- **Admin Panel**: The admin can view appointment requests and approve or cancel them.
- **Database Management**: Stores and retrieves appointment data securely.

---

### **3. Non-Functional Requirements**
- **Usability**: The system should be easy to navigate and user-friendly.
- **Performance**: Fast and responsive interface.
- **Security**: Basic authentication for the admin panel.
- **Reliability**: Ensures data integrity and prevents double-booking.

---

### **4. System Design**
#### **4.1 Database Schema**
**Table: `contact_form`**
| Column  | Type           | Description                    |
|---------|--------------|--------------------------------|
| id      | INT (AUTO_INCREMENT) | Unique identifier |
| name    | VARCHAR(255)  | Patient's name               |
| email   | VARCHAR(255)  | Patient's email              |
| number  | VARCHAR(15)   | Contact number               |
| date    | DATETIME      | Appointment date             |
| status  | VARCHAR(50)   | (Pending, Approved, Cancelled) |

#### **4.2 System Workflow**
1. Patient fills out the appointment form.
2. Data is stored in the database with status **Pending**.
3. Admin logs in and views appointment requests.
4. Admin approves or cancels the appointment.
5. The patient checks the status.

---

### **5. User Interface (UI) Overview**
- **Homepage**: Introduction and navigation links.
- **Appointment Form**: Fields to enter name, email, contact number, and appointment date.
- **Status Page**: Displays appointment status.
- **Admin Panel**: Table listing appointments with approve/cancel options.

---

### **6. Deployment Strategy**
- The application will be hosted on a web server.
- The database will be managed using MySQL.
- No local server (XAMPP) is required; the system will use a direct MySQL connection.

---

### **7. Conclusion**
This system enhances the dental clinic's appointment booking process by reducing manual effort, ensuring better patient management, and improving overall efficiency. The web-based approach allows easy accessibility and a seamless experience for both patients and administrators.

---



