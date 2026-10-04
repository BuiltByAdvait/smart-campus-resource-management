<?php

require_once __DIR__ . '/../../../CONTROL/error-handling/application.php';
$controllerResult = load_controller(__DIR__ . '/../../../CONTROL/controllers/room_controller.php');
$data = $controllerResult['data'] ?: ['rooms' => [], 'buildings' => [], 'room_types' => [], 'statuses' => []];
$loadError = $controllerResult['error'];

$currentPage = 'rooms';

$rooms = $data['rooms'];
$buildings = $data['buildings'];
$roomTypes = $data['room_types'];
$statuses = $data['statuses'];

$search = $_GET['search'] ?? '';
$building = $_GET['building'] ?? '';
$type = $_GET['type'] ?? '';
$status = $_GET['status'] ?? '';
$sort = $_GET['sort'] ?? 'room';

function e($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rooms - Smart Campus</title>

    <link rel="stylesheet" href="../assets/css/app.css">
</head>

<body>

<?php require_once __DIR__ . '/../includes/sidebar.php'; ?>

<main class="main">

    <?php if ($loadError): ?><div class="notice notice-error" role="alert"><?= h($loadError) ?></div><?php endif; ?>

    <div class="page-content">

        <!-- Page Header -->
        <section class="page-header">

            <div>
                <div class="page-eyebrow">RESOURCES</div>

                <h1 class="page-title">
                    Rooms
                </h1>

                <p class="page-subtitle">
                    Explore campus rooms, facilities and availability.
                </p>
            </div>

            <div class="page-count">
                <strong><?= count($rooms) ?></strong> rooms
            </div>

        </section>


        <!-- Filters -->
        <form method="GET" class="room-filters">

            <input
                type="text"
                name="search"
                placeholder="Search by room, building or campus..."
                value="<?= e($search) ?>"
            >

            <select name="building">

                <option value="">
                    All Buildings
                </option>

                <?php foreach ($buildings as $item): ?>

                    <option
                        value="<?= e($item['building_id']) ?>"
                        <?= $building == $item['building_id'] ? 'selected' : '' ?>
                    >
                        <?= e($item['building_name']) ?>
                    </option>

                <?php endforeach; ?>

            </select>


            <select name="type">

                <option value="">
                    All Room Types
                </option>

                <?php foreach ($roomTypes as $roomType): ?>

                    <option
                        value="<?= e($roomType) ?>"
                        <?= $type === $roomType ? 'selected' : '' ?>
                    >
                        <?= e($roomType) ?>
                    </option>

                <?php endforeach; ?>

            </select>


            <select name="status">

                <option value="">
                    All Status
                </option>

                <?php foreach ($statuses as $roomStatus): ?>

                    <option
                        value="<?= e($roomStatus) ?>"
                        <?= $status === $roomStatus ? 'selected' : '' ?>
                    >
                        <?= e($roomStatus) ?>
                    </option>

                <?php endforeach; ?>

            </select>


            <select name="sort">

                <option
                    value="room"
                    <?= $sort === 'room' ? 'selected' : '' ?>
                >
                    Sort by Room
                </option>

                <option
                    value="capacity"
                    <?= $sort === 'capacity' ? 'selected' : '' ?>
                >
                    Sort by Capacity
                </option>

                <option
                    value="building"
                    <?= $sort === 'building' ? 'selected' : '' ?>
                >
                    Sort by Building
                </option>

                <option
                    value="type"
                    <?= $sort === 'type' ? 'selected' : '' ?>
                >
                    Sort by Type
                </option>

                <option
                    value="status"
                    <?= $sort === 'status' ? 'selected' : '' ?>
                >
                    Sort by Status
                </option>

            </select>


            <button
                type="submit"
                class="apply-button"
            >
                Apply
            </button>

        </form>


        <!-- Room Directory -->
        <section class="room-table-card">

            <div class="room-directory-header">

                <div>

                    <h2>
                        Room Directory
                    </h2>

                    <p>
                        <?= count($rooms) ?> rooms found
                    </p>

                </div>

            </div>


            <div class="table-wrap">

                <table class="room-table">

                    <thead>

                        <tr>

                            <th>ID</th>

                            <th>Room</th>

                            <th>Building</th>

                            <th>Floor</th>

                            <th>Type</th>

                            <th>Capacity</th>

                            <th>Status</th>

                        </tr>

                    </thead>


                    <tbody>

                    <?php if (!empty($rooms)): ?>

                        <?php foreach ($rooms as $room): ?>

                            <tr>

                                <!-- ID -->
                                <td>

                                    <span class="room-id">
                                        <?= e($room['room_id']) ?>
                                    </span>

                                </td>


                                <!-- Room -->
                                <td>

                                    <div class="room-info">

                                        <div class="room-icon">
                                            R
                                        </div>

                                        <div>

                                            <div class="room-name">
                                                <?= e($room['room_name']) ?>
                                            </div>

                                            <div class="room-number">
                                                Room <?= e($room['room_number']) ?>
                                            </div>

                                        </div>

                                    </div>

                                </td>


                                <!-- Building -->
                                <td>

                                    <div class="room-building">

                                        <div class="room-building-name">
                                            <?= e($room['building_name']) ?>
                                        </div>

                                        <div class="room-campus">
                                            <?= e($room['campus_name']) ?>
                                        </div>

                                    </div>

                                </td>


                                <!-- Floor -->
                                <td>

                                    <span class="floor-badge">

                                        <?= e(
                                            $room['floor_name']
                                                ?: 'Floor ' . $room['floor_number']
                                        ) ?>

                                    </span>

                                </td>


                                <!-- Type -->
                                <td>

                                    <span class="room-type-badge">
                                        <?= e($room['room_type']) ?>
                                    </span>

                                </td>


                                <!-- Capacity -->
                                <td>

                                    <span class="capacity-number">
                                        <?= e($room['capacity']) ?>
                                    </span>

                                    <span class="capacity-label">
                                        seats
                                    </span>

                                </td>


                                <!-- Status -->
                                <td>

                                    <span class="room-status status-<?= strtolower(e($room['status'])) ?>">
                                        <?= e($room['status']) ?>
                                    </span>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="7">

                                <div class="empty-state">

                                    <div class="empty-icon">
                                        🏫
                                    </div>

                                    <strong>
                                        No rooms found
                                    </strong>

                                    <span>
                                        Try changing your search or filters.
                                    </span>

                                </div>

                            </td>

                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </section>

    </div>

</main>

</body>
</html>
