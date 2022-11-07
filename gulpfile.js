const { src, dest, series } = require('gulp');
const replace = require('gulp-replace');
const { argv } = require('yargs');
const { pascalCase, paramCase, snakeCase, capitalCase } = require("change-case");
const del = require('del');

const paths = [
    'app/**/**',
    'composer.json',
    'package.json.stub',
    'webpack.config.js',
    'index.php',
    'functions.php',
    'page.php',
    'single.php',
    'style.css',
    'inc/**/**',
    'helpers/helpers.php',
    'tests/**/**'
];

const viewDirectories = [
    'views/plates-4',
    'views/blade',
    'views/plates',
    'views/twig'
];

const viewClasses = {
    'plates-4': 'LegacyPlatesView',
    'blade': 'BladeView',
    'plates': 'PlatesView',
    'twig': 'TwigView'
};

function swapNameStrings() {
    let pascalName = pascalCase(argv.name);
    let kebabName = paramCase(argv.name);
    let snakeName = snakeCase(argv.name);
    let titleName = capitalCase(argv.name);
    return src(paths, { base: "./" })
        .pipe(replace('ReplaceMe', pascalName))
        .pipe(replace('replace-me', kebabName))
        .pipe(replace('replace_me', snakeName))
        .pipe(replace('Replace Me', titleName))
        .pipe(dest('./'));
}

function swapVendorStrings() {
    if (typeof argv.vendor === "undefined") {
        argv.vendor = "App";
    }
    let pascalName = pascalCase(argv.vendor);
    let kebabName = paramCase(argv.vendor);
    return src(paths, { base: "./" })
        .pipe(replace('VendorName', pascalName))
        .pipe(replace('vendor-name', kebabName))
        .pipe(dest('./'));
}

function bootstrapJs() {
    return src('./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js')
        .pipe(dest('./assets/static/js'));
}

function bootstrapCss() {
    return src('./node_modules/bootstrap/dist/css/bootstrap.min.css')
        .pipe(dest('./assets/static/css'));
}

function multilevelJs() {
    return src('./node_modules/bootstrap5-multi-level-dropdown/js/bootstrap5-multi-level-dropdown-browser.js').pipe(dest('./assets/static/js'));
}

function multilevelCss() {
    return src('./node_modules/bootstrap5-multi-level-dropdown/css/bootstrap5-multi-level-dropdown-hover.css').pipe(dest('./assets/static/css'));
}

function copyViews() {
    if (typeof argv.view === "undefined") {
        argv.view = "plates-4";
    }
    // copy contents to /views/
    return src('views/' + argv.view + '/**/**').pipe(dest('./views/'));
}

function deleteSourceViews() {
    return del(viewDirectories);
}

function updateViewClass() {
    if (typeof argv.view === "undefined") {
        argv.view = "plates-4";
    }
    return src('./app/Core/View.php')
        .pipe(replace('ViewClassGoesHere', viewClasses[argv.view]))
        .pipe(dest('./app/Core/'));
}

exports.default = series(swapNameStrings, swapVendorStrings, bootstrapJs, bootstrapCss, multilevelJs, multilevelCss, copyViews, deleteSourceViews, updateViewClass);
