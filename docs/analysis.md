# T-Level Placement Hours Tracker: Project Analysis
### Key Challenges
- Variability in how hours are logged and approved.
- Multi-tiered access requirements for Trusts, Schools, Teachers, Students, and Businesses.
- Need for data accuracy, security, and compliance.
- Diverse user functionalities, including tracking, approvals, and reporting.

---

## Legalities

### Applicable Laws and Regulations
1. **General Data Protection Regulation (GDPR)**: Protecting personal data of students and staff.
2. **Equality Act 2010**: Ensuring accessibility for all users, including those with disabilities.
3. **Data Protection Act 2018**: Governing secure storage and use of personal information.

### Compliance Strategies
- Implement robust data encryption for personal information.
- Utilize role-based access control (RBAC) to limit data access.
- Perform regular audits to ensure data handling aligns with GDPR standards.
- Develop an accessibility-first design using WCAG 2.1 guidelines.

---

## Risks

### Identified Risks
1. **Data Breaches**: Unauthorized access to sensitive data.
   - **Mitigation**: Secure server infrastructure, encryption, and multi-factor authentication.
2. **System Downtime**: Disruption in system availability.
   - **Mitigation**: Cloud hosting with redundancy and 24/7 monitoring.
3. **User Misuse**: Incorrect data entry or manipulation.
   - **Mitigation**: Validation rules, user training, and an activity log.
4. **Legal Non-compliance**: Inadvertent breach of GDPR.
   - **Mitigation**: Regular legal reviews and updates.

---

## User Stories and Functionalities

### Key Users and Their Stories

#### **1. Student**
- *As a student, I want to log my hours and add activity descriptions, so I can document my work accurately.*
- **Functionalities**:
  - Log daily placement hours.
  - Add activity descriptions for each logged day (work diary).
  - View approved and unapproved hours.
  - Request changes to incorrectly logged hours.

#### **2. Teacher**
- *As a teacher, I want to view and approve my students' hours to ensure compliance with placement requirements.*
- **Functionalities**:
  - View a list of students in their class with logged hours and activity descriptions.
  - Approve or reject logged hours.
  - Provide feedback on rejections.
  - View overall class placement progress and mentor interactions.
  - Use a messaging system to communicate with mentors.

#### **3. School Administrator**
- *As a school admin, I want to manage staff, student, and business data to keep the system updated.*
- **Functionalities**:
  - Add, edit, and delete student, teacher, and mentor accounts.
  - Upload CSV files for bulk additions of students or placements.
  - Assign students to teachers and businesses.
  - Oversee placement hours for all students in the school.
  - Generate school-wide reports on placement progress.

#### **4. Trust Administrator**
- *As a trust admin, I want to oversee all T-level placements across schools to ensure consistency.*
- **Functionalities**:
  - Add or remove schools within the trust.
  - View placement hours and progress across all schools.
  - Generate trust-wide reports.
  - Manage administrator accounts for individual schools.

#### **5. Business Mentor**
- *As a mentor, I want to approve or adjust logged hours for my students to ensure accuracy.*
- **Functionalities**:
  - View a list of mentees and their logged hours.
  - Approve, reject, or adjust hours (e.g., for absences or discrepancies).
  - Add comments to explain adjustments or rejections.
  - View previous approvals and unapproved hours.
  - Use the messaging system to communicate with teachers.

#### **6. Business Representative**
- *As a business representative, I want to oversee all students working with my organization to maintain compliance.*
- **Functionalities**:
  - View a list of all students placed within the business.
  - Approve or reject hours for any student under their purview.
  - Delegate mentor responsibilities to specific employees.

---

## Functional and Non-functional Requirements

### Functional Requirements
- Add, edit, and manage users (students, teachers, admins, mentors, businesses).
- Hour logging by students with activity descriptions.
- Hour approval and adjustment by teachers and mentors.
- Messaging system for communication between mentors and teachers.
- Exportable reports for schools, trusts, and businesses.

### Non-functional Requirements
- Centralized web-based platform.
- Accessible via browsers on desktop and mobile devices.
- Fast load times (under 3 seconds).
- High availability (99.9% uptime).
- Secure, role-based access for all user types.

---

## Key Performance Indicators (KPIs)

- **System Uptime**: >99.9% availability.
- **Data Accuracy**: >95% correctness in logged hours.
- **User Satisfaction**: >85% satisfaction from surveys.
- **Response Time**: <2 seconds for system actions.
- **Adoption Rate**: >90% of targeted schools and businesses onboarded within one year.

---

## User Acceptance Criteria

1. Students can log hours with descriptions without errors.
2. Teachers and mentors can view, approve, and adjust hours.
3. School admins can seamlessly add or manage users and placements.
4. Trust admins can generate cross-school reports.
5. The system complies with GDPR requirements.
6. Stakeholders can generate detailed reports quickly.

---

## Justifications and Alternatives

### Messaging System
- **Chosen**: Internal messaging to streamline communication.
- **Rejected**: External email integration for added complexity and potential security issues.

### Hosting
- **Chosen**: Cloud-based solution for scalability.
- **Rejected**: On-premises hosting for higher maintenance and cost.

### Development Approach
- **Chosen**: Agile methodology for iterative improvements.
- **Rejected**: Waterfall methodology for lack of flexibility.
