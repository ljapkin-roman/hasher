<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\User;

class CreateXML extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    /** go on list all user and compile list with all info every user **/

    private function createTableInfo() {
        $users = User::all();
        $list = '';
        foreach ($users as $user) {
            $list .= "<user_info>\n";
            $list .= "    <name> $user->name </name> \n";
            $list .= "    <user_ip> $user->ip </user_ip> \n";
            $list .= "    <user_browser> $user->browser </user_browser> \n";
            $list .= "    <user_cookie> $user->cookie_session </user_cookie> \n";
            $list .= "    <user_location> $user->location </user_location> \n";
            $list .= "</user_info>\n";
            
            if (!empty($user->hashes->all())) {
                $hashes = $user->hashes->all();
                $list .= "<user_hashes>\n";
                foreach($hashes as $hash) {
                    $list .= "    <hash> $hash->hash </hash>\n";
                }
                $list .= "</user_hashes>\n";

            }
        }

        return $list;

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
	    $text = "<?xml version='1.0' encoding='UTF-8'?>\n";
        $text .= $this->createTableInfo(); 
        Storage::disk('local')->put('file.xml', $text);
    }
}
