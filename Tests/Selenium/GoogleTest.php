<?php
namespace OliverKleeDe\SeleniumDemo\Tests\Selenium;

/**
 * Testcase.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class GoogleTest extends AbstractSelenium2Testcase
{
    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('https://www.google.de/');
    }

    /**
     * @test
     *
     * In Selenium IDE ist das 2x type und 1x clickAndWait.
     *
     * type -> value
     */
    public function search()
    {
        $this->url('https://www.google.de/');
        $this->byId('lst-ib')->click();
        $this->byId('lst-ib')->value('oliver klee');

        $this->byCssSelector('button[value="Suche"]')->click();

        self::assertSame(
            'Google',
            $this->title()
        );
    }
}
