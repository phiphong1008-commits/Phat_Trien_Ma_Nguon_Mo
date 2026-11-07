# Phat_Trien_Ma_Nguon_Mo
Thành viên
 - Đoàn Phi Phong
 - Trần Thế Hào
 - Võ Nhật Lâm
: Danh sách tài khoản kiểm thử mặc định trên hệ thống
Vai trò	Email	Mật khẩu	Ghi chú
Quản trị viên	admin@example.com	password	Được tạo đầu tiên (id 1)
Học viên	lam@example.com	password	Tài khoản minh họa

composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
