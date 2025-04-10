CREATE DATABASE cancerdetection;

USE cancerdetection;

CREATE TABLE patients (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  age INT,
  image_path VARCHAR(255),
  smoking BOOLEAN,
  yellow_fingers BOOLEAN,
  allergy BOOLEAN,
  alcohol_consuming BOOLEAN,
  coughing BOOLEAN,
  chest_pain BOOLEAN,
  submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
