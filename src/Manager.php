<?php

namespace bdhert\JwtAuth;

class Manager {
    protected $blacklist_prefix       = 'bdhert';
    protected $blacklist_enabled      = false;
    protected $blacklist_grace_period = 0;
    protected $automatic_tips         = 'token已续签';
    protected $redis_driver           = 'default';

    public function __construct(array $options = []) {
        if (!empty($options)) {
            foreach ($options as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    public function getBlacklistPrefix(): string {
        return $this->blacklist_prefix;
    }

    public function getBlacklistEnabled(): bool {
        return $this->blacklist_enabled;
    }

    public function getBlacklistGracePeriod(): int {
        return $this->blacklist_grace_period;
    }

    public function getAutomaticTips() {
        return $this->automatic_tips;
    }

    public function getRedisDriver(): string {
        return $this->redis_driver;
    }
}
