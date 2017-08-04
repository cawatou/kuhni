<?php

namespace App\Http\Controllers\Front;

use App\Models\CollectionImage;
use App\Models\Item;
use App\Models\Collection;
use App\Models\SliderItem;
use App\Models\Review;
use App\Models\Counter;
use App\Models\Callback;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use App\Models\Recipient;
use App\Models\Setting;
use Mail;
use App\Models\Statistic;

class IndexController extends FrontController
{
    public function index(Request $request)
    {
        $host = $_SERVER['HTTP_HOST'];
        $app_url = config('app.url');
        
        if($app_url == $host)
        {
            return $this->home($request);
        }
        
        $ex = explode('.', $host);
        $iurl = $ex[0];
        
        $item = Item::where('url', $iurl)->where('is_active', 1)->first();
        
        if($item)
        {
            if((int)$item->type == 0)
                return $this->studio($item->id, $request);
            elseif((int)$item->type == 1)
                return $this->designer($item->id, $request);
        }
        
        return $this->doing404();
    }
    
    public function home(Request $request)
    {
        $id = Item::where('type', 2)->first()->id;
        
        $item = Item::find($id);
        
        $current_menu = MenuItem::where('item_id', $id)->where('parent_id', 0)->orderBy('pos', 'ASC')->get();
        
        view()->share(['phone_num' => $item->phones, 'current_item' => $item, 'current_menu' => $current_menu]);
        
        $count_designers = Item::where('type', 1)->where('items.is_active', 1)->count();
        $count_studios = Counter::where('counter_type', 0)->sum('value');
        $count_workers = Counter::where('counter_type', 1)->sum('value');
        $count_projects = Counter::where('counter_type', 2)->sum('value');

        $designers_kitchen = Item::leftJoin('items_designers AS id', 'id.designer_id', '=', 'items.id')

            ->selectRaw('items.*')
            ->where('id.designer_type', 0)
            ->where('id.item_id', $id)
            ->where('items.is_active', 1)
            ->orderBy('id.pos', 'ASC')->get();
        $designers = Item::where('is_active', 1)->where('type', 1)->get();
        $designer_studio = [];

        foreach ($designers as $key=>$designer) {
            $designer_studio[$designer['id']] = Item::where('id', $designer['parent'])->where('is_active', 1)->get();
            $designer_studio[$designer['id']]['studio'] = Collection::where('item_id', $designer['id'])->where('published', 1)->get();
            foreach ($designer_studio[$designer['id']]['studio'] as $key2=>$item) {
                $designer_studio[$designer['id']]['studio'][$key2]['img'] = CollectionImage::where('collection_id', $item->id)->get();
            }
        }

        foreach ($designers_kitchen as $key=>$des) {
            $studio = Collection::where('item_id', $des['id'])->where('published', 1)->get();
            foreach ($studio as $key2=>$item) {
                $studio[$key2]['img'] = CollectionImage::where('collection_id', $item->id)->get();
            }
            $des->studio = $studio;
        }






        
        $ip = $request->ip();
        Statistic::writeInfo($ip, $id, 0);
        
        return view('front.index.index')->with([
            'item' => $item,
            'slides' => SliderItem::where('item_id', $id)->orderBy('pos', 'ASC')->get(),
            'examples' => Collection::where(['item_id' => $id, 'ctype' => 0])->orderBy('pos', 'ASC')->get(),
            'counters' => Counter::where('item_id', $id)->orderBy('pos', 'ASC')->get(),
            'reviews' => Review::where('item_id', $id)->orderBy('created_at', 'DESC')->get(),
            'designers_interior' => Item::leftJoin('items_designers AS id', 'id.designer_id', '=', 'items.id')
                ->where('id.designer_type', 1)
                ->where('id.item_id', $id)
                ->where('items.is_active', 1)
                ->orderBy('id.pos', 'ASC')->get(),
            'designer_studio' => $designer_studio,
            'designers_kitchen' => $designers_kitchen,
            'recipients' => Recipient::where('item_id', $id)->orderBy('pos', 'ASC')->get(),
            'count_designers' => $count_designers,
            'count_studios' => $count_studios,
            'count_workers' => $count_workers,
            'count_projects' => $count_projects,
            'item_settings' => Setting::getByItem(['code_google', 'code_yandex', 'code_chat'], $id)
        ]);
    }
    
    public function designer($id = 0, Request $request)
    {
        $item = Item::find($id);
        
        $current_menu = MenuItem::where('item_id', $id)->where('parent_id', 0)->orderBy('pos', 'ASC')->get();
        view()->share(['phone_num' => $item->phones, 'current_item' => $item, 'current_menu' => $current_menu]);
        
        $ip = $request->ip();
        Statistic::writeInfo($ip, $id, 0);
        
        return view('front.index.designer')->with([
            'item' => $item,
            'recipients' => Recipient::where('item_id', $id)->orderBy('pos', 'ASC')->get(),
            'item_settings' => Setting::getByItem(['code_google', 'code_yandex', 'code_chat'], $id)
        ]);
    }
    
