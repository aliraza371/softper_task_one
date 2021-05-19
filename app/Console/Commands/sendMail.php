<?php

namespace App\Console\Commands;

use App\Http\Controllers\CommentController;
use Illuminate\Console\Command;

class sendMail extends Command
{
    protected $commentController;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:sendMail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'to send email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $comment_Controller = app(CommentController::class);
        echo $comment_Controller->sendEmail();
    }
}
