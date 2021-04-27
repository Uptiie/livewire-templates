<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DataTablesTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function main_page_contains_datatable_livewire_component()
    {
        $this->get('/')
            ->assertSeeLivewire('data-tables');
    }
}
