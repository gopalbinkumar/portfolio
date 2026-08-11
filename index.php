<?php
// Handle contact form submission
$contact_success = false;
$contact_error = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_action']) && $_POST['form_action'] === 'contact') {
    $name = htmlspecialchars(strip_tags(trim($_POST['name'] ?? '')));
    $email = htmlspecialchars(strip_tags(trim($_POST['email'] ?? '')));
    $message = htmlspecialchars(strip_tags(trim($_POST['message'] ?? '')));

    if ($name && $email && $message && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // In a real project, you'd send email here (e.g., via mail() or PHPMailer)
        $contact_success = true;
    } else {
        $contact_error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="id" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Web Portfolio Dzaki Zulfahmi — Web Developer, Mahasiswa IT, dengan pengalaman membangun aplikasi web menggunakan PHP, Laravel, MySQL, dan Bootstrap.">
    <title>Dzaki Zulfahmi | Portfolio</title>
    <link rel="icon" type="image/svg+xml" href="assets/images/favicon.png">

    <!-- Preconnect fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Fontshare — Clash Display (heading) + Satoshi (body) -->
    <link
        href="https://api.fontshare.com/v2/css?f[]=clash-display@400,500,600,700&f[]=satoshi@300,400,500,700&display=swap"
        rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css?v=2">
</head>

<body>

    <!-- Skip to content -->
    <a href="#main" class="skip-link">Langsung ke konten</a>

    <!-- =========================================================
     NAVBAR
     ========================================================= -->
    <?php include 'components/navbar.php'; ?>

    <!-- =========================================================
     MAIN CONTENT
     ========================================================= -->
    <main id="main">

        <!-- HERO -->
        <section id="home" class="hero-section">
            <div class="hero-bg-shape"></div>
            <div class="container">
                <div class="row align-items-center min-vh-100 py-5">
                    <div class="col-lg-7 order-lg-1 order-2 hero-text">
                        <span class="hero-eyebrow">Halo, saya</span>
                        <h1 class="hero-name">Dzaki <em>Zulfahmi</em></h1>
                        <p class="hero-role">
                            <span class="role-badge"><i class="bi bi-code-slash"></i> Web Developer</span>
                            <span class="role-sep">&amp;</span>
                            <span class="role-badge"><i class="bi bi-mortarboard"></i> Mahasiswa IT</span>
                        </p>
                        <p class="hero-desc">
                            Saya membangun aplikasi web yang fungsional, bersih, dan mudah digunakan —
                            dari sistem manajemen berbasis Laravel hingga website interaktif dengan PHP murni.
                        </p>
                        <div class="hero-actions">
                            <a href="assets/Dzaki-Zulfahmi-CV.pdf" class="btn btn-primary-custom" download>
                                <i class="bi bi-download"></i> Download CV
                            </a>
                            <a href="#contact" class="btn btn-outline-custom">
                                <i class="bi bi-envelope"></i> Hubungi Saya
                            </a>
                        </div>
                    </div>
                    <!-- <div class="col-lg-5 order-lg-2 order-1 text-center mb-4 mb-lg-0">
                        <div class="profile-photo-wrapper">

                            <img src="assets/images/foto.jpg" alt="Foto profil" width="320" height="320" loading="lazy"
                                class="profile-photo">
                            <div class="profile-badge">
                                <i class="bi bi-patch-check-fill"></i> Open to Work
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="hero-scroll-hint">
                <a href="#about" aria-label="Scroll ke About">
                    <i class="bi bi-chevron-down"></i>
                </a>
            </div>
        </section>

        <!-- ABOUT -->
        <section id="about" class="section-pad">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-5">
                        <div class="about-img-wrapper">
                            <img src="https://picsum.photos/seed/dzaki-about/500/600"
                                alt="Dzaki Zulfahmi sedang bekerja" width="500" height="500" loading="lazy"
                                class="about-img">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="section-label">Tentang</div>
                        <h2 class="section-heading">Profil Saya</h2>
                        <p class="section-body">
                            Saya adalah mahasiswa Teknologi Informasi yang passionate dalam membangun solusi berbasis
                            web.
                            Saya senang belajar hal-hal baru — mulai dari arsitektur MVC, desain database, hingga
                            implementasi algoritma dalam sistem nyata.
                        </p>
                        <p class="section-body">
                            Saat ini saya sedang mengerjakan beberapa proyek akademik seperti Sistem Manajemen Siswa,
                            Sistem Inventaris Sekolah, dan Website Rubik's Cube dengan role-based access control
                            menggunakan Laravel.
                        </p>

                        <div class="about-info-grid">
                            <div class="about-info-item">
                                <i class="bi bi-person"></i>
                                <div>
                                    <small>Nama Lengkap</small>
                                    <strong>Muhammad Dzaki Zulfahmi Mansur</strong>
                                </div>
                            </div>
                            <?php
                            $tanggal_lahir = '2003-11-19';
                            $lahir = new DateTime($tanggal_lahir);
                            $hari_ini = new DateTime();
                            $umur = $hari_ini->diff($lahir)->y;
                            ?>
                            <div class="about-info-item">
                                <i class="bi bi-calendar3"></i>
                                <div>
                                    <small>Umur</small>
                                    <strong><?= $umur ?> Tahun</strong>
                                </div>
                            </div>
                            <div class="about-info-item">
                                <i class="bi bi-envelope"></i>
                                <div>
                                    <small>Email</small>
                                    <strong>dzakizulfahmi19@gmail.com</strong>
                                </div>
                            </div>
                            <div class="about-info-item">
                                <i class="bi bi-geo-alt"></i>
                                <div>
                                    <small>Lokasi</small>
                                    <strong>Makassar, Sulawesi Selatan</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SKILLS -->
        <section id="skills" class="section-pad section-alt">
            <div class="container">
                <div class="section-header text-center">
                    <div class="section-label">Kemampuan</div>
                    <h2 class="section-heading">Tech Stack Saya</h2>
                    <p class="section-subtext">Teknologi yang saya gunakan dalam membangun proyek nyata.</p>
                </div>

                <div class="row g-4 mt-2">
                    <div class="col-lg-6">
                        <div class="skill-card">
                            <h4 class="skill-cat-title"><i class="bi bi-code-slash"></i> Frontend</h4>
                            <?php
                            $frontend_skills = [
                                ['name' => 'HTML & CSS', 'level' => 92, 'icon' => 'bi-filetype-html'],
                                ['name' => 'JavaScript', 'level' => 72, 'icon' => 'bi-filetype-js'],
                                ['name' => 'Bootstrap 5', 'level' => 85, 'icon' => 'bi-bootstrap'],
                            ];
                            foreach ($frontend_skills as $skill): ?>
                                <div class="skill-item">
                                    <div class="skill-info">
                                        <span><i class="bi <?= $skill['icon'] ?>"></i> <?= $skill['name'] ?></span>
                                        <span class="skill-pct"><?= $skill['level'] ?>%</span>
                                    </div>
                                    <div class="progress skill-progress" role="progressbar"
                                        aria-valuenow="<?= $skill['level'] ?>" aria-valuemin="0" aria-valuemax="100"
                                        aria-label="<?= $skill['name'] ?> skill level">
                                        <div class="progress-bar" style="width: 0%" data-target="<?= $skill['level'] ?>">
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="skill-card">
                            <h4 class="skill-cat-title"><i class="bi bi-server"></i> Backend &amp; Database</h4>
                            <?php
                            $backend_skills = [
                                ['name' => 'PHP (Native)', 'level' => 82, 'icon' => 'bi-filetype-php'],
                                ['name' => 'Laravel', 'level' => 76, 'icon' => 'bi-layers'],
                                ['name' => 'MySQL', 'level' => 80, 'icon' => 'bi-database'],
                            ];
                            foreach ($backend_skills as $skill): ?>
                                <div class="skill-item">
                                    <div class="skill-info">
                                        <span><i class="bi <?= $skill['icon'] ?>"></i> <?= $skill['name'] ?></span>
                                        <span class="skill-pct"><?= $skill['level'] ?>%</span>
                                    </div>
                                    <div class="progress skill-progress" role="progressbar"
                                        aria-valuenow="<?= $skill['level'] ?>" aria-valuemin="0" aria-valuemax="100"
                                        aria-label="<?= $skill['name'] ?> skill level">
                                        <div class="progress-bar" style="width: 0%" data-target="<?= $skill['level'] ?>">
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Tools -->
                    <div class="col-12 mt-2">
                        <div class="tools-row">
                            <?php
                            $tools = [
                                ['icon' => 'bi-git', 'name' => 'Git'],
                                ['icon' => 'bi-github', 'name' => 'GitHub'],
                                ['icon' => 'bi-terminal', 'name' => 'Laragon'],
                                ['icon' => 'bi-diagram-3', 'name' => 'MVC Pattern'],
                                ['icon' => 'bi-shield-lock', 'name' => 'RBAC'],
                                ['icon' => 'bi-layout-text-sidebar', 'name' => 'Blade Template'],
                            ];
                            foreach ($tools as $t): ?>
                                <div class="tool-chip">
                                    <i class="bi <?= $t['icon'] ?>"></i> <?= $t['name'] ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- PROJECTS -->
        <section id="projects" class="section-pad">
            <div class="container">
                <div class="section-header text-center">
                    <div class="section-label">Portofolio</div>
                    <h2 class="section-heading">Proyek Pilihan</h2>
                    <p class="section-subtext">Beberapa proyek yang pernah saya kerjakan.</p>
                </div>

                <div class="project-slider mt-4">
                    <button class="project-nav project-nav-prev" type="button" aria-label="Project sebelumnya">
                        <i class="bi bi-chevron-left"></i>
                    </button>

                    <div class="project-track" id="projectTrack">
                        <?php
                        $projects = [
                            [
                                'title' => 'Sistem Manajemen Siswa',
                                'desc' => 'Aplikasi web untuk mengelola data siswa, nilai, absensi, dan laporan akademik. Dibangun dengan Laravel, MySQL, dan Bootstrap 5 menggunakan role-based access control.',
                                'tags' => ['Laravel', 'MySQL', 'Bootstrap 5', 'RBAC'],
                                'image' => 'https://picsum.photos/seed/student-mgmt/600/380',
                                'demo' => '#',
                                'github' => '#',
                                'color' => 'teal',
                            ],
                            [
                                'title' => 'Sistem Inventaris Sekolah',
                                'desc' => 'Platform manajemen inventaris untuk sekolah. Fitur meliputi pencatatan barang, peminjaman, pengembalian, laporan, dan dashboard statistik.',
                                'tags' => ['Laravel', 'PHP', 'MySQL', 'Chart.js'],
                                'image' => 'https://picsum.photos/seed/inventory-school/600/380',
                                'demo' => '#',
                                'github' => '#',
                                'color' => 'green',
                            ],
                            [
                                'title' => 'Website Rubik\'s Cube',
                                'desc' => 'Website interaktif seputar dunia Rubik\'s Cube — tutorial, teknik solving, timer kompetisi, dan forum komunitas. Frontend modern dengan PHP native.',
                                'tags' => ['PHP', 'JavaScript', 'Bootstrap 5', 'CSS3'],
                                'image' => 'https://picsum.photos/seed/rubiks-cube-web/600/380',
                                'demo' => '#',
                                'github' => '#',
                                'color' => 'orange',
                            ],
                            [
                                'title' => 'Sistem Manajemen Siswa',
                                'desc' => 'Aplikasi web untuk mengelola data siswa, nilai, absensi, dan laporan akademik. Dibangun dengan Laravel, MySQL, dan Bootstrap 5 menggunakan role-based access control.',
                                'tags' => ['Laravel', 'MySQL', 'Bootstrap 5', 'RBAC'],
                                'image' => 'https://picsum.photos/seed/student-mgmt/600/380',
                                'demo' => '#',
                                'github' => '#',
                                'color' => 'teal',
                            ],
                            [
                                'title' => 'Sistem Inventaris Sekolah',
                                'desc' => 'Platform manajemen inventaris untuk sekolah. Fitur meliputi pencatatan barang, peminjaman, pengembalian, laporan, dan dashboard statistik.',
                                'tags' => ['Laravel', 'PHP', 'MySQL', 'Chart.js'],
                                'image' => 'https://picsum.photos/seed/inventory-school/600/380',
                                'demo' => '#',
                                'github' => '#',
                                'color' => 'green',
                            ],
                            [
                                'title' => 'Website Rubik\'s Cube',
                                'desc' => 'Website interaktif seputar dunia Rubik\'s Cube — tutorial, teknik solving, timer kompetisi, dan forum komunitas. Frontend modern dengan PHP native.',
                                'tags' => ['PHP', 'JavaScript', 'Bootstrap 5', 'CSS3'],
                                'image' => 'https://picsum.photos/seed/rubiks-cube-web/600/380',
                                'demo' => '#',
                                'github' => '#',
                                'color' => 'orange',
                            ],
                        ];

                        foreach ($projects as $idx => $p): ?>
                            <div class="project-slide">
                                <article class="project-card h-100">
                                    <div class="project-img-wrap">
                                        <img src="<?= $p['image'] ?>" alt="Screenshot <?= $p['title'] ?>" width="600"
                                            height="250" loading="lazy" class="project-img">
                                        <div class="project-overlay">
                                            <a href="<?= $p['demo'] ?>" class="btn-icon"
                                                aria-label="Demo <?= $p['title'] ?>" target="_blank"
                                                rel="noopener noreferrer">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="<?= $p['github'] ?>" class="btn-icon"
                                                aria-label="GitHub <?= $p['title'] ?>" target="_blank"
                                                rel="noopener noreferrer">
                                                <i class="bi bi-github"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="project-body">
                                        <div class="project-tags">
                                            <?php foreach ($p['tags'] as $tag): ?>
                                                <span class="ptag"><?= $tag ?></span>
                                            <?php endforeach; ?>
                                        </div>

                                        <h3 class="project-title"><?= $p['title'] ?></h3>
                                        <p class="project-desc"><?= $p['desc'] ?></p>

                                        <div class="project-links">
                                            <a href="<?= $p['demo'] ?>" class="plink-demo" target="_blank"
                                                rel="noopener noreferrer">
                                                <i class="bi bi-arrow-up-right-square"></i> Live Demo
                                            </a>
                                            <a href="<?= $p['github'] ?>" class="plink-gh" target="_blank"
                                                rel="noopener noreferrer">
                                                <i class="bi bi-github"></i> GitHub
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <button class="project-nav project-nav-next" type="button" aria-label="Project berikutnya">
                        <i class="bi bi-chevron-right"></i>
                    </button>

                    <div class="project-progress" aria-hidden="true">
                        <span class="project-progress-bar"></span>
                    </div>
                </div>
            </div>
        </section>

        <!-- CONTACT -->
        <section id="contact" class="section-pad section-alt">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-5">
                        <div class="section-label">Kontak</div>
                        <h2 class="section-heading">Mari Terhubung</h2>
                        <p class="section-body">
                            Ada proyek menarik, pertanyaan, atau hanya ingin say hi?
                            Saya senang mendengar dari Anda!
                        </p>

                        <div class="contact-info-list">
                            <a href="mailto:dzaki@example.com" class="contact-info-item">
                                <div class="ci-icon"><i class="bi bi-envelope-fill"></i></div>
                                <div>
                                    <small>Email</small>
                                    <strong>dzakizulfahmi19@gmail.com</strong>
                                </div>
                            </a>
                            <a href="https://wa.me/62812345678" class="contact-info-item" target="_blank"
                                rel="noopener noreferrer">
                                <div class="ci-icon"><i class="bi bi-whatsapp"></i></div>
                                <div>
                                    <small>WhatsApp</small>
                                    <strong>+62 877 4005 1808</strong>
                                </div>
                            </a>
                            <div class="contact-info-item">
                                <div class="ci-icon"><i class="bi bi-geo-alt-fill"></i></div>
                                <div>
                                    <small>Lokasi</small>
                                    <strong>Makassar, Sulawesi Selatan</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="contact-form-card">
                            <?php if ($contact_success): ?>
                                <div class="alert-success-custom" role="alert">
                                    <i class="bi bi-check-circle-fill"></i>
                                    <div>
                                        <strong>Pesan terkirim!</strong>
                                        <p>Terima kasih, saya akan segera membalas pesan Anda.</p>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if ($contact_error): ?>
                                <div class="alert-error-custom" role="alert">
                                    <i class="bi bi-exclamation-triangle-fill"></i>
                                    <div>
                                        <strong>Oops!</strong>
                                        <p>Pastikan semua field terisi dengan benar, termasuk format email yang valid.</p>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <form method="POST" action="#contact" novalidate class="contact-form">
                                <input type="hidden" name="form_action" value="contact">
                                <div class="mb-4">
                                    <label for="name" class="form-label-custom">Nama Lengkap</label>
                                    <input type="text" id="name" name="name" class="form-input-custom"
                                        placeholder="John Doe" required
                                        value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="form-label-custom">Alamat Email</label>
                                    <input type="email" id="email" name="email" class="form-input-custom"
                                        placeholder="john@example.com" required
                                        value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="message" class="form-label-custom">Pesan</label>
                                    <textarea id="message" name="message" rows="5" class="form-input-custom"
                                        placeholder="Tuliskan pesan Anda di sini..."
                                        required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary-custom w-100">
                                    <i class="bi bi-send"></i> Kirim Pesan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <?php include 'components/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/main.js"></script>
</body>

</html>