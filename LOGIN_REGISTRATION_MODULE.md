# CareerConnect - Login & Registration Module

## 📋 Module Overview

The **Login & Registration Module** is a core authentication system for the CareerConnect Job Portal. It provides secure user registration, login/logout functionality, and session management with Bootstrap 5 styling.

---

## ✨ Features

### 1. **User Registration**
- New users can create an account with Name, Email, and Password
- Email validation (must be unique)
- Password validation (minimum 6 characters)
- Passwords are securely hashed using `password_hash()` with BCRYPT
- Form validation with error messages
- Redirect to login after successful registration

### 2. **User Login**
- Users authenticate with Email and Password
- Password verification using `password_verify()`
- Session creation for logged-in users
- Error handling for invalid credentials
- Auto-redirect if already logged in

### 3. **Dashboard**
- User-specific welcome message
- Quick access cards for browsing jobs, applications, profile, and settings
- Statistics section (extensible for future features)
- Logout functionality

### 4. **Session Management**
- Secure session handling using CodeIgniter 4 sessions
- Automatic logout with session destruction
- Session-based access control to dashboard

### 5. **Security Features**
- CSRF protection via CodeIgniter 4 built-in CSRF tokens
- Password hashing with BCRYPT algorithm
- Secure session handling
- Input validation on both client and server sides

---

## 📁 Project Structure

```
app/
├── Controllers/
│   └── User.php                    # Handles all user operations
├── Models/
│   └── UserModel.php               # Database interactions
├── Database/
│   └── Migrations/
│       └── 2026-02-18-000001_CreateUsersTable.php
├── Views/
│   ├── auth/
│   │   ├── register.php            # Registration form
│   │   └── login.php               # Login form
│   ├── dashboard.php               # Dashboard page
│   └── layouts/
│       └── app.php                 # Base layout template
└── Config/
    └── Routes.php                  # Route configuration
```

---

## 🗄️ Database Schema

### `users` Table

| Column | Type | Constraints | Description |
|--------|------|-------------|-------------|
| id | INT | PRIMARY KEY, AUTO_INCREMENT | Unique user identifier |
| name | VARCHAR(255) | NOT NULL | User full name |
| email | VARCHAR(255) | NOT NULL, UNIQUE | User email address |
| password | VARCHAR(255) | NOT NULL | Hashed password |
| created_at | DATETIME | NULL | Account creation timestamp |
| updated_at | DATETIME | NULL | Last update timestamp |

---

## 🛣️ Routes

| Method | Route | Controller Method | Purpose |
|--------|-------|------------------|---------|
| GET | `/register` | `User::register` | Display registration form |
| POST | `/user/process-register` | `User::processRegister` | Process registration |
| GET | `/login` | `User::login` | Display login form |
| POST | `/user/process-login` | `User::processLogin` | Process login |
| GET | `/dashboard` | `User::dashboard` | Display user dashboard |
| GET | `/user/logout` | `User::logout` | Logout user |

---

## 💻 Controller: `app/Controllers/User.php`

### Key Methods

#### 1. `register()`
- Displays the registration form
- Redirects to dashboard if already logged in
- Returns: Registration view

#### 2. `processRegister()`
- Validates user input (name, email, password)
- Checks email uniqueness
- Hashes password
- Creates user account
- Redirects to login on success

**Validation Rules:**
```php
'name'     => 'required|string|min_length[3]|max_length[255]'
'email'    => 'required|valid_email|is_unique[users.email]'
'password' => 'required|min_length[6]'
'confirm_password' => 'required|matches[password]'
```

#### 3. `login()`
- Displays the login form
- Redirects to dashboard if already logged in
- Returns: Login view

#### 4. `processLogin()`
- Gets email and password from POST request
- Verifies credentials against database
- Creates session on successful login
- Sets session variables: `user_id`, `user_name`, `user_email`, `isLoggedIn`

#### 5. `dashboard()`
- Checks if user is logged in
- Redirects to login if not authenticated
- Displays dashboard with user-specific data

#### 6. `logout()`
- Destroys user session
- Redirects to login page
- Clears all session data

---

## 📊 Model: `app/Models/UserModel.php`

### Configuration

```php
protected $table = 'users';
protected $primaryKey = 'id';
protected $returnType = 'array';
protected $useTimestamps = true;
protected $allowedFields = ['name', 'email', 'password'];
```

### Key Methods

#### `getUserByEmail($email)`
- Retrieves user record by email
- Returns: User array or NULL

#### `registerUser($data)`
- Hashes password using BCRYPT
- Inserts user into database
- Returns: Boolean (success/failure)

#### `verifyUser($email, $password)`
- Finds user by email
- Verifies password with stored hash
- Returns: User array on success, FALSE on failure

---

## 🎨 Views

### `auth/register.php`
- Bootstrap 5 card-based design
- Form fields: Name, Email, Password, Confirm Password
- CSRF token included for security
- Success/Error message display
- Link to login page

### `auth/login.php`
- Minimal, focused design
- Form fields: Email, Password
- CSRF token included
- Error message display
- Link to registration page

### `dashboard.php`
- Welcome message for logged-in user
- Feature cards for quick actions
- Statistics section (placeholder for future data)
- Logout button

