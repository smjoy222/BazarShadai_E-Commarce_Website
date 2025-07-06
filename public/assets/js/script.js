// Simple mobile menu toggle for sticky navbar
document.addEventListener('DOMContentLoaded', function () {
  const btn = document.getElementById('mobile-menu-button');
  const menu = document.getElementById('mobile-menu');
  if (btn && menu) {
    btn.addEventListener('click', () => {
      menu.classList.toggle('hidden');
    });
  }
});

// Hero Slider JavaScript
document.addEventListener('DOMContentLoaded', function() {
    console.log('Slider script loaded'); // Debug log
    
    const slides = document.querySelectorAll('.slide');
    const indicators = document.querySelectorAll('.slide-indicator');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    let currentSlide = 0;
    let autoPlayInterval;

    console.log('Found slides:', slides.length); // Debug log
    console.log('Found indicators:', indicators.length); // Debug log

    // Check if slider elements exist
    if (slides.length === 0) {
        console.log('No slides found, exiting slider initialization');
        return;
    }

    // Function to show a specific slide
    function showSlide(index) {
        console.log('Showing slide:', index); // Debug log
        
        // Ensure index is valid
        if (index < 0 || index >= slides.length) {
            console.log('Invalid slide index:', index);
            return;
        }

        // Hide all slides
        slides.forEach((slide, i) => {
            slide.classList.remove('active');
            console.log(`Slide ${i} hidden`);
        });
        
        // Reset all indicators
        if (indicators.length > 0) {
            indicators.forEach(indicator => {
                indicator.classList.remove('bg-green-600', 'bg-blue-600', 'bg-purple-600');
                indicator.classList.add('bg-gray-300');
            });
        }

        // Show current slide
        if (slides[index]) {
            slides[index].classList.add('active');
            console.log(`Slide ${index} shown`);
        }
        
        // Update indicator colors based on slide
        if (indicators[index]) {
            indicators[index].classList.remove('bg-gray-300');
            if (index === 0) {
                indicators[index].classList.add('bg-green-600');
            } else if (index === 1) {
                indicators[index].classList.add('bg-blue-600');
            } else if (index === 2) {
                indicators[index].classList.add('bg-purple-600');
            }
        }
    }

    // Next slide function
    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        console.log('Next slide:', currentSlide);
        showSlide(currentSlide);
    }

    // Previous slide function
    function prevSlide() {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        console.log('Previous slide:', currentSlide);
        showSlide(currentSlide);
    }

    // Auto-play functions
    function startAutoPlay() {
        console.log('Starting auto-play');
        stopAutoPlay(); // Clear any existing interval
        autoPlayInterval = setInterval(nextSlide, 2000); // 2 seconds
    }

    function stopAutoPlay() {
        if (autoPlayInterval) {
            console.log('Stopping auto-play');
            clearInterval(autoPlayInterval);
            autoPlayInterval = null;
        }
    }

    // Event listeners for navigation buttons
    if (nextBtn) {
        nextBtn.addEventListener('click', (e) => {
            e.preventDefault();
            console.log('Next button clicked');
            stopAutoPlay();
            nextSlide();
            startAutoPlay();
        });
        console.log('Next button listener added');
    } else {
        console.log('Next button not found');
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', (e) => {
            e.preventDefault();
            console.log('Previous button clicked');
            stopAutoPlay();
            prevSlide();
            startAutoPlay();
        });
        console.log('Previous button listener added');
    } else {
        console.log('Previous button not found');
    }

    // Event listeners for indicators
    if (indicators.length > 0) {
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', (e) => {
                e.preventDefault();
                console.log('Indicator clicked:', index);
                stopAutoPlay();
                currentSlide = index;
                showSlide(currentSlide);
                startAutoPlay();
            });
        });
        console.log('Indicator listeners added');
    } else {
        console.log('No indicators found');
    }

    // Pause auto-play on hover
    const sliderContainer = document.querySelector('.slider-container');
    if (sliderContainer) {
        sliderContainer.addEventListener('mouseenter', () => {
            console.log('Mouse entered slider, pausing auto-play');
            stopAutoPlay();
        });
        
        sliderContainer.addEventListener('mouseleave', () => {
            console.log('Mouse left slider, resuming auto-play');
            startAutoPlay();
        });
    }

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft') {
            stopAutoPlay();
            prevSlide();
            startAutoPlay();
        } else if (e.key === 'ArrowRight') {
            stopAutoPlay();
            nextSlide();
            startAutoPlay();
        }
    });

    // Initialize slider
    console.log('Initializing slider...');
    showSlide(0);
    
    // Start auto-play after a short delay
    setTimeout(() => {
        startAutoPlay();
    }, 1000);
    
    console.log('Slider initialization complete');
});