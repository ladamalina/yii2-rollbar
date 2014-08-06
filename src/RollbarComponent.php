<?php

namespace ladamalina\yii2_rollbar;

class RollbarComponent extends \yii\base\Object
{
    // required
    public $accessToken;

    // optional
    public $environment;
    public $branch;
    public $batched = false;
    public $batchSize;
    public $timeout;
    public $logger;
    public $maxErrno;
    public $baseApiUrl;
    public $rootAlias = '@app';

    public function init()
    {
        \Rollbar::init(
            [
                'access_token' => $this->accessToken,
                'environment' => $this->environment,
                'branch' => $this->branch,
                'batched' => $this->batched,
                'batch_size' => $this->batchSize,
                'timeout' => $this->timeout,
                'logger' => $this->logger,
                'max_errno' => $this->maxErrno,
                'base_api_url' => $this->baseApiUrl,
                'root' => !empty($this->rootAlias) ? \Yii::getAlias($this->rootAlias) : '',
            ],
            false,
            false
        );

        parent::init();
    }
}
