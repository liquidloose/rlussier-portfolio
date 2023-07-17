import * as esbuild from 'esbuild'

let ctx = await esbuild.context({
    entryPoints: ['./react-apps/basic-react-app/app.jsx'],
    sourcemap: true,
    bundle: true,
    outfile: 'react-compiled/out.js',
})

await ctx.watch()
console.log('watching...')
