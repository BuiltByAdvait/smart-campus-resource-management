<?php

$search = $_GET['search'] ?? '';
$department = $_GET['department'] ?? '';
$sort = $_GET['sort'] ?? 'name';


// Load student controller
$students = require_once __DIR__ . '/../../../CONTROL/controllers/student_controller.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Students - Smart Campus</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f5f7fa;
        }

        h1 {
            color: #1f2937;
        }

        .controls {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        input,
        select,
        button {
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            cursor: pointer;
            background: #1f2937;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #1f2937;
            color: white;
        }

        .count {
            margin-bottom: 15px;
            font-weight: bold;
        }

    </style>

</head>

<body>

    <h1>Smart Campus - Students</h1>

    <div class="controls">

        <form method="GET">

            <input
                type="text"
                name="search"
                placeholder="Search student..."
                value="<?= htmlspecialchars($search) ?>"
            >

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
                    Mechanical
                </option>

                <option value="CIVIL" <?= $department === 'CIVIL' ? 'selected' : '' ?>>
                    Civil
                </option>

                <option value="ELEC" <?= $department === 'ELEC' ? 'selected' : '' ?>>
                    Electrical
                </option>

                <option value="IT" <?= $department === 'IT' ? 'selected' : '' ?>>
                    IT
                </option>

                <option value="SCI" <?= $department === 'SCI' ? 'selected' : '' ?>>
                    Applied Sciences
                </option>

            </select>


            <select name="sort">

                <option value="name" <?= $sort === 'name' ? 'selected' : '' ?>>
                    Sort by Name
                </option>

                <option value="enrollment" <?= $sort === 'enrollment' ? 'selected' : '' ?>>
                    Sort by Enrollment
                </option>

                <option value="department" <?= $sort === 'department' ? 'selected' : '' ?>>
                    Sort by Department
                </option>

                <option value="semester" <?= $sort === 'semester' ? 'selected' : '' ?>>
                    Sort by Semester
                </option>

            </select>


            <button type="submit">
                Search
            </button>

            <a href="index.php">
                Reset
            </a>

        </form>

    </div>


    <div class="count">

        Total Results: <?= count($students) ?>

    </div>


    <table>

        <thead>

            <tr>
                <th>ID</th>
                <th>Enrollment No.</th>
                <th>Student Name</th>
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
                            <?= htmlspecialchars($student['student_id']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($student['enrollment_no']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($student['student_name']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($student['gender']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($student['semester']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($student['department_name']) ?>
                        </td>

                    </tr>

                <?php endforeach; ?>

            <?php else: ?>

                <tr>

                    <td colspan="6">
                        No students found.
                    </td>

                </tr>

            <?php endif; ?>

        </tbody>

    </table>

</body>

</html>