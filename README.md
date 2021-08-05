# Automobile-service-management-system
The system allows addition and updating of information about the automobiles, their services and other automobile details. The Automobile Service Management System is built for the sake of ensuring effective and clear data saving and manipulating information of automobile service center. It highly minimizes the time taken to manage data and is highly resourceful.

Entities and Attributes
1.	EMPLOYEE {EMP_ID, EMP_NAME, EMP_DOB, EMP_GENDER, EMP_ADDRESS, EMP_PHONE, EMP_EMAIL, EMP_SALARY, EMP_DESCRIPTION}
2.	ADMINS {ID, USERNAME, PASSWORD, CREATED AT} where ID is primary key.
3.	CUSTOMER {CUST_ID, NAME, DOB, AGE, ADDRESS, PHONE, EMAIL, STORE_ID} where CUST_ID is the primary key.
4.	USERS {ID, USERNAME, PASSWORD, CREATED AT} where ID is primary key.
5.	AUTOMOBILE {AUTO_ID, AUTO_TYPE, AUTO_DESCRIPTION, CUST_ID} where AUTO_ID is the primary key.
6.	SERVICES {SERV_ID, SERV_CHARGE, SERV_TYPE, SERV_DESCRIPTION, AUTO_ID} where SERV_ID is the primary key.
7.	BILL {BILL_NO, SERV_ID, BILL_AMT, BILL_TYPE, BILL_DESCRIPTION} where BILL_NO is the primary key.
8.	DELIVERY {CUST_ID, AUTO_ID, BILL_NO, DEL_ADDRESS, DEL_DATE, DEL_BY} where CUST_ID and AUTO_ID form the composite primary key.
9.	FEEDBACK {FEEDBACK_ID, RATINGS, REVIEWS, CUST_ID} where FEEDBACK_ID is the primary key.

Software Requirements:
•	Operating Systems: 64-bit Operating System, x64 based processor, Windows 8 or higher
•	Database System: MySQL
•	Xampp Server

Hardware Requirements:
•	Processor- Intel core i5 6500 3.2GHz
•	RAM: 4GB
•	Hard Disk: 1TB
•	Input device: Keyboard, mouse
•	Output device: Monitor

Functional Requirements: 
It defines a function of a software system or its components. A function is described as asset of inputs, the behavior and outputs. Functional requirements may be calculations, technical details, data manipulation and processing and other specific functionality that defines what a system is supposed to accomplish. Behavioral requirements describing all the cases where the system uses the functional requirements are supported by non-functional requirements which impose constraints on the design or implementation. The following are the basic functional requirements:
•	Admin
•	Customer
•	Vehicle

List of modules
•	Sign up – Allows a new user to register.
•	Login – Allows the existing user to view details.
•	Admin Login – Allows the admin to login and view the data.
•	Home – Displays the information about the service center.
•	Employee – Admin can add or remove an employee, update employee details.
•	Customer – Admin can view customer details and remove a customer. User can to view and update details.
•	Automobile – Admin can view the details of the automobiles serviced.
•	Services – Admin can view available services and add, remove or update services. User can request for a service for his automobile.
•	Bill – Admin can generate the bill and view all the bill details. User can view and pay the bill.
•	Delivery – Admin can schedule, delete and view the delivery details. User can see the delivery details.
•	Feedback – Admin can view the feedback summary. User can provide the feedback.
