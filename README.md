NOM COMPLET:  DJOUNOUMDI SALKAM JAMES(DAWII)
# gescope
Plateforme de gestion des interventions de maintenance (Symfony + MySQL). Permet aux techniciens de gérer leurs interventions et aux clients de faire une demande.


# 🛠️ GeScope - Application de gestion des interventions

GeScope est une application **Symfony** qui permet de gérer les demandes et interventions de maintenance.  
Elle a été conçue pour permettre à un client de **demander une intervention** et à l’entreprise de **suivre et gérer ces interventions**.

---

## 🚀 Fonctionnalités

- 📌 Un client peut :
  - Soumettre une demande d’intervention via un formulaire (`/demande`)
  - Fournir ses informations (nom, prénom, adresse, téléphone, email, description de la panne)

- 👨‍🔧 Un technicien / administrateur peut :
  - Consulter la **liste des interventions** (`/intervention/list`)
  - Voir les détails d’une intervention
  - Suivre l’état de la demande (En attente, En cours, Terminée)

---

## Prérequis

Avant d’installer le projet, assurez-vous d’avoir :

- PHP >= 8.1
- [Composer](https://getcomposer.org/)
- [Symfony CLI](https://symfony.com/download)
- MySQL ou SQLite
- Git

---

#Installation

Clonez le projet :

```bash
git clone https://github.com/juniorsalkam76-glitch/gescope.git
cd gescope

