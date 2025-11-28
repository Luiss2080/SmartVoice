import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/js/app.js",
                "resources/css/auth.css",
                "resources/css/dashboard.css",
                "resources/css/calendar.css",
                "resources/css/campanas/index.css",
                "resources/css/campanas/create.css",
                "resources/css/campanas/show.css",
                "resources/js/auth.js",
            ],
            refresh: true,
        }),
    ],
});
