@extends('layouts.public-site')

@section('content')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
@endpush

<!-- About Hero Section -->
<section class="hero-section">
    <div class="hero-content">
        <h1>Creating Extraordinary Spaces Since 2008</h1>
        <p>We are a passionate team of interior designers dedicated to transforming your vision into reality. Our
            expertise spans residential and commercial projects, each crafted with meticulous attention to detail and a
            deep understanding of our clients' unique needs.</p>

        <div class="hero-stats">
            <div class="stat-card">
                <div class="stat-number">500+</div>
                <div class="stat-label">Projects Completed</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">98%</div>
                <div class="stat-label">Client Satisfaction</div>
            </div>
        </div>
    </div>
    </div>
</section>


<!-- About Intro Section -->
<section class="about-intro">
    <div class="container">
        <div class="intro-content" data-aos="fade-up">
            <h2>About <span class="highlight">Callista LK</span></h2>
            <p>
                At <strong>Callista LK</strong>, we believe that every space has a story to tell.
                Since our beginning, we’ve been dedicated to crafting furniture and interiors
                that harmonize aesthetics, comfort, and purpose. Our designs are guided by a deep
                respect for craftsmanship, sustainability, and timeless beauty — creating spaces
                where elegance meets everyday life.
            </p>
            <p>
                Whether it’s a cozy living room, a vibrant office, or a luxury villa, our goal
                is to turn your vision into a space that inspires, welcomes, and endures.
            </p>
        </div>
    </div>
</section>

<!-- Vision & Mission Section -->
<section class="vision-mission">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-subtitle">Our Philosophy</span>
            <h2>Vision & Mission</h2>
        </div>

        <div class="vm-grid" data-aos="fade-up">
            <div class="vm-card">
                <div class="vm-icon"><i class="fas fa-eye"></i></div>
                <h3>Our Vision</h3>
                <p>
                    To become Sri Lanka’s leading name in furniture and interior innovation —
                    creating spaces that reflect sophistication, functionality, and sustainable design.
                </p>
            </div>

            <div class="vm-card">
                <div class="vm-icon"><i class="fas fa-bullseye"></i></div>
                <h3>Our Mission</h3>
                <p>
                    To craft modern, high-quality furniture and interiors that enhance the way
                    people live and work. We merge creativity with craftsmanship, ensuring
                    every design embodies our core values of quality, comfort, and style.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- What We Offer Section -->
<section class="offer-section">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-subtitle">What We Do</span>
            <h2>What We Offer</h2>
            <p>From custom creations to full-scale interior projects, Callista LK delivers design excellence across
                every detail.</p>
        </div>

        <div class="offer-grid" data-aos="fade-up">
            <div class="offer-card">
                <i class="fas fa-couch offer-icon"></i>
                <h3>Premium Furniture</h3>
                <p>Modern and classic collections built from top-grade materials, offering durability and elegance that
                    last a lifetime.</p>
            </div>
            <div class="offer-card">
                <i class="fas fa-paint-roller offer-icon"></i>
                <h3>Custom Design</h3>
                <p>Tailor-made furniture to match your vision — every color, texture, and shape personalized for your
                    space.</p>
            </div>
            <div class="offer-card">
                <i class="fas fa-ruler-combined offer-icon"></i>
                <h3>Interior Design Services</h3>
                <p>Complete space planning and styling, combining function and aesthetics to create cohesive and
                    inspiring interiors.</p>
            </div>
            <div class="offer-card">
                <i class="fas fa-leaf offer-icon"></i>
                <h3>Sustainable Solutions</h3>
                <p>Eco-conscious designs using renewable materials and energy-efficient practices to protect our planet.
                </p>
            </div>
        </div>
    </div>
</section>




