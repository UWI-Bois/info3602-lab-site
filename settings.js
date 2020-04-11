var theme_dir = './wp-content/themes/my-website-theme/';
console.log(`Settings.js says: trying to check theme dir -> ${site_url} -> please double check this with the path in your ide!`);
exports.themeLocation = theme_dir;

var site_url = 'http://anansiuniversity.local/';
console.log(`Settings.js says: trying to check site url -> ${site_url} -> please double check this with the url in your browser!`);
exports.urlToPreview = site_url;