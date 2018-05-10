<?php
declare(strict_types=1);
require_once(__DIR__ . '/mockWordPress.php');
require_once(__DIR__ . '/../src/onward-journeys.php');
use PHPUnit\Framework\TestCase;

final class OnwardJourneysRecentInCategoryTest extends TestCase {
    /**
     * @before
     */
    function setUpPrivateVariables() {
        $this->ojInstance = new OnwardJourneys();
    }

    public function testMostRecentCall(): void {
        $this->assertEquals('
                <ul class="onward-journeys">
                    <li><a href="/portfolio">My Portfolio</a></li>
                </ul>
            ',
            $this->ojInstance->process('
                [onward-journeys]
                    [recent-in-category]
                [/onward-journeys]
            ')
        );
    }

    public function testMultipleRecentCalls(): void {
        $this->assertEquals('
                <ul class="onward-journeys">
                    <li><a href="/portfolio">My Portfolio</a></li>
                    <li><a href="/diff">Something different</a></li>
                </ul>
            ',
            $this->ojInstance->process('
                [onward-journeys]
                    [recent-in-category]
                    [recent-in-category]
                [/onward-journeys]
            '));
    }
}
