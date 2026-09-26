<?php
$currentPage = $currentPage ?? 'dashboard';
?>

<aside class="sidebar">

    <div class="brand">
        <h1>SMART CAMPUS</h1>
        <span>Resource Management System</span>
    </div>

    <div class="nav-section">
        <div class="nav-title">OVERVIEW</div>

        <a href="/smart-campus/"
           class="nav-item <?= $currentPage === 'dashboard' ? 'active' : '' ?>">
            Dashboard
        </a>
    </div>

    <div class="nav-section">
        <div class="nav-title">PEOPLE</div>

        <a href="/smart-campus/students/"
           class="nav-item <?= $currentPage === 'students' ? 'active' : '' ?>">
            Students
        </a>

        <a
            href="/smart-campus/faculty/"
            class="nav-item <?= $currentPage === 'faculty' ? 'active' : '' ?>"
        >
            Faculty
        </a>
    </div>

    <div class="nav-section">
        <div class="nav-title">RESOURCES</div>

        <a href="#" class="nav-item">Buildings</a>
        <a href="#" class="nav-item">Rooms</a>
        <a href="#" class="nav-item">Labs</a>
        <a href="#" class="nav-item">Computers</a>
        <a href="#" class="nav-item">Equipment</a>
        <a href="#" class="nav-item">Inventory</a>
    </div>

    <div class="nav-section">
        <div class="nav-title">OPERATIONS</div>

        <a href="#" class="nav-item">Bookings</a>
        <a href="#" class="nav-item">Events</a>
        <a href="#" class="nav-item">Maintenance</a>
        <a href="#" class="nav-item">Complaints</a>
    </div>

</aside>