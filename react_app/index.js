import React, { createContext } from "react";
import { createRoot } from "react-dom/client";
import { BrowserRouter as Router } from "react-router-dom";
import { Provider } from "react-redux";
import App from "App";
import store from "redux/store";
import { createHooks } from "@wordpress/hooks";
window.inventoryPosHooks = createHooks();

document.addEventListener("DOMContentLoaded", function () {
	const inventoryposbody = document.getElementById("hrrr-replacelinks-body");
	const root = createRoot(inventoryposbody);

	root.render(
		<Provider store={store}>
			<Router>
				<App />
			</Router>
		</Provider>
	);
});
