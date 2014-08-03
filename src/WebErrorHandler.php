<?php

namespace ladamalina\yii2_rollbar;

class WebErrorHandler extends \yii\web\ErrorHandler
{
    /**
     * Handles & reports uncaught PHP exceptions.
     */
    public function handleException($exception)
    {
        if (!($exception instanceof \yii\web\HttpException and $exception->statusCode == 404)) {
            \Rollbar::report_exception($exception);
        }

        parent::handleException($exception);
    }

    /**
     * Handles & reports PHP execution errors such as warnings and notices.
     */
    public function handleError($code, $message, $file, $line)
    {
        \Rollbar::report_php_error($code, $message, $file, $line);

        parent::handleError($code, $message, $file, $line);
    }

    /**
     * Handles & reports fatal PHP errors that are causing the shutdown
     */
    public function handleFatalError() {
        \Rollbar::report_fatal_error();

        parent::handleFatalError();
    }
}
