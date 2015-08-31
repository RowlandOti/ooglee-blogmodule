<?php

use Illuminate\Database\Seeder;
use Ooglee\Domain\Entities\Post\Post;

class PostTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tb_blog_post')->delete();

        $post = new Post();
        
        $post->title = "Voluptas sunt qui libero cupiditate sequi";
        $post->slug = "voluptas-sunt-qui-libero-cupiditate-sequi";
        $post->main_image = "d2e9360d961cc58012115be09c91e739.jpg";
        $post->main_image_alt = "Voluptas sunt qui libero cupiditate sequi";
        $post->you_tube_video_id = "";
        $post->summary = "Architecto voluptas quis optio non. Itaque est nulla et et est. Ad recusandae rerum aut ut et quasi quasi.";
        $post->content = "<p>Consectetur aut rerum voluptate et. Necessitatibus veniam voluptatem minima tenetur et aperiam. Voluptatibus consequatur neque recusandae in voluptate est.</p><p>Sed officia quibusdam consequatur quia hic eos. Dolorem dolor qui et iure dolores.</p><p>Consequatur magni sequi quis vel voluptas harum. Laborum sunt aut incidunt iusto fugiat natus quia. Nam sint ex voluptates eum sit. Iusto culpa porro maiores repudiandae.</p><p>Aut dolore omnis qui culpa eligendi et nesciunt perspiciatis. Nesciunt ea quae officiis vitae. Repudiandae sunt aut et hic eius doloremque impedit pariatur.</p>";
        $post->count_views = "All registered members will are requested to come and vote for the new board chairman.";
        $post->is_sticky = true;
        $post->meta_description = "Deserunt incidunt corporis sit accusantium eum quas ea labore itaque";
        $post->meta_keywords = "dolor, suscipit, et saepe, temporibus";
        $post->status = "APPROVED";
        $post->published_at = "2014-03-08 19:53:55";
        $post->deleted_at = "2014-10-15 11:06:21";
        $post->save();
    }
}