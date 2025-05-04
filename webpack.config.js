const defaultConfig = require("@wordpress/scripts/config/webpack.config");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const path = require("path");

const config = {
	...defaultConfig,
	entry: {
		"TEXT_DOMAIN.core.min": path.resolve(__dirname, "react_app/index.js"),
	},
	output: {
		path: path.resolve(__dirname, "assets/js"),
		filename: "[name].js",
	},
	plugins: [...defaultConfig.plugins, new CleanWebpackPlugin()],
	externals: {
		// Third party dependencies.
		jquery: "jQuery",
		react: ["vendor", "React"],
		"react-dom": ["vendor", "ReactDOM"],

		// WordPress dependencies.
		"@wordpress/i18n": ["vendor", "wp", "i18n"],
		"@wordpress/hooks": ["vendor", "wp", "hooks"],
		"@wordpress/api-fetch": ["vendor", "wp", "apiFetch"],
	},
};

module.exports = config;
