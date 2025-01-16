# Installation Steps for Laravel Project

Follow these steps to set up your Laravel project:

1. **Clone the Repository**

    ```bash
    git clone <repository-url>
    cd <repository-directory>
    ```

2. **Install Composer Dependencies**

    ```bash
    composer install
    ```

3. **Copy .env File**

    ```bash
    cp .env.example .env
    ```

4. **Generate Application Key**

    ```bash
    php artisan key:generate
    ```

5. **Configure Environment Variables**

    Open the `.env` file and update the necessary environment variables, such as database credentials.

6. **Run Migrations**

    ```bash
    php artisan migrate
    ```

7. **Install NPM Dependencies**

    ```bash
    npm install
    ```

8. **Compile Assets**

    ```bash
    npm run dev
    ```

9. **Serve the Application**
    ```bash
    php artisan serve
    ```

Your Laravel project should now be up and running. Open your browser and navigate to `http://localhost:8000` to see the application.
