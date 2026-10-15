# Outcome-Based Education Accreditation Management System (OBE-AMS)
### Feature Specification Document

**Accreditation Framework:** Sydney Accord (Engineering Technology Programs)
**Regulatory Context (Pakistan):** National Technology Council (NTC)
**Scope:** Single University with multiple Faculties, Departments, and Programs
**Authorization:** Full Role-Based Access Control (RBAC)

---

## 1. Purpose

OBE-AMS digitizes the entire Outcome-Based Education lifecycle for a university so that programs can plan, measure, and improve learning outcomes and stay accreditation-ready under the Sydney Accord. It removes manual Excel-based attainment calculations and gives every stakeholder (from faculty to QEC) a single source of truth with proper audit trails and one-click reports.

---

## 2. Accreditation Context (Sydney Accord)

- Supports the **12 Graduate Attributes (GAs)** mapped as Program Learning Outcomes (PLOs).
- Supports the full OBE chain: **Vision/Mission → PEOs → PLOs (GAs) → CLOs → Assessments → Attainment → CQI**.
- Supports **Knowledge Profiles (SK1-SK8)**, **Complex Problem Solving attributes (SP)**, and **Complex Engineering Activities (EA)** tagging per course (Sydney Accord ranges).
- Supports **Bloom's Taxonomy** levels per CLO (Cognitive, Affective, Psychomotor).
- Supports both **Direct** (exams, assignments, labs, projects) and **Indirect** (surveys) assessment, as required by NTC.
- Generates accreditation-ready evidence: attainment reports, CQI records, course files, and OBE matrices.

---

## 3. Academic Hierarchy (Multi-Level)

```
University
  └── Faculty (e.g., Faculty of Engineering Technology)
        └── Department (e.g., Electrical Technology)
              └── Program (e.g., B.Tech Electrical)
                    └── Batch / Session (e.g., 2023-2027)
                          └── Semester (e.g., Fall 2026)
                                └── Course Offering
                                      └── Section (A / B / C)
```

Each level is independently manageable with its own admins and data isolation.

---

## 4. User Roles

| Role | Description |
|------|-------------|
| **Super Admin** | System owner. Manages university-wide settings, users, roles, backups. |
| **QEC / OBE Director** | Quality Enhancement Cell head. University-wide OBE oversight, accreditation reports, policy thresholds. |
| **Dean (Faculty Head)** | Oversees all departments under one faculty. Reviews faculty-level attainment. |
| **HOD (Department Head)** | Manages one department: programs, courses, faculty assignment, approvals. |
| **Program / OBE Coordinator** | Maintains PEOs, PLOs, CLO mappings, and curriculum for a program. |
| **Faculty / Teacher** | Defines CLOs, enters assessments and marks, views own attainment. |
| **Exam / Assessment Cell** | Manages exam schedules, verifies marks, locks results. |
| **Student** (optional) | Fills surveys, views own CLO attainment and feedback. |
| **External Examiner / Auditor** | Read-only access to reports and evidence during accreditation visits. |

Roles are configurable; permissions can be fine-tuned per role (see Section 15).

---

## 5. Module: University & Setup

- University profile (name, logo, address, accreditation IDs).
- Create/manage Faculties, Departments, Programs.
- Manage Batches/Sessions, Semesters (active/archived), Sections.
- Academic calendar (semester start/end, assessment windows).
- Grading scheme setup (GPA scale, marks-to-grade mapping).
- Global attainment thresholds (configurable, see Section 11).
- Multi-campus support (optional).

---

## 6. Module: User & Role Management (RBAC)

