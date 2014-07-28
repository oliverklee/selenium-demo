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
		$this->open();
		$this->assertSame(
			'Startseite - oliverklee.de',
			$this->title()
		);
	}

	/**
	 * @test
	 *
	 * "open" => "$this->url()"
	 *
	 * open /startseite.html
	 */
	public function open() {
		$this->url('/startseite.html');
	}

	/**
	 * @test
	 *
	 * "assertText" => "assertSame", vorher Element mit byCssSelector holen, dann ->text() auf dem Element
	 *
	 * assertText "css=#c1 > h1" "Dienstleistungen rund um Web-Entwicklung und Sicherheit sowie effektive Seminare, die Spaß machen"
	 */
	public function assertTextWithCssSelector() {
		$this->open();
		$element = $this->byCssSelector('#c1 > h1');

		$this->assertSame(
			'Dienstleistungen rund um Web-Entwicklung und Sicherheit sowie effektive Seminare, die Spaß machen',
			$element->text()
		);
	}
}