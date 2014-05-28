<?php

class TestContentModel extends TextContent {

	public function __construct( $text ) {
		parent::__construct( $text, 'TestContentModel' );
	}

	protected function getHtml() {
		$text = '<p style="font-weight: bold">'
			. wfMessage( 'contenthandlertest-message' )->parse()
			. "</p>\n"
			. $this->getNativeData();
		return $text;
	}
}