<!-- Our Philosophy Section -->
<section class="philosophy-section">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-subtitle">Our Approach</span>
            <h2>Design Philosophy</h2>
            <p>We believe that great design is more than aesthetics—it's about creating spaces that enhance lives,
                inspire creativity, and reflect the unique personality of those who inhabit them.</p>
        </div>

        <div class="philosophy-grid">
            <div class="philosophy-card">
                <div class="philosophy-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3>Innovation First</h3>
                <p>We stay ahead of design trends while creating timeless spaces that won't feel outdated. Our team
                    continuously explores new materials, technologies, and methodologies.</p>
            </div>

            <div class="philosophy-card">
                <div class="philosophy-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Client-Centered</h3>
                <p>Every project begins with understanding you. We listen to your needs, lifestyle, and dreams to create
                    spaces that are uniquely yours.</p>
            </div>

            <div class="philosophy-card">
                <div class="philosophy-icon">
                    <i class="fas fa-leaf"></i>
                </div>
                <h3>Sustainable Design</h3>
                <p>We're committed to environmentally responsible design, using sustainable materials and
                    energy-efficient solutions without compromising style.</p>
            </div>

            <div class="philosophy-card">
                <div class="philosophy-icon">
                    <i class="fas fa-cog"></i>
                </div>
                <h3>Functional Beauty</h3>
                <p>Beautiful spaces should work beautifully too. We balance aesthetics with functionality to create
                    spaces that are both stunning and practical.</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-subtitle">Meet Our Team</span>
            <h2>Talented Designers & Creatives</h2>
            <p>Our diverse team brings together expertise in interior design, architecture, project management, and
                sustainable design to deliver exceptional results.</p>
        </div>

        <div class="team-grid">
            <div class="team-member">
                <div class="member-image">
                    <img src="../assets/p (1).jpeg" alt="Sarah Mitchell">
                    <div class="member-overlay">
                        <div class="social-links">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
                <div class="member-info">
                    <h3>Sarah Mitchell</h3>
                    <span class="member-role">Founder & Creative Director</span>
                    <p>With over 15 years of experience, Sarah leads our creative vision and has been recognized with
                        numerous design awards.</p>
                    <div class="member-credentials">
                        <span class="credential">NCIDQ Certified</span>
                        <span class="credential">LEED AP</span>
                    </div>
                </div>
            </div>

            <div class="team-member">
                <div class="member-image">
                    <img src="../assets/p.jpeg" alt="Michael Chen">
                    <div class="member-overlay">
                        <div class="social-links">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-behance"></i></a>
                            <a href="#"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
                <div class="member-info">
                    <h3>Michael Chen</h3>
                    <span class="member-role">Senior Interior Designer</span>
                    <p>Specializing in modern and contemporary design, Michael brings innovative solutions to
                        residential and commercial projects.</p>
                    <div class="member-credentials">
                        <span class="credential">AIA Member</span>
                        <span class="credential">IIDA Member</span>
                    </div>
                </div>
            </div>

            <div class="team-member">
                <div class="member-image">
                    <img src="../assets/p (2).jpeg" alt="Elena Rodriguez">
                    <div class="member-overlay">
                        <div class="social-links">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-pinterest"></i></a>
                            <a href="#"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
                <div class="member-info">
                    <h3>Elena Rodriguez</h3>
                    <span class="member-role">Sustainable Design Specialist</span>
                    <p>Elena leads our sustainability initiatives, ensuring every project meets the highest
                        environmental standards.</p>
                    <div class="member-credentials">
                        <span class="credential">LEED AP BD+C</span>
                        <span class="credential">WELL AP</span>
                    </div>
                </div>
            </div>

            <div class="team-member">
                <div class="member-image">
                    <img src="../assets/p (3).jpeg" alt="David Thompson">
                    <div class="member-overlay">
                        <div class="social-links">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
                <div class="member-info">
                    <h3>David Thompson</h3>
                    <span class="member-role">Project Manager</span>
                    <p>David ensures every project runs smoothly from concept to completion, coordinating with
                        contractors and vendors.</p>
                    <div class="member-credentials">
                        <span class="credential">PMP Certified</span>
                        <span class="credential">NCIDQ Member</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Why Choose Us Section -->
<section class="why-choose">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-subtitle">Why Callista LK</span>
            <h2>Why Choose Us</h2>
            <p>We combine creativity, craftsmanship, and care to create experiences that go beyond furniture — they
                define lifestyle.</p>
        </div>

        <div class="why-grid" data-aos="fade-up">
            <div class="why-card">
                <i class="fas fa-gem"></i>
                <h3>Uncompromising Quality</h3>
                <p>Every piece is made with precision, premium materials, and attention to detail — built to last and
                    impress.</p>
            </div>

            <div class="why-card">
                <i class="fas fa-handshake"></i>
                <h3>Client-Focused Approach</h3>
                <p>We listen, collaborate, and adapt — making sure your ideas guide every stage of design and
                    production.</p>
            </div>

            <div class="why-card">
                <i class="fas fa-palette"></i>
                <h3>Timeless Design</h3>
                <p>Our designs blend contemporary trends with classic elegance, ensuring beauty that never fades.</p>
            </div>

            <div class="why-card">
                <i class="fas fa-leaf"></i>
                <h3>Eco-Conscious Vision</h3>
                <p>We take pride in using sustainable materials and processes that care for both people and the planet.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection