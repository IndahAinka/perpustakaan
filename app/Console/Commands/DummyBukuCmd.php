<?php

namespace App\Console\Commands;

use App\Models\Rak;
use Illuminate\Console\Command;
use Illuminate\Support\Str;



class DummyBukuCmd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dummy-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        for ($i=0; $i < 100000; $i++) {
            $data=[
                'kode' => Str::random(6).$i,
                'nama' => 'rak-'.$i
            ];

            Rak::create($data);
        }
    }
}
