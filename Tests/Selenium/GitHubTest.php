<?php
namespace OliverKleeDe\SeleniumDemo\Tests\Selenium;

use Facebook\WebDriver\Remote\WebDriverCapabilityType;
use Facebook\WebDriver\Remote\RemoteWebDriver;

/**
 * Testcase.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class GitHubTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @var RemoteWebDriver
	 */
	private $webDriver = NULL;

	protected function setUp() {
		$capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'firefox');
		$this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
	}

	protected function tearDown() {
		$this->webDriver->close();
	}

	/**
	 * @test
	 */
	public function homepageHasGitHubInTitle() {
		$this->webDriver->get('https://github.com/');
		self::assertContains(
			'GitHub',
			$this->webDriver->getTitle()
		);
	}
}