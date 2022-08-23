<?php

namespace App\Mail;

use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NovaTarefaMail extends Mailable
{
    use Queueable, SerializesModels;
    public $tarefa;
    public $data_limite_conclusao;
    public $url;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Task $task)
    {
        $this->tarefa = $task->tarefa;
        $this->data_limite_conclusao = date('d/m/Y', strtotime($task->data_limite_conclusao));
        $this->url = config('app.url') . '/task/' . $task->id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.nova-tarefa')
            ->subject('Nova tarefa criada');
    }
}
