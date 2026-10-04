<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../../../CONTROL/error-handling/application.php';
$controllerResult = load_controller(__DIR__ . '/../../../CONTROL/controllers/building_controller.php');
$data = $controllerResult['data'] ?: ['buildings' => [], 'campuses' => [], 'building_types' => []];
$loadError = $controllerResult['error'];

$buildings = $data['buildings'];
$campuses = $data['campuses'];
$buildingTypes = $data['building_types'];

$search = $_GET['search'] ?? '';
$campus = $_GET['campus'] ?? '';
$type = $_GET['type'] ?? '';
$sort = $_GET['sort'] ?? 'name';

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

    <title>Buildings - Smart Campus</title>

    <link rel="stylesheet" href="../assets/css/app.css">

</head>

<body>

<?php require_once __DIR__ . '/../includes/sidebar.php'; ?>

<main class="main">

    <?php if ($loadError): ?><div class="notice notice-error" role="alert"><?= h($loadError) ?></div><?php endif; ?>

    <div class="page-content">

        <!-- PAGE HEADER -->

        <section class="page-header">

            <div>

                <div class="page-eyebrow">
                    RESOURCES
                </div>

                <h1 class="page-title">
                    Buildings
                </h1>

                <p class="page-subtitle">
                    Explore campus buildings and their available resources.
                </p>

            </div>

            <div class="page-count">

                <strong><?= count($buildings) ?></strong>

                buildings

            </div>

        </section>


        <!-- FILTERS -->

        <form method="GET" class="building-filters">

            <input
                type="text"
                name="search"
                placeholder="Search by building name, code or campus..."
                value="<?= e($search) ?>"
            >

            <select name="campus">

                <option value="">
                    All Campuses
                </option>

                <?php foreach ($campuses as $item): ?>

                    <option
                        value="<?= e($item['campus_code']) ?>"
                        <?= $campus === $item['campus_code'] ? 'selected' : '' ?>
                    >
                        <?= e($item['campus_name']) ?>
                    </option>

                <?php endforeach; ?>

            </select>


            <select name="type">

                <option value="">
                    All Types
                </option>

                <?php foreach ($buildingTypes as $buildingType): ?>

                    <option
                        value="<?= e($buildingType) ?>"
                        <?= $type === $buildingType ? 'selected' : '' ?>
                    >
                        <?= e($buildingType) ?>
                    </option>

                <?php endforeach; ?>

            </select>


            <select name="sort">

                <option value="name" <?= $sort === 'name' ? 'selected' : '' ?>>
                    Sort by Name
                </option>

                <option value="code" <?= $sort === 'code' ? 'selected' : '' ?>>
                    Sort by Code
                </option>

                <option value="campus" <?= $sort === 'campus' ? 'selected' : '' ?>>
                    Sort by Campus
                </option>

                <option value="floors" <?= $sort === 'floors' ? 'selected' : '' ?>>
                    Most Floors
                </option>

                <option value="rooms" <?= $sort === 'rooms' ? 'selected' : '' ?>>
                    Most Rooms
                </option>

            </select>


            <button
                type="submit"
                class="apply-button"
            >
                Apply
            </button>

        </form>


        <!-- BUILDING TABLE -->

        <section class="building-table-card">

            <div class="table-heading">

                <div>

                    <h2>
                        Building Directory
                    </h2>

                    <p>
                        <?= count($buildings) ?> buildings found
                    </p>

                </div>

            </div>


            <div class="table-wrap">

                <table class="building-table">

                    <thead>

                        <tr>

                            <th>ID</th>
                            <th>Building</th>
                            <th>Campus</th>
                            <th>Type</th>
                            <th>Floors</th>
                            <th>Rooms</th>

                        </tr>

                    </thead>


                    <tbody>

                    <?php if (!empty($buildings)): ?>

                        <?php foreach ($buildings as $building): ?>

                            <tr>

                                <td>

                                    <span class="building-id">
                                        <?= e($building['building_id']) ?>
                                    </span>

                                </td>


                                <td>

                                    <div class="building-info">

                                        <div class="building-icon">
                                            B
                                        </div>

                                        <div>

                                            <div class="building-name">
                                                <?= e($building['building_name']) ?>
                                            </div>

                                            <div class="building-code">
                                                <?= e($building['building_code']) ?>
                                            </div>

                                        </div>

                                    </div>

                                </td>


                                <td>

                                    <span class="campus-badge">
                                        <?= e($building['campus_name']) ?>
                                    </span>

                                </td>


                                <td>

                                    <span class="type-badge">
                                        <?= e($building['building_type']) ?>
                                    </span>

                                </td>


                                <td>

                                    <span class="resource-number">
                                        <?= e($building['total_floors']) ?>
                                    </span>

                                    <span class="resource-label">
                                        floors
                                    </span>

                                </td>


                                <td>

                                    <span class="resource-number">
                                        <?= e($building['total_rooms']) ?>
                                    </span>

                                    <span class="resource-label">
                                        rooms
                                    </span>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="6">

                                <div class="empty-state">

                                    <div class="empty-icon">
                                        🏢
                                    </div>

                                    <strong>
                                        No buildings found
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
