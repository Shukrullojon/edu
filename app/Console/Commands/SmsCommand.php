<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Sms;
use App\Models\UserPayment;
use App\Services\SmsService;
use Illuminate\Console\Command;

class SmsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms {arg}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $method = $this->argument('arg');
        if (method_exists($this, $method)) {
            $this->$method();
        }
        return 0;
    }

    public function send()
    {
        $service = SmsService::login();
        $token = $service["data"]["token"];
        $sms = Sms::where('status', 0)->get();
        foreach ($sms as $s) {
            if ($s->type == 7 or $s->type == 8){
                if (strtotime($s->created_at) > strtotime("-10 minutes")){
                    continue;
                }
            }
            $send = SmsService::send([
                'token' => $token,
                'mobile_phone' => $s->phone,
                'message' => $s->text,
            ]);
            if ($send['status'] == 'waiting'){
                $s->update([
                    'status' => 1,
                ]);
            }
        }
    }

    public function loan(){
        $np = UserPayment::where('status',0)->take(5)->get();
        foreach ($np as $n){
            $text = 'Sizning '.date('Y-m',strtotime($n->month)).' oyi uchun '.number_format($n->amount-$n->pay_amount,0,' ',' ')." ming so'm qarzdorligingiz mavjud, iltimos darsdan oldin to'lovni amalga oshiring!";
            Sms::create([
                'user_id' => $n->user_id,
                'phone' => '+998'.$n->user->phone ?? '',
                'type' => 5,
                'text' => $text,
                'sms' => 0,
            ]);
        }

    }
}
