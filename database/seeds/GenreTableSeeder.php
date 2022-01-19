<?php

use Illuminate\Database\Seeder;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres=[
          "SNS系",
          "マッチング系",
          "ゲーム系",
          "イラスト系",
          "デザイン系",
          "音楽系",
          "学習系",
          "ビジネス系",
          "その他",
        ];
        DB::table('genres')->truncate();
        foreach($genres as $genre){
          DB::table('genres')->insert([
              'name' => $genre]);
        }
    }
}
