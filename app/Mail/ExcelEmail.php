<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExcelEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $excelFilePath;

    /**
     * Create a new message instance.
     *
     * @param string $excelFilePath
     */
    public function __construct(string $excelFilePath)
    {
        $this->excelFilePath = $excelFilePath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.excel')
                    ->attach($this->excelFilePath);
    }
}
