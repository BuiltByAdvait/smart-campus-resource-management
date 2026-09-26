<?php

$search = $_GET['search'] ?? '';
$department = $_GET['department'] ?? '';
$sort = $_GET['sort'] ?? 'name';

$students = require_once __DIR__ . '/../../../CONTROL/controllers/student_controller.php';

$currentPage = 'students';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Students - Smart Campus</title>

    <link
        rel="stylesheet"
        href="/smart-campus/assets/css/app.css"
    >

</head>

<body>

<div class="layout">

    <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>


    <main class="main">

        <!-- PAGE HEADER -->

        <div class="page-header">

            <div>
                <div class="eyebrow">PEOPLE</div>

                <h2>Students</h2>

                <p>
                    Manage and explore registered campus students.
                </p>
            </div>

            <div class="page-count">

                <strong><?= count($students) ?></strong>

                <span>students</span>

            </div>

        </div>


        <!-- FILTER BAR -->

        <div class="filter-card">

            <form method="GET" class="student-filters">

                <div class="search-box">

                    <span class="search-icon">⌕</span>

                    <input
                        type="text"
                        name="search"
                        placeholder="Search by name or enrollment..."
                        value="<?= htmlspecialchars($search) ?>"
                    >

                </div>


                <select name="department">

                    <option value="">All Departments</option>

                    <option value="AIML" <?= $department === 'AIML' ? 'selected' : '' ?>>
                        AIML
                    </option>

                    <option value="COMP" <?= $department === 'COMP' ? 'selected' : '' ?>>
                        Computer Engineering
                    </option>

                    <option value="ENTC" <?= $department === 'ENTC' ? 'selected' : '' ?>>
                        ENTC
                    </option>

                    <option value="MECH" <?= $department === 'MECH' ? 'selected' : '' ?>>
                        Mechanical Engineering
                    </option>

                    <option value="CIVIL" <?= $department === 'CIVIL' ? 'selected' : '' ?>>
                        Civil Engineering
                    </option>

                    <option value="ELEC" <?= $department === 'ELEC' ? 'selected' : '' ?>>
                        Electrical Engineering
                    </option>

                    <option value="IT" <?= $department === 'IT' ? 'selected' : '' ?>>
                        Information Technology
                    </option>

                    <option value="SCI" <?= $department === 'SCI' ? 'selected' : '' ?>>
                        Applied Sciences
                    </option>

                </select>


                <select name="sort">

                    <option value="name" <?= $sort === 'name' ? 'selected' : '' ?>>
                        Name
                    </option>

                    <option value="enrollment" <?= $sort === 'enrollment' ? 'selected' : '' ?>>
                        Enrollment
                    </option>

                    <option value="department" <?= $sort === 'department' ? 'selected' : '' ?>>
                        Department
                    </option>

                    <option value="semester" <?= $sort === 'semester' ? 'selected' : '' ?>>
                        Semester
                    </option>

                </select>


                <button type="submit" class="primary-button">
                    Apply
                </button>


                <?php if ($search !== '' || $department !== '' || $sort !== 'name'): ?>

                    <a href="index.php" class="reset-button">
                        Reset
                    </a>

                <?php endif; ?>

            </form>

        </div>


        <!-- STUDENT TABLE -->

        <div class="table-card">

            <div class="table-header">

                <div>

                    <h3>Student Directory</h3>

                    <p>
                        <?= count($students) ?>
                        <?= count($students) === 1 ? 'student' : 'students' ?>
                        found
                    </p>

                </div>

            </div>


            <div class="table-wrapper">

                <table class="data-table">

                    <thead>

                        <tr>

                            <th>ID</th>

                            <th>Enrollment</th>

                            <th>Student</th>

                            <th>Gender</th>

                            <th>Semester</th>

                            <th>Department</th>

                        </tr>

                    </thead>


                    <tbody>

                    <?php if (count($students) > 0): ?>

                        <?php foreach ($students as $student): ?>

                            <tr>

                                <td>
                                    <span class="student-id">
                                        <?= htmlspecialchars($student['student_id']) ?>
                                    </span>
                                </td>


                                <td>

                                    <span class="enrollment">

                                        <?= htmlspecialchars($student['enrollment_no']) ?>

                                    </span>

                                </td>


                                <td>

                                    <div class="student-cell">

                                        <div class="avatar">

                                            <?= strtoupper(
                                                substr($student['student_name'], 0, 1)
                                            ) ?>

                                        </div>

                                        <div>

                                            <strong>
                                                <?= htmlspecialchars($student['student_name']) ?>
                                            </strong>

                                            <span>
                                                Semester <?= htmlspecialchars($student['semester']) ?>
                                            </span>

                                        </div>

                                    </div>

                                </td>


                                <td>
                                    <?= htmlspecialchars($student['gender']) ?>
                                </td>


                                <td>

                                    <span class="semester-badge">

                                        Sem <?= htmlspecialchars($student['semester']) ?>

                                    </span>

                                </td>


                                <td>

                                    <span class="department-badge">

                                        <?= htmlspecialchars($student['department_name']) ?>

                                    </span>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="6" class="empty-state">

                                <div class="empty-icon">⌕</div>

                                <strong>No students found</strong>

                                <span>
                                    Try changing your search or filters.
                                </span>

                            </td>

                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </main>

</div>

</body>

</html>