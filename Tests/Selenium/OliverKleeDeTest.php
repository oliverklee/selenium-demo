<?php
namespace OliverKleeDe\SeleniumDemo\Tests\Selenium;

/**
 * Testcase.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class OliverKleeDeTest extends AbstractSelenium2Testcase {
	protected function setUp() {
		$this->setBrowser('firefox');
		$this->setBrowserUrl('http://www.oliverklee.de/');
	}

	/**
	 * @test
	 */
	public function homepageHasHomePageTitle() {
		$this->open();
		self::assertSame(
			'Startseite - Oliver Klee [oliverklee.de]',
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
		$this->url('/startseite.html');
		$element = $this->byCssSelector('#c1 > h1');

		self::assertSame(
			'Oliver Klee: Dienstleistungen rund um Web-Entwicklung und Sicherheit sowie effektive Seminare, die Spaß machen',
			$element->text()
		);
	}

	/**
	 * @test
	 *
	 * "clickAndWait" "link=Impressum" => byLinkText, click
	 *
	 * Wichtig: PHPUnit wartet automatisch, wenn das Klickziel ein echter Link ist und keine JavaScript-Sache.
	 */
	public function clickAndWaitWithLinkTarget() {
		$this->url('/startseite.html');
		$this->byLinkText('Impressum')->click();
	}

	/**
	 * @test
	 *
	 * In Selenium IDE ist das 2x type und 1x clickAndWait.
	 *
	 * type -> value
	 */
	public function login() {
		$this->url('http://typo3master.local/index.php?id=13');
		$this->byId('user')->value('klee');
		$this->byId('pass')->value('12345678');

		$this->byCssSelector('input[value="Login"]')->click();

		self::assertSame(
			'Login successful',
			$this->byCssSelector('#c3 > div > h3')->text()
		);
	}

	/**
	 * @test
	 */
	public function loginAndLogout() {
		$this->login();
		$this->url('http://typo3master.local/index.php?id=13');
		$this->byCssSelector('input[value="Logout"]')->click();

		self::assertSame(
			'You have logged out.',
			$this->byCssSelector('#c3 > div > h3')->text()
		);
	}
}