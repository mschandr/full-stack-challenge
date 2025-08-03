import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import { defineConfig } from 'vite';
import fs from 'fs';

export default defineConfig({
    server: {
        host: 'wisejobs.local', // ← this is the actual fix
        port: 5173,
        https: {
            key: fs.readFileSync('./certs/wisejobs.local.key'),
            cert: fs.readFileSync('./certs/wisejobs.local.crt'),
        },
        strictPort: true,
    },
    hmr: {
        host: 'wisejobs.local',
    },
    plugins: [
        laravel({
            input: ['resources/js/app.ts'],
            //ssr: 'resources/js/ssr.ts',
            refresh: true,
        }),
        tailwindcss(),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});
