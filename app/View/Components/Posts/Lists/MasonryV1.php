<?php

namespace App\View\Components\Posts\Lists;

use Illuminate\View\Component;

use Modules\Post\Entities\Post;

class MasonryV1 extends Component
{
    public $posts;
    public $api_route;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = 'all', $limit = 12)
    {
        $posts = Post::leftJoin('users', 'posts.user_id', '=', 'users.id')
            ->select([
                'posts.id',
                'title',
                'slug',
                'posts.created_at as created_at',
                'post_type',
                'thumbnail',
                'thumbnail_medium',
                'users.name',
                'users.username',
                'users.avatar as avatar'
            ])->where(
                [
                    'is_published' => true,
                    'is_pending'   => false,
                    'is_rejected'  => false,
                    'is_deleted'   => false
                ]    
            );

            if ( in_array($type, ['post', 'gif']) ) {
                $posts->where('post_type', $type);
            }
            $posts->orderBy('created_at', 'desc')
            ->limit($limit)
            ->offset(0);

        $posts = $posts->get();

        $this->posts = $posts;
        $this->api_route = $type == 'gif' ? 'gifs' : 'posts';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.posts.lists.masonry-v1');
    }
}
