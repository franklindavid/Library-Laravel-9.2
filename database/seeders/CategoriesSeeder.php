<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now('America/Bogota');
        DB::table('categories')->insert([
            'name' => 'Action and Adventure',            
            'description' => 'Action and adventure books constantly have you on the edge of your seat with excitement, as your fave main character repeatedly finds themselves in high stakes situations. The protagonist has an ultimate goal to achieve and is always put in risky, often dangerous situations. This genre typically crosses over with others like mystery, crime, sci-fi, and fantasy.',
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);

        DB::table('categories')->insert([
            'name' => 'Classics',            
            'description' => "You may think of these books as the throwback readings you were assigned in English class. (Looking at you, Charles Dickens.) The classics have been around for decades, and were often groundbreaking stories at their publish time, but have continued to be impactful for generations, serving as the foundation for many popular works we read today.",
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('categories')->insert([
            'name' => 'Comic Book or Graphic Novel',            
            'description' => "The stories in comic books and graphic novels are presented to the reader through engaging, sequential narrative art (illustrations and typography) that's either presented in a specific design or the traditional panel layout you find in comics. With both, you'll often find the dialogue presented in the tell-tale 'word balloons' next to the respective characters.",
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('categories')->insert([
            'name' => 'Detective and Mystery',            
            'description' => 'The plot always revolves around a crime of sorts that must be solved—or foiled—by the protagonists.',
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('categories')->insert([
            'name' => 'Fantasy',            
            'description' => "While usually set in a fictional imagined world—in opposition, Ta-Nehisi's Coates's The Water Dancer takes place in the very real world of American slavery—fantasy books include prominent elements of magic, mythology, or the supernatural.",
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('categories')->insert([
            'name' => 'Historical Fiction',            
            'description' => "These books are based in a time period set in the past decades, often against the backdrop of significant (real) historical events.",
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('categories')->insert([
            'name' => 'Horror',            
            'description' => "Meant to cause discomfort and fear for both the character and readers, horror writers often make use of supernatural and paranormal elements in morbid stories that are sometimes a little too realistic. The master of horror fiction? None other than Stephen King.",
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('categories')->insert([
            'name' => 'Literary Fiction',            
            'description' => "Though it can be seen as a broad genre that encompasses many others, literary fiction refers to the perceived artistic writing style of the author. Their prose is meant to evoke deep thought through stories that offer personal or social commentary on a particular theme.",
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('categories')->insert([
            'name' => 'Romance',            
            'description' => "Oh romance, how could we ever resist you? The genre that makes your heart all warm and fuzzy focuses on the love story of the main protagonists. This world of fiction is extremely wide-reaching in and of itself, as it has a variety of sub-genres including: contemporary romance, historical, paranormal, and the steamier erotica. If you're in need of any suggestions, we've got a list of the best romances of all time and the top picks of the year.",
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('categories')->insert([
            'name' => 'Science Fiction',            
            'description' => "Though they're often thought of in the same vein as fantasy, what distinguishes science fiction stories is that they lean heavily on themes of technology and future science. You'll find apocalyptic and dystopian novels in the sci-fi genre as well.",
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('categories')->insert([
            'name' => 'Short Stories',            
            'description' => "Though they encompass many of the genres we describe here, short stories are brief prose that are significantly, well, shorter than novels. Writers strictly tell their narratives through a specific theme and a series of brief scenes, though many authors compile these stories in wide-ranging collections, as featured below.",
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('categories')->insert([
            'name' => 'Suspense and Thrillers',            
            'description' => "While they often encompass the same elements as mystery books, the suspense and thriller genre sees the hero attempt to stop and defeat the villain to save their own life rather than uncover a specific crime. Thrillers typically include cliffhangers and deception to encourage suspense, while pulling the wool over the eyes of both the main character and reader.",
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);

        DB::table('categories')->insert([
            'name' => "Women's Fiction",            
            'description' => "Another genre that encompasses many others, women's fiction is written specifically to target female readers, often reflecting on the shared experiences of being a woman in society and the protagonist's personal growth.",
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);

        DB::table('categories')->insert([
            'name' => "Biographies and Autobiographies",            
            'description' => "Serving as an official account of the details and events of a person's life span, autobiographies are written by the subject themselves, while biographies are written by an author who is not the focus of the book.",
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('categories')->insert([
            'name' => "Cookbooks",            
            'description' => "Traditionally penned by professional chefs or even your favorite celebs, cookbooks offer an appetizing collection of recipes, specific to a theme, cuisine, or experience chosen by the author.",
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);

        DB::table('categories')->insert([
            'name' => "Essays",            
            'description' => "Typically written in the first-person, writers use their own personal experiences to reflect on a theme or topic for the reader. Many acclaimed authors—like James Baldwin and Toni Morrison—combine these pieces into collections of social commentary.",
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('categories')->insert([
            'name' => "History",            
            'description' => "These books chronicle and layout a specific moment in time, with a goal to educate and inform the reader, looking at all parts of the world at any given moment.",
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('categories')->insert([
            'name' => "Memoir",            
            'description' => "While a form of autobiography, memoirs are more flexible in that they typically don't feature an extensive chronological account of the writer's life. Instead, they focus on key moments and scenes that communicate a specific message or lesson to the reader about the author.",
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('categories')->insert([
            'name' => "Poetry",            
            'description' => "With poetry—a form of written art—authors choose a particular rhythm and style to evoke and portray various emotions and ideas. Sometimes the message is clear (like a straight-forward love poem) while with others, the meaning is hidden behind a play on words—it all depends on the writer's style, intent, and chosen theme.",
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('categories')->insert([
            'name' => "Self-Help",            
            'description' => "Whether the focus is on emotional well-being, finances, or spirituality, self-help books center on encouraging personal improvement and confidence in a variety of facets of your life.",
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('categories')->insert([
            'name' => "True Crime",            
            'description' => 'Like its much-loved television counterparts, true crime books chronicle and examine actual crimes and events in exacting detail, with many focusing on infamous murders, kidnappings, and the exploits of serial killers.',
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
    }
}
