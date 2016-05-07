<?php
namespace OliverKleeDe\SeleniumDemo\Tests\Selenium;

/**
 * Testcase.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class OliverKleeDeTest extends AbstractSelenium2Testcase
{
    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://www.oliverklee.de/');
    }

    /**
     * @test
     */
    public function homepageHasHomePageTitle()
    {
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
    public function open()
    {
        $this->url('/startseite.html');
    }

    /**
     * @test
     *
     * "assertText" => "assertSame", vorher Element mit byCssSelector holen, dann ->text() auf dem Element
     *
     * assertText "css=#c1 > h1" "Dienstleistungen rund um Web-Entwicklung und Sicherheit sowie effektive Seminare, die Spaß machen"
     */
    public function assertTextWithCssSelector()
    {
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
    public function clickAndWaitWithLinkTarget()
    {
        $this->url('/startseite.html');
        $this->byLinkText('Impressum')->click();
    }
}
