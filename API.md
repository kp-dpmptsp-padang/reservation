# API Documentation

## Base URL
```
https://reservasi.dpmptsp.padang.go.id/
```

## Authentication
Sistem menggunakan Laravel Breeze dengan session-based authentication. Setiap request ke protected endpoint harus menyertakan session cookie dan CSRF token.

## Response Format
Semua response menggunakan format yang konsisten:

### Success Response
```json
{
    "success": true,
    "data": {
        // Response data
    },
    "message": "Success message"
}
```

### Error Response
```json
{
    "success": false,
    "message": "Error message",
    "errors": {
        // Validation errors
    }
}
```

## Endpoints

### Authentication

#### Login
```http
POST /login

Request Body:
{
    "email": "admin@example.com",
    "password": "password"
}

Response:
{
    "success": true,
    "data": {
        "user": {
            "id": 1,
            "name": "Admin",
            "email": "admin@example.com",
            "role": "admin"
        }
    },
    "message": "Logged in successfully"
}
```

#### Logout
```http
POST /logout

Response:
{
    "success": true,
    "message": "Logged out successfully"
}
```

### Profile Management

#### Get Profile
```http
GET /profile

Response:
{
    "success": true,
    "data": {
        "id": 1,
        "name": "Admin",
        "email": "admin@example.com",
        "role": "admin"
    }
}
```

#### Update Profile
```http
PUT /profile

Request Body:
{
    "name": "Updated Name",
    "email": "newemail@example.com",
    "password": "newpassword" // Optional
}

Response:
{
    "success": true,
    "message": "Profile updated successfully"
}
```

### User Management (Super Admin Only)

#### List Users
```http
GET /users

Query Parameters:
- page: int
- limit: int
- search: string
- role: string (super-admin/admin)

Response:
{
    "success": true,
    "data": {
        "users": [
            {
                "id": 1,
                "name": "Admin",
                "email": "admin@example.com",
                "role": "admin"
            }
        ],
        "meta": {
            "current_page": 1,
            "last_page": 1,
            "per_page": 10,
            "total": 1
        }
    }
}
```

#### Create User
```http
POST /users

Request Body:
{
    "name": "New Admin",
    "email": "newadmin@example.com",
    "password": "password",
    "role": "admin"
}

Response:
{
    "success": true,
    "data": {
        "user": {
            "id": 2,
            "name": "New Admin",
            "email": "newadmin@example.com",
            "role": "admin"
        }
    },
    "message": "User created successfully"
}
```

#### Update User
```http
PUT /users/{id}

Request Body:
{
    "name": "Updated Name",
    "email": "updated@example.com",
    "role": "admin"
}

Response:
{
    "success": true,
    "message": "User updated successfully"
}
```

#### Delete User
```http
DELETE /users/{id}

Response:
{
    "success": true,
    "message": "User deleted successfully"
}
```

### Visit Management

#### Submit Visit (Public)
```http
POST /visits

Request Body:
{
    "name": "Nama Pengunjung",
    "institution": "Nama Institusi",
    "phone_number": "081234567890",
    "whatsapp_number": "081234567890",
    "email": "visitor@example.com",
    "province": "Sumatera Barat",
    "city": "Padang",
    "address": "Jl. Example No. 123",
    "day": "2024-03-20",
    "clock": "09:00",
    "topic": "Topik Kunjungan",
    "group_size": 5,
    "group_leader": "Nama Ketua",
    "description": "Deskripsi Kunjungan",
    "attachment": FILE
}

Response:
{
    "success": true,
    "data": {
        "visit": {
            "id": 1,
            "status": "menunggu",
            // other visit data
        }
    },
    "message": "Visit submitted successfully"
}
```

#### List Visits
```http
GET /visits

Query Parameters:
- page: int
- limit: int
- search: string
- status: string (menunggu/terverifikasi/sedang-berlangsung/selesai/batal)
- start_date: date (Y-m-d)
- end_date: date (Y-m-d)
- sort: string
- order: string (asc/desc)

Response:
{
    "success": true,
    "data": {
        "visits": [
            {
                "id": 1,
                "name": "Nama Pengunjung",
                "institution": "Nama Institusi",
                "day": "2024-03-20",
                "clock": "09:00",
                "status": "menunggu",
                // other visit data
            }
        ],
        "meta": {
            "current_page": 1,
            "last_page": 1,
            "per_page": 10,
            "total": 1
        }
    }
}
```

#### Get Visit Detail
```http
GET /visits/{id}

Response:
{
    "success": true,
    "data": {
        "visit": {
            "id": 1,
            "name": "Nama Pengunjung",
            "institution": "Nama Institusi",
            "phone_number": "081234567890",
            "whatsapp_number": "081234567890",
            "email": "visitor@example.com",
            "province": "Sumatera Barat",
            "city": "Padang",
            "address": "Jl. Example No. 123",
            "day": "2024-03-20",
            "clock": "09:00",
            "topic": "Topik Kunjungan",
            "group_size": 5,
            "group_leader": "Nama Ketua",
            "description": "Deskripsi Kunjungan",
            "status": "menunggu",
            "attachment_path": "path/to/file",
            "attachment_type": "document",
            "created_at": "2024-03-15T10:00:00Z",
            "updated_at": "2024-03-15T10:00:00Z"
        }
    }
}
```

#### Update Visit
```http
PUT /visits/{id}

Request Body:
{
    "name": "Updated Name",
    "institution": "Updated Institution",
    // other fields
}

Response:
{
    "success": true,
    "message": "Visit updated successfully"
}
```

#### Delete Visit
```http
DELETE /visits/{id}

Response:
{
    "success": true,
    "message": "Visit deleted successfully"
}
```

#### Verify Visit
```http
PUT /visits/{id}/verify

Response:
{
    "success": true,
    "message": "Visit verified successfully"
}
```

#### Cancel Visit
```http
PUT /visits/{id}/cancel

Request Body:
{
    "reason": "Alasan pembatalan"
}

Response:
{
    "success": true,
    "message": "Visit cancelled successfully"
}
```

### Dashboard & Reports

#### Get Dashboard Stats
```http
GET /dashboard

Response:
{
    "success": true,
    "data": {
        "total_visits": 100,
        "pending_visits": 20,
        "ongoing_visits": 5,
        "completed_visits": 70,
        "cancelled_visits": 5
    }
}
```

#### Export Visits
```http
GET /reports/visits

Query Parameters:
- format: string (csv/excel)
- start_date: date (Y-m-d)
- end_date: date (Y-m-d)
- status: string
- columns: string (comma-separated column names)

Response:
File Download (CSV/Excel)
```

#### Export Single Visit
```http
GET /visits/{id}/export

Query Parameters:
- format: string (pdf) // default: pdf

Response:
File Download (PDF format surat kunjungan)
```