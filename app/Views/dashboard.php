<?php $this->extend('layouts/app'); ?>

<?php $this->section('title'); ?>Dashboard - CareerConnect<?php $this->endSection(); ?>

<?php $this->section('content'); ?>

<div class="container">
    <!-- Success Message -->
    <?php if (session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> <?= session('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Welcome Card -->
    <div class="card shadow-lg mb-4 slide-up" style="border-top: 4px solid #667eea;">
        <div class="card-body text-center py-5">
            <div style="font-size: 3rem; margin-bottom: 1rem;">
                <i class="fas fa-user-circle" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;"></i>
            </div>
            <h2 class="card-title mb-2">Welcome, <span style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;"><?= htmlspecialchars($user_name); ?></span>! 👋</h2>
            <p class="card-text text-muted">You are successfully logged into CareerConnect.</p>
        </div>
    </div>

    <!-- Dashboard Features -->
    <div class="row mb-5">
        <div class="col-md-6 mb-4">
            <div class="feature-card">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">
                    <i class="fas fa-briefcase" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;"></i>
                </div>
                <h5>Browse Jobs</h5>
                <p>Explore latest job opportunities in your field and find your dream job.</p>
                <a href="#" class="btn btn-primary btn-sm">
                    <i class="fas fa-arrow-right"></i> View Jobs
                </a>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="feature-card">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">
                    <i class="fas fa-file-alt" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;"></i>
                </div>
                <h5>Applied Jobs</h5>
                <p>Track all your job applications in one place and monitor progress.</p>
                <a href="#" class="btn btn-success btn-sm">
                    <i class="fas fa-arrow-right"></i> View Applications
                </a>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="feature-card">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">
                    <i class="fas fa-user" style="background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;"></i>
                </div>
                <h5>My Profile</h5>
                <p>Update your profile information and upload your resume.</p>
                <a href="#" class="btn btn-info btn-sm">
                    <i class="fas fa-arrow-right"></i> Edit Profile
                </a>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="feature-card">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">
                    <i class="fas fa-cog" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;"></i>
                </div>
                <h5>Settings</h5>
                <p>Manage your account settings and notification preferences.</p>
                <a href="#" class="btn btn-warning btn-sm">
                    <i class="fas fa-arrow-right"></i> Go to Settings
                </a>
            </div>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="card shadow-lg mb-5">
        <div class="card-header">
            <h5 class="mb-0"><i class="fas fa-chart-bar"></i> Your Statistics</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="stat-card">
                        <h3>0</h3>
                        <p><i class="fas fa-briefcase"></i> Jobs Applied</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <h3>0</h3>
                        <p><i class="fas fa-calendar-check"></i> Job Interviews</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <h3>0</h3>
                        <p><i class="fas fa-star"></i> Saved Jobs</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Tips Section -->
    <div class="row mb-5">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-lightbulb"></i> Tips to Get Hired</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h6 class="mb-2"><i class="fas fa-check text-success"></i> Complete Your Profile</h6>
                            <p class="text-muted small">A complete profile attracts more recruiters and employers.</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h6 class="mb-2"><i class="fas fa-check text-success"></i> Upload Your Resume</h6>
                            <p class="text-muted small">Let recruiters find you with an updated resume.</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h6 class="mb-2"><i class="fas fa-check text-success"></i> Apply to Matching Jobs</h6>
                            <p class="text-muted small">Apply to jobs that match your skills and experience.</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h6 class="mb-2"><i class="fas fa-check text-success"></i> Stay Active</h6>
                            <p class="text-muted small">Regular activity increases your visibility to employers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow h-100" style="background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);">
                <div class="card-body text-center">
                    <h6 class="card-title mb-3">Account Information</h6>
                    <div class="mb-3">
                        <small class="text-muted d-block mb-2">Member Since</small>
                        <p class="mb-3"><i class="fas fa-calendar-alt"></i> Today</p>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted d-block mb-2">Profile Status</small>
                        <p>
                            <span class="badge bg-warning">
                                <i class="fas fa-exclamation-circle"></i> Incomplete
                            </span>
                        </p>
                    </div>
                    <a href="#" class="btn btn-primary btn-sm w-100">
                        <i class="fas fa-user-edit"></i> Complete Profile
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <a href="/user/logout" class="btn btn-danger btn-lg">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>
