<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Carousel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CarouselTest extends TestCase
{
    public function test_view_index()
    {
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->get('/carousel');
        $responses->assertStatus(200);
        $responses->assertViewIs('carousel.index');
    }

    public function test_view_create()
    {
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->get('/carousel/create');
        $responses->assertStatus(200);
        $responses->assertViewIs('carousel.create');
    }

    public function test_tambah_photo_success()
    {
        $user = parent::_createDumUser();
        $file = parent::_createDumImage(2048);
        $responses = $this->actingAs($user)->post('/carousel', [
            'photo' => $file,
        ]);
        Storage::disk('public')->assertExists('carousel/' . $file->hashName());
        $responses->assertStatus(302);
        $responses->assertRedirect('/carousel');
        $responses->assertSessionHas('message', 'Photo Berhasil Diupload!');
    }

    public function test_tambah_photo_validation_error()
    {
        $user = parent::_createDumUser();
        $file = parent::_createDumImage(2048);
        $responses = $this->actingAs($user)->post('/carousel', [
            'photo' => '',
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors([
            'photo' => 'Photo tidak boleh kosong'
        ]);
    }
    public function test_tambah_photo_validation_error_max_image()
    {
        $user = parent::_createDumUser();
        $file = parent::_createDumImage(2049);
        $responses = $this->actingAs($user)->post('/carousel', [
            'photo' => $file,
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors([
            'photo' => 'Maximal ukuran 2MB'
        ]);
    }

    public function test_tambah_photo_validation_error_not_image()
    {
        $user = parent::_createDumUser();
        $file = parent::_createDumImage(2048, true);
        $responses = $this->actingAs($user)->post('/carousel', [
            'photo' => $file,
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors([
            'photo' => 'Photo tidak valid'
        ]);
    }

    public function test_delete_photo()
    {
        $user = parent::_createDumUser();
        $dumy = $this->_createDumPhoto();
        $responses = $this->actingAs($user)->delete('/carousel/' . $dumy['carousel']->uuid);
        Storage::disk('public')->assertMissing('carousel/' . $dumy['file']->hashName());
        $responses->assertStatus(302);
        $responses->assertRedirect('/carousel');
        $responses->assertSessionHas('message', 'Photo Berhasil Dihapus!');
    }

    // NOT FOR TEST
    public function _createDumPhoto()
    {
        $file = parent::_createDumImage(2048, true);
        $carousel = Carousel::create([
            'uuid' => Str::orderedUuid(),
            'photo' => $file
        ]);

        return [
            'file' => $file,
            'carousel' => $carousel
        ];
    }
}
