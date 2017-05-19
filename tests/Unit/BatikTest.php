<?php

namespace Tests\Unit;

use App\Batik;
use App\PolaBatik;
use App\TagBatik;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BatikTest extends TestCase
{

	use DatabaseMigrations;
	use DatabaseTransactions;

	protected $limit = 4;

	public function setUp()
    {
        parent::setUp();
        $this->batik = factory(Batik::class)->create();
        $this->batiks = factory(Batik::class, $this->limit)->create();

    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_database_has_column_nama_batik(){
        $this->assertDatabaseHas('batik', [
            'nama_batik' => $this->batik->nama_batik
        ]);
    }

    public function test_database_has_column_makna_batik(){
        $this->assertDatabaseHas('batik', [
            'makna_batik' => $this->batik->makna_batik
        ]);
    }

    public function test_database_has_column_sejarah_batik(){
        $this->assertDatabaseHas('batik', [
            'sejarah_batik' => $this->batik->sejarah_batik
        ]);
    }

    public function test_database_has_column_cluster_batik(){
        $this->assertDatabaseHas('batik', [
            'cluster_batik' => $this->batik->cluster_batik
        ]);
    }

    public function test_database_has_column_asal_daerah(){
        $this->assertDatabaseHas('batik', [
            'asal_daerah' => $this->batik->asal_daerah
        ]);
    }

    public function test_database_has_column_gambar_pola_batik(){
        $this->assertDatabaseHas('batik', [
            'gambar_pola_batik' => $this->batik->gambar_pola_batik
        ]);
    }

    public function test_database_has_column_matriks_pola_batik(){
        $this->assertDatabaseHas('batik', [
            'matriks_pola_batik' => $this->batik->matriks_pola_batik
        ]);
    }

    public function test_batik_has_nama_batik_attribute()
    {
        $this->assertArrayHasKey('nama_batik',$this->batik->getAttributes());
    }

    public function test_batik_has_makna_batik_attribute()
    {
        $this->assertArrayHasKey('makna_batik',$this->batik->getAttributes());
    }

    public function test_batik_has_sejarah_batik_attribute()
    {
        $this->assertArrayHasKey('sejarah_batik',$this->batik->getAttributes());
    }

    public function test_batik_has_asal_daerah_attribute()
    {
        $this->assertArrayHasKey('asal_daerah',$this->batik->getAttributes());
    }

    public function test_batik_has_gambar_pola_batik_attribute()
    {
        $this->assertArrayHasKey('gambar_pola_batik',$this->batik->getAttributes());
    }

    public function test_batik_has_matriks_pola_batik_attribute()
    {
        $this->assertArrayHasKey('matriks_pola_batik',$this->batik->getAttributes());
    }

    public function test_list_of_batiks_has_array_size_match_with_limit(){
        $this->assertCount($this->limit, $this->batiks);
    }
}
