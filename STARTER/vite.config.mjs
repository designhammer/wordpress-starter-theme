import { defineConfig } from 'vite'
import path from 'path'
import fs from 'fs'
import os from 'os'
const homeDir = os.homedir()
// eslint-disable-next-line no-undef
const localenv = require('./vite.local.mjs')

export default defineConfig({
	plugins: [],
	root: '',
	base: process.env.NODE_ENV === 'development'
		? '/'
		: '/assets/dist/',

	build: {
		outDir: 'assets',
		emptyOutDir: false,
		manifest: true,
		sourcemap: true,
		cssMinify: true,
		rollupOptions: {
			// overwrite default .html entry
			input: [
				// eslint-disable-next-line no-undef
				path.resolve(__dirname, '/src/main.js'),
			],
			// Remove the [hash] from file name.
			output: {
				entryFileNames: `[name].js`,
				assetFileNames: `[name].[ext]`,
			}
		}
	},
	css: {
		devSourcemap: true,
		preprocessorOptions: {
			scss: {
				api: 'modern',
				quietDeps: true,
			},
		},
	},
	server: {
		cors: true,
		// Update inc.vite.php to match the same port
		host: '0.0.0.0',
		port: 5172,
		strictPort: true,
		origin: localenv.origin,
		https: {
		  // provide path starting from macOS home directory.
		  key: fs.readFileSync(path.resolve(homeDir, localenv.key)),
		  cert: fs.readFileSync(path.resolve(homeDir, localenv.cert)),
		},
	}
})
