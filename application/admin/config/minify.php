<?php
// output path where the compiled files will be stored (default value: 'assets')
$config['assets_dir'] = 'assets';

// optional - path where the compiled css files will be stored (default value: '' - for backward compatibility)
$config['assets_dir_css'] = '';

// optional - path where the compiled js files will be stored (default value: '' - for backward compatibility)
$config['assets_dir_js'] = '';

// where to look for css files (default value: 'assets/css')
$config['css_dir'] = 'assets';

// where to look for js files (default value: 'assets/js')
$config['js_dir'] = 'assets';

// default file name for css (default value: 'style.css')
$config['css_file'] = 'styles.css';

// default file name for js (default value: 'scripts.js')
$config['js_file'] = 'scripts.js';

// use automatic file names (default value: 'FALSE')
$config['auto_names'] = FALSE;

// compress files or not (default value: 'TRUE')
$config['compress'] = TRUE;

// compression engine setting (default values: 'minify' and 'closurecompiler')
$config['compression_engine'] = array(
		'css' => 'minify', // minify || cssmin
		'js'  => 'closurecompiler' // closurecompiler || jsmin || jsminplus
);

// when you use closurecompiler as compression engine you can choose compression level (default value: 'SIMPLE_OPTIMIZATIONS')
// avaliable options: "WHITESPACE_ONLY", "SIMPLE_OPTIMIZATIONS" or "ADVANCED_OPTIMIZATIONS"
$config['closurecompiler']['compilation_level'] = 'SIMPLE_OPTIMIZATIONS';