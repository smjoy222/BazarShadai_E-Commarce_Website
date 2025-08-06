// Simple mobile menu toggle for sticky navbar
document.addEventListener("DOMContentLoaded", function () {
    const btn = document.getElementById("mobile-menu-button");
    const menu = document.getElementById("mobile-menu");
    if (btn && menu) {
        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    }
});

// Hero Slider JavaScript
document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelectorAll(".slide");
    const indicators = document.querySelectorAll(".slide-indicator");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    let currentSlide = 0;
    let autoPlayInterval;

    // Check if slider elements exist
    if (slides.length === 0) {
        return;
    }

    // Function to show a specific slide
    function showSlide(index) {
        // Ensure index is valid
        if (index < 0 || index >= slides.length) {
            return;
        }

        // Hide all slides
        slides.forEach((slide, i) => {
            slide.classList.remove("active");
        });

        // Reset all indicators
        if (indicators.length > 0) {
            indicators.forEach((indicator) => {
                indicator.classList.remove(
                    "bg-green-600",
                    "bg-blue-600",
                    "bg-purple-600"
                );
                indicator.classList.add("bg-gray-300");
            });
        }

        // Show current slide
        if (slides[index]) {
            slides[index].classList.add("active");
        }

        // Update indicator colors based on slide
        if (indicators[index]) {
            indicators[index].classList.remove("bg-gray-300");
            if (index === 0) {
                indicators[index].classList.add("bg-green-600");
            } else if (index === 1) {
                indicators[index].classList.add("bg-blue-600");
            } else if (index === 2) {
                indicators[index].classList.add("bg-purple-600");
            }
        }
    }

    // Next slide function
    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    // Previous slide function
    function prevSlide() {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
    }

    // Auto-play functions
    function startAutoPlay() {
        stopAutoPlay(); // Clear any existing interval
        autoPlayInterval = setInterval(nextSlide, 2000); // 2 seconds
    }

    function stopAutoPlay() {
        if (autoPlayInterval) {
            clearInterval(autoPlayInterval);
            autoPlayInterval = null;
        }
    }

    // Event listeners for navigation buttons
    if (nextBtn) {
        nextBtn.addEventListener("click", (e) => {
            e.preventDefault();
            stopAutoPlay();
            nextSlide();
            startAutoPlay();
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener("click", (e) => {
            e.preventDefault();
            stopAutoPlay();
            prevSlide();
            startAutoPlay();
        });
    }

    // Event listeners for indicators
    if (indicators.length > 0) {
        indicators.forEach((indicator, index) => {
            indicator.addEventListener("click", (e) => {
                e.preventDefault();
                stopAutoPlay();
                currentSlide = index;
                showSlide(currentSlide);
                startAutoPlay();
            });
        });
    } else {
    }

    // Pause auto-play on hover
    const sliderContainer = document.querySelector(".slider-container");
    if (sliderContainer) {
        sliderContainer.addEventListener("mouseenter", () => {
            stopAutoPlay();
        });

        sliderContainer.addEventListener("mouseleave", () => {
            startAutoPlay();
        });
    }

    // Keyboard navigation
    document.addEventListener("keydown", function (e) {
        if (e.key === "ArrowLeft") {
            stopAutoPlay();
            prevSlide();
            startAutoPlay();
        } else if (e.key === "ArrowRight") {
            stopAutoPlay();
            nextSlide();
            startAutoPlay();
        }
    });

    // Initialize slider
    showSlide(0);

    // Start auto-play after a short delay
    setTimeout(() => {
        startAutoPlay();
    }, 1000);
});

