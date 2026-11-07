# AmberDET - Nền tảng luyện thi Duolingo English Test (DET Practice)

<div align="center">

<img width="1919" height="242" alt="AmberDET Banner" src="https://github.com/user-attachments/assets/af741814-c4be-4854-8c2f-8ace744e3082" />

<br/><br/>

[![Laravel Version](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP Version](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![Database](https://img.shields.io/badge/MySQL-8.0%2B-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://mysql.com)
[![AI Powered](https://img.shields.io/badge/AI-Google%20Gemini%201.5-4285F4?style=for-the-badge&logo=google&logoColor=white)](https://ai.google.dev/)
[![Design System](https://img.shields.io/badge/UI-Bento%20Dark%20Theme-ea580c?style=for-the-badge)](https://github.com/phiphong1008-commits/Phat_Trien_Ma_Nguon_Mo)
[![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)](LICENSE)

</div>

---

## 📌 Giới thiệu dự án

**AmberDET (DET Practice)** là nền tảng web mã nguồn mở toàn diện phục vụ việc ôn luyện và thi thử chứng chỉ tiếng Anh quốc tế **Duolingo English Test (DET)**. Hệ thống được xây dựng trên nền tảng **Laravel 12** và **PHP 8.2+**, tích hợp trí tuệ nhân tạo **Google Gemini 1.5 Flash** nhằm tự động hóa quy trình đánh giá bài viết (Writing) và bài nói (Speaking).

### 🌟 Điểm nổi bật của hệ thống
- 🎯 **Ngân hàng câu hỏi chuẩn hóa**: Đầy đủ 4 kỹ năng (Reading, Listening, Speaking, Writing) với các dạng bài đặc trưng của DET (Read and Complete, Read in Context, Listen and Type, Read then Speak, Write about the Photo,...).
- ⏱️ **Mô phỏng thi thử (Mock Test)**: Đề thi thích ứng, quản lý thời gian làm bài từng câu hỏi, tính điểm chuẩn hóa theo thang điểm 10 - 160 và 4 điểm thành phần (*Literacy, Comprehension, Conversation, Production*), cấp chứng chỉ điện tử.
- 🤖 **Phân hệ AI Tutor & Chấm điểm tự động**: Đánh giá chi tiết ngữ pháp, phát âm, vốn từ vựng, cung cấp nhận xét và gợi ý nâng band điểm tức thì.
- 🎨 **Giao diện Bento Dark Theme hiện đại**: Tối ưu trải nghiệm học tập tập trung, hỗ trợ hoàn toàn tương tác không JavaScript (No-JS compliant) đảm bảo tính tiếp cận cao và an toàn.
- 🛡️ **Quản trị hệ thống (Admin Portal)**: Bảng điều khiển trực quan, quản lý danh mục dạng bài, đề thi, câu hỏi, import câu hỏi hàng loạt từ JSON/Excel và quản lý tài khoản người dùng.

---

## 👥 Đội ngũ phát triển (Nhóm sinh viên NTU)

Dự án thuộc học phần **Phát triển Mã nguồn mở** - Trường Đại học Nha Trang.

| STT | Thành viên | Vai trò & Phân hệ phụ trách |
|:---:|---|---|
| 1 | **Đoàn Phi Phong** *(Nhóm trưởng)* | **Module 3: Quản trị hệ thống (Admin) & Phân hệ AI**<br>Quản lý ngân hàng câu hỏi, đề thi, người dùng; Tích hợp Gemini 1.5 Flash chấm điểm tự động & AI Tutor. |
| 2 | **Trần Thế Hào** | **Module 1: Xác thực (Auth) & Luyện tập kỹ năng (Practice)**<br>Hệ thống đăng ký, đăng nhập, Google OAuth; Luyện tập 4 kỹ năng, phân loại độ khó, lưu câu hỏi (Bookmarks) & Lịch sử làm bài. |
| 3 | **Võ Nhật Lâm** | **Module 2: Thi thử (Mock Test) & Bảng điều khiển (Dashboard)**<br>Quy trình thi thử thích ứng, bộ đếm thời gian thực, thuật toán tính điểm DET 10-160, cấp chứng chỉ & thống kê tiến độ học tập. |

---

## 💻 Yêu cầu hệ thống

Trước khi cài đặt và sử dụng dự án, máy tính của bạn cần đáp ứng các yêu cầu sau:

- **Hệ điều hành**: Windows 10/11, macOS hoặc Linux (Ubuntu, Debian, CentOS).
- **PHP**: Phiên bản **`>= 8.2`** (Khuyến nghị PHP 8.2.x có sẵn trong XAMPP hoặc Laragon).
- **Phần mềm máy chủ**: **XAMPP**, **Laragon**, **WampServer** hoặc Docker.
- **Tiện ích mở rộng PHP (Extensions)** bắt buộc:
  - `pdo_mysql`
  - `mbstring`
  - `openssl`
  - `curl`
  - `fileinfo`
  - `gd`
  - `xml`
  - `zip`
- **Cơ sở dữ liệu**: **MySQL `>= 8.0`** hoặc **MariaDB `>= 10.4`**.
- **Composer**: Phiên bản **`>= 2.x`** ([Tải Composer tại đây](https://getcomposer.org/)).
- **Trình duyệt web**: Google Chrome, Microsoft Edge, Cốc Cốc, Brave hoặc Mozilla Firefox (cần cấp quyền Micro để làm bài Speaking và Loa để nghe audio Listening).

---

## 🚀 Hướng dẫn cài đặt chi tiết (Step-by-step Installation)

Thực hiện theo các bước dưới đây để thiết lập và chạy dự án trên máy tính cục bộ của bạn:

### Bước 1: Clone kho mã nguồn từ GitHub
Mở Terminal / PowerShell / Command Prompt và điều hướng tới thư mục lưu trữ web của bạn:

- **Đối với XAMPP (Windows):**
  ```bash
  cd C:\xampp\htdocs
  git clone https://github.com/phiphong1008-commits/Phat_Trien_Ma_Nguon_Mo.git
  cd Phat_Trien_Ma_Nguon_Mo
  ```

- **Đối với Laragon (Windows):**
  ```bash
  cd C:\laragon\www
  git clone https://github.com/phiphong1008-commits/Phat_Trien_Ma_Nguon_Mo.git
  cd Phat_Trien_Ma_Nguon_Mo
  ```

### Bước 2: Cài đặt các gói phụ thuộc (Composer Dependencies)
Chạy lệnh sau để tải và cài đặt toàn bộ thư viện Laravel:
```bash
composer install
```
*(Nếu gặp cảnh báo về phiên bản PHP trên máy, bạn có thể thêm cờ `--ignore-platform-reqs`)*.

### Bước 3: Tạo file cấu hình môi trường `.env`
Sao chép file mẫu `.env.example` thành file cấu hình chính thức `.env`:
- **Trên Windows (CMD hoặc PowerShell):**
  ```bash
  copy .env.example .env
  ```
- **Trên Linux / macOS / Git Bash:**
  ```bash
  cp .env.example .env
  ```

### Bước 4: Tạo mã khóa bảo mật ứng dụng (Application Key)
Khởi tạo mã khóa mã hóa `APP_KEY` cho Laravel:
```bash
php artisan key:generate
```

### Bước 5: Cấu hình cơ sở dữ liệu (Database)
1. Mở công cụ quản lý cơ sở dữ liệu của bạn (ví dụ: **phpMyAdmin** tại `http://localhost/phpmyadmin`).
2. Tạo một cơ sở dữ liệu mới:
   - **Tên CSDL**: `duoling_csdl_remake` *(hoặc tên tùy chọn của bạn)*.
   - **Bảng mã (Collation)**: `utf8mb4_unicode_ci`.
3. Mở file `.env` trong thư mục dự án bằng trình soạn thảo mã nguồn (VS Code, Notepad,...) và cập nhật các dòng sau:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=duoling_csdl_remake
   DB_USERNAME=root
   DB_PASSWORD=
   ```
   *(Điền `DB_PASSWORD` tương ứng nếu tài khoản MySQL của bạn có mật khẩu)*.

### Bước 6: Khởi tạo bảng và nạp dữ liệu mẫu (Migrations & Seeders)

Hệ thống cung cấp sẵn toàn bộ cấu trúc bảng, ngân hàng câu hỏi 4 kỹ năng phong phú, các đề thi thử và tài khoản mẫu:

```bash
php artisan migrate --seed
```

> [!TIP]
> **Cách thay thế:** Nếu bạn không muốn chạy lệnh seeder, bạn có thể nhập trực tiếp file SQL đã xuất sẵn có tại đường dẫn [`docs/duoling_csdl_remake.sql`](file:///docs/duoling_csdl_remake.sql) vào phpMyAdmin của bạn.

### Bước 7: Tạo liên kết thư mục lưu trữ tài nguyên (Storage Symlink)
Tạo symbolic link để hệ thống tải được các tệp tải lên (ảnh đại diện, file ghi âm giọng nói):
```bash
php artisan storage:link
```

### Bước 8: Cấu hình trí tuệ nhân tạo AI (Tùy chọn)
Hệ thống sử dụng **Google Gemini 1.5 Flash** để chấm điểm tự động. Mở file `.env` và thêm khóa API Gemini của bạn:
```env
AI_PROVIDER=gemini
GEMINI_API_KEY=AIzaSyYourGeminiApiKeyHere...
GEMINI_MODEL=gemini-1.5-flash
AI_DAILY_LIMIT=20
```
> [!NOTE]
> Nếu bạn chưa có Gemini API Key, bạn có thể lấy miễn phí tại [Google AI Studio](https://aistudio.google.com/). Trong trường hợp không điền API Key, hệ thống vẫn hoạt động trơn tru với thuật toán chấm điểm dự phòng (fallback simulation) tích hợp sẵn.

---

## 🖥️ Hướng dẫn khởi chạy ứng dụng

Bạn có thể chạy ứng dụng theo một trong hai cách dưới đây:

### Cách 1: Chạy trực tiếp qua máy chủ XAMPP Apache (Khuyến nghị)
1. Khởi động **Apache** và **MySQL** trong **XAMPP Control Panel**.
2. Đảm bảo thư mục dự án nằm tại `C:\xampp\htdocs\Phat_Trien_Ma_Nguon_Mo`.
3. Cập nhật `APP_URL` trong file `.env`:
   ```env
   APP_URL=http://localhost/Phat_Trien_Ma_Nguon_Mo/public
   ```
4. Mở trình duyệt và truy cập:
   👉 **`http://localhost/Phat_Trien_Ma_Nguon_Mo/public`**

### Cách 2: Chạy bằng máy chủ nội bộ của Laravel (Artisan Serve)
1. Cập nhật `APP_URL` trong file `.env`:
   ```env
   APP_URL=http://localhost:8000
   ```
2. Mở Terminal tại thư mục dự án và gõ lệnh:
   ```bash
   php artisan serve
   ```
3. Mở trình duyệt và truy cập:
   👉 **`http://localhost:8000`**

### ⚙️ Chạy hàng đợi chấm điểm AI (Background Queue Worker)
Khi người dùng nộp bài Writing hoặc Speaking, bài nộp được xử lý qua hàng đợi để không gây đơ giao diện. Mở một cửa sổ Terminal riêng và chạy:
```bash
php artisan queue:work
```

---

## 🔑 Tài khoản mẫu sẵn có để đăng nhập kiểm thử

Sau khi chạy lệnh `php artisan migrate --seed`, hệ thống đã tạo sẵn 2 tài khoản mẫu để bạn trải nghiệm ngay lập tức:

| Vai trò | Email đăng nhập | Mật khẩu | Quyền hạn và phạm vi trải nghiệm |
|:---|:---|:---:|---|
| **Quản trị viên (Admin)** | `admin@example.com` | `password` | Truy cập toàn bộ khu vực Quản trị (`/admin`): Quản lý danh mục, ngân hàng câu hỏi, đề thi thử, xem nhật ký AI Logs, phân quyền thành viên. |
| **Học viên (User)** | `lam@example.com` | `password` | Thực hiện luyện tập 4 kỹ năng, thi thử Mock Test, sử dụng AI Tutor, xem lịch sử làm bài, lưu câu hỏi yêu thích và nhận chứng chỉ. |

> Bạn cũng có thể tạo tài khoản mới bất cứ lúc nào thông qua trang **Đăng ký** (`/register`) hoặc đăng nhập bằng **Google OAuth** nếu đã thiết lập Client ID.

---

## 📱 Khám phá các phân hệ chính của hệ thống

```
AmberDET (DET Practice)
├── 1. Xác thực & Hồ sơ (Authentication & Profile)
│   ├── Đăng nhập / Đăng ký tài khoản
│   ├── Đăng nhập nhanh bằng Google OAuth
│   └── Quản lý thông tin cá nhân & Đổi mật khẩu
│
├── 2. Luyện tập theo kỹ năng (Practice Module)
│   ├── 4 Kỹ năng: Reading, Listening, Speaking, Writing
│   ├── Bộ lọc dạng bài & Cấp độ khó từ 1 đến 10
│   ├── Chấm điểm tức thì, giải thích chi tiết đáp án
│   ├── Đánh dấu câu hỏi cần ôn lại (Bookmarks)
│   └── Modal xác nhận thoát đồng bộ Bento No-JS
│
├── 3. Thi thử Duolingo English Test (Mock Test Module)
│   ├── Đề thi tiêu chuẩn tích hợp đầy đủ câu hỏi đa kỹ năng
│   ├── Bộ đếm thời gian thực cho từng câu hỏi
│   ├── Thuật toán tính điểm DET chuẩn hóa (10 - 160)
│   ├── 4 Điểm phụ: Literacy, Comprehension, Conversation, Production
│   └── Cấp chứng chỉ điện tử (Certificate) kèm mã xác thực
│
├── 4. AI Tutor & Chấm điểm thông minh (AI Integration)
│   ├── Phân tích ngữ pháp chuyên sâu (Grammar Analysis)
│   ├── Gợi ý từ vựng nâng cao và sửa câu văn tự nhiên
│   ├── Chấm điểm tự động bài nói và bài viết bằng Gemini AI
│   └── Nhật ký chấm điểm chi tiết (AI Logs & Retry mechanism)
│
└── 5. Bảng điều khiển Quản trị (Admin Dashboard)
    ├── Thống kê tổng quan số liệu người dùng, câu hỏi, đề thi
    ├── Quản lý ngân hàng câu hỏi (CRUD, xem trước, lọc đa tiêu chí)
    ├── Nhập/Xuất câu hỏi hàng loạt (Import JSON / Preview)
    ├── Quản lý danh mục dạng bài và cấu trúc đề thi
    └── Phân quyền & Quản lý trạng thái tài khoản người dùng
```

---

## 🧪 Kiểm thử tự động (Automated Testing)

Dự án chú trọng độ tin cậy và chất lượng mã nguồn với bộ kiểm thử tự động toàn diện (**213 bài kiểm thử Unit & Feature Tests**, hơn **950 assertions**):

- **Chạy toàn bộ bộ kiểm thử:**
  ```bash
  php artisan test
  # hoặc
  ./vendor/bin/phpunit
  ```

- **Chạy kiểm thử riêng phân hệ Luyện tập (Practice):**
  ```bash
  php ./vendor/phpunit/phpunit/phpunit tests/Feature/PracticeTest.php
  ```

- **Chạy kiểm thử riêng phân hệ Thi thử (Mock Test):**
  ```bash
  php ./vendor/phpunit/phpunit/phpunit tests/Feature/MockTestTest.php
  ```

- **Chạy kiểm thử riêng phân hệ Quản trị (Admin) & AI:**
  ```bash
  php ./vendor/phpunit/phpunit/phpunit tests/Feature/AdminTest.php
  php ./vendor/phpunit/phpunit/phpunit tests/Feature/PracticeAITest.php
  ```

---

## 📂 Cấu trúc thư mục dự án

```
Phat_Trien_Ma_Nguon_Mo/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/             # Controller Quản trị: QuestionBank, Exams, Users, AI Logs
│   │   │   ├── Auth/              # Controller Xác thực: Login, Register, Google OAuth
│   │   │   ├── Certificate/       # Controller Cấp chứng chỉ kết quả thi
│   │   │   ├── MockTest/          # Controller Thi thử: Làm bài, Cấp câu hỏi, Tính điểm
│   │   │   ├── Practice/          # Controller Luyện tập: Kỹ năng, Dạng bài, Bookmarks, AI
│   │   │   └── Tutor/             # Controller AI Tutor: Ngữ pháp, Từ vựng
│   │   └── Middleware/            # Middleware: Phân quyền Admin, Kiểm tra trạng thái User
│   ├── Models/                    # Eloquent Models: Nguoidung, Cauhoi, Dethi, Lanthi,...
│   └── Services/                  # Dịch vụ AI (Gemini, Speech-to-Text), Scoring Service
├── config/                        # Cấu hình hệ thống (ai.php, auth.php, database.php,...)
├── database/
│   ├── factories/                 # Factories phục vụ kiểm thử dữ liệu
│   ├── migrations/                # Cấu trúc bảng CSDL
│   └── seeders/                   # Dữ liệu mẫu ban đầu: Admin, User, Câu hỏi, Đề thi
├── docs/                          # Tài liệu đặc tả hệ thống, báo cáo đề tài, file CSDL .sql
├── public/
│   ├── audio/                     # Tệp âm thanh bài nghe & bài phát âm mẫu (.mp3, .wav)
│   ├── css/                       # Hệ thống Bento CSS Dark Theme, responsive stylesheets
│   ├── images/                    # Hình ảnh minh họa câu hỏi, logo, icon
│   └── js/                        # Tiện ích bổ trợ (nếu có)
├── resources/
│   └── views/                     # Blade Views: Admin, Practice, Mock-test, Tutor, Layouts
├── routes/
│   ├── web.php                    # Định nghĩa các Route web chính của hệ thống
│   └── console.php                # Lệnh Artisan tùy biến
└── tests/
    ├── Feature/                   # Kiểm thử tính năng (Auth, Practice, MockTest, Admin, AI)
    └── Unit/                      # Kiểm thử đơn vị các thuật toán tính điểm & logic
```

---

## 🛠️ Xử lý sự cố thường gặp (Troubleshooting)

1. **Lỗi `Permission denied` hoặc không ghi được file:**
   - Cấp quyền ghi cho thư mục `storage` và `bootstrap/cache`:
     ```bash
     chmod -R 775 storage bootstrap/cache
     ```
   - Trên Windows: Chuột phải vào thư mục `storage` -> Properties -> Bỏ chọn *Read-only*.

2. **Lỗi không phát được âm thanh Listening hoặc không hiển thị ảnh câu hỏi:**
   - Hãy chắc chắn bạn đã chạy lệnh tạo liên kết storage:
     ```bash
     php artisan storage:link
     ```
   - Kiểm tra các file mẫu đã có trong thư mục `public/audio/` và `public/images/`.

3. **Lỗi `cURL error 60: SSL certificate problem` khi gọi Gemini AI trên Windows:**
   - Tải file chứng chỉ `cacert.pem` từ [curl.se/ca](https://curl.se/ca/cacert.pem).
   - Mở `php.ini` trong thư mục PHP của XAMPP, thêm đường dẫn:
     ```ini
     curl.cainfo = "C:\xampp\php\extras\ssl\cacert.pem"
     openssl.cafile = "C:\xampp\php\extras\ssl\cacert.pem"
     ```
   - Khởi động lại Apache trong XAMPP.

4. **Lỗi CSS/Font trắng trơn hoặc mất định dạng khi chạy trên subfolder XAMPP:**
   - Đảm bảo bạn mở URL qua đúng thư mục `public`: `http://localhost/Phat_Trien_Ma_Nguon_Mo/public`.
   - Kiểm tra giá trị `APP_URL` trong file `.env` đã trùng khớp với đường dẫn trên trình duyệt.

5. **Xóa bộ nhớ đệm khi cập nhật cấu hình:**
   ```bash
   php artisan config:clear
   php artisan cache:clear
   php artisan view:clear
   php artisan route:clear
   ```

---

## 📜 Giấy phép & Bản quyền (License)

Dự án được phát hành mã nguồn mở theo các điều khoản của [Giấy phép MIT](LICENSE).

<div align="center">
  <sub>Đồ án kết thúc môn học <strong>Phát triển Mã nguồn mở</strong> • Năm học 2025 - 2026</sub>
  <br/>
  <sub>Khoa Công nghệ Thông tin — Trường Đại học Nha Trang (NTU)</sub>
</div>
