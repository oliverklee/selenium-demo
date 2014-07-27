<?php
namespace OliverKleeDe\SeleniumDemo\Tests\Selenium;

/**
 * Testcase.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class OliverKleeDeTest extends \PHPUnit_Extensions_SeleniumTestCase {
	protected function setUp() {
		$this->setBrowser('firefox');
		$this->setBrowserUrl('http://www.oliverklee.de/');
	}

	/**
	 * @test
	 */
	public function homepageHasHomePageTitle() {
		$this->open('http://www.oliverklee.de/');
		$this->assertTitle('Startseite - oliverklee.de');
	}
}