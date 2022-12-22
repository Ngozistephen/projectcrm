<?php

namespace App\Mail;

use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TaskAssigned extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * The order instance.
     *
     * @var \App\Models\Task
     */
    private $task;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.tasks.assigned', [
            'title' => $this->task->title,
            'url' => route('dashboard.tasks.show', $this->task)
        ]);
    }
}
