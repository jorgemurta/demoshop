<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace YvesUnit\Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Pyz\Yves\Checkout\Process\Steps\EntryStep;
use Symfony\Component\HttpFoundation\Request;

class EntryStepTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return void
     */
    public function testRequireInputShouldReturnFalse()
    {
        $entryStep = $this->createEntryStep();
        $this->assertFalse($entryStep->requireInput(new QuoteTransfer()));
    }

    /**
     * @return void
     */
    public function testPostConditionShouldReturnTrue()
    {
        $entryStep = $this->createEntryStep();

        $this->assertTrue($entryStep->postCondition(new QuoteTransfer()));
    }

    /**
     * @return void
     */
    public function testPreConditionShouldReturnFalseIfCarIsEmpty()
    {
        $entryStep = $this->createEntryStep();
        $this->assertFalse($entryStep->preCondition(new QuoteTransfer()));
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\EntryStep
     */
    protected function createEntryStep()
    {
        return new EntryStep(
            $this->createFlashMessengerMock(),
            'entry_route',
            'escape_route'
        );

    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    protected function createRequest()
    {
        return Request::createFromGlobals();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Pyz\Yves\Application\Business\Model\FlashMessengerInterface
     */
    protected function createFlashMessengerMock()
    {
        return $this->getMock(FlashMessengerInterface::class);
    }
}
