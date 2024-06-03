# Snapmail

Un clone de Snapmail (https://snapmail.co/) qui permet d’envoyer des messages et/ou des photos qui s’auto-détruisent.

## Étapes de développement

### 1. Frontend
Créer le formulaire d’envoi de messages avec Blade et le router de Laravel.

#### Champs du formulaire :
- **Email du destinataire** (champ texte) [OBLIGATOIRE]
- **Message** (textarea) [OBLIGATOIRE]
- **Photo** (file) [OPTIONNEL]

### 2. Backend
Se connecter à une base de données SQL et créer la table `messages` via une migration.

#### Structure de la table `messages` :
- **id** (auto-increment)
- **timestamps** (created_at et updated_at)
- **message** (text)
- **photo** (string)
- **token** (unique)

### 3. Seeder
Créer un seeder pour ajouter de faux messages en base de données.

### 4. Enregistrement de messages
- Faire fonctionner le formulaire.
- Valider le formulaire en utilisant le système de validation de Laravel et via une Request spécifique au formulaire.
- Utiliser un CSRF Token pour protéger le formulaire.
- Afficher les messages d’erreurs de validation via un message flash.
- Stocker la photo envoyée localement via le disque public de Laravel.
- Générer automatiquement le token lors de la création d’un message et le stocker en base de données.
- Envoyer un email au destinataire pour le prévenir qu’un message temporaire est disponible (mettre le lien vers le message dans l’email).
- Confirmer l’envoi du formulaire via un message flash.

### 5. Affichage du message temporaire
- Afficher le message / la photo.
- Supprimer le message de la base de données une fois celui-ci ouvert.
- Supprimer le fichier si une photo est présente.

### 6. Gestion d’erreurs
- Gérer les erreurs si le message n’existe pas ou plus (404).

## Options

- Écrire des messages en markdown et les afficher en HTML via `laravel-markdown`.

## Mails

Les emails ne seront pas réellement envoyés. Utilisez un système de mail local comme Mailtrap pour "logger" les emails et ne pas les envoyer : [Laravel Mail and Local Development](https://laravel.com/docs/11.x/mail#mail-and-local-development).

## Contraintes

- **ORM interdit** (Laravel Eloquent). Pas de classe Model. Les requêtes SQL doivent utiliser OBLIGATOIREMENT le query builder (classe DB).
- Vos routes doivent appeler les méthodes d’un controller.
- Vous devez avoir 3 routes :
  - `/` **GET** : affichage du formulaire
  - `/` **POST** : envoi du formulaire
  - `/message/{token}` **GET** : affichage du message

## Ressources

- **Views / Blade**
- **Routing**
- **Migration**
- **Seeder**
- **Queries**
- **Validations**
  - **Form request validation**
  - **CSRF Protection**
- **Filesystem**
  - **The public disk**
  - **Deleting files**
- **Flash data**
- **Mail**

LICENCE MIT
