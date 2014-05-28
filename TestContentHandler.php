<?php

class TestContentHandler extends TextContentHandler {

	public function __construct( $modelId = 'TestContentModel' ) {
		parent::__construct( $modelId, array( CONTENT_FORMAT_TEXT ) );
	}

	public function unserializeContent( $text, $format = null ) {
		$this->checkFormat( $format );
		return new TestContentModel( $text );
	}

	public function makeEmptyContent() {
		return new TestContentModel( '' );
	}
}
