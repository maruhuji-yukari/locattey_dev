<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSendmail extends Mailable
{
    use Queueable, SerializesModels;

    private $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('【Locattey】お問い合わせを受け付けました')
            ->view('email.from')
            ->with([
                'sendName' => $this->contact->name,
                'sendEmail'=> $this->contact->email,
                'sendSubject'=> $this->contact->subject,
                'sendComment'=> $this->contact->comment,
                'sendReply' => $this->contact->reply,
            ]);
    }
}
