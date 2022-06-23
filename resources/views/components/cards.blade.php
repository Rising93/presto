
<div class="card formCust " >
    <img class="img-round" src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(200,250) : 'https://picsum.photos/200' }}" class="card-img-top img-fluid" alt="...">
    <div class="card-body">
        <h5 class="my-2 card-title">{{$article->title}}</h5>
        <p class="my-2 card-text">{{__('ui.scrittoDa')}}: <a class="text-danger" href="">{{$article->user->name}}</a></p>
        <p class="my-2 card-text">{{__('ui.categoria')}}: <a class="text-danger" href="{{route('article.category', $article->category->id)}}"><x-category-name name="{{$article->category->name}}"/></a></p>
        <p class="my-2 card-text">{{__('ui.pubblicato')}} {{$article->created_at->diffforhumans()}}</p>
        <div>
            <a href="{{route('revisor.show', $article)}}">
                <x-bladewind.button
                can_submit="true"
                color="yellow"
                >{{__('ui.bottoneVisualizza')}}
                </x-bladewind.button>
            </a>
        </div>
    </div>
</div>