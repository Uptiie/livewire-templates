<?php

namespace Tests\Feature;

use App\Http\Livewire\ContactForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function contact_form_sends_out_an_email_test()
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'Donovan')
            ->set('email', 'someguy@postbin.io')
            ->set('phone', '125332')
            ->set('message', 'This is my message')
            ->call('submitForm')
            ->assertSee('we got the message!');
    }
}
