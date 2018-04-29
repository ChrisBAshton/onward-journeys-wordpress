<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class OnwardJourneysTest extends TestCase {
    /**
     * @before
     */
    function setUpPrivateVariables() {
        $this->ojInstance = new OnwardJourneys();
    }

    public function testConvertsOneItem(): void {
        $this->assertEquals(
            '<ul class="onward-journeys"><li><a href="http://bbc.com">bbc</a></li></ul>',
            $this->ojInstance->process('[onward-journeys][bbc|http://bbc.com][/onward-journeys]')
        );
    }

    public function testConvertsMultipleItems(): void {
        $this->assertEquals('
                <ul class="onward-journeys">
                    <li><a href="https://bbc.com">BBC</a></li>
                    <li><a href="http://singsician.com">singsician</a></li>
                </ul>
            ',
            $this->ojInstance->process('
                [onward-journeys]
                    [BBC|https://bbc.com]
                    [singsician|http://singsician.com]
                [/onward-journeys]
            ')
        );
    }
}
