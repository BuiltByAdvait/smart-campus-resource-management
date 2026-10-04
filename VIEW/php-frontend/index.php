<?php
require_once __DIR__ . '/../../CONTROL/error-handling/application.php';
$dashboardResult = load_controller(__DIR__ . '/../../CONTROL/controllers/dashboard_controller.php');
$dashboard = $dashboardResult['data'] ?? [];
$dashboardError = $dashboardResult['error'];

$students = $dashboard['students'] ?? 0;
$faculty = $dashboard['faculty'] ?? 0;
$buildings = $dashboard['buildings'] ?? 0;
$rooms = $dashboard['rooms'] ?? 0;
$labs = $dashboard['labs'] ?? 0;
$computers = $dashboard['computers'] ?? 0;
$equipment = $dashboard['equipment'] ?? 0;
$inventory = $dashboard['inventory'] ?? 0;
$bookings = $dashboard['bookings'] ?? 0;
$events = $dashboard['events'] ?? 0;
$maintenance = $dashboard['maintenance'] ?? 0;
$complaints = $dashboard['complaints'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Smart Campus</title>
    <link rel="stylesheet" href="/smart-campus/assets/css/app.css">
    <link rel="stylesheet" href="assets/css/app.css">
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
                <p>Real-time metrics and operations across Smart Campus.</p>
            </div>

            <div class="profile">
                Administrator
            </div>
        </div>

        <?php if ($dashboardError): ?>
            <div class="notice notice-error" role="alert"><?= h($dashboardError) ?></div>
        <?php endif; ?>

        <!-- STATISTICS: PEOPLE & FACILITIES -->
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
                <div class="stat-label">Buildings</div>
                <div class="stat-value"><?= $buildings ?></div>
                <div class="stat-meta">Campus structures</div>
            </div>

            <div class="card">
                <div class="stat-label">Rooms</div>
                <div class="stat-value"><?= $rooms ?></div>
                <div class="stat-meta">Teaching & lab spaces</div>
            </div>
        </section>

        <!-- STATISTICS: RESOURCES & IT -->
        <section class="stats">
            <div class="card">
                <div class="stat-label">Laboratories</div>
                <div class="stat-value"><?= $labs ?></div>
                <div class="stat-meta">Specialized labs</div>
            </div>

            <div class="card">
                <div class="stat-label">Computers</div>
                <div class="stat-value"><?= $computers ?></div>
                <div class="stat-meta">Lab workstations</div>
            </div>

            <div class="card">
                <div class="stat-label">Equipment</div>
                <div class="stat-value"><?= $equipment ?></div>
                <div class="stat-meta">Tracked physical assets</div>
            </div>

            <div class="card">
                <div class="stat-label">Inventory</div>
                <div class="stat-value"><?= $inventory ?></div>
                <div class="stat-meta">Consumable stock items</div>
            </div>
        </section>

        <!-- STATISTICS: OPERATIONS -->
        <section class="stats">
            <div class="card">
                <div class="stat-label">Active Bookings</div>
                <div class="stat-value"><?= $bookings ?></div>
                <div class="stat-meta">Room reservations</div>
            </div>

            <div class="card">
                <div class="stat-label">Events</div>
                <div class="stat-value"><?= $events ?></div>
                <div class="stat-meta">Scheduled campus events</div>
            </div>

            <div class="card">
                <div class="stat-label">Maintenance</div>
                <div class="stat-value"><?= $maintenance ?></div>
                <div class="stat-meta">Reported service tickets</div>
            </div>

            <div class="card">
                <div class="stat-label">Complaints</div>
                <div class="stat-value"><?= $complaints ?></div>
                <div class="stat-meta">Campus complaints</div>
            </div>
        </section>

        <!-- MAIN CONTENT -->
        <div class="content-grid">
            <div class="card">
                <div class="section-title">
                    Resource Summary
                </div>

                <div class="resource-row">
                    <div>
                        <div class="resource-name">Buildings</div>
                        <div class="resource-desc">Campus blocks & structures</div>
                    </div>
                    <div class="resource-count"><?= $buildings ?></div>
                </div>

                <div class="resource-row">
                    <div>
                        <div class="resource-name">Rooms</div>
                        <div class="resource-desc">Classrooms, seminar halls & offices</div>
                    </div>
                    <div class="resource-count"><?= $rooms ?></div>
                </div>

                <div class="resource-row">
                    <div>
                        <div class="resource-name">Laboratories</div>
                        <div class="resource-desc">Computing, engineering & science labs</div>
                    </div>
                    <div class="resource-count"><?= $labs ?></div>
                </div>

                <div class="resource-row">
                    <div>
                        <div class="resource-name">Computers</div>
                        <div class="resource-desc">Active desktop workstations</div>
                    </div>
                    <div class="resource-count"><?= $computers ?></div>
                </div>

                <div class="resource-row">
                    <div>
                        <div class="resource-name">Equipment</div>
                        <div class="resource-desc">Projectors, network devices & lab tools</div>
                    </div>
                    <div class="resource-count"><?= $equipment ?></div>
                </div>

                <div class="resource-row">
                    <div>
                        <div class="resource-name">Inventory Items</div>
                        <div class="resource-desc">Stationery, peripherals & supplies</div>
                    </div>
                    <div class="resource-count"><?= $inventory ?></div>
                </div>
            </div>

            <div class="card">
                <div class="section-title">
                    Quick Access
                </div>

                <div class="quick-links">
                    <a href="/smart-campus/students/" class="quick-link">
                        <strong>Manage Students</strong>
                        <span>View, search and filter student records</span>
                    </a>

                    <a href="/smart-campus/faculty/" class="quick-link">
                        <strong>Faculty Directory</strong>
                        <span>Explore academic departments and staff</span>
                    </a>

                    <a href="/smart-campus/labs/" class="quick-link">
                        <strong>Manage Laboratories</strong>
                        <span>Labs, capacity and departmental ownership</span>
                    </a>

                    <a href="/smart-campus/computers/" class="quick-link">
                        <strong>Computing Assets</strong>
                        <span>System specs, storage and lab allocation</span>
                    </a>

                    <a href="/smart-campus/bookings/" class="quick-link">
                        <strong>Room Bookings</strong>
                        <span>Manage reservations and schedules</span>
                    </a>

                    <a href="/smart-campus/maintenance/" class="quick-link">
                        <strong>Maintenance Tickets</strong>
                        <span>Track repairs, technicians and status</span>
                    </a>

                    <a href="/smart-campus/complaints/" class="quick-link">
                        <strong>Complaints Management</strong>
                        <span>Review reported issues and resolutions</span>
                    </a>
                </div>
            </div>
        </div>

    </main>

</div>

</body>
</html>
