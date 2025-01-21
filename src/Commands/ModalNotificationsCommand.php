<?php

namespace W3z315\ModalNotifications\Commands;

use Illuminate\Console\Command;

class ModalNotificationsCommand extends Command
{
    public $signature = 'filamentphp-modal-notifications';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
