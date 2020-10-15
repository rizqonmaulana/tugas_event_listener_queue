<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Blog;

class BlogHasPublished extends Mailable
{
    use Queueable, SerializesModels;

    protected $blog;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('example@example.com')
                    ->view('send_blog_has_published')
                    ->with([
                        'name' => $this->blog->user->name,
                        'title' => $this->blog->title
                    ]);
    }
}
