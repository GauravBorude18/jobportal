<?php $this->extend('layouts/app'); ?>

<?php $this->section('content'); ?>

<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card shadow-lg slide-up">
                <div class="card-header">
                    <h3><i class="fas fa-user-plus"></i> Create Account</h3>
                </div>
                <div class="card-body">
                    <!-- Success Message -->
                    <?php if (session()->has('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle"></i> <?= session('success'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Error Message -->
                    <?php if (session()->has('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle"></i> <?= session('error'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Validation Errors -->
                    <?php if (session()->has('errors')): ?>
                        <div class="alert alert-danger">
                            <i class="fas fa-warning"></i> <strong>Validation Error!</strong>
                            <ul class="mb-0 mt-2">
                                <?php foreach (session('errors') as $error): ?>
                                    <li><?= $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <!-- Registration Form -->
                    <form action="/user/process-register" method="POST" novalidate>
                        <?= csrf_field(); ?>

                        <div class="mb-3">
                            <label for="name" class="form-label">
                                <i class="fas fa-user"></i> Full Name
                            </label>
                            <input type="text" class="form-control" id="name" name="name" 
                                   value="<?= old('name'); ?>" placeholder="Enter your full name" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope"></i> Email Address
                            </label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   value="<?= old('email'); ?>" placeholder="Enter your email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="fas fa-lock"></i> Password
                            </label>
                            <input type="password" class="form-control" id="password" name="password" 
                                   placeholder="Minimum 6 characters" required minlength="6">
                            <small class="text-muted mt-1 d-block"><i class="fas fa-info-circle"></i> Use a strong password with uppercase, lowercase, and numbers</small>
                        </div>

                        <div class="mb-4">
                            <label for="confirm_password" class="form-label">
                                <i class="fas fa-lock"></i> Confirm Password
                            </label>
                            <input type="password" class="form-control" id="confirm_password" 
                                   name="confirm_password" placeholder="Re-enter your password" required minlength="6">
                        </div>

                        <button type="submit" class="btn btn-primary btn-w-100 mb-3">
                            <i class="fas fa-user-check"></i> Register Now
                        </button>
                    </form>

                    <hr class="my-4">

                    <p class="text-center mb-0">
                        Already have an account? <br>
                        <a href="/login" class="btn btn-outline-primary btn-sm mt-2">
                            <i class="fas fa-sign-in-alt"></i> Login Here
                        </a>
                    </p>
                </div>
            </div>

            <!-- Info Card -->
            <div class="card mt-4" style="border-left: 4px solid #667eea;">
                <div class="card-body">
                    <h6 class="card-title mb-3"><i class="fas fa-lightbulb"></i> Why Register?</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success"></i> Access to exclusive job postings</li>
                        <li class="mb-2"><i class="fas fa-check text-success"></i> Easy job application tracking</li>
                        <li class="mb-2"><i class="fas fa-check text-success"></i> Personalized job recommendations</li>
                        <li><i class="fas fa-check text-success"></i> Build your professional profile</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>

