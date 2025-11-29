import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/js/app.js",
                "resources/css/dashboard.css",
                "resources/css/auth/index.css",
                "resources/css/calendario/index.css",
                "resources/css/audios/index.css",
                "resources/css/audios/create.css",
                "resources/css/audios/edit.css",
                "resources/css/campanas/index.css",
                "resources/css/campanas/create.css",
                "resources/css/campanas/edit.css",
                "resources/css/campanas/show.css",
                "resources/css/perfil/show.css",
                "resources/css/perfil/edit.css",
                "resources/css/reproductor/index.css",
                "resources/css/reproductor/interfaz.css",
                "resources/css/reproductor/lista.css",
                "resources/css/reproductor/controles.css",
                "resources/css/configuracion/general.css",
                "resources/css/configuracion/usuarios.css",
                "resources/js/auth.js",
                "resources/js/campanas/index.js",
                "resources/js/campanas/form.js",
            ],
            refresh: true,
        }),
    ],
});
