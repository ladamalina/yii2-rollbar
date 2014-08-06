<?php

namespace ladamalina\yii2_rollbar;

class RollbarTarget extends \yii\log\Target
{
    public $rollbarComponentName = 'rollbar';

    public function init()
    {
        parent::init();

        if ( !\Yii::$app->has($this->rollbarComponentName, true) ) {
            throw new \yii\base\Exception('Rollbar component is not loaded.');
        }
    }

    /**
     * Sends log messages to Rollbar.
     */
    public function export()
    {
        foreach ($this->messages as $message) {
            list($text, $level) = $message;
            $level = \yii\log\Logger::getLevelName($level);
            if (!is_string($text)) {
                $text = \yii\helpers\VarDumper::export($text);
            }
            $text = explode("\n", $text)[0];
            \Rollbar::report_message($text, $level);
        }
    }
}
