import React, { createContext } from "react";
import { createRoot } from "react-dom/client";
import { BrowserRouter as Router } from "react-router-dom";
import { Provider } from "react-redux";
import App from "App";
import store from "redux/store";
import { createHooks } from "@wordpress/hooks";
window.mainPluginHooks = createHooks();

document.addEventListener("DOMContentLoaded", function () {
	const mainpluginbody = document.getElementById("main-plugin-body");
	const root = createRoot(mainpluginbody);

	root.render(
		<Provider store={store}>
			<Router>
				<App />
			</Router>
		</Provider>
	);
});
