<?php

namespace Tests\Feature;

use App\Models\Playlist;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlaylistAppTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function index_must_show_all_itens_from_playlist()
    {
        $response = $this->get(route('playlist.index'));
        $response->assertStatus(200);
    }

    /**
     * @test
     * @return void
     */
    public function show_must_get_only_one_item_from_playlist()
    {
        $response = $this->get(route('playlist.show',['playlist'=>1]));
        $response->assertStatus(200);
    }

    /**
     * @test
     * @return void
     */
    public function update_should_return_status_ok()
    {
        $response = $this->put(route('playlist.update',['playlist'=>1]),[
            'title'=>'example',
            'favorite'=>false,
            'category'=>3
        ]);

        $response->assertStatus(200);
    }

    /**
     * @test
     * @return void
     */
    public function create_item_must_get_ok_status()
    {
        $response = $this->post(route('playlist.store'),[
            'title'=>'example',
            'favorite'=>false,
            'category_id'=>1
        ]);

        $response->assertStatus(201);
    }

    /**
     * @test
     * @return void
     */
    public function destroy_item_must_get_status_200()
    {
        $response = $this->delete(route('playlist.destroy',['playlist'=>3]));
        $response->assertStatus(200);
    }


}
