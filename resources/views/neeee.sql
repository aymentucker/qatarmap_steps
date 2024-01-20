

CREATE TABLE companies (
    company_id INT AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(255),
    license_number VARCHAR(255),
    address VARCHAR(255),
    description TEXT,
    logo_url VARCHAR(255),
    social_media_links TEXT
);

CREATE TABLE employees (
    employee_id INT AUTO_INCREMENT PRIMARY KEY,
    company_id INT,
    name VARCHAR(255),
    photo_url VARCHAR(255),
    phone_number VARCHAR(255),
    email VARCHAR(255),
    FOREIGN KEY (company_id) REFERENCES companies(company_id)
);

CREATE TABLE properties (
    property_id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT,
    name VARCHAR(255),
    price DECIMAL(10, 2),
    city VARCHAR(255),
    region VARCHAR(255),
    description TEXT,
    number_of_bathrooms INT,
    number_of_rooms INT,
    property_type VARCHAR(255),
    furnishing_status VARCHAR(255),
    finishing_status VARCHAR(255),
    area DECIMAL(10, 2),
    pictures_urls TEXT,
    address VARCHAR(255),
    view_count INT DEFAULT 0,
    favorites_count INT DEFAULT 0,
    FOREIGN KEY (employee_id) REFERENCES employees(employee_id)
);

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    phone_number VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    photo_url VARCHAR(255)
);

CREATE TABLE favorites (
    favorite_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    property_id INT,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (property_id) REFERENCES properties(property_id)
);



php artisan make:migration create_companies_table
Schema::create('companies', function (Blueprint $table) {
    $table->id(); // company_id
    $table->string('company_name');
    $table->string('license_number');
    $table->string('address');
    $table->text('description')->nullable();
    $table->string('logo_url')->nullable();
    $table->text('social_media_links')->nullable(); // Consider JSON type if your DB supports
    $table->timestamps();
});
php artisan make:migration create_employees_table
Schema::create('employees', function (Blueprint $table) {
    $table->id(); // employee_id
    $table->foreignId('company_id')->constrained();
    $table->string('name');
    $table->string('photo_url')->nullable();
    $table->string('phone_number');
    $table->string('email');
    $table->timestamps();
});
php artisan make:migration create_properties_table
Schema::create('properties', function (Blueprint $table) {
    $table->id(); // property_id
    $table->foreignId('employee_id')->constrained();
    $table->string('name');
    $table->decimal('price', 10, 2);
    $table->string('city');
    $table->string('region');
    $table->text('description');
    $table->integer('number_of_bathrooms');
    $table->integer('number_of_rooms');
    $table->string('property_type');
    $table->string('furnishing_status');
    $table->string('finishing_status')->nullable();
    $table->decimal('area');
    $table->text('pictures_urls'); // Consider JSON type if your DB supports
    $table->string('address');
    $table->integer('view_count')->default(0);
    $table->integer('favorites_count')->default(0);
    $table->timestamps();
});
php artisan make:migration create_users_table
Schema::create('users', function (Blueprint $table) {
    $table->id(); // user_id
    $table->string('name');
    $table->string('phone_number');
    $table->string('email')->unique();
    $table->string('password');
    $table->string('photo_url')->nullable();
    $table->timestamps();
});
php artisan make:migration create_favorites_table
Schema::create('favorites', function (Blueprint $table) {
    $table->id(); // favorite_id
    $table->foreignId('user_id')->constrained('users');
    $table->foreignId('property_id')->constrained('properties');
    $table->timestamps();
});
php artisan migrate
