<?php

// Prevent direct access
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

$wgExtensionCredits['specialpage'][] = array(
	'path'   => __FILE__,
	'name'   => 'ContentHandlerTest',
	'author' => 'wctaiwan',
	'version' => '0.1',
	'descriptionmsg' => 'contenthandlertest-desc',
);

// Interface messages
$wgMessagesDirs['ContentHandlerTest'] = __DIR__ . '/i18n';

// Classes
$wgAutoloadClasses['SpecialContentHandlerTest'] = __DIR__ . '/SpecialContentHandlerTest.php';
$wgAutoloadClasses['TestContentModel'] = __DIR__ . '/TestContentModel.php';
$wgAutoloadClasses['TestContentHandler'] = __DIR__ . '/TestContentHandler.php';

// ContentHandler
$wgContentHandlers['TestContentModel'] = 'TestContentHandler';

// Special page
$wgSpecialPages['ContentHandlerTest'] = 'SpecialContentHandlerTest';
