<?php
/**
 *  app/Http/View/Composers/SettingComposer.php
 *
 * User:
 * Date-Time: 13.01.21
 * Time: 16:57
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */

namespace App\Http\View\Composers;

use App\Models\Category;
use App\Models\Localization;
use App\Models\Post;
use App\Models\Setting;
use App\Services\CategoryService;
use Illuminate\View\View;

class PostsComposer
{

    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $latestPosts = Post::orderBy('created_at', 'desc')->take(10)->get();

        $view->with('latestPosts', $latestPosts);;
    }


}
