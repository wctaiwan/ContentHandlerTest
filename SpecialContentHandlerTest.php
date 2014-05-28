<?php

class SpecialContentHandlerTest extends FormSpecialPage {

	public function __construct() {
		parent::__construct( 'ContentHandlerTest' );
	}

	public function getFormFields() {
		return array(
			'title' => array(
				'type' => 'text',
				'label-message' => 'contenthandlertest-title',
			),
			'content' => array(
				'type' => 'textarea',
				'label-message' => 'contenthandlertest-content'
			)
		);
	}

	public function onSubmit( array $data ) {
		$title = Title::newFromText( $data['title'] );
		if ( !$title ) {
			return Status::newFatal( 'contenthandlertest-invalidtitle' );
		} else if ( $title->exists() ) {
			return Status::newFatal( 'contenthandlertest-titleexists' );
		} else if ( !$title->userCan( 'create' ) || !$title->userCan( 'edit' ) ) {
			return Status::newFatal( 'contenthandlertest-nopermission' );
		}

		$content = new TestContentModel( $data['content'] );

		$page = WikiPage::factory( $title );
		$result = $page->doEditContent(
			$content,
			$this->msg( 'contenthandlertest-editsummary' )->parse()
		);
		return $result;
	}

	public function onSuccess() {
		$this->getOutput()->addHTML(
			$this->msg( 'contenthandlertest-success' )->parse()
		);
	}
}
