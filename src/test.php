<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class OnwardJourneysTest extends TestCase {
    public function testIsClass(): void {
        $this->assertInstanceOf(
            OnwardJourneys::class,
            new OnwardJourneys()
        );
    }
}