// Pagination JavaScript for Products Page
document.addEventListener("DOMContentLoaded", function () {
    // Check if we're on a page with pagination
    const paginationContainer = document.querySelector("#page-numbers");
    if (!paginationContainer) {
        return;
    }

    const productsPerPage = 8;
    const totalProducts = 24;
    const totalPages = Math.ceil(totalProducts / productsPerPage);
    let currentPage = 1;

    // Get DOM elements
    const productPages = document.querySelectorAll(".product-page");
    const pageNumbers = document.querySelectorAll(".page-number");
    const prevBtn = document.getElementById("prev-btn");
    const nextBtn = document.getElementById("next-btn");
    const productCount = document.getElementById("product-count");
    // Initialize pagination
    updatePagination();

    // Page number click handlers
    pageNumbers.forEach((btn) => {
        btn.addEventListener("click", function (e) {
            e.preventDefault();
            const page = parseInt(this.dataset.page);
            goToPage(page);
        });
    });

    // Previous button handler
    if (prevBtn) {
        prevBtn.addEventListener("click", function (e) {
            e.preventDefault();
            if (currentPage > 1) {
                goToPage(currentPage - 1);
            }
        });
    }

    // Next button handler
    if (nextBtn) {
        nextBtn.addEventListener("click", function (e) {
            e.preventDefault();
            if (currentPage < totalPages) {
                goToPage(currentPage + 1);
            }
        });
    }

    // Function to go to specific page
    function goToPage(page) {
        if (page < 1 || page > totalPages) {
            return;
        }

        currentPage = page;
        updatePagination();

        // Smooth scroll to top of products section
        const productsContainer = document.getElementById("products-container");
        if (productsContainer) {
            productsContainer.scrollIntoView({
                behavior: "smooth",
                block: "start",
            });
        }
    }

    // Function to update pagination display
    function updatePagination() {
        // Hide all product pages
        productPages.forEach((page) => {
            page.classList.remove("active");
            page.style.display = "none";
        });

        // Show current page products
        const currentProductPage = document.querySelector(
            `[data-page="${currentPage}"]`
        );
        if (currentProductPage) {
            currentProductPage.classList.add("active");
            currentProductPage.style.display = "grid";
        }

        // Update page number buttons
        pageNumbers.forEach((btn) => {
            btn.classList.remove("active", "bg-green-600", "text-white");
            btn.classList.add("border", "border-gray-300", "hover:bg-gray-100");

            if (parseInt(btn.dataset.page) === currentPage) {
                btn.classList.add("active", "bg-green-600", "text-white");
                btn.classList.remove(
                    "border",
                    "border-gray-300",
                    "hover:bg-gray-100"
                );
            }
        });

        // Update Previous button
        if (prevBtn) {
            if (currentPage === 1) {
                prevBtn.classList.add("disabled");
                prevBtn.style.opacity = "0.5";
                prevBtn.style.cursor = "not-allowed";
                prevBtn.disabled = true;
            } else {
                prevBtn.classList.remove("disabled");
                prevBtn.style.opacity = "1";
                prevBtn.style.cursor = "pointer";
                prevBtn.disabled = false;
            }
        }

        // Update Next button
        if (nextBtn) {
            if (currentPage === totalPages) {
                nextBtn.classList.add("disabled");
                nextBtn.style.opacity = "0.5";
                nextBtn.style.cursor = "not-allowed";
                nextBtn.disabled = true;
            } else {
                nextBtn.classList.remove("disabled");
                nextBtn.style.opacity = "1";
                nextBtn.style.cursor = "pointer";
                nextBtn.disabled = false;
            }
        }

        // Update product count
        if (productCount) {
            const startProduct = (currentPage - 1) * productsPerPage + 1;
            const endProduct = Math.min(
                currentPage * productsPerPage,
                totalProducts
            );
            productCount.textContent = `Showing ${startProduct}-${endProduct} of ${totalProducts} products`;
        }
    }

    // Keyboard navigation for pagination
    document.addEventListener("keydown", function (e) {
        // Only handle pagination keys if we're on a pagination page
        if (!paginationContainer) return;

        if (e.key === "ArrowLeft" && currentPage > 1) {
            e.preventDefault();
            goToPage(currentPage - 1);
        } else if (e.key === "ArrowRight" && currentPage < totalPages) {
            e.preventDefault();
            goToPage(currentPage + 1);
        }
    });
});

// Profile Dropdown JavaScript
document.addEventListener("DOMContentLoaded", function () {
    const profileToggle = document.querySelector(".profile-toggle");
    const profileMenu = document.querySelector(".profile-menu");

    if (profileToggle && profileMenu) {
        // Toggle dropdown on click
        profileToggle.addEventListener("click", function (e) {
            e.preventDefault();
            e.stopPropagation();

            profileMenu.classList.toggle("show");
            profileToggle.classList.toggle("active");
        });

        // Close dropdown when clicking outside
        document.addEventListener("click", function (e) {
            if (
                !profileToggle.contains(e.target) &&
                !profileMenu.contains(e.target)
            ) {
                profileMenu.classList.remove("show");
                profileToggle.classList.remove("active");
            }
        });

        // Close dropdown when pressing escape
        document.addEventListener("keydown", function (e) {
            if (e.key === "Escape") {
                profileMenu.classList.remove("show");
                profileToggle.classList.remove("active");
            }
        });

        // Prevent dropdown from closing when clicking inside
        profileMenu.addEventListener("click", function (e) {
            e.stopPropagation();
        });
    }
});
