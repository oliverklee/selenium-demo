<?php
namespace OliverKleeDe\SeleniumDemo\Tests\Selenium;

/**
 * Testcase.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class SeleneseTest extends \PHPUnit_Extensions_SeleniumTestCase {
	protected function setUp() {
		$this->setBrowser('firefox');
		$this->setBrowserUrl('https://www.oliverklee.de/');
	}

	/**
	 * @test
	 */
	public function runSeleneseOnOliverKleeDe() {
		$this->runSelenese(__DIR__ . '/Selenese/oliverklee.de.html');
	}
}