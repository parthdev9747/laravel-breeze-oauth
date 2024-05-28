<h1 align="center">Laravel Breeze with OAuth 2.0 (Github + Google)</h1>

<h3>Implementation</h3>
<ul>
    <li>Laravel Breeze</li>
    <li>Laravel Socialite</li>
    <li>OAuth (Google + Github)</li>
</ul>

## Installation Steps

1. **Clone this repo**:

2. **Install dependencies**:

    ```bash
    composer install
    ```

3. **Install dependencies**:

    ```bash
    npm install && npm run dev
    ```

4. **Database migrate**:

    ```bash
    php artisan migrate
    ```

5. **Add keys for github and google in env file**:

    ```bash
    GITHUB_CLIENT_ID=
    GITHUB_CLIENT_SECRET=

    GOOGLE_CLIENT_ID=
    google_client_secret=
    ```

6. **Run application**:

    ```bash
    php artisan serve
    ```

That's it! Your Laravel application now supports OAuth 2.0 authentication with GitHub and Google.
