**Diagramme de Classe :**

![diagramme de classe](https://github.com/user-attachments/assets/15bcecec-c9cb-41d9-998b-71f81da68224)

**diagramme de cas d'utilisation :**

![use cas inventory management system](https://github.com/user-attachments/assets/81ad7418-f716-4cbb-b76e-14a7088029b5)

**diagramme de séquence pour authentification :**

![séquence_diagramme_auth](https://github.com/user-attachments/assets/b5cfa806-f8a1-4ecc-9c66-386cf51663f9)

**diagramme de séquence pour admin :**

![diagramme_séquenceadmin](https://github.com/user-attachments/assets/3897f8b2-7b70-46dc-aac8-ca61815db7fe)

**diagramme de séquence pour client :**

![client_séqueence_diagramme](https://github.com/user-attachments/assets/f8d5b4f6-308a-4222-8e51-9c4b76c02011)


**diagramme de séquence pour fournisseur :**

![séquence_diagramme_fournisseur](https://github.com/user-attachments/assets/0d437bb5-2a72-4a20-a06b-68bd8353e303)


1. **Clone the repository:**

    ```bash
    git clone https://github.com/yassinezadod/management-system.git
    ```

2. **Navigate to the project folder:**

    ```bash
    cd management-system
    ```

3. **Install PHP dependencies:**

    ```bash
    composer install
    ```

4. **Copy `.env` configuration:**

    ```bash
    cp .env.example .env
    ```

5. **Generate application key:**

    ```bash
    php artisan key:generate
    ```

6. **Configure the database in the `.env` file** with your local credentials.

7. **Run database migrations and seed sample data:**

    ```bash
    php artisan migrate:fresh --seed
    ```

8. **Link storage for media files:**

    ```bash
    php artisan storage:link
    ```

9. **Install JavaScript and CSS dependencies:**

    ```bash
    npm install && npm run dev
    ```

10. **Start the Laravel development server:**

    ```bash
    php artisan serve
    ```

11. **Login using the default admin credentials:**

    - **Email:** `admin@admin.com`
    - **Password:** `password`

