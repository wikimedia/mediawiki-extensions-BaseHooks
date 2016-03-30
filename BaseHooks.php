<?php

if ( function_exists( 'wfLoadExtension' ) ) {
	wfLoadExtension( 'BaseHooks' );
	// Keep i18n globals so mergeMessageFileList.php doesn't break
	$wgMessagesDirs['BaseHooks'] = __DIR__ . '/i18n';
	/* wfWarn(
		'Deprecated PHP entry point used for BaseHooks extension. Please use wfLoadExtension instead, ' .
		'see https://www.mediawiki.org/wiki/Extension_registration for more details.'
	); */
	return;
} else {
	die( 'This version of the BaseHooks extension requires MediaWiki 1.25+' );
}