### `layouts/app.php`
- Base template for all pages
- Bootstrap 5 navbar with dynamic user info
- Gradient background styling
- Responsive layout
- Footer

---

## 🔐 Security Implementation

### 1. **Password Hashing**
```php
$data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
```
- Uses BCRYPT algorithm
- Cost factor: 10 (default)
- 60-character hash storage

### 2. **Password Verification**
```php
password_verify($password, $user['password'])
```
- Safe comparison to prevent timing attacks
- Returns boolean

### 3. **CSRF Protection**
```php
<?= csrf_field(); ?>  <!-- In forms -->
```
- CodeIgniter 4 auto-validates CSRF tokens
- Token regenerated per request (configurable)

### 4. **Session Security**
- Secure session handling by CodeIgniter 4
- Session data stored server-side
- User ID stored in session, not cookie

### 5. **Input Validation**
- Server-side validation on all forms
- Email format validation
- Password length enforcement
- Email uniqueness check

---

## 🚀 How to Use

### 1. **Install & Configure**
```bash
# Clone repository
git clone <repo-url>

# Install dependencies
composer install

# Copy environment file
cp env .env

# Update database credentials in .env
DB_DEFAULT_USERNAME=root
DB_DEFAULT_PASSWORD=
DB_DEFAULT_DATABASE=jobportal
```

### 2. **Run Migration**
```bash
php spark migrate
```

### 3. **Start Development Server**
```bash
php spark serve
```

### 4. **Access the Application**
- Navigate to: `http://localhost:8080`
- Register: `/register`
- Login: `/login`
- Dashboard: `/dashboard`

---

## 📝 Usage Examples

### Register a New User
1. Go to `/register`
2. Enter name, email, password
3. Confirm password
4. Submit form
5. Success message shows, redirect to `/login`

### Login
1. Go to `/login`
2. Enter email and password
3. Submit form
4. Session created, redirect to `/dashboard`

### Access Dashboard
- Only accessible if logged in
- Shows personalized greeting
- Available actions and statistics
- Logout button

### Logout
- Click logout button
- Session destroyed
- Redirect to `/login`

---

## 🔄 Data Flow

```
User Registration Flow:
User → /register → View form → Submit data → Validate → Hash password 
→ Insert into DB → Redirect to /login

User Login Flow:
User → /login → View form → Submit email/password → Verify credentials 
→ Create session → Redirect to /dashboard

Access Control Flow:
User → /dashboard → Check session → If no session, redirect to /login 
→ If session exists, show dashboard

Logout Flow:
User → Click logout → Destroy session → Redirect to /login
```

---

## 🎯 Interview Talking Points

### 1. **Architecture**
- Built on MVC pattern (Model-View-Controller)
- Separation of concerns: Controllers handle business logic, Models handle DB, Views handle UI
- CodeIgniter 4 provides built-in security and routing

### 2. **Database Design**
- Simple, normalized user table
- Email as unique constraint for data integrity
- Timestamps for audit trails

### 3. **Security**
- Password hashing with BCRYPT (industry standard)
- CSRF protection (CodeIgniter 4 built-in)
- Session-based authentication
- Input validation and sanitization

### 4. **User Experience**
- Clear form validation messages
- Bootstrap 5 responsive design
- Smooth redirect flows
- Error handling with user-friendly messages

### 5. **Scalability**
- Can be extended with:
  - User roles (Admin, Recruiter, Job Seeker)
  - Social login (OAuth2)
  - Email verification
  - Password reset functionality
  - Two-factor authentication

### 6. **Testing**
- Unit tests for UserModel methods
- Feature tests for controller actions
- Integration tests for complete flows

---

## 🐛 Common Issues & Solutions

### Issue: "Email already exists"
- **Solution**: Use a different email or reset the database

### Issue: "Invalid password"
- **Solution**: Ensure password matches confirm password, minimum 6 characters

### Issue: Session not persisting
- **Solution**: Check if sessions directory is writable (`writable/session/`)

### Issue: 404 error on routes
- **Solution**: Ensure server is running (`php spark serve`) and routes are correctly defined

---

## 📚 Technologies Used

| Technology | Purpose |
|------------|---------|
| **CodeIgniter 4** | PHP Framework |
| **PHP 7.4+** | Server-side language |
| **MySQL/MariaDB** | Database |
| **Bootstrap 5** | CSS Framework |
| **BCRYPT** | Password hashing |

---

## 📈 Future Enhancements

1. **Email Verification**: Send confirmation email on registration
2. **Password Reset**: Implement forgot password functionality
3. **Social Login**: Add OAuth2 integration (Google, GitHub)
4. **Two-Factor Auth**: Add 2FA for extra security
5. **User Roles**: Implement Admin/Recruiter/Job Seeker roles
6. **Profile Management**: Allow users to update profile info
7. **Activity Logging**: Track user actions for audit trails
8. **Rate Limiting**: Prevent brute force attacks

---

## 📞 Support

For questions or issues, refer to:
- CodeIgniter 4 Documentation: https://codeigniter.com/user_guide/
- Bootstrap 5 Documentation: https://getbootstrap.com/docs/5.3/

---

**Created**: February 18, 2026  
**Version**: 1.0  
**Author**: CareerConnect Development Team
