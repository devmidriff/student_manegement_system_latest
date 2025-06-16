<?php 

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendLoginDetails extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function build()
    {
            $html = "
        <h1>Welcome!</h1>
        <p>Your login details are:</p>
        <p><strong>Email:</strong> {$this->email}</p>
        <p><strong>Password:</strong> {$this->password}</p>
        <p>Please login and change your password after first login.</p>
    ";


        return $this->subject('Your Login Details')
                    ->html($html);
    }
}
