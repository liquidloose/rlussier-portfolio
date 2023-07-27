import * as esbuild from "esbuild";
import { sassPlugin } from "esbuild-sass-plugin";

let react = await esbuild.context({
  entryPoints: ["./react-apps/basic-react-app/app.jsx"],
  sourcemap: true,
  bundle: true,
  outfile: "react-compiled/out.js",
});

let smoothScroller = await esbuild.context({
  entryPoints: ["./js/smoothScroll.js"],
  sourcemap: true,
  bundle: true,
  outfile: "js-compiled/smooth.js",
});

let home = await esbuild.context({
  entryPoints: ["./scss/home.scss"],
  sourcemap: true,
  bundle: true,
  plugins: [sassPlugin()],
  outfile: "./css/home.css",
});

let smoothStyle = await esbuild.context({
  entryPoints: ["./scss/smooth.scss"],
  sourcemap: true,
  bundle: true,
  plugins: [sassPlugin()],
  outfile: "./css/smooth.css",
});

await react.watch();
console.log("watching...react");

await smoothScroller.watch();
console.log("watching...smooth.js");

await home.watch();
console.log("watching...home");

await smoothStyle.watch();
console.log("watching... smoothStyle");
