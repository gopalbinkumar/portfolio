<?php
$nav_links = [
    ['href' => '#home',     'label' => 'Home'],
    ['href' => '#about',    'label' => 'About'],
    ['href' => '#skills',   'label' => 'Skills'],
    ['href' => '#projects', 'label' => 'Projects'],
    ['href' => '#contact',  'label' => 'Contact'],
];
?>
<nav id="mainNav" class="navbar navbar-expand-lg navbar-custom fixed-top" aria-label="Navigasi utama">
    <div class="container">
        <!-- SVG Logo -->
        <a class="navbar-brand" href="#home" aria-label="Dzaki Zulfahmi — Beranda">
            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <rect width="36" height="36" rx="10" fill="currentColor" class="logo-bg"/>
                <path d="M10 10 L10 26 L18 26 C22.418 26 26 22.418 26 18 C26 13.582 22.418 10 18 10 Z" fill="none" stroke="#f7f6f2" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M13 18 L22 18" stroke="#f7f6f2" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </a>

        <!-- Theme Toggle + Hamburger -->
        <div class="d-flex align-items-center gap-2 ms-auto">
            <button class="theme-toggle" data-theme-toggle aria-label="Ganti tema gelap/terang">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>
            </button>
            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navMenu"
                    aria-controls="navMenu" aria-expanded="false"
                    aria-label="Toggle navigasi">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                <?php foreach ($nav_links as $link): ?>
                <li class="nav-item">
                    <a class="nav-link-custom" href="<?= $link['href'] ?>"><?= $link['label'] ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>
