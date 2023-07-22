import * as esbuild from "esbuild";
import { sassPlugin } from "esbuild-sass-plugin";

let react = await esbuild.context({
  entryPoints: ["./react-apps/basic-react-app/app.jsx"],
  sourcemap: true,
  bundle: true,
  outfile: "react-compiled/out.js",
});

let home = await esbuild.context({
  entryPoints: ["./scss/home.scss"],
  sourcemap: true,
  bundle: true,
  plugins: [sassPlugin()],
  outfile: "./css/home.css",
});

await react.watch();
console.log("watching...");

await home.watch();
console.log("watching...");
