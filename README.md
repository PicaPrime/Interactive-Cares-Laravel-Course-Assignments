# Blade Features Used in Views

This project demonstrates a modern approach to building Laravel views using Blade templating features. Below is an overview of the Blade techniques and components implemented:

## Blade Layouts and Sections

-   Utilizes Blade layouts (`x-layout.layout`) to provide a consistent structure across pages.
-   Uses `@section('content')` and `@yield('content')` for injecting page-specific content into the main layout.

## Blade Components

-   Custom Blade components such as `<x-nav />` and `<x-footer />` are used for reusable navigation and footer sections.
-   Promotes DRY principles by encapsulating common UI elements.

## Route Names

-   All routes are named using the `->name()` method for easy reference in Blade templates (e.g., `route('home')`, `route('login')`).

## Asset Management

-   Assets are loaded using Vite with the `@vite` directive for modern frontend tooling and hot reloading.

## Blade Directives

-   Uses Blade directives like `@section`, `@yield`, and `@vite` for clean and maintainable view logic.

## Responsive Design

-   Views are styled with Tailwind CSS for rapid and responsive UI development.

## Example Features

-   Featured posts, recent articles, and user profile sections are built using Blade loops and components for modularity.
-   Category and tag badges are rendered with Blade and styled for clarity.

## Summary

This approach leverages Blade's component system, layout inheritance, and directive syntax to create scalable, maintainable, and visually appealing Laravel applications.
