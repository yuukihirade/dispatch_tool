import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import basicSsl from '@vitejs/plugin-basic-ssl';

export default defineConfig({
    plugins: [
        basicSsl(),
        react(),
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.jsx',
            ],
            refresh: true,
        }),
    ],
    
    // npm run devでvite開発サーバーを起動する際のIPアドレスとポート番号を指定
    server: {
        host: '0.0.0.0',
        port: '8082',
    },
});
