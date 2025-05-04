import React from "react";
import { createRoot } from "react-dom";
// import { BrowserRouter as Router } from "react-router-dom";
// import { Provider } from "react-redux";
import App from "App";
import { createHooks } from "@wordpress/hooks";
window.main_plugin_hooks = createHooks();

document.addEventListener("DOMContentLoaded", function () {
  const body = document.getElementById("TEXT_DOMAIN-body");
  const root = createRoot(body);

  root.render(<App />);
});
