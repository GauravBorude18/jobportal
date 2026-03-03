<?php $this->extend('layouts/app'); ?>

<?php $this->section('title'); ?>Home - CareerConnect<?php $this->endSection(); ?>

<?php $this->section('content'); ?>

<style>
    .hero-section {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);
        color: white;
        padding: 6rem 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 600"><defs><pattern id="dot" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="1200" height="600" fill="url(%23dot)"/></svg>');
        pointer-events: none;
    }

    .hero-content {
        position: relative;
        z-index: 1;
    }

    .hero-section h1 {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        line-height: 1.2;
    }

    .hero-section p {
        font-size: 1.3rem;
        margin-bottom: 3rem;
        opacity: 0.9;
    }

    .feature-section {
        padding: 5rem 0;
        background: #f8f9fa;
    }

    .feature-box {
        text-align: center;
        padding: 2rem;
        border-radius: 15px;
        background: white;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .feature-box:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .feature-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .feature-box h4 {
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .feature-box p {
        color: var(--text-light);
        margin: 0;
        font-size: 0.95rem;
    }

    .cta-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 4rem 0;
        text-align: center;
    }

    .cta-section h2 {
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
        font-weight: 700;
    }

    .cta-section p {
        font-size: 1.1rem;
        margin-bottom: 2rem;
        opacity: 0.9;
    }

    .job-count-section {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
        padding: 3rem 0;
    }

    .stat-item {
        text-align: center;
    }

    .stat-item h3 {
        font-size: 2.5rem;
        font-weight: 700;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .stat-item p {
        color: var(--text-light);
        font-weight: 500;
    }
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container hero-content slide-up">
        <h1>Find Your Dream Job</h1>
        <p>Discover thousands of job opportunities and connect with top employers</p>
        <div>
            <?php if (!session()->has('user_id')): ?>
                <a href="/register" class="btn btn-primary btn-lg me-3">
                    <i class="fas fa-user-plus"></i> Get Started
                </a>
                <a href="/login" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
            <?php else: ?>
                <a href="/dashboard" class="btn btn-primary btn-lg">
                    <i class="fas fa-arrow-right"></i> Go to Dashboard
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="job-count-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 stat-item">
                <h3>5000+</h3>
                <p>Active Job Listings</p>
            </div>
            <div class="col-md-4 stat-item">
                <h3>10000+</h3>
                <p>Registered Candidates</p>
            </div>
            <div class="col-md-4 stat-item">
                <h3>500+</h3>
                <p>Top Employers</p>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="feature-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--text-dark);">Why Choose CareerConnect?</h2>
            <p class="text-muted" style="font-size: 1.1rem;">The easiest way to find a job and build your career</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h4>Easy Search</h4>
                    <p>Find jobs that match your skills and preferences in seconds</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-bell"></i>
                    </div>
                    <h4>Smart Alerts</h4>
                    <p>Get notified about jobs that perfectly match your profile</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h4>Fast Apply</h4>
                    <p>Apply to multiple jobs with just one click</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Secure & Safe</h4>
                    <p>Your data is encrypted and protected with latest security measures</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h4>Career Growth</h4>
                    <p>Track your progress and improve your chances of getting hired</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4>Community</h4>
                    <p>Connect with thousands of job seekers and professionals</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h4>Top Employers</h4>
                    <p>Find opportunities from India's leading companies</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4>24/7 Support</h4>
                    <p>Get help anytime with our dedicated support team</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2>Ready to Start Your Journey?</h2>
        <p>Join thousands of successful candidates who found their dream jobs on CareerConnect</p>
        <?php if (!session()->has('user_id')): ?>
            <div>
                <a href="/register" class="btn btn-light btn-lg me-3">
                    <i class="fas fa-user-plus"></i> Register Now
                </a>
                <a href="/login" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
            </div>
        <?php else: ?>
            <a href="/dashboard" class="btn btn-light btn-lg">
                <i class="fas fa-arrow-right"></i> Go to Dashboard
            </a>
        <?php endif; ?>
    </div>
</section>

<?php $this->endSection(); ?>
