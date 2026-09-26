<?php
require_once __DIR__ . '/../../CONTROL/db/connection.php';

function getCount($conn, $table) {
    $result = $conn->query("SELECT COUNT(*) AS total FROM $table");

    if (!$result) {
        return 0;
    }

    $row = $result->fetch_assoc();
    return (int) $row['total'];
}

$students = getCount($conn, 'STUDENT');
$faculty = getCount($conn, 'FACULTY');
$rooms = getCount($conn, 'ROOM');
$labs = getCount($conn, 'LAB');
$computers = getCount($conn, 'COMPUTER');
$equipment = getCount($conn, 'EQUIPMENT');
$maintenance = getCount($conn, 'MAINTENANCE_REQUEST');
$complaints = getCount($conn, 'COMPLAINT');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Smart Campus</title>
    <link rel="stylesheet" href="/smart-campus/assets/css/app.css">
</head>

<body>

<div class="layout">

<?php
$currentPage = 'dashboard';
require_once __DIR__ . '/includes/sidebar.php';
?>


    <main class="main">

        <div class="topbar">

            <div>
                <h2>Campus Overview</h2>
                <p>Here's what's happening across Smart Campus.</p>
            </div>

            <div class="profile">
                Administrator
            </div>

        </div>


        <!-- STATISTICS -->

        <section class="stats">

            <div class="card">
                <div class="stat-label">Students</div>
                <div class="stat-value"><?= $students ?></div>
                <div class="stat-meta">Registered students</div>
            </div>

            <div class="card">
                <div class="stat-label">Faculty</div>
                <div class="stat-value"><?= $faculty ?></div>
                <div class="stat-meta">Teaching staff</div>
            </div>

            <div class="card">
                <div class="stat-label">Rooms</div>
                <div class="stat-value"><?= $rooms ?></div>
                <div class="stat-meta">Campus rooms</div>
            </div>

            <div class="card">
                <div class="stat-label">Labs</div>
                <div class="stat-value"><?= $labs ?></div>
                <div class="stat-meta">Active laboratories</div>
            </div>

        </section>


        <section class="stats">

            <div class="card">
                <div class="stat-label">Computers</div>
                <div class="stat-value"><?= $computers ?></div>
                <div class="stat-meta">Registered systems</div>
            </div>

            <div class="card">
                <div class="stat-label">Equipment</div>
                <div class="stat-value"><?= $equipment ?></div>
                <div class="stat-meta">Campus equipment</div>
            </div>

            <div class="card">
                <div class="stat-label">Maintenance</div>
                <div class="stat-value"><?= $maintenance ?></div>
                <div class="stat-meta">Maintenance requests</div>
            </div>

            <div class="card">
                <div class="stat-label">Complaints</div>
                <div class="stat-value"><?= $complaints ?></div>
                <div class="stat-meta">Reported complaints</div>
            </div>

        </section>


        <!-- MAIN CONTENT -->

        <div class="content-grid">

            <div class="card">

                <div class="section-title">
                    Resource Overview
                </div>

                <div class="resource-row">
                    <div>
                        <div class="resource-name">Buildings</div>
                        <div class="resource-desc">
                            Campus infrastructure
                        </div>
                    </div>

                    <div class="resource-count">
                        8
                    </div>
                </div>

                <div class="resource-row">
                    <div>
                        <div class="resource-name">Rooms</div>
                        <div class="resource-desc">
                            Teaching and activity spaces
                        </div>
                    </div>

                    <div class="resource-count">
                        <?= $rooms ?>
                    </div>
                </div>

                <div class="resource-row">
                    <div>
                        <div class="resource-name">Laboratories</div>
                        <div class="resource-desc">
                            Specialized campus labs
                        </div>
                    </div>

                    <div class="resource-count">
                        <?= $labs ?>
                    </div>
                </div>

                <div class="resource-row">
                    <div>
                        <div class="resource-name">Computers</div>
                        <div class="resource-desc">
                            Lab computing systems
                        </div>
                    </div>

                    <div class="resource-count">
                        <?= $computers ?>
                    </div>
                </div>

            </div>


            <div class="card">

                <div class="section-title">
                    Quick Access
                </div>

                <div class="quick-links">

                    <a href="/smart-campus/students/" class="quick-link">
                        <strong>Manage Students</strong>
                        <span>View, search and filter students</span>
                    </a>

                    <a href="#" class="quick-link">
                        <strong>Manage Resources</strong>
                        <span>Rooms, labs and equipment</span>
                    </a>

                    <a href="#" class="quick-link">
                        <strong>Maintenance</strong>
                        <span>Track campus maintenance requests</span>
                    </a>

                    <a href="#" class="quick-link">
                        <strong>Complaints</strong>
                        <span>Review reported complaints</span>
                    </a>

                </div>

            </div>

        </div>

    </main>

</div>

</body>
</html>