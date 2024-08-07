<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Models\KategoriBerita;
use Database\Seeders\KategoriSeeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    public function test_view_index()
    {
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->get('/news');
        $responses->assertStatus(200);
        $responses->assertViewIs('posts.index');
    }

    public function test_view_create()
    {
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->get('/news/create');
        $responses->assertStatus(200);
        $responses->assertViewIs('posts.create');
    }

    public function test_tambah_postingan_success()
    {
        $user = parent::_createDumUser();
        $file = parent::_createDumImage(2048);
        $this->seed([KategoriSeeder::class]);
        $category = KategoriBerita::first();
        $randomString = Str::random(500);
        $responses = $this->actingAs($user)->post('/news', [
            'title' => 'Man 2 Kota Tasikmalaya Juara Competition of Science',
            'author' => 'Gian Sonia',
            'slug' => 'man-2-kota-tasikmalaya-juara-competition-of-science',
            'image' => $file,
            'category_id' => $category->id,
            'body' => $randomString,
        ]);
        Storage::disk('public')->assertExists('post-images/' . $file->hashName());
        $responses->assertStatus(302);
        $responses->assertRedirect('/news');
    }

    public function test_create_slug()
    {
        $user = parent::_createDumUser();
        $this->actingAs($user)
            ->get('/cek-slug?title=Man 2 Kota Tasikmalaya Juara Competition of Science')
            ->assertStatus(200)
            ->assertJson([
                'slug' => 'man-2-kota-tasikmalaya-juara-competition-of-science'
            ]);
    }

    public function test_create_slug_second()
    {
        $user = parent::_createDumUser();
        $this->_createDumPost();
        $this->actingAs($user)
            ->get('/cek-slug?title=Man 2 Kota Tasikmalaya Juara Competition of Science')
            ->assertStatus(200)
            ->assertJson([
                'slug' => 'man-2-kota-tasikmalaya-juara-competition-of-science-2'
            ]);
    }

    public function test_tambah_postingan_validation_error()
    {
        $user = parent::_createDumUser();
        $this->seed([KategoriSeeder::class]);
        $responses = $this->actingAs($user)->post('/news', [
            'title' => '',
            'author' => '',
            'slug' => '',
            'image' => '',
            'category_id' => '',
            'body' => '',
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors([
            'title',
            'author',
            'slug',
            'image',
            'category_id',
            'body',
        ]);
    }

    public function test_tambah_postingan_validation_error_max_image()
    {
        $user = parent::_createDumUser();
        $file = parent::_createDumImage(2049);
        $this->seed([KategoriSeeder::class]);
        $category = KategoriBerita::first();
        $randomString = Str::random(500);
        $responses = $this->actingAs($user)->post('/news', [
            'title' => 'Man 2 Kota Tasikmalaya Juara Competition of Science',
            'author' => 'Gian Sonia',
            'slug' => 'man-2-kota-tasikmalaya-juara-competition-of-science',
            'image' => $file,
            'category_id' => $category->id,
            'body' => $randomString,
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors([
            'image',
        ]);
    }

    public function test_tambah_postingan_validation_error_not_image()
    {
        $user = parent::_createDumUser();
        $file = parent::_createDumImage(2048, true);
        $this->seed([KategoriSeeder::class]);
        $category = KategoriBerita::first();
        $randomString = Str::random(500);
        $responses = $this->actingAs($user)->post('/news', [
            'title' => 'Man 2 Kota Tasikmalaya Juara Competition of Science',
            'author' => 'Gian Sonia',
            'slug' => 'man-2-kota-tasikmalaya-juara-competition-of-science',
            'image' => $file,
            'category_id' => $category->id,
            'body' => $randomString,
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors([
            'image',
        ]);
    }

    public function test_view_edit()
    {
        $user = parent::_createDumUser();
        $post = $this->_createDumPost();
        $responses = $this->actingAs($user)->get('/news/' . $post['post']->slug . '/edit');
        $responses->assertStatus(200);
        $responses->assertViewIs('posts.edit');
    }

    public function test_update_postingan_success()
    {
        $user = parent::_createDumUser();
        $file = parent::_createDumImage(2048);
        $this->seed([KategoriSeeder::class]);
        $category = KategoriBerita::first();
        $randomString = Str::random(500);
        $dumy = $this->_createDumPost();
        $post = $dumy['post'];
        $responses = $this->actingAs($user)->put('/news/' . $post->slug, [
            'oldImage' => $dumy['oldFile'],
            'title' => 'Man 2 Kota Tasikmalaya Juara 1 Basket',
            'author' => 'Gian Sonia',
            'slug' => 'man-2-kota-tasikmalaya-juara-1-basket',
            'image' => $file,
            'category_id' => $category->id,
            'body' => $randomString,
        ]);
        Storage::disk('public')->assertExists('post-images/' . $file->hashName());
        Storage::disk('public')->assertMissing('post-images/' . $dumy['oldFile']->hashName());
        $post->refresh();
        $this->assertEquals('Man 2 Kota Tasikmalaya Juara 1 Basket', $post->title);
        $this->assertEquals('man-2-kota-tasikmalaya-juara-1-basket', $post->slug);
        $responses->assertStatus(302);
        $responses->assertRedirect('/news');
    }

    public function test_update_postingan_success_tanpa_image_baru()
    {
        $user = parent::_createDumUser();
        $this->seed([KategoriSeeder::class]);
        $category = KategoriBerita::first();
        $randomString = Str::random(500);
        $dumy = $this->_createDumPost();
        $post = $dumy['post'];
        $responses = $this->actingAs($user)->put('/news/' . $post->slug, [
            'oldImage' => $dumy['oldFile'],
            'title' => 'Man 2 Kota Tasikmalaya Juara 1 Basket',
            'author' => 'Gian Sonia',
            'slug' => 'man-2-kota-tasikmalaya-juara-1-basket',
            'category_id' => $category->id,
            'body' => $randomString,
        ]);
        $post->refresh();
        $this->assertEquals('Man 2 Kota Tasikmalaya Juara 1 Basket', $post->title);
        $this->assertEquals('man-2-kota-tasikmalaya-juara-1-basket', $post->slug);
        $responses->assertStatus(302);
        $responses->assertRedirect('/news');
    }

    public function test_update_postingan_success_validation_errors()
    {
        $user = parent::_createDumUser();
        $this->seed([KategoriSeeder::class]);
        $dumy = $this->_createDumPost();
        $post = $dumy['post'];
        $responses = $this->actingAs($user)->put('/news/' . $post->slug, [
            'oldImage' => $dumy['oldFile'],
            'title' => '',
            'author' => '',
            'slug' => '',
            'category_id' => '',
            'body' => '',
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors([
            'title',
            'author',
            'slug',
            'category_id',
            'body',
        ]);
    }

    public function test_update_postingan_success_validation_errors_max_image()
    {
        $user = parent::_createDumUser();
        $file = parent::_createDumImage(2049);
        $this->seed([KategoriSeeder::class]);
        $category = KategoriBerita::first();
        $randomString = Str::random(500);
        $dumy = $this->_createDumPost();
        $post = $dumy['post'];
        $responses = $this->actingAs($user)->put('/news/' . $post->slug, [
            'oldImage' => $dumy['oldFile'],
            'title' => 'Man 2 Kota Tasikmalaya Juara 1 Basket',
            'author' => 'Gian Sonia',
            'slug' => 'man-2-kota-tasikmalaya-juara-1-basket',
            'image' => $file,
            'category_id' => $category->id,
            'body' => $randomString,
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors([
            'image',
        ]);
    }


    public function test_update_postingan_success_validation_not_valid_image()
    {
        $user = parent::_createDumUser();
        $file = parent::_createDumImage(2048, true);
        $this->seed([KategoriSeeder::class]);
        $category = KategoriBerita::first();
        $randomString = Str::random(500);
        $dumy = $this->_createDumPost();
        $post = $dumy['post'];
        $responses = $this->actingAs($user)->put('/news/' . $post->slug, [
            'oldImage' => $dumy['oldFile'],
            'title' => 'Man 2 Kota Tasikmalaya Juara 1 Basket',
            'author' => 'Gian Sonia',
            'slug' => 'man-2-kota-tasikmalaya-juara-1-basket',
            'image' => $file,
            'category_id' => $category->id,
            'body' => $randomString,
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors([
            'image',
        ]);
    }
    public function test_delete_postingan_success()
    {
        $user = parent::_createDumUser();
        $file = parent::_createDumImage(2048);
        $dumy = $this->_createDumPost();
        $post = $dumy['post'];
        $this->seed([KategoriSeeder::class]);
        $responses = $this->actingAs($user)->delete('/news/' . $post->slug);
        Storage::disk('public')->assertMissing('post-images/' . $file->hashName());
        $responses->assertStatus(302);
        $responses->assertRedirect('/news');
    }

    // NOT FOR TEST
    public function _createDumPost()
    {
        $this->seed([KategoriSeeder::class]);
        $file = parent::_createDumImage(2048);
        $category = KategoriBerita::first();
        $randomString = Str::random(500);
        $randomExcerpt = Str::random(50) . '...';
        return [
            'post' => Post::create([
                'title' => 'Man 2 Kota Tasikmalaya Juara Competition of Science',
                'author' => 'Gian Sonia',
                'slug' => 'man-2-kota-tasikmalaya-juara-competition-of-science',
                'image' => $file,
                'category_id' => $category->id,
                'body' => $randomString,
                'excerpt' => $randomExcerpt,
            ]),
            'oldFile' => $file,
        ];
    }
}
