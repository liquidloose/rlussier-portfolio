import * as esbuild from "esbuild";

await esbuild.build({
  entryPoints: ["./react-apps/basic-react-app/app.jsx"],
  sourcemap: false,
  bundle: true,
  outfile: "react-compiled/out.js",
});