- Create users, assign one or multiple roles.
- Scope-based access (a HOD only sees their department's data).
- Permission matrix per role (create/read/update/delete per module).
- Bulk import users via CSV/Excel.
- Password policies, email invites, account activation.
- Login activity and session management.

---

## 7. Module: OBE Framework Setup

- **Vision & Mission** entry for University, Faculty, Department, and each Program.
- **PEOs** (Program Educational Objectives) per program.
- **PLOs / Graduate Attributes** (Sydney Accord 12 GAs) per program.
- **PEO ↔ PLO mapping matrix** (correlation levels: 1=low, 2=medium, 3=high).
- **PEO ↔ Mission mapping matrix**.
- Versioning of OBE framework (when PLOs/PEOs change across accreditation cycles).

---

## 8. Module: Curriculum & Course Management

- Course catalog per program (code, title, credit hours, theory/lab split).
- Course categorization (core, elective, lab, project).
- Pre-requisite and co-requisite linking.
- Semester-wise scheme of studies (roadmap).
- Course Offerings: assign course to semester + section + instructor.
- Course outline / syllabus upload.
- Knowledge Profile (SK), Complex Problem (SP), Complex Activity (EA) tagging per course.

---

## 9. Module: Course Learning Outcomes (CLOs)

- Define CLOs per course offering.
- Assign Bloom's Taxonomy level and domain to each CLO.
- **CLO ↔ PLO mapping matrix** (correlation strength).
- **CLO ↔ Assessment mapping** (which assessment measures which CLO).
- CLO target/threshold per course.
- Copy CLOs from a previous offering (reuse across semesters).
- Approval workflow (Coordinator/HOD approves CLOs before use).

---

## 10. Module: Assessment Management

- Define assessment types: Quiz, Assignment, Mid-term, Final, Lab, Project, Presentation, Viva.
- Set weightage per assessment type (configurable, must total 100%).
- Rubric builder for qualitative assessments (labs, projects, FYP).
- Map each assessment (or each question) to CLOs.
- Question-wise marks distribution (CLO attainment at question level).
- Assessment schedule and due dates.
- Marks entry screen (per student, per assessment).
- Bulk marks upload via Excel template.
- Marks verification and locking by Exam Cell.

---

## 11. Module: Attainment Engine (Core)

- **CLO Attainment** calculation:
  - % of students achieving the CLO threshold on mapped assessments.
  - Both average-based and percentage-of-students-above-threshold methods.
- **PLO Attainment** calculation (rolled up from CLOs via mapping weights).
- **Direct + Indirect** combination (e.g., 80% direct + 20% survey, configurable).
- Program-level PLO attainment (aggregated across all courses).
- Configurable thresholds at CLO, PLO, and program level.
- Attainment status indicators (Achieved / Partially Achieved / Not Achieved).
- Historical attainment comparison across semesters/batches.
- Transparent calculation breakdown (so auditors can verify numbers).

---

## 12. Module: Indirect Assessment (Surveys)

- Survey builder (course-exit, program-exit, alumni, employer surveys).
- Likert-scale and open-ended questions mapped to PLOs.
- Distribute surveys to students/alumni/employers via links.
- Auto-calculate indirect PLO attainment from survey responses.
- Response tracking and reminders.

---

## 13. Module: CQI (Continuous Quality Improvement)

- Auto-flag CLOs/PLOs below threshold.
- Record improvement actions per course (what went wrong, corrective action).
- Assign action owners and deadlines.
- Track action status (open, in-progress, closed) across semesters.
- Close-the-loop evidence (did the action improve next cycle's attainment?).
- CQI reports for accreditation.

---

## 14. Module: Dashboards & Reports

**Dashboards (role-specific):**
- Super Admin: university-wide health, user stats.
- QEC: program-wise PLO attainment heatmaps.
- Dean/HOD: department/faculty attainment overview.
- Faculty: own courses' CLO attainment.

**Reports (PDF/Excel export):**
- Course File / Course Portfolio (complete OBE evidence per course).
- CLO Attainment report.
- PLO Attainment report (direct, indirect, combined).
- PEO-PLO-CLO mapping matrices.
- Program attainment summary.
- CQI report.
- Charts: bar, radar (for GAs), trend lines.
- Accreditation evidence bundle (one-click export).

---

## 15. Role-Permission Matrix (Summary)

| Module | Super Admin | QEC | Dean | HOD | Coordinator | Faculty | Exam Cell | Student |
|--------|:-----------:|:---:|:----:|:---:|:-----------:|:-------:|:---------:|:-------:|
| University Setup | Full | View | - | - | - | - | - | - |
| Users & Roles | Full | View | View | Dept | - | - | - | - |
| PEOs / PLOs | Full | Full | View | View | Edit | View | - | - |
| Courses / CLOs | Full | View | View | Approve | Edit | Edit | - | View |
| Assessments | Full | View | View | View | View | Edit | Verify | - |
| Marks Entry | Full | - | - | View | - | Edit | Verify | View own |
| Attainment | Full | Full | View | View | View | View own | - | View own |
| Surveys | Full | Full | View | View | Edit | View | - | Respond |
| CQI | Full | Full | View | Edit | Edit | Edit | - | - |
| Reports | Full | Full | Faculty | Dept | Program | Own | - | Own |

*(This is a default; permissions remain configurable.)*

---

## 16. System-Wide / Non-Functional Features

- **Audit logs** (who changed what, when) for accreditation integrity.
- **Notifications** (email + in-app) for deadlines, approvals, low attainment.
- **Approval workflows** (CLOs, marks, CQI actions).
- **Data import/export** (Excel/CSV everywhere).
- **Backup & restore**.
- **Search & filters** across all modules.
- **Responsive UI** (desktop-first, tablet-friendly).
- **Multi-year data retention** (archive old batches, keep evidence).
- **Settings** for thresholds, weightages, grading, branding.

---

## 17. Recommended Tech Stack

| Layer | Choice | Reason |
|-------|--------|--------|
| Backend + Admin | **Laravel + Filament v5** | Fast CRUD, dashboards, RBAC out of the box |
| Authorization | **Filament Shield** | Role/permission management |
| Database | **MySQL / PostgreSQL** | Relational, good for mappings |
| Charts | **ApexCharts / Chart.js** | Attainment visualizations |
| PDF Reports | **Laravel DomPDF / Spatie PDF** | Accreditation reports |
| Excel | **Laravel Excel (Maatwebsite)** | Import/export |
| Deployment | **VPS (Hostinger/your server)** | Full control |

---

## 18. Suggested Build Phases (1 - 1.5 Months)

- **Phase 1 (Week 1):** DB schema, auth, RBAC, university/academic hierarchy setup.
- **Phase 2 (Week 2):** OBE framework (PEOs, PLOs, mappings), courses, CLOs.
- **Phase 3 (Week 3):** Assessments, marks entry, attainment engine.
- **Phase 4 (Week 4):** Dashboards, reports (PDF/Excel), surveys.
- **Phase 5 (Week 5-6):** CQI, audit logs, polish, testing, demo data.

---

## 19. Optional / Future Enhancements

- Student portal (view attainment, feedback).
- Mobile app.
- AI-based CQI suggestions (analyze weak CLOs, suggest actions).
- Timetable / attendance integration.
- Multi-accreditation support (Washington Accord / Dublin Accord toggle).
- LMS integration (Moodle/Google Classroom).
- Automated course-file generation.

---

*Document prepared as a feature blueprint for OBE-AMS. Scope and thresholds should be finalized with the university's QEC before development.*
