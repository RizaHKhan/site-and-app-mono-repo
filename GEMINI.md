# Project Overview

This is a Laravel and Vue.js starter kit designed for building modern, single-page applications. It leverages Inertia.js to bridge the gap between the Laravel backend and the Vue.js frontend, allowing for a seamless development experience.

## Key Technologies

*   **Backend:** Laravel
*   **Frontend:** Vue.js 3 with the Composition API
*   **Styling:** Tailwind CSS with shadcn-vue component library
*   **Build Tool:** Vite
*   **Language:** TypeScript

## Architecture

The project follows a standard Laravel project structure. The frontend components are located in the `resources/js` directory, and the backend code is in the `app` directory. Inertia.js is used to render Vue components from Laravel controllers, providing a tight integration between the frontend and backend.

# Building and Running

## Development

To run the project in a development environment, use the following command:

```bash
composer run dev
```

This command will concurrently start the following processes:

*   `php artisan serve`: The Laravel development server.
*   `php artisan queue:listen`: The Laravel queue worker.
*   `php artisan pail`: Tailing the application logs.
*   `npm run dev`: The Vite development server for the frontend.

## Building for Production

To build the frontend assets for production, use the following command:

```bash
npm run build
```

This will create a `public/build` directory with the compiled assets.

## Testing

To run the test suite, use the following command:

```bash
composer test
```

# Development Conventions

## Coding Style

*   **PHP:** The project uses Laravel Pint for code styling.
*   **TypeScript/Vue:** The project uses Prettier and ESLint for code formatting and linting.

## Commits

Commit messages should follow the Conventional Commits specification.

## Testing

The project uses Pest for testing. Tests are located in the `tests` directory.
