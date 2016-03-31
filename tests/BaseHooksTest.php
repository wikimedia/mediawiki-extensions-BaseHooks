<?php

/**
 * @covers BaseHooksHooks
 */
class BaseHooksTest extends MediaWikiLangTestCase {
	public function setUp() {
		parent::setUp();
		$this->markTestSkipped(
			'Broken test'
		);
		$this->setMwGlobals( 'wgBaseHooksAfterBottomScriptsStrings', array( 'XYZT test' ) );
		$this->setMwGlobals( 'wgBaseHooksAfterBottomScriptsFiles', array( __DIR__ . '/test.inc' ) );
	}
	/**
	 * @return Skin
	 */
	private function mockSkin( $title = 'Main Page' ) {
		$skin = $this->getMockBuilder( 'SkinFallback' )
			->disableOriginalConstructor()
			->setMethods( array( 'getUser', 'getTitle' ) )
			->getMock();

		return $skin;
	}

	public function testString() {
		$text = '';
		BaseHooksHooks::onSkinAfterBottomScripts( $this->mockSkin(), $text );
		$this->assertContains( 'XYZT test', $text );
		$this->assertContains( 'INC test', $text );
	}
}
