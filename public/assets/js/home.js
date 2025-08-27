        document.addEventListener('DOMContentLoaded', () => {
            // Mobile menu toggle functionality
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileSidebar = document.getElementById('mobile-sidebar');
            const mobileOverlay = document.getElementById('mobile-overlay');
            const mobileCloseButton = document.getElementById('mobile-close-button');

            mobileMenuButton.addEventListener('click', () => {
                mobileSidebar.classList.add('open');
                mobileOverlay.classList.add('open');
            });
            mobileCloseButton.addEventListener('click', () => {
                mobileSidebar.classList.remove('open');
                mobileOverlay.classList.remove('open');
            });
            mobileOverlay.addEventListener('click', () => {
                mobileSidebar.classList.remove('open');
                mobileOverlay.classList.remove('open');
            });

            // Function to handle page navigation
            window.navigateTo = (page) => {
                const pages = ['home', 'products', 'contact'];
                pages.forEach(p => {
                    const el = document.getElementById(p + '-page');
                    if (el) {
                        el.classList.remove('active');
                    }
                });

                const targetPage = document.getElementById(page + '-page');
                if (targetPage) {
                    targetPage.classList.add('active');
                    window.scrollTo(0, 0); // Scroll to top on page change
                }
                
                // Close mobile menu after navigation
                mobileSidebar.classList.remove('open');
                mobileOverlay.classList.remove('open');
            };

            // Testimonials slider
            if (document.querySelector('.testimonial-slider')) {
                new Swiper('.testimonial-slider', {
                    loop: true,
                    slidesPerView: 1,
                    spaceBetween: 20,
                    autoplay: {
                        delay: 30000,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                        1024: {
                            slidesPerView: 3,
                        },
                    },
                });
            }

            // Hero image slideshow functionality
            const heroImages = document.querySelectorAll('.hero-image');
            const sliderDots = document.querySelectorAll('.slider-dot');
            let currentImageIndex = 0;

            function switchHeroImage(newIndex = null) {
                // Determine the next image index
                if (newIndex !== null) {
                    currentImageIndex = newIndex;
                } else {
                    currentImageIndex = (currentImageIndex + 1) % heroImages.length;
                }

                // Update images
                heroImages.forEach(img => img.classList.remove('active'));
                heroImages[currentImageIndex].classList.add('active');

                // Update dots
                sliderDots.forEach(dot => dot.classList.remove('active'));
                sliderDots[currentImageIndex].classList.add('active');
            }

            // Function to update image sources and slideshow
            const updateImageSources = () => {
                const isMobile = window.innerWidth <= 768; // Tailwind's 'md' breakpoint
                heroImages.forEach((img, index) => {
                    // Update the src to the correct desktop or mobile image
                    img.src = isMobile ? img.dataset.mobileSrc : img.dataset.desktopSrc;
                });
            };

            // Event listeners for dots
            sliderDots.forEach(dot => {
                dot.addEventListener('click', () => {
                    const newIndex = parseInt(dot.dataset.index);
                    switchHeroImage(newIndex);
                    // Reset the timer when a dot is clicked
                    clearInterval(slideshowInterval);
                    slideshowInterval = setInterval(switchHeroImage, 5000);
                });
            });

            // Initial image source update
            updateImageSources();

            // Event listener for window resize
            window.addEventListener('resize', updateImageSources);

            // Start the slideshow
            let slideshowInterval = setInterval(switchHeroImage, 5000); // Change image every 5 seconds

            // Star animation functionality
            const starContainer = document.getElementById('star-container');
            const starColors = ['#FF69B4', '#FFD700', '#ADD8E6', '#90EE90'];
            let lastStarTime = 0;
            const delay = 100; // milliseconds between stars

            document.addEventListener('mousemove', (e) => {
                const now = Date.now();
                if (now - lastStarTime > delay) {
                    const star = document.createElement('span');
                    star.classList.add('star');
                    star.innerHTML = '✦'; // Star emoji or character
                    
                    // Randomize star size
                    const randomSize = Math.random() * (20 - 15) + 15;
                    star.style.fontSize = `${randomSize}px`;

                    star.style.left = `${e.clientX}px`;
                    star.style.top = `${e.clientY}px`;
                    
                    const randomColor = starColors[Math.floor(Math.random() * starColors.length)];
                    star.style.color = randomColor;

                    starContainer.appendChild(star);
                    
                    setTimeout(() => {
                        star.remove();
                    }, 1000); // Remove star after 1 second
                    
                    lastStarTime = now;
                }
            });

            // Intersection Observer for scroll animations
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-visible');
                    } else {
                        entry.target.classList.remove('animate-visible');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));
        });

