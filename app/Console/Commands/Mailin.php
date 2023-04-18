<?php

namespace App\Console\Commands;

use App\Modules\Pub\Home\Services\HomeServices;
use Illuminate\Console\Command;
use App\Mail\MainMail;
use Illuminate\Support\Facades\Mail;

class Mailin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:mailin';
    public $service;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'service for sending';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(HomeServices $homeServices)
    {
        parent::__construct();
        $this->service = $homeServices;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {$user=$this->service->getUser()->
    where('validts','<=',time())->where('validts','>=',time()-3*24*60*60)->get();
        foreach ($user as $i => $el) {
            if ($el->confirmed) {
                if ($el->emails)
                    if (!$el->emails->checked)
                        if (filter_var($el->email, FILTER_VALIDATE_EMAIL)) {
                            $body = "{$el->name}, your subscription is expiring soon";
                            try{
                                Mail::to($el->email)->send(new MainMail($body));
                                $data = [
                                    'checked' => '1',
                                    'valid' => '1'
                                ];
                                $this->service->updateEmail($el->emails->id,$data);
                            }   catch (\ErrorException $e){
                                continue;
                            }
                        };
            }
        }
        return 0;
    }
}