    public function studio($id, Request $request)
    {
        $item = Item::find($id);
        
        $current_menu = MenuItem::where('item_id', $id)->where('parent_id', 0)->orderBy('pos', 'ASC')->get();
        view()->share(['phone_num' => $item->phones, 'current_item' => $item, 'current_menu' => $current_menu]);
        
        $desids = Item::where('parent', $id)->lists('id');
        
        $count_ondoing_project = Counter::whereIn('item_id', $desids)->where('counter_type', 3)->sum('value');
        $count_done_project = Counter::whereIn('item_id', $desids)->where('counter_type', 2)->sum('value');
        $count_designers = Item::where('type', 1)->where('items.is_active', 1)->where('parent', $id)->count();

      /*  $designers_kitchen = Item::leftJoin('items_designers AS id', 'id.designer_id', '=', $desids)

            ->selectRaw('items.*')
            ->where('id.designer_type', 1)
            ->where('id.item_id', 4)
            ->where('items.is_active', 1)
            ->orderBy('id.pos', 'ASC')->get();
        $designers = Item::where('is_active', 1)->where('type', 1)->get();
        $designer_studio = [];

        foreach ($designers as $key=>$designer) {
            $designer_studio[$designer['id']] = Item::where('id', $designer['parent'])->where('is_active', 1)->get();
            $designer_studio[$designer['id']]['studio'] = Collection::where('item_id', $designer['id'])->where('published', 1)->get();
            foreach ($designer_studio[$designer['id']]['studio'] as $key2=>$item) {
                $designer_studio[$designer['id']]['studio'][$key2]['img'] = CollectionImage::where('collection_id', $item->id)->get();
            }
        }

        foreach ($designers_kitchen as $key=>$des) {
            $studio = Collection::where('item_id', $des['id'])->where('published', 1)->get();
            foreach ($studio as $key2=>$item) {
                $studio[$key2]['img'] = CollectionImage::where('collection_id', $item->id)->get();
            }
            $des->studio = $studio;
        }*/

        $ip = $request->ip();
        Statistic::writeInfo($ip, $id, 0);
        return view('front.index.studio')->with([
            'item' => $item,
            'examples' => Collection::where(['item_id' => $id, 'ctype' => 0])->where('published', 1)->orderBy('pos', 'ASC')->get(),
            'projects' => Collection::where(['ctype' => 1])->whereIn('item_id', $desids)->where('published', 1)->orderBy('pos', 'ASC')->get(),
            'slides' => SliderItem::where('item_id', $id)->orderBy('pos', 'ASC')->get(),
            'reviews' => Review::where('item_id', $id)->orderBy('created_at', 'DESC')->get(),
            'counters' => Counter::where('item_id', $id)->orderBy('pos', 'ASC')->get(),
            'count_ondoing_project' => $count_ondoing_project,
            'count_done_project' => $count_done_project,
            'count_designers' => $count_designers,
            'item_settings' => Setting::getByItem(['code_google', 'code_yandex', 'code_chat'], $id),
           // 'designers_kitchen' => $designers_kitchen

        ]);
    }
    
    public function add_callback(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $item = Item::find($request->input('item_id'));
            if($item)
            {
                $cb = new Callback;
                $cb->item_id = $request->input('item_id');
                $cb->name = $request->input('name');
                $cb->phone = $request->input('phone');
                $cb->email = $request->input('email');
                $cb->comment = $request->input('comment');
                $cb->type = $request->input('type');
                $cb->recipient_id = ($request->input('send_to')) ? $request->input('send_to') : 0;
                $cb->save();
                
                $email = $item->email;
                if($cb->recipient_id > 0)
                {
                    $rec = Recipient::find($cb->recipient_id);
                    $email = $rec->email;
                }
                
                $subj = '';
                if(($cb->type*1) == 0)
                    $subj = 'Заказ обратного звонка';
                elseif(($cb->type*1) == 1)
                    $subj = 'Новый отзыв';
                elseif(($cb->type*1) == 2)
                    $subj = 'Новое письмо';
                
                Mail::send('emails.message', ['mname' => $cb->name, 'mphone' => $cb->phone, 'memail' => $cb->email, 'mcomment' => $cb->comment], function ($m) use ($email, $item, $subj) {
                    $m->from('msbstudioss@gmail.com', $subj);
        
                    $m->to($email, $item->name)->subject($subj);
                });
                
                $ip = $request->ip();
                Statistic::writeInfo($ip, $item->id, 1);
                
                
                echo json_encode(['result' => 'success']);
            }
            else
            {
                echo json_encode(['result' => 'fail']);
            }
        }
    }
    
    public function doing404()
    {
        return view('front.index.404')->with([]);
    }
}