<?php

namespace App\Http\Controllers\Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\EmailLog;
use App\Model\File as FileUpload;
use Illuminate\Support\Facades\Auth;

class MailStoreController extends Controller
{
    public function sendMail(Request $request, $id){
        $this->validate($request, [
            'to' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ],[
            'to.required' => 'Recipients is required',
            'subject' => "Mail subject is required",
            'message' => 'Mail message is required'
        ]);
        
        try{
            $mail_id = $this->makeLog($request, $id);
            if($request->attachments){
                $this->uploadFile($request, $mail_id->id);
            }
            $pdf = null;
            if($request->pdf){
            $pdf =  $request->pdf;
            }
            $id = $mail_id->id;
            $to =[];
            $cc =[];
            $toMails = json_decode($request->to);
            $ccMails = json_decode($request->cc);
            foreach($toMails as $t){
                array_push($to, $t->value);
            }
            
            foreach($ccMails as $c){
                array_push($cc, $c->value);
            }
            $message = $request->message;
            $subject = $request->subject;
            $this->send($to, $cc, $message, $subject, $id, $pdf);
            $files = FileUpload::where('table_name', 'Mail')->where('table_id', $id)->get();
            foreach($files as $file){
                if(!file_exists(storage_path('mail'. DIRECTORY_SEPARATOR .$file->file_name))) continue ;
                unlink(storage_path('mail'. DIRECTORY_SEPARATOR .$file->file_name));
            }
            return response()->json([
                "message" => "Email successfully sent.",
                "data" => "abc",
            ]);

        }catch(DecryptException $decryptException) {
            return response(["message" => "Password encoding cannot be decrypted. Please check encoded password"], 500);
        }catch(\Swift_TransportException $swift_TransportException){
            return response(["message" => $swift_TransportException->getMessage()], 500);
        }catch(\Exception $e){
            return response(["message" => $e->getMessage()
            , "Line" => $e->getLine()
            , "file" => $e->getFile()], 500);
        }
    }

    private function send($to, $cc, $message, $subject, $id, $pdf){
        if($emailSetting = auth()->user()->emailSetting){
            $configurations = $this->getMailConfiguration($emailSetting);
            // dd($configurations);
            $configurations['to'] = $to;
            $configurations['cc'] = $cc;
            $configurations['smtp_port'] = 2525;
            $configurations['smtp_encryption'] = null;
            $configurations['subject'] = $subject;
            $configurations['content_message'] = $message;
            $configurations['id'] = $id;
            $configurations['pdf'] = $pdf;
            app()->makeWith('sendMail.mailer', $configurations);
            // app('sendMail.mailer', $configurations)->send();
        }else{
            throw new \Exception("Please set up your own smtp host credentials first");
        }
    }

    public function getMailConfiguration($emailSetting){

        if($emailSetting->is_ssl){
            $port = 465;
            $encryption = "ssl";
        }else if($emailSetting->is_tls){
            $port = 587;
            $encryption = "tls";
        }else{
            $port = 25;
            $encryption = null;
        }

        return [
            'smtp_host'    => $emailSetting->server,
            'smtp_port'    => $port,
            'smtp_username'  => $emailSetting->email,
            'smtp_password'  => $emailSetting->password,
            'smtp_encryption'  => $encryption,
            'from_name'    => $emailSetting->email_from,
            'from_email'    => $emailSetting->email_from,
        ];

    }

    protected function makeLog(Request $request, $id)
    {
        $to =[];
        $cc =[];
        $toMails = json_decode($request->to);
        $ccMails = json_decode($request->cc);
        foreach($toMails as $t){
            array_push($to, $t->value);
        }
        
        foreach($ccMails as $c){
            array_push($cc, $c->value);
        }

        $emailLog = new EmailLog();
        $emailLog->table = $request->table ? $request->table : 'Order';
        $emailLog->table_id = $id;
        $emailLog->from = auth()->user()->email;
        $emailLog->to = json_encode($to);
        $emailLog->cc = json_encode($cc);
        $emailLog->subject = $request->subject;
        $emailLog->message = $request->message;
        $emailLog->sent_status = 'Success';
        $emailLog->sent_date = date('Y-m-d');
        $emailLog->save();
        return $emailLog;

    }

    public function uploadFile(Request $request, $id)
    {
        foreach ($request->attachments as $file) {
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = md5(time() . rand());
            $fileName .= "." . $fileExtension;

            if (!is_dir(storage_path("mail"))) {
                mkdir(storage_path("mail"), 0777, true);
            }
            $file->move(storage_path("mail") . DIRECTORY_SEPARATOR, $fileName);

            $file = new FileUpload;
            $file->type = $fileExtension;
            $file->file_name = $fileName;
            $file->table_name = "Mail";
            $file->table_id = $id;
            $file->userc_id = Auth::id();
            $file->save();
        }
        return $id;
    }
}
