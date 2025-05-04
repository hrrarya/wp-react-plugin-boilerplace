import { createRoot } from "react-dom";
import App from "./App.jsx";
import { createHooks } from "@wordpress/hooks";
window.main_plugin_hooks = createHooks();

document.addEventListener("DOMContentLoaded", function () {
  const body = document.getElementById("TEXT_DOMAIN-body");
  const root = createRoot(body);

  root.render(<App />);
});
