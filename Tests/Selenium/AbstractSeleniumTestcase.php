<?php
namespace OliverKleeDe\SeleniumDemo\Tests\Selenium;

/**
 * Testcase.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
abstract class AbstractSeleniumTestcase extends \PHPUnit_Extensions_Selenium2TestCase {
	/**
	 * Waits for an element with the ID $id to be present.
	 *
	 * @param string $id DOM ID
	 * @param int $wait maximum (in seconds)
	 *
	 * @return \PHPUnit_Extensions_Selenium2TestCase_Element|boolean false on time-out
	 */
	protected function waitForId($id, $wait = 5) {
		$element = false;

		for ($i = 0; $i <= $wait; $i++) {
			try {
				$element = $this->byId($id);
				break;
			} catch (\Exception $e) {
				sleep(1);
			}
		}

		return $element;
	}
}