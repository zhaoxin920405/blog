<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ArticleTableSeeder extends Seeder {

	public function run()
	{
		//$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Article::create([
				'title' => 'this is first recored!',
				'body' => 'fdjksh fhdshhh fdshajhfds ahjfdhska fhjdhjsa fdshjha fdhjs',
			]);
		}
	}

}