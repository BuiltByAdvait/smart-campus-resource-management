<?php
$currentPage = $currentPage ?? 'dashboard';
?>

<aside class="sidebar">

    <!-- Brand -->
    <div class="brand">
        <h1>SMART CAMPUS</h1>
        <span>Resource Management System</span>
    </div>

    <!-- Overview -->
    <div class="nav-section">
        <div class="nav-title">OVERVIEW</div>

        <a
            href="/smart-campus/"
            class="nav-item <?= $currentPage === 'dashboard' ? 'active' : '' ?>"
        >
            Dashboard
        </a>
    </div>

    <!-- People -->
    <div class="nav-section">
        <div class="nav-title">PEOPLE</div>

        <a
            href="/smart-campus/students/"
            class="nav-item <?= $currentPage === 'students' ? 'active' : '' ?>"
        >
            Students
        </a>

        <a
            href="/smart-campus/faculty/"
            class="nav-item <?= $currentPage === 'faculty' ? 'active' : '' ?>"
        >
            Faculty
        </a>
    </div>

    <!-- Resources -->
    <div class="nav-section">
        <div class="nav-title">RESOURCES</div>

        <a
            href="/smart-campus/buildings/"
            class="nav-item <?= $currentPage === 'buildings' ? 'active' : '' ?>"
        >
            Buildings
        </a>

        <a
            href="/smart-campus/rooms/"
            class="nav-item <?= $currentPage === 'rooms' ? 'active' : '' ?>"
        >
            Rooms
        </a>

        <a
            href="/smart-campus/labs/"
            class="nav-item <?= $currentPage === 'labs' ? 'active' : '' ?>"
        >
            Labs
        </a>

        <a
            href="/smart-campus/computers/"
            class="nav-item <?= $currentPage === 'computers' ? 'active' : '' ?>"
        >
            Computers
        </a>

        <a
            href="/smart-campus/equipment/"
            class="nav-item <?= $currentPage === 'equipment' ? 'active' : '' ?>"
        >
            Equipment
        </a>

        <a
            href="/smart-campus/inventory/"
            class="nav-item <?= $currentPage === 'inventory' ? 'active' : '' ?>"
        >
            Inventory
        </a>
    </div>

    <!-- Operations -->
    <div class="nav-section">
        <div class="nav-title">OPERATIONS</div>

        <a
            href="/smart-campus/bookings/"
            class="nav-item <?= $currentPage === 'bookings' ? 'active' : '' ?>"
        >
            Bookings
        </a>

        <a
            href="/smart-campus/events/"
            class="nav-item <?= $currentPage === 'events' ? 'active' : '' ?>"
        >
            Events
        </a>

        <a
            href="/smart-campus/maintenance/"
            class="nav-item <?= $currentPage === 'maintenance' ? 'active' : '' ?>"
        >
            Maintenance
        </a>

        <a
            href="/smart-campus/complaints/"
            class="nav-item <?= $currentPage === 'complaints' ? 'active' : '' ?>"
        >
            Complaints
        </a>
    </div>

</aside>