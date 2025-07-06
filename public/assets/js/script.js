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
    const slides = document.querySelectorAll('.slide');
    const indicators = document.querySelectorAll('.slide-indicator');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    let currentSlide = 0;

    // Function to show a specific slide
    function showSlide(index) {
        // Hide all slides
        slides.forEach(slide => slide.classList.remove('active'));
        indicators.forEach(indicator => {
            indicator.classList.remove('bg-green-600', 'bg-blue-600', 'bg-purple-600');
            indicator.classList.add('bg-gray-300');
        });

        // Show current slide
        slides[index].classList.add('active');
        
        // Update indicator colors based on slide
        if (index === 0) {
            indicators[index].classList.remove('bg-gray-300');
            indicators[index].classList.add('bg-green-600');
        } else if (index === 1) {
            indicators[index].classList.remove('bg-gray-300');
            indicators[index].classList.add('bg-blue-600');
        } else if (index === 2) {
            indicators[index].classList.remove('bg-gray-300');
            indicators[index].classList.add('bg-purple-600');
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

    // Event listeners for navigation buttons
    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);

    // Event listeners for indicators
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            currentSlide = index;
            showSlide(currentSlide);
        });
    });

    // Auto-play slider (optional)
    setInterval(nextSlide, 5000); // Change slide every 5 seconds
});