@if(count($featuredProjects) > 0)
    <div class="featured-post mt-3 mb-3">
        <h2 class="heading">
            <span class="heading-icon"><i class="fa fa-building"></i></span>
            <span class="heading-title">Dự án nổi bật</span>
        </h2>
        <div class="panel project">
            <div class="project__header">
                <div class="owl-carousel owl-project">
                    @foreach($featuredProjects as $project)
                        <div class="item">
                            <a href="{{ route('catalog.project.detail', [$project->category->slug, $project->slug]) }}" title="{{ $project->title }}" class="project__link">
                                <div class="project__box main">
                                    <div class="project__img">
                                        <img data-src="@if(!empty($project->image)) {{ asset('storage/app/'. $project->image) }} @else {{ asset('storage/app/uploads/default.png') }} @endif" src="{{ asset('public/catalog/img/loading.gif') }}" class="lazy w-100" alt="{{ $project->title }}">
                                    </div>
                                    <div class="project__info">
                                        <p class="project__title">{{ $project->title }}</p>
                                        <span class="project__position">
                                            @if($project->commune_id != 0)
                                                {{ $project->commune->name }},
                                            @endif
                                            @if($project->district_id != 0)
                                                {{ $project->district->name }},
                                            @endif
                                            @if($project->commune_id != 0)
                                                {{ $project->province->name }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="project__body">
                @foreach($featuredProjects as $project)
                <a href="{{ route('catalog.project.detail', [$project->category->slug, $project->slug]) }}" class="project__link">
                    <div class="project__box sub">
                        <div class="project__img">
                            <img data-src="@if(!empty($project->image)) {{ asset('storage/app/'. $project->image) }} @else {{ asset('storage/app/uploads/default.png') }} @endif" src="{{ asset('public/catalog/img/loading.gif') }}" class="lazy w-100" alt="{{ $project->title }}">
                        </div>
                        <div class="project__info">
                            <p class="project__title">{{ $project->title }}</p>
                            <span class="project__position">
                                @if($project->commune_id != 0)
                                    {{ $project->commune->name }},
                                @endif
                                @if($project->district_id != 0)
                                    {{ $project->district->name }},
                                @endif
                                @if($project->commune_id != 0)
                                    {{ $project->province->name }}
                                @endif
                            </span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
@endif