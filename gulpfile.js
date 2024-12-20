const gulp = require("gulp"),
	zip = require("gulp-zip"),
	sass = require("gulp-sass")(require("sass")),
	csso = require("gulp-csso");

const { name: plugin_name } = require("./package.json");

const zipPlugin = () => {
	// prettier-ignore
	return gulp
		.src([
            '**', 
            '!assets/scss/**', 
            '!node_modules/**', 
            '!.github/**', 
            '!.wordpress-org/**', 
            '!react_app/**', 
            '!*.json', 
            '!*.lock', 
            '!*.js', 
            '!*.config'])
		.pipe(zip(`${plugin_name}.zip`))
		.pipe(gulp.dest('./'));
};

// 👇 Build ZIP create
gulp.task("zip", zipPlugin);

const buildStyles = () => {
	// prettier-ignore
	return gulp.src(['assets/scss/**/*.scss'])
        .pipe(sass().on('error', sass.logError))
        .pipe(csso())
        .pipe(gulp.dest('./assets/css'));
};
// 👇 Build CSS Assets
gulp.task("build-style", buildStyles);
