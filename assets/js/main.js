document.addEventListener("DOMContentLoaded", () => {
  /* =========================================================
     THEME TOGGLE
     ========================================================= */
  const docEl = document.documentElement;
  const toggleBtn = document.querySelector("[data-theme-toggle]");

  let currentTheme = window.matchMedia("(prefers-color-scheme: dark)").matches
    ? "dark"
    : "light";

  docEl.setAttribute("data-theme", currentTheme);

  const updateThemeIcon = () => {
    if (!toggleBtn) return;

    toggleBtn.setAttribute(
      "aria-label",
      currentTheme === "dark" ? "Ganti ke mode terang" : "Ganti ke mode gelap",
    );

    toggleBtn.innerHTML =
      currentTheme === "dark"
        ? '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>'
        : '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>';
  };

  updateThemeIcon();

  if (toggleBtn) {
    toggleBtn.addEventListener("click", () => {
      currentTheme = currentTheme === "dark" ? "light" : "dark";
      docEl.setAttribute("data-theme", currentTheme);
      updateThemeIcon();
    });
  }

  /* =========================================================
     NAVBAR SCROLLED
     ========================================================= */
  const nav = document.getElementById("mainNav");

  const onScroll = () => {
    if (!nav) return;
    nav.classList.toggle("scrolled", window.scrollY > 20);
  };

  window.addEventListener("scroll", onScroll);
  onScroll();

  /* =========================================================
     ACTIVE NAV LINK
     ========================================================= */
  const sections = document.querySelectorAll("section[id]");
  const navLinks = document.querySelectorAll(".nav-link-custom");

  const setActiveLink = () => {
    let current = "";

    sections.forEach((section) => {
      const top = section.offsetTop - 120;
      const height = section.offsetHeight;

      if (window.scrollY >= top && window.scrollY < top + height) {
        current = section.getAttribute("id");
      }
    });

    navLinks.forEach((link) => {
      link.classList.toggle(
        "active",
        link.getAttribute("href") === `#${current}`,
      );
    });
  };

  window.addEventListener("scroll", setActiveLink);
  setActiveLink();

  /* =========================================================
     CLOSE MOBILE MENU AFTER CLICK
     ========================================================= */
  const navMenu = document.getElementById("navMenu");
  const navToggler = document.querySelector(".navbar-toggler");

  navLinks.forEach((link) => {
    link.addEventListener("click", () => {
      if (!navMenu) return;

      const isMobile = window.innerWidth <= 991.98;
      const isMenuOpen = navMenu.classList.contains("show");

      if (isMobile && isMenuOpen && window.bootstrap) {
        const collapseInstance = bootstrap.Collapse.getOrCreateInstance(
          navMenu,
          {
            toggle: false,
          },
        );

        collapseInstance.hide();

        if (navToggler) {
          navToggler.setAttribute("aria-expanded", "false");
        }
      }
    });
  });

  /* =========================================================
     HIDE NAVBAR ON MOBILE SCROLL DOWN
     ========================================================= */
  const mainNav = document.querySelector("#mainNav");
  let lastScrollY = window.scrollY;

  window.addEventListener("scroll", () => {
    if (!mainNav) return;

    const currentScrollY = window.scrollY;
    const isMobile = window.innerWidth <= 991.98;

    if (!isMobile) {
      mainNav.classList.remove("nav-hidden");
      return;
    }

    if (currentScrollY <= 80) {
      mainNav.classList.remove("nav-hidden");
      lastScrollY = currentScrollY;
      return;
    }

    if (currentScrollY > lastScrollY) {
      const menuIsOpen = navMenu && navMenu.classList.contains("show");

      if (!menuIsOpen) {
        mainNav.classList.add("nav-hidden");
      }
    } else {
      mainNav.classList.remove("nav-hidden");
    }

    lastScrollY = currentScrollY;
  });

  /* =========================================================
     SKILL PROGRESS BAR
     ========================================================= */
  const bars = document.querySelectorAll(".progress-bar[data-target]");

  if (bars.length > 0) {
    const barsObserver = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const bar = entry.target;
            bar.style.width = `${bar.dataset.target}%`;
            observer.unobserve(bar);
          }
        });
      },
      { threshold: 0.5 },
    );

    bars.forEach((bar) => barsObserver.observe(bar));
  }

  /* =========================================================
     REVEAL ANIMATION
     ========================================================= */
  const revealItems = document.querySelectorAll(
    ".section-heading, .section-body, .skill-card, .project-card, .contact-form-card, .about-info-item, .contact-info-item",
  );

  revealItems.forEach((item) => item.classList.add("reveal"));

  if (revealItems.length > 0) {
    const revealObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("show");
          }
        });
      },
      { threshold: 0.15 },
    );

    revealItems.forEach((item) => revealObserver.observe(item));
  }

  /* =========================================================
     PROJECT INFINITE CAROUSEL
     ========================================================= */
  const projectTrack = document.querySelector("#projectTrack");
  const projectPrev = document.querySelector(".project-nav-prev");
  const projectNext = document.querySelector(".project-nav-next");
  const projectProgressBar = document.querySelector(".project-progress-bar");

  if (projectTrack && projectPrev && projectNext) {
    const getSlides = () => {
      return projectTrack.querySelectorAll(".project-slide");
    };

    const getGap = () => {
      const trackStyle = window.getComputedStyle(projectTrack);
      return parseFloat(trackStyle.columnGap || trackStyle.gap) || 0;
    };

    const getScrollAmount = () => {
      const firstSlide = projectTrack.querySelector(".project-slide");
      if (!firstSlide) return 300;

      return firstSlide.offsetWidth + getGap();
    };

    const getVisibleSlides = () => {
      const firstSlide = projectTrack.querySelector(".project-slide");
      if (!firstSlide) return 1;

      const slideFullWidth = firstSlide.offsetWidth + getGap();

      return Math.max(1, Math.round(projectTrack.clientWidth / slideFullWidth));
    };

    const getMaxIndex = () => {
      const slides = getSlides();
      const visibleSlides = getVisibleSlides();

      return Math.max(0, slides.length - visibleSlides);
    };

    const getCurrentIndex = () => {
      const scrollAmount = getScrollAmount();
      const maxIndex = getMaxIndex();

      return Math.min(
        maxIndex,
        Math.max(0, Math.round(projectTrack.scrollLeft / scrollAmount)),
      );
    };

    const scrollToIndex = (index) => {
      const maxIndex = getMaxIndex();
      const targetIndex = Math.min(maxIndex, Math.max(0, index));

      projectTrack.scrollTo({
        left: targetIndex * getScrollAmount(),
        behavior: "smooth",
      });
    };

    const updateProjectState = () => {
      const currentIndex = getCurrentIndex();
      const maxIndex = getMaxIndex();

      if (projectProgressBar) {
        const progress =
          maxIndex === 0 ? 100 : ((currentIndex + 1) / (maxIndex + 1)) * 100;

        projectProgressBar.style.width = `${progress}%`;
      }

      projectPrev.disabled = currentIndex <= 0;
      projectNext.disabled = currentIndex >= maxIndex;

      projectPrev.classList.toggle("is-disabled", currentIndex <= 0);
      projectNext.classList.toggle("is-disabled", currentIndex >= maxIndex);
    };

    projectNext.addEventListener("click", () => {
      const currentIndex = getCurrentIndex();
      scrollToIndex(currentIndex + 1);
    });

    projectPrev.addEventListener("click", () => {
      const currentIndex = getCurrentIndex();
      scrollToIndex(currentIndex - 1);
    });

    projectTrack.addEventListener("scroll", () => {
      window.requestAnimationFrame(updateProjectState);
    });

    window.addEventListener("resize", updateProjectState);

    updateProjectState();
  }
});
