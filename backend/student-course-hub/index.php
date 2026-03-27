<?php
require_once __DIR__ . '/functions.php';

$pageTitle = 'Browse Programmes';
$level = isset($_GET['level']) && $_GET['level'] !== '' ? (int) $_GET['level'] : null;
$search = trim($_GET['search'] ?? '');
$programmes = get_programmes(true, $level, $search);
$levels = get_levels();

include __DIR__ . '/header.php';
?>

<section class="hero">
    <h1>Find your programme</h1>
    <p>Browse undergraduate and postgraduate study options, then register your interest.</p>
</section>

<form class="card filter-form" method="get" action="">
    <div>
        <label for="search">Search</label>
        <input type="text" id="search" name="search" value="<?= e($search) ?>" placeholder="e.g. Cyber Security">
    </div>
    <div>
        <label for="level">Level</label>
        <select id="level" name="level">
            <option value="">All levels</option>
            <?php foreach ($levels as $row): ?>
                <option value="<?= e((string) $row['LevelID']) ?>" <?= $level === (int) $row['LevelID'] ? 'selected' : '' ?>>
                    <?= e($row['LevelName']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit">Apply</button>
</form>

<section class="grid">
    <?php foreach ($programmes as $programme): ?>
        <article class="card programme-card">
            <span class="badge"><?= e($programme['LevelName']) ?></span>
            <h2><?= e($programme['ProgrammeName']) ?></h2>
            <p><?= e($programme['Description']) ?></p>
            <p><strong>Programme leader:</strong> <?= e($programme['ProgrammeLeader'] ?? 'TBC') ?></p>
            <a class="button-link" href="<?= BASE_URL ?>/programme.php?id=<?= e((string) $programme['ProgrammeID']) ?>">View details</a>
        </article>
    <?php endforeach; ?>
</section>

<?php include __DIR__ . '/footer.php'; ?>
