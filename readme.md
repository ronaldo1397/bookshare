#Bước 1
mở Git Bash gõ: git clone https://github.com/xuannghiapro/bookshare/bookshare.git
#Bước 2
Copy file .env.example ra thành file .env
#Bước 3
Chỉnh sửa file .env với các thông tin
DB_DATABASE=tên_database
DB_USERNAME=user_mysql
DB_PASSWORD=password_mysql
#Bước 4
Mở Git bash tại thư mục chứa .env
#Bước 5
gõ lệnh: composer install để cài thư viện
#Bước 6
gõ lệnh: php artisan key:generate để tạo key
#Bước 7
gõ lệnh: php artisan migrate để tạo bảng cho database
#Bước 8
gõ lệnh: php artisan db:seed để tạo database
#Bước 9
Vào website đăng nhập với tài khoản mặc định là:
- Email: 16521155@gm.uit.edu.vn
- Password: nghiane