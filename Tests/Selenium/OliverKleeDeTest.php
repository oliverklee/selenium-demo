<?php
namespace OliverKleeDe\SeleniumDemo\Tests\Selenium;

/**
 * Testcase.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class OliverKleeDeTest extends AbstractSeleniumTestcase {
	protected function setUp() {
		$this->setBrowser('firefox');
		$this->setBrowserUrl('http://www.oliverklee.de/');
	}

	/**
	 * @test
	 */
	public function homepageHasHomePageTitle() {
		$this->url('http://www.oliverklee.de/');
		$this->assertSame(
			'Startseite - oliverklee.de',
			$this->title()
		);
	}
}