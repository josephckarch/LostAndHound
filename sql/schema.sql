CREATE TABLE pets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    breed VARCHAR(100),
    age VARCHAR(20), -- People may not know age, and just put "old" or "young"
    description TEXT,
    status ENUM('lost', 'found') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20) DEFAULT NULL, -- We want people to be able to add phone numbers, but not forced
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- To discuss: do we want to keep this?
);

CREATE TABLE reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description TEXT,
    pet_id INT NOT NULL,
    user_id INT NOT NULL,
    location VARCHAR(255),
    update_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (pet_id) REFERENCES pets(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE pet_pictures (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pet_id INT NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    FOREIGN KEY (pet_id) REFERENCES pets(id) ON DELETE CASCADE
);