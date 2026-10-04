<?php

$search = $_GET['search'] ?? '';

$department = $_GET['department'] ?? '';

$designation = $_GET['designation'] ?? '';

$sort = $_GET['sort'] ?? 'name';


/*
|--------------------------------------------------------------------------
| Load Faculty Controller
|--------------------------------------------------------------------------
*/

require_once __DIR__ . '/../../../CONTROL/error-handling/application.php';
$controllerResult = load_controller(__DIR__ . '/../../../CONTROL/controllers/faculty_controller.php');
$faculty = $controllerResult['data'];
$loadError = $controllerResult['error'];


$currentPage = 'faculty';

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Faculty - Smart Campus</title>

    <link
        rel="stylesheet"
        href="/smart-campus/assets/css/app.css"
    >

</head>


<body>

<div class="layout">


    <?php

    require_once __DIR__ . '/../includes/sidebar.php';

    ?>


    <main class="main">

        <?php if ($loadError): ?><div class="notice notice-error" role="alert"><?= h($loadError) ?></div><?php endif; ?>

        <!-- PAGE HEADER -->

        <div class="page-header">

            <div>

                <div class="eyebrow">
                    PEOPLE
                </div>

                <h2>
                    Faculty
                </h2>

                <p>
                    Manage and explore campus teaching faculty.
                </p>

            </div>


            <div class="page-count">

                <strong>
                    <?= count($faculty) ?>
                </strong>

                <span>
                    faculty
                </span>

            </div>

        </div>


        <!-- FILTER BAR -->

        <div class="filter-card">

            <form
                method="GET"
                class="student-filters"
            >


                <!-- SEARCH -->

                <div class="search-box">

                    <span class="search-icon">
                        ⌕
                    </span>

                    <input
                        type="text"
                        name="search"
                        placeholder="Search by name, employee code or email..."
                        value="<?= htmlspecialchars($search) ?>"
                    >

                </div>


                <!-- DEPARTMENT -->

                <select name="department">

                    <option value="">
                        All Departments
                    </option>


                    <option
                        value="AIML"
                        <?= $department === 'AIML' ? 'selected' : '' ?>
                    >
                        AIML
                    </option>


                    <option
                        value="COMP"
                        <?= $department === 'COMP' ? 'selected' : '' ?>
                    >
                        Computer Engineering
                    </option>


                    <option
                        value="ENTC"
                        <?= $department === 'ENTC' ? 'selected' : '' ?>
                    >
                        ENTC
                    </option>


                    <option
                        value="MECH"
                        <?= $department === 'MECH' ? 'selected' : '' ?>
                    >
                        Mechanical Engineering
                    </option>


                    <option
                        value="CIVIL"
                        <?= $department === 'CIVIL' ? 'selected' : '' ?>
                    >
                        Civil Engineering
                    </option>


                    <option
                        value="ELEC"
                        <?= $department === 'ELEC' ? 'selected' : '' ?>
                    >
                        Electrical Engineering
                    </option>


                    <option
                        value="IT"
                        <?= $department === 'IT' ? 'selected' : '' ?>
                    >
                        Information Technology
                    </option>


                    <option
                        value="SCI"
                        <?= $department === 'SCI' ? 'selected' : '' ?>
                        >
                        Applied Sciences
                    </option>

                </select>


                <!-- DESIGNATION -->

                <select name="designation">

                    <option value="">
                        All Designations
                    </option>

                    <option
                        value="Professor"
                        <?= $designation === 'Professor' ? 'selected' : '' ?>
                    >
                        Professor
                    </option>

                    <option
                        value="Associate Professor"
                        <?= $designation === 'Associate Professor' ? 'selected' : '' ?>
                    >
                        Associate Professor
                    </option>

                    <option
                        value="Assistant Professor"
                        <?= $designation === 'Assistant Professor' ? 'selected' : '' ?>
                    >
                        Assistant Professor
                    </option>

                    <option
                        value="Lecturer"
                        <?= $designation === 'Lecturer' ? 'selected' : '' ?>
                    >
                        Lecturer
                    </option>

                </select>


                <!-- SORT -->

                <select name="sort">

                    <option
                        value="name"
                        <?= $sort === 'name' ? 'selected' : '' ?>
                    >
                        Sort by Name
                    </option>

                    <option
                        value="employee"
                        <?= $sort === 'employee' ? 'selected' : '' ?>
                    >
                        Sort by Employee Code
                    </option>

                    <option
                        value="department"
                        <?= $sort === 'department' ? 'selected' : '' ?>
                    >
                        Sort by Department
                    </option>

                    <option
                        value="designation"
                        <?= $sort === 'designation' ? 'selected' : '' ?>
                    >
                        Sort by Designation
                    </option>

                    <option
                        value="joining_date"
                        <?= $sort === 'joining_date' ? 'selected' : '' ?>
                    >
                        Sort by Joining Date
                    </option>

                </select>


                <button
                    type="submit"
                    class="primary-button"
                >
                    Apply
                </button>


                <?php if (
                    $search !== '' ||
                    $department !== '' ||
                    $designation !== '' ||
                    $sort !== 'name'
                ): ?>

                    <a
                        href="index.php"
                        class="reset-button"
                    >
                        Reset
                    </a>

                <?php endif; ?>


            </form>

        </div>


        <!-- FACULTY TABLE -->

        <div class="table-card">


            <div class="table-header">

                <h3>
                    Faculty Directory
                </h3>

                <p>

                    <?= count($faculty) ?>

                    <?= count($faculty) === 1 ? 'faculty member' : 'faculty members' ?>

                    found

                </p>

            </div>


            <div class="table-wrapper">

                <table class="data-table faculty-table">


                    <thead>

                        <tr>

                            <th>
                                ID
                            </th>

                            <th>
                                Employee Code
                            </th>

                            <th>
                                Faculty
                            </th>

                            <th>
                                Designation
                            </th>

                            <th>
                                Department
                            </th>

                            <th>
                                Email
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                    <?php if (count($faculty) > 0): ?>


                        <?php foreach ($faculty as $member): ?>


                            <tr>


                                <td>

                                    <span class="student-id">

                                        <?= htmlspecialchars(
                                            $member['faculty_id']
                                        ) ?>

                                    </span>

                                </td>


                                <td>

                                    <span class="enrollment">

                                        <?= htmlspecialchars(
                                            $member['employee_code']
                                        ) ?>

                                    </span>

                                </td>


                                <td>

                                    <div class="student-cell">


                                        <div class="avatar">

                                            <?= strtoupper(
                                                substr(
                                                    $member['faculty_name'],
                                                    0,
                                                    1
                                                )
                                            ) ?>

                                        </div>


                                        <div>

                                            <strong>

                                                <?= htmlspecialchars(
                                                    $member['faculty_name']
                                                ) ?>

                                            </strong>


                                            <span>

                                                <?= htmlspecialchars(
                                                    $member['email']
                                                ) ?>

                                            </span>

                                        </div>


                                    </div>

                                </td>


                                <td>

                                    <span class="semester-badge">

                                        <?= htmlspecialchars(
                                            $member['designation']
                                        ) ?>

                                    </span>

                                </td>


                                <td>

                                    <span class="department-badge">

                                        <?= htmlspecialchars(
                                            $member['department_name']
                                        ) ?>

                                    </span>

                                </td>


                                <td>

                                    <?= htmlspecialchars(
                                        $member['email']
                                    ) ?>

                                </td>


                            </tr>


                        <?php endforeach; ?>


                    <?php else: ?>


                        <tr>

                            <td
                                colspan="6"
                                class="empty-state"
                            >

                                <div class="empty-icon">
                                    ⌕
                                </div>

                                <strong>
                                    No faculty found
                                </strong>

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
