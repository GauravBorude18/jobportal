<?php $this->extend('layouts/app'); ?>

<?php $this->section('content'); ?>

<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6">
            <div class="card shadow-lg slide-up">
                <div class="card-header">
                    <h3><i class="fas fa-sign-in-alt"></i> Welcome Back</h3>
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

                    <!-- Login Form -->
                    <form action="/user/process-login" method="POST" novalidate>
                        <?= csrf_field(); ?>

                        <div class="mb-4">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope"></i> Email Address
                            </label>
                            <input type="email" class="form-control form-control-lg" id="email" name="email" 
                                   value="<?= old('email'); ?>" placeholder="your@email.com" required autofocus>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">
                                <i class="fas fa-lock"></i> Password
                            </label>
                            <input type="password" class="form-control form-control-lg" id="password" name="password" 
                                   placeholder="Enter your password" required minlength="6">
                        </div>

                        <div class="mb-4 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">
                                Remember me
                            </label>
                        </div>

                        <button type="submit" class="btn btn-success btn-w-100 btn-lg mb-3">
                            <i class="fas fa-arrow-right"></i> Login
                        </button>
                    </form>

                    <hr class="my-4">

                    <p class="text-center mb-0">
                        Don't have an account? <br>
                        <a href="/register" class="btn btn-outline-success btn-sm mt-2">
                            <i class="fas fa-user-plus"></i> Register Here
                        </a>
                    </p>

                    <hr class="my-4">

                    <p class="text-center mb-0">
                        <a href="#" class="text-muted">
                            <i class="fas fa-question-circle"></i> Forgot Password?
                        </a>
                    </p>
                </div>
            </div>

            <!-- Security Message -->
            <div class="card mt-4" style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%);">
                <div class="card-body text-center">
                    <h6 class="card-title mb-2"><i class="fas fa-shield-alt text-success"></i> Secure Login</h6>
                    <small class="text-muted">Your information is encrypted and secure</small>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>
