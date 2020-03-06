<?php

namespace App\Mail;

use App\Model\File;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject, $content_message, $id, $pdf;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $subject, $content_message, $id, $pdf)
    {
        $this->subject = $subject;
        $this->content_message = $content_message;
        $this->id = $id;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $files = File::where('table_name', 'Mail')->where('table_id', $this->id)->get();
        
        if($this->pdf){
            $mail = $this->view('supportNew.pages.mail.inc.mail')->subject($this->subject);
            $mail->attach(storage_path('reports'. DIRECTORY_SEPARATOR .$this->pdf));
            if(!$files->isEmpty()){
                foreach($files as $file){
                    if(!file_exists(storage_path('mail'. DIRECTORY_SEPARATOR .$file->file_name))) continue ;
                    $mail->attach(storage_path('mail'. DIRECTORY_SEPARATOR .$file->file_name));
                }
            }
            return $mail;
        }

        if($files->isEmpty()){
            return $this->view('supportNew.pages.mail.inc.mail')->subject($this->subject);
        }
        else{
            $mail = $this->view('supportNew.pages.mail.inc.mail')->subject($this->subject);
            foreach($files as $file){
                if(!file_exists(storage_path('mail'. DIRECTORY_SEPARATOR .$file->file_name))) continue ;
                $mail->attach(storage_path('mail'. DIRECTORY_SEPARATOR .$file->file_name));
            }
            
            return $mail;
        }
    }
}
