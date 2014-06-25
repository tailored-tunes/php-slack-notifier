<?php
namespace TailoredTunes;

class SlackNotifierTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var SlackNotifier
     */
    private $slack;

    public function setUp()
    {
        $url = $this->randomSring();
        $this->slack = new SlackNotifier($url);
    }

    public function testMessageFormatting()
    {
        $message = $this->randomSring();
        $channel = $this->randomSring();
        $username = $this->randomSring();

        $randomKey = $this->randomSring();

        $extraParams = array(
            'icon' => $this->randomSring(),
            $randomKey => $this->randomSring()

        );

        $actual = $this->slack->formatMessage($message, $channel, $username, $extraParams);

        $expected = array(
            'text' => $message,
            'channel' => $channel,
            'username' => $username,
            'icon' => $extraParams['icon'],
            $randomKey => $extraParams[$randomKey]
        );

        $this->assertEquals(json_encode($expected), $actual);

    }

    private function randomSring()
    {
        return uniqid();
    }
}
