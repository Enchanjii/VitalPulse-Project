# Quick Start Guide - VitalPulse CRUD Application

## 🚀 Getting Started

### Step 1: Start Your Server

Ensure XAMPP is running:

- MySQL daemon running
- Apache server running

### Step 2: Access the Application

Navigate to: `http://localhost/VitalPulse-Project/`

---

## 🔐 Test Login Credentials

### Admin Account (Full Access)

```
Email:    admin@vitalpulse.com
Password: admin123
```

### Regular User Accounts

```
Email:    test1@example.com
Password: test123
```

---

## 📊 What Each Role Can Do

### 👨‍💼 Admin Features

| Feature                | Permission |
| ---------------------- | ---------- |
| Create Movements       | ✅ Yes     |
| Edit Movements         | ✅ Yes     |
| Delete Movements       | ✅ Yes     |
| View Users             | ✅ Yes     |
| Edit Users             | ✅ Yes     |
| Change User Roles      | ✅ Yes     |
| Delete Users           | ✅ Yes     |
| Access Admin Dashboard | ✅ Yes     |

### 👤 User Features

| Feature               | Permission |
| --------------------- | ---------- |
| Create Movements      | ❌ No      |
| Edit Movements        | ❌ No      |
| Delete Movements      | ❌ No      |
| View Movement Library | ✅ Yes     |
| View Movement Details | ✅ Yes     |
| Access User Dashboard | ✅ Yes     |

---

## 🎯 Key Pages & URLs

### Authentication

- Login/Register: `/` or `/login`
- Logout: Click logout button (POST to `/logout`)

### Admin Pages

- Admin Dashboard: `/admin/dashboard`
- Movements List: `/admin/movements`
- Create Movement: `/admin/movements/create`
- Edit Movement: `/admin/movements/{id}/edit`
- Users List: `/admin/users`
- Edit User: `/admin/users/{id}/edit`

### User Pages

- User Dashboard: `/user/dashboard`
- Movement Library: `/movements`
- Movement Details: `/movements/{id}`

---

## 📝 Common Tasks

### Create a New Movement (Admin Only)

1. Login as admin
2. Go to `/admin/movements`
3. Click "+ Add New Movement"
4. Fill in form:
    - Movement Name (required)
    - Category (optional)
    - Description (optional)
    - Instructions (optional)
5. Click "Create Movement"

### Edit a Movement (Admin Only)

1. Go to `/admin/movements`
2. Find the movement
3. Click "Edit" button
4. Update the fields
5. Click "Update Movement"

### Delete a Movement (Admin Only)

1. Go to `/admin/movements`
2. Click "Delete" button next to movement
3. Confirm deletion

### Manage Users (Admin Only)

1. Go to `/admin/users`
2. Click "Edit" to modify user details
3. Change name, email, or role
4. Click "Update User"

### Change User Role (Admin Only)

1. Go to `/admin/users`
2. Click "Edit" on the user
3. Change role from "user" to "admin" (or vice versa)
4. Click "Update User"
5. User can now access admin features (if promoted to admin)

### Register New User

1. Go to `/` or `/login`
2. Click "Register" or "Sign up" tab
3. Fill in:
    - Full Name
    - Email
    - Password
    - Confirm Password
4. Click "Register"
5. You'll be auto-logged in and redirected to user dashboard

---

## 🔒 Security Notes

- Regular users **cannot** access `/admin/*` routes
- "Add New Movement" button is **completely hidden** from user interface
- Backend routes are **protected** with role middleware
- Passwords are **hashed** with bcrypt
- Sessions are **secure** and managed by Laravel

---

## 💾 Database Details

**Database Name**: `vitalpulseroles`

### Users Table

```sql
id (int)
name (varchar)
email (varchar, unique)
password (varchar, hashed)
role (enum: 'user', 'admin')
created_at (timestamp)
updated_at (timestamp)
```

### Movements Table

```sql
id (int)
name (varchar)
description (text, nullable)
category (varchar, nullable)
instructions (text, nullable)
created_at (timestamp)
updated_at (timestamp)
```

---

## 🧪 Testing Checklist

- [ ] Login as admin with admin credentials
- [ ] Verify admin dashboard loads with stats
- [ ] Create a new movement
- [ ] Edit the movement
- [ ] Delete the movement
- [ ] View list of users
- [ ] Edit a user's profile
- [ ] Change a user's role to admin
- [ ] Logout and login as the new admin
- [ ] Logout and login as regular user
- [ ] Access movement library as user
- [ ] Verify "Add New Movement" button is NOT visible
- [ ] Try accessing `/admin/dashboard` as regular user (should get 403)
- [ ] Register a new user
- [ ] Verify new user redirects to user dashboard
- [ ] Logout functionality works

---

## ❓ Troubleshooting

### Can't login?

- Verify credentials match test accounts above
- Check database has been migrated: `php artisan migrate:status`
- Verify users table has data: `php artisan tinker`

### Buttons not appearing?

- Make sure you're logged in
- Verify your role (check URL or welcome message)
- Try refreshing the page

### Getting "403 Forbidden"?

- You don't have permission for this route
- Regular users cannot access `/admin/*` pages
- Only admins can create/edit/delete movements

### Database errors?

- Ensure MySQL is running
- Check `.env` file has correct database credentials
- Run migrations: `php artisan migrate`
- Seed database: `php artisan db:seed --class=UserSeeder`

---

## 📚 Additional Resources

- Full documentation: See `SETUP_DOCUMENTATION.md`
- Laravel docs: https://laravel.com/docs
- Database check: http://localhost/phpmyadmin

---

**You're all set! Start testing your VitalPulse CRUD application.** 🎉
