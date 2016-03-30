<?php
if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This file is a MediaWiki extension, it is not a valid entry point' );
}

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'BaseHooks',
	'version' => '0.0.1',
	'author' => array( '[https://www.mediawiki.org/wiki/User:VictorPorton Victor Porton]' ),
	'descriptionmsg' => 'basehooks-desc',
	'url' => 'https://www.mediawiki.org/wiki/Extension:BaseHooks',
);

$wgMessagesDirs['BaseHooks'] = __DIR__ . '/i18n';

$wgAutoloadClasses['BaseHooksHooks'] = __DIR__ . '/BaseHooks.hooks.php';
$wgHooks['SkinAfterBottomScripts'][] = 'BaseHooksHooks::onSkinAfterBottomScripts';
$wgHooks['UnitTestsList'][] = 'BaseHooksHooks::onUnitTestsList';
