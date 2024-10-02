<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CnabTest extends TestCase
{
     
    public function testCnabUpload()
    {
        $response = $this->post('/upload-cnab', [
            'cnab_file' => UploadedFile::fake()->create('cnab.txt', 100),
        ]);
    
        $response->assertStatus(302);   
    }
    
}
