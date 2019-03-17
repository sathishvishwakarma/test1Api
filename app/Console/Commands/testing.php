<?php

namespace App\Console\Commands;

use App\Models\Exchange\ExchangeTransaction;
use App\Models\Masters\Coins;
use App\Models\Referral;
use App\Notifications\ReferralsNotification;
use App\Notifications\SendNotification;
use App\User;
use Dingo\Api\Routing\Router;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Output\ConsoleOutput;
use Tymon\JWTAuth\JWTAuth;
use App\Models\Masters\KycDocType;

//use App\Channels\SmsChannel;

class SnsTest extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'testing purpose';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();



    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(ConsoleOutput $output)
    {
        print_r('sathish');
    }

}
