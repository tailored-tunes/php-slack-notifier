<?php

namespace TailoredTunes;

class SlackNotifier
{

    /**
     * @var string
     */
    private $endpoint;

    /**
     * @param $endpoint string Slack webhook endpoint
     */
    public function __construct($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * Send a message to slack
     *
     * @param $message string The message to be sent
     * @param $channel string The slack channel to notify
     * @param $username string The username the message will appear as
     * @param array $extraParams Extra parameters for the slack message
     */
    public function send($message, $channel, $username = '', $extraParams = array())
    {
        $slackMsg = $this->formatMessage($message, $channel, $username, $extraParams);
        $this->sendRaw($slackMsg);
    }

    /**
     * Format a slack message
     *
     * @param $message string The message to be sent
     * @param $channel string The slack channel to notify
     * @param $username string The username the message will appear as
     * @param array $extraParams Extra parameters for the slack message
     *
     * @return string
     */
    public function formatMessage($message, $channel, $username, $extraParams)
    {
        $data = array(
            "text" => $message,
            "channel" => $channel
        );

        if (!empty($username)) {
            $data['username'] = $username;
        }

        $slackMsg = json_encode(
            array_merge($data, $extraParams)
        );
        return $slackMsg;
    }

    /**
     * Send a json to slack
     *
     * @param $slackMsg
     */
    private function sendRaw($slackMsg)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->endpoint);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $slackMsg);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($slackMsg)
            )
        );
        curl_exec($ch);
    }
}
