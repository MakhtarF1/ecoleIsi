-- Structure de la base de données
CREATE DATABASE IF NOT EXISTS isi_etudiant;
USE isi_etudiant;

-- Table des étudiants
CREATE TABLE IF NOT EXISTS etudiants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    filiere VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des cours
CREATE TABLE IF NOT EXISTS cours (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_cours VARCHAR(255) NOT NULL,
    code_cours VARCHAR(50) NOT NULL UNIQUE,
    nombre_heures INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);