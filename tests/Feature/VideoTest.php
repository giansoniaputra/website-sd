<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VideoTest extends TestCase
{
    public function test_view_index()
    {
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->get('/video');
        $responses->assertStatus(200);
        $responses->assertViewIs('video.index');
    }

    public function test_view_create()
    {
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->get('/video/create');
        $responses->assertStatus(200);
        $responses->assertViewIs('video.create');
    }

    public function test_tambah_data_success()
    {
        $user = parent::_createDumUser();
        $file = parent::_createDumImage(2048);
        $responses = $this->actingAs($user)->post('/video', [
            'sampul' => $file,
            'link' => 'link'
        ]);
        Storage::disk('public')->assertExists('sampul-video/' . $file->hashName());
        $responses->assertStatus(302);
        $responses->assertRedirect('/video');
        $responses->assertSessionHas('message', 'Vidio Berhasil Ditambahkan!');
    }

    public function test_tambah_data_validation_error()
    {
        $user = parent::_createDumUser();
        $file = parent::_createDumImage(2048);
        $responses = $this->actingAs($user)->post('/video', [
            'sampul' => '',
            'link' => ''
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors(
            [
                'sampul' => 'Sampul tida boleh kosong',
                'link' => 'Link tida boleh kosong',
            ]
        );
    }
    public function test_tambah_data_validation_error_max_sampul()
    {
        $user = parent::_createDumUser();
        $file = parent::_createDumImage(2049);
        $responses = $this->actingAs($user)->post('/video', [
            'sampul' => $file,
            'link' => 'link'
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors(
            [
                'sampul' => 'Maximal ukuran sampul 2MB',
            ]
        );
    }
    public function test_tambah_data_validation_error_bukan_sampul()
    {
        $user = parent::_createDumUser();
        $file = parent::_createDumImage(2048, true);
        $responses = $this->actingAs($user)->post('/video', [
            'sampul' => $file,
            'link' => 'link'
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors(
            [
                'sampul' => 'Format sampul tidak valid',
            ]
        );
    }

    public function test_view_edit()
    {
        $user = parent::_createDumUser();
        $video = $this->createDumVideo();
        $responses = $this->actingAs($user)->get('/video/' . $video['video']->uuid . '/edit');
        $responses->assertStatus(200);
        $responses->assertViewIs('video.edit');
    }

    public function test_update_data_success_tanpa_sampul()
    {
        $user = parent::_createDumUser();
        $video = $this->createDumVideo();
        $responses = $this->actingAs($user)->put('/video/' . $video['video']->uuid, [
            'link' => 'link 2'
        ]);
        $video['video']->refresh();
        $this->assertEquals('link 2', $video['video']->link);
        $responses->assertStatus(302);
        $responses->assertRedirect('/video');
        $responses->assertSessionHas('message', 'Vidio Berhasil Diubah!');
    }

    public function test_update_data_success_dengan_sampul()
    {
        $user = parent::_createDumUser();
        $video = $this->createDumVideo();
        $file = parent::_createDumImage(2048);
        $responses = $this->actingAs($user)->put('/video/' . $video['video']->uuid, [
            'sampul' => $file,
            'link' => 'link 2'
        ]);
        Storage::disk('public')->assertMissing('sampul-video/' . $video['file']->hashName());
        Storage::disk('public')->assertExists('sampul-video/' . $file->hashName());
        $video['video']->refresh();
        $this->assertEquals('link 2', $video['video']->link);
        $responses->assertStatus(302);
        $responses->assertRedirect('/video');
        $responses->assertSessionHas('message', 'Vidio Berhasil Diubah!');
    }

    public function test_delete()
    {
        $user = parent::_createDumUser();
        $video = $this->createDumVideo();
        $responses = $this->actingAs($user)->delete('/video/' . $video['video']->uuid);
        Storage::disk('public')->assertMissing('sampul-video/' . $video['file']->hashName());
        $responses->assertStatus(302);
        $responses->assertRedirect('/video');
        $responses->assertSessionHas('message', 'Vidio Berhasil Dihapus!');
    }

    // NOT FOR TEST
    public function createDumVideo()
    {
        $file = parent::_createDumImage(2048, true);
        $video = Video::create([
            'uuid' => Str::orderedUuid(),
            'sampul' => $file,
            'link' => 'link'
        ]);

        return [
            'file' => $file,
            'video' => $video
        ];
    }
}
