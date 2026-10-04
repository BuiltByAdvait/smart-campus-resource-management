<?php
/**
 * Reusable directory view. Each module supplies $page, $subtitle, $rows,
 * $columns, $filters and $sorts before including this file.
 */
require_once __DIR__ . '/../../../CONTROL/error-handling/application.php';

$search = trim($_GET['search'] ?? '');
$activeSort = $_GET['sort'] ?? array_key_first($sorts);
$currentPage = $page;

function directory_status_class($value)
{
    return strtolower(str_replace(['_', ' '], '-', trim((string) $value)));
}

function directory_date_value($value)
{
    if ($value === null) {
        return '&mdash;';
    }

    $value = trim((string) $value);

    if ($value === '' || $value === '0000-00-00' || $value === '0000-00-00 00:00:00') {
        return '&mdash;';
    }

    $timestamp = strtotime($value);

    if ($timestamp === false || $timestamp <= 0) {
        return '&mdash;';
    }

    return h(date('d M Y', $timestamp));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= h(ucfirst($page)) ?> - Smart Campus</title>
    <link rel="stylesheet" href="../assets/css/app.css">
</head>
<body>
<?php require __DIR__ . '/sidebar.php'; ?>
<main class="main">
    <?php if ($loadError): ?><div class="notice notice-error" role="alert"><?= h($loadError) ?></div><?php endif; ?>

    <div class="page-content">
        <section class="page-header">
            <div>
                <div class="page-eyebrow"><?= h($section) ?></div>

                <h1 class="page-title">
                    <?= h($title) ?>
                </h1>

                <p class="page-subtitle">
                    <?= h($subtitle) ?>
                </p>
            </div>

            <div class="page-count">
                <strong><?= count($rows) ?></strong>
                <span><?= h($rowLabel) ?></span>
            </div>
        </section>

        <form method="get" class="directory-filters">
            <input
                type="text"
                name="search"
                placeholder="<?= h($searchPlaceholder) ?>"
                value="<?= h($search) ?>"
            >

            <?php foreach ($filters as $filter): ?>
                <?php $selected = $_GET[$filter['name']] ?? ''; ?>

                <?php if (($filter['type'] ?? '') === 'date'): ?>
                    <input
                        type="date"
                        name="<?= h($filter['name']) ?>"
                        value="<?= h($selected) ?>"
                        aria-label="<?= h($filter['label']) ?>"
                    >
                <?php else: ?>
                    <select name="<?= h($filter['name']) ?>">
                        <option value=""><?= h($filter['label']) ?></option>

                        <?php foreach ($filter['options'] as $value => $label): ?>
                            <option value="<?= h($value) ?>" <?= (string) $selected === (string) $value ? 'selected' : '' ?>>
                                <?= h($label) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                <?php endif; ?>
            <?php endforeach; ?>

            <select name="sort">
                <?php foreach ($sorts as $value => $label): ?>
                    <option value="<?= h($value) ?>" <?= $activeSort === $value ? 'selected' : '' ?>>
                        <?= h($label) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit" class="apply-button">
                Apply
            </button>

            <a class="reset-button" href="index.php">
                Reset
            </a>
        </form>

        <section class="directory-table-card">
            <div class="directory-header">
                <div>
                    <h2>
                        <?= h($title) ?> Directory
                    </h2>

                    <p>
                        <?= count($rows) ?> <?= h($rowLabel) ?> found
                    </p>
                </div>
            </div>

            <div class="table-wrap">
                <table class="directory-table">
                    <thead>
                        <tr>
                            <?php foreach ($columns as $column): ?>
                                <th><?= h($column['label']) ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>

                    <tbody>
                    <?php if ($rows): ?>
                        <?php foreach ($rows as $row): ?>
                            <tr>
                                <?php foreach ($columns as $column): ?>
                                    <?php $value = $row[$column['key']] ?? null; ?>

                                    <td>
                                        <?php if (($column['type'] ?? '') === 'status'): ?>
                                            <span class="status-badge status-<?= h(directory_status_class($value)) ?>">
                                                <?= h($value ?: 'Unknown') ?>
                                            </span>
                                        <?php elseif (($column['type'] ?? '') === 'date'): ?>
                                            <span class="date-value">
                                                <?= directory_date_value($value) ?>
                                            </span>
                                        <?php else: ?>
                                            <?= h(($value === null || $value === '') ? '—' : $value) ?>
                                        <?php endif; ?>
                                    </td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="<?= count($columns) ?>">
                                <div class="empty-state">
                                    <strong>
                                        <?= $loadError ? 'Unable to load ' . h(strtolower($rowLabel)) : 'No ' . h(strtolower($rowLabel)) . ' found' ?>
                                    </strong>

                                    <span>
                                        <?= $loadError ? 'Database connection is currently unavailable. Please verify the database status.' : 'Try changing your search or filters.' ?>
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
